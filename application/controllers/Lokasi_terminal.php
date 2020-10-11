<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_terminal extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_lokasiterminal');
    }

    public function index() {
    $tahun="0000";
        $data['datasx']=$this->m_lokasiterminal->tampil_tahun();
        $data['data']=$this->m_lokasiterminal->tampil_jumlah($tahun);
        $data['terminal']=$this->m_lokasiterminal->tampil_terminal();
        $data['keterangan']=$this->m_lokasiterminal->tampil_keterangan_terminal();
        // $data['datazx']=$this->m_bencana->tampil_kecamatan();
        // $data['datazz']=$this->m_bencana->tampil_desa();
        // $data['kecamatan']=$this->m_bencana->ambil_kecamatan();
        // $data['kelurahan']=$this->m_bencana->tampil_kelurahan($this->uri->segment(3));
 
        $this->load->view('template/header');
        $this->load->view('perhubungan/v_lokasiterminal', $data);
        $this->load->view('template/footer');
    }
    public function get() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_lokasiterminal->tampil_jumlahhome($tahun);
        $no=0;
        $jumlahsemua=0;
        $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                        $no++;
                
                        $lokasi_terminal=$a['terminal'];
                        $periode=$a['periode'];
                       
                        $temp[]=$no;
                      
                        $temp[]=$lokasi_terminal;
                        $temp[]=$periode;
                     
                        
                        $temp[]="<a class=\"btn btn-xs btn-success\" href=\"Lokasi_terminal/detail_terminal/$periode\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>";

                        $tabel[]=$temp;
                    }
                    
                    echo json_encode(array('data' => $tabel));
    }



   
    public function detail_terminal() {
      
        $tahun= $this->uri->segment(3); 
        $data['datasx']=$this->m_lokasiterminal->tampil_tahun();
        $data['data']=$this->m_lokasiterminal->tampil_jumlah($tahun);
        $data['terminal']=$this->m_lokasiterminal->tampil_terminal();
        $data['keterangan']=$this->m_lokasiterminal->tampil_keterangan_terminal();
        // $data['data']=$this->m_bencana->tampil_bencanax($id);
        // $data['datas']=$this->m_bencana->tampil_bencana();
        $this->load->view('template/header');
        $this->load->view('perhubungan/v_detaillokasi', $data);
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
    
    public function proses_input_terminal(){

          $cek = $this->db->query("SELECT * FROM lokasi_terminal where lokasi_terminal='".$this->input->post('terminal')."' and type='".$this->input->post('tipe')."' and periode='".$this->input->post('periode')."' and keterangan='".$this->input->post('keterangan')."'  and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Lokasi_terminal','refresh');
           }
           else {
        $periode = $this->input->post('periode');
        $terminal=$this->input->post('terminal');
        $tipe = $this->input->post('tipe');
        $tanah = $this->input->post('tanah');
        $bangunan = $this->input->post('bangunan');
        $keterangan= $this->input->post('keterangan');
        $status = $this->input->post('status');
        $penginput = $this->input->post('penginput');
      $this->m_lokasiterminal->simpan_barang($periode,$terminal,$tipe,$tanah,$bangunan,$keterangan,$status,$penginput);
         
          redirect('Lokasi_terminal');   
           }
              
    }

     public function proses_input_detail_terminal(){

          $cek = $this->db->query("SELECT * FROM lokasi_terminal where lokasi_terminal='".$this->input->post('terminal')."' and type='".$this->input->post('tipe')."' and periode='".$this->input->post('periode')."' and keterangan='".$this->input->post('keterangan')."'  and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Lokasi_terminal','refresh');
           }
           else {
        $periode = $this->input->post('periode');
        $terminal=$this->input->post('terminal');
        $tipe = $this->input->post('tipe');
        $tanah = $this->input->post('tanah');
        $bangunan = $this->input->post('bangunan');
        $keterangan= $this->input->post('keterangan');
        $status = $this->input->post('status');
        $penginput = $this->input->post('penginput');
      $this->m_lokasiterminal->simpan_barang($periode,$terminal,$tipe,$tanah,$bangunan,$keterangan,$status,$penginput);
         
          redirect('Lokasi_terminal/detail_terminal/'.$this->uri->segment(3));   
           }
              
    }
  
  public function proses_edit_terminal(){
    $id=$this->input->post('id');
     $periode = $this->input->post('periode');
        $terminal=$this->input->post('terminal');
        $tipe = $this->input->post('tipe');
        $tanah = $this->input->post('tanah');
        $bangunan = $this->input->post('bangunan');
        $keterangan= $this->input->post('keterangan');
        $status = $this->input->post('status');
        $penginput = $this->input->post('penginput');

    $this->m_lokasiterminal->update_terminal($id,$periode,$terminal,$tipe,$tanah,$bangunan,$keterangan,$status,$penginput);
    redirect('Lokasi_terminal');  
  } 

    public function proses_edit_detail_terminal(){
    $id=$this->input->post('id');
     $periode = $this->input->post('periode');
        $terminal=$this->input->post('terminal');
        $tipe = $this->input->post('tipe');
        $tanah = $this->input->post('tanah');
        $bangunan = $this->input->post('bangunan');
        $keterangan= $this->input->post('keterangan');
        $status = $this->input->post('status');
        $penginput = $this->input->post('penginput');

    $this->m_lokasiterminal->update_terminal($id,$periode,$terminal,$tipe,$tanah,$bangunan,$keterangan,$status,$penginput);
    redirect('Lokasi_terminal/detail_terminal/'.$this->uri->segment(3));  
  } 

  public function proses_delete_terminal(){
    $id=$this->input->post('kodeinput');
    $this->m_lokasiterminal->delete_terminal($id);
    redirect('Lokasi_terminal');  
  }

  public function proses_delete_detail_terminal(){
    $id=$this->input->post('kodeinput');
    $this->m_lokasiterminal->delete_terminal($id);
    redirect('Lokasi_terminal/detail_terminal/'.$this->uri->segment(3));  
  }

   public function tampil_crosstab_bibit(){
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
       if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['data']=$this->m_lokasiterminal->tahun_crosstab();
      $data['tahun']=$this->m_lokasiterminal->tampil_periodec($tahun1,$tahun2);
      $data['jumlah']=$this->m_lokasiterminal->tampil_jumlahc($tahun1,$tahun2);
      $data['jenisbibit']=$this->m_lokasiterminal->tampil_bibitc();

        $this->load->view('template/header');
        $this->load->view('distribusibibit/tampil_crosstabdistribusi', $data);
        $this->load->view('template/footer');

    }
     public function grafik_perbandinganx() {
      $datap = $this->input->post('datap');
      $grafikp = $this->input->post('grafikp');
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
       if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['data']=$this->m_lokasiterminal->grafik_Perbandingan_perumahanx($tahun1, $tahun2);
      $data['datax']=$this->m_lokasiterminal->grafik_Perbandingan_jenis($tahun1,$tahun2,$datap);
      // $data['dataz']=$this->m_lokasiterminal->tahun_crosstab();
      // $data['tahun']=$this->m_lokasiterminal->tampil_periodec($tahun1,$tahun2);
      // $data['jumlah']=$this->m_lokasiterminal->tampil_jumlahc($tahun1,$tahun2);
      // $data['jenis_bibit']=$this->m_lokasiterminal->tampil_bibita();

      $this->load->view('template/header');
      if($datap=="all"){
      if($grafikp=="bar"){
      $this->load->view('perhubungan/grafik_lokasi_bar_all', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('perhubungan/grafik_lokasi_line_all', $data);
      $this->load->view('template/footer');
      }
    }else if($datap=="A"){
      if($grafikp=="bar"){
      $this->load->view('perhubungan/grafik_perbandingan_lokasia_bar', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('perhubungan/grafik_perbandingan_lokasia_line', $data);
      $this->load->view('template/footer');
      }
    }else if($datap=="B"){
      if($grafikp=="bar"){
      $this->load->view('perhubungan/grafik_perbandingan_lokasib_bar', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('perhubungan/grafik_perbandingan_lokasib_line', $data);
      $this->load->view('template/footer');
      }
    }else if($datap=="C"){
      if($grafikp=="bar"){
      $this->load->view('perhubungan/grafik_perbandingan_lokasic_bar', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('perhubungan/grafik_perbandingan_lokasic_line', $data);
      $this->load->view('template/footer');
      }
    }
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
