<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jeniskorban extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_jeniskorban');
    }

    public function index() {
        $tahun="0000";
        $data['datasx']=$this->m_jeniskorban->tampil_tahun();
        $data['data']=$this->m_jeniskorban->tampil_jumlah($tahun);
        
        $data['datas']=$this->m_jeniskorban->tampil_bencana();
        // $data['datazx']=$this->m_bencana->tampil_kecamatan();
        // $data['datazz']=$this->m_bencana->tampil_desa();
        // $data['kecamatan']=$this->m_bencana->ambil_kecamatan();
        $data['periode']=$this->m_jeniskorban->tampil_tahunn();
        // $data['kelurahan']=$this->m_bencana->tampil_kelurahan($this->uri->segment(3));
 
        $this->load->view('template/header');
        $this->load->view('bencana/tampil_jeniskorban', $data);
        $this->load->view('template/footer');
    }
    public function get() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_jeniskorban->tampil_jumlah_dashboard($tahun);
        $no=0;
        $jumlahsemua=0;
        $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                        $no++;
                  
                        // $name=$a['nama_kecamatan'];
                        // $jeniskorban=$a['jeniskorban'];
                        $nol=$a['nol'];
                        $sepuluh=$a['sepuluh'];
                        $duapuluh=$a['duapuluh'];
                        $tigalima=$a['tigalima'];
                        $jumlah=$nol+$sepuluh+$duapuluh+$tigalima;
                        $periode=$a['periode'];
                      
                        $temp[]=$no;
                        // $temp[]=$name;
                        // $temp[]=$jeniskorban;
                        $temp[]=$periode;
                        $temp[]=$nol;  
                        $temp[]=$sepuluh;
                        $temp[]=$duapuluh;
                        $temp[]=$tigalima;      
                        $temp[]=$jumlah;
                 
                        
                        $temp[]="<a class=\"btn btn-xs btn-success\" href=\"Jeniskorban/detail_jenis/$periode\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>";
                        $tabel[]=$temp;
                    }
                    
                    echo json_encode(array('data' => $tabel));
    }
    public function detail_jenis() {
        $tahun = $this->uri->segment(3); 
        $data['datasx']=$this->m_jeniskorban->tampil_tahun();
        $data['data']=$this->m_jeniskorban->tampil_jumlah($tahun);
     
        $data['datas']=$this->m_jeniskorban->tampil_bencana();
        // $data['datazx']=$this->m_bencana->tampil_kecamatan();
        // $data['datazz']=$this->m_bencana->tampil_desa();
        // $data['kecamatan']=$this->m_bencana->ambil_kecamatan();
        $data['periode']=$this->m_jeniskorban->tampil_tahunn();
        // $data['data']=$this->m_bencana->tampil_bencanax($id);
        // $data['datas']=$this->m_bencana->tampil_bencana();
        $this->load->view('template/header');
        $this->load->view('bencana/detail_jeniskorban', $data);
        $this->load->view('template/footer');
    }

 //  //   public function tampil_desa(){
 //  //   $kecamatan=$this->input->get('kecamatan');
 //  //   $data['dataz']=$this->m_sarana->tampil_desa($kecamatan);
 //  //   $option ='';
 //  //    foreach ($data['dataz']->result() as $row){
 //  //       $option = "<option value=\"$row->nama_desa\">$row->nama_desa</option>";
 //  //    }
 //  //    echo $option;
 //  // }
 //    public function pilih_kelurahan(){
 //        $data['kelurahan']=$this->m_bencana->tampil_kelurahan($this->uri->segment(3));
 //        $this->load->view('bencana/v_drop_down_kelurahan',$data);
 //    }

 //    public function pilih_edit_kelurahan(){
 //        $data['kelurahan']=$this->m_bencana->tampil_kelurahan($this->uri->segment(3));
 //        $this->load->view('bencana/v_drop_down_kelurahan',$data);
 //    }



 //    public function tampil_edit_coba() {

 //     $this->load->view('template/header');
 //        $this->load->view('coba/edit');
 //        $this->load->view('template/footer');
 //    }

 //    public function tampil_input_bencana() {
 //     $data['data']=$this->m_bencana->tampil_bencana();
 //        $this->load->view('template/header');
 //        $this->load->view('bencana/input',$data);
 //        $this->load->view('template/footer');
 //    }
     public function grafik_perbandingan() {
  
      $grafikp = $this->input->post('grafikp');
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
      if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['data']=$this->m_jeniskorban->grafik_Perbandingan_perumahanx($tahun1,$tahun2);

      $this->load->view('template/header');
     
      if($grafikp=="bar"){
      $this->load->view('bencana/grafik_jenis_bar', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('bencana/grafik_jenis_line', $data);
      $this->load->view('template/footer');
      }
    }
     public function grafik_jenis() {
      $id = $this->uri->segment(3); 
      $data['data']=$this->m_jeniskorban->tampil_grafik($id);
      $this->load->view('template/header');
      $this->load->view('bencana/grafikjeniskorban', $data);
      $this->load->view('template/footer');
    }
    
    public function proses_input_jenis(){
        $cek = $this->db->query("SELECT * FROM jenis_korban where jeniskorban='".$this->input->post('jeniskorban')."' and periode='".$this->input->post('periode')."'  and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('JenisKorban','refresh');
           }
           else {
        
        $periode = $this->input->post('periode');
        $jenis=$this->input->post('jeniskorban');
        $nol=$this->input->post('0');
        $sepuluh=$this->input->post('10');
        $duapuluh=$this->input->post('20');
        $tigapuluh=$this->input->post('35');
        $jumlah= $this->input->post('jumlah');
        $status = $this->input->post('status');
        $penginput = $this->input->post('penginput');
        $this->m_jeniskorban->simpan_barang($periode,$jenis,$nol,$sepuluh,$duapuluh,$tigapuluh,$status,$penginput);
            redirect('JenisKorban');   
    }
}

public function proses_input_detail_jenis(){
        $cek = $this->db->query("SELECT * FROM jenis_korban where jeniskorban='".$this->input->post('jeniskorban')."' and periode='".$this->input->post('periode')."'  and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('JenisKorban','refresh');
           }
           else {
        $t=$this->uri->segment(3);
        $periode = $this->input->post('periode');
        $jenis=$this->input->post('jeniskorban');
        $nol=$this->input->post('0');
        $sepuluh=$this->input->post('10');
        $duapuluh=$this->input->post('20');
        $tigapuluh=$this->input->post('35');
        $jumlah= $this->input->post('jumlah');
        $status = $this->input->post('status');
        $penginput = $this->input->post('penginput');
        $this->m_jeniskorban->simpan_barang($periode,$jenis,$nol,$sepuluh,$duapuluh,$tigapuluh,$status,$penginput);
            redirect('JenisKorban/detail_jenis/'.$t);   
    }
}



    public function proses_edit_jenis(){
        $id=$this->input->post('id');
        $periode = $this->input->post('periode');
        $jenis=$this->input->post('jeniskorban');
        $nol=$this->input->post('0');
        $sepuluh=$this->input->post('10');
        $duapuluh=$this->input->post('20');
        $tigapuluh=$this->input->post('35');
        $jumlah= $this->input->post('jumlah');
        $status = $this->input->post('status');
        $penginput = $this->input->post('penginput');
        $this->m_jeniskorban->update_jenis($id,$periode,$jenis,$nol,$sepuluh,$duapuluh,$tigapuluh,$status,$penginput);
        redirect('JenisKorban');    
    }   

    public function proses_edit_detail_jenis(){
        $id=$this->input->post('id');
        $periode = $this->input->post('periode');
        $jenis=$this->input->post('jeniskorban');
        $nol=$this->input->post('0');
        $sepuluh=$this->input->post('10');
        $duapuluh=$this->input->post('20');
        $tigapuluh=$this->input->post('35');
        $jumlah= $this->input->post('jumlah');
        $status = $this->input->post('status');
        $penginput = $this->input->post('penginput');
        $this->m_jeniskorban->update_jenis($id,$periode,$jenis,$nol,$sepuluh,$duapuluh,$tigapuluh,$status,$penginput);
        redirect('JenisKorban/detail_jenis/'.$this->uri->segment(3));    
    }   
    public function proses_delete_jenis(){
        $id=$this->input->post('kodeinput');
        $this->m_jeniskorban->delete_jenis($id);
        redirect('JenisKorban');    
    }

    public function proses_delete_detail_jenis(){
        $id=$this->input->post('kodeinput');
        $this->m_jeniskorban->delete_jenis($id);
        redirect('JenisKorban/detail_jenis/'.$this->uri->segment(3));    
    }
 //    public function tampil_grafik(){
 //        $tahun =  $this->uri->segment(3);
 //        $data['datasx']=$this->m_bencana->tampil_tahun();
 //        $data['data']=$this->m_bencana->tampil_jumlah($tahun);
 //        $data['datas']=$this->m_bencana->tampil_bencana();
 //        $this->load->view('template/header');
 //        $this->load->view('bencana/grafik', $data);
      
      
 //    }

 //    public function tampil_grafika(){
 //        $tahun =  $this->uri->segment(3);
 //        $data['grafik']=$this->m_bencana->tampil_grafik($tahun);
 //        $this->load->view('template/header');
 //        $this->load->view('bencana/v_tampil_grafik',$data);
      
 //    }
 //    public function tampil_bencana(){
 //        $data['data']=$this->m_bencana->tampil_bencana();
 //        $this->load->view('template/header');
 //        $this->load->view('bencana/bencana', $data);
 //        $this->load->view('template/footer');
 //    }    
 //    public function proses_input_master_bencana(){
        
 //        $bencana = $this->input->post('bencana');

 //        $this->m_bencana->simpan_bencana($bencana);

 //        redirect('Bencana/tampil_bencana');    
 //    }
 //    public function proses_edit_bencana_alam(){
 //        $id=$this->input->post('id');
 //        $bencana = $this->input->post('bencana');
 //        $this->m_bencana->update_bencana_alam($id,$bencana);
 //        redirect('Bencana/tampil_bencana');    
 //    } 
 //    public function proses_delete_bencana_alam(){
 //        $id=$this->input->post('id');   
 //        $this->m_bencana->delete_bencana_alam($id);
 //        redirect('bencana/tampil_bencana');    
 //    }  

    

}
