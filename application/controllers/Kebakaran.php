<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class kebakaran extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_kebakaran');
    }

    public function index() {
		$tahun="0000";
        $data['datasx']=$this->m_kebakaran->tampil_tahun();
    	$data['data']=$this->m_kebakaran->tampil_jumlah($tahun);
        $data['dataa']=$this->m_kebakaran->tampil_tampil($tahun);
        // $data['datas']=$this->m_kebakaran->tampil_bencana();
        $data['datazx']=$this->m_kebakaran->tampil_kecamatan();
        // $data['datazz']=$this->m_bencana->tampil_desa();
        // $data['kecamatan']=$this->m_bencana->ambil_kecamatan();
        $data['periode']=$this->m_kebakaran->tampil_tahunn();
        // $data['kelurahan']=$this->m_bencana->tampil_kelurahan($this->uri->segment(3));
 
        $this->load->view('template/header');
        $this->load->view('bencana/tampil_bakar', $data);
        $this->load->view('template/footer');
    }
    public function tampil_crosstab(){
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
       if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['data']=$this->m_kebakaran->tahun_crosstab();
      $data['tahun']=$this->m_kebakaran->tampil_periodec($tahun1,$tahun2);
      $data['jumlah']=$this->m_kebakaran->tampil_jumlahc($tahun1,$tahun2);
      $data['kecamatan']=$this->m_kebakaran->tampil_kecamatanc();

        $this->load->view('template/header');
        $this->load->view('bencana/tampil_crosstabkebakaran', $data);
        $this->load->view('template/footer');

    }

    public function get() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_kebakaran->tampil_jumlah_dashboard($tahun);
        $no=0;
        $jumlahsemua=0;
        $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                        $no++;
                        // $id = $a['id'];
                        // $name=$a['nama_kecamatan'];
                        $kebakaran=$a['kebakaran'];
                        $korban_manusia=$a['korban_manusia'];
                        $periode=$a['periode'];
                      
                        $temp[]=$no;
                        // $temp[]=$name;
                        $temp[]=$periode;
                        $temp[]=$kebakaran;
                        $temp[]=$korban_manusia;  
                      
                     
                        
                        $temp[]="<a class=\"btn btn-xs btn-success\" href=\"Kebakaran/detail_jenis_kebakaran/$periode\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>";
                        $tabel[]=$temp;
                    }
                    
                    echo json_encode(array('data' => $tabel));
    }
    
     public function grafik_jenis() {
      $id = $this->uri->segment(3); 
      $data['data']=$this->m_kebakaran->tampil_grafikc($id);
      $this->load->view('template/header');
      $this->load->view('bencana/grafikbanyakkebakaran', $data);
      $this->load->view('template/footer');
    }

    public function detail_jenis_kebakaran(){
        $tahun = $this->uri->segment(3);
         $data['datasx']=$this->m_kebakaran->tampil_tahun();
        $data['data']=$this->m_kebakaran->tampil_jumlah($tahun);
        $data['dataa']=$this->m_kebakaran->tampil_tampil($tahun);
        // $data['datas']=$this->m_kebakaran->tampil_bencana();
        $data['datazx']=$this->m_kebakaran->tampil_kecamatan();
        // $data['datazz']=$this->m_bencana->tampil_desa();
        // $data['kecamatan']=$this->m_bencana->ambil_kecamatan();
        $data['periode']=$this->m_kebakaran->tampil_tahunn();
        // $data['kelurahan']=$this->m_bencana->tampil_kelurahan($this->uri->segment(3));
 
        $this->load->view('template/header');
        $this->load->view('bencana/detail_tampil_bakar', $data);
        $this->load->view('template/footer');
    
    }

     public function grafik_perbandingan() {
  
      $grafikp = $this->input->post('grafikp');
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
      if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['data']=$this->m_kebakaran->grafik_Perbandingan_perumahanx($tahun1,$tahun2);

      $this->load->view('template/header');
     
      if($grafikp=="bar"){
      $this->load->view('bencana/grafik_kebakaran_bar_all', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('bencana/grafik_kebakaran_bar_line', $data);
      $this->load->view('template/footer');
      }
    }

 //    public function detail_bencana() {
 //        $id = $this->uri->segment(3); 
 //        $sebelum = $this->uri->segment(4);
 //        $bencana = str_replace(' ', '', $sebelum);
 //        $tahun = $this->uri->segment(5);
 //        $data['datasx']=$this->m_bencana->tampil_tahun();
 //        $data['dataa']=$this->m_bencana->tampil_detail_bencana($tahun,$bencana);
 //        $data['dataz']=$this->m_bencana->tampil_tampil($tahun);
 //        $data['datas']=$this->m_bencana->tampil_bencana();
 //        $data['datazx']=$this->m_bencana->tampil_kecamatan();
 //        $data['datazz']=$this->m_bencana->tampil_desa();
 //        $data['kecamatan']=$this->m_bencana->ambil_kecamatan();
 //        $data['periode']=$this->m_bencana->tampil_tahunn();
 //        $data['kelurahan']=$this->m_bencana->tampil_kelurahan($this->uri->segment(3));
 //        // $data['data']=$this->m_bencana->tampil_bencanax($id);
 //        // $data['datas']=$this->m_bencana->tampil_bencana();
 //        $this->load->view('template/header');
 //        $this->load->view('bencana/detail_bencana', $data);
      
 //    }

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

 //    	$this->load->view('template/header');
 //        $this->load->view('coba/edit');
 //        $this->load->view('template/footer');
 //    }

 //    public function tampil_input_bencana() {
 //     $data['data']=$this->m_bencana->tampil_bencana();
 //        $this->load->view('template/header');
 //        $this->load->view('bencana/input',$data);
 //        $this->load->view('template/footer');
 //    }
    
   	public function proses_input_kebakaran(){
      $cek = $this->db->query("SELECT * FROM banyak_kebakaran where kecamatan='".$this->input->post('kecamatan')."' and periode='".$this->input->post('periode')."'  and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Kebakaran','refresh');
           }
           else {
        $periode = $this->input->post('periode');
   		$kecamatan=$this->input->post('kecamatan');
        $kebakaran=$this->input->post('kebakaran');
        $manusia=$this->input->post('manusia');
        $status = $this->input->post('status');
        $penginput = $this->input->post('penginput');
   		$this->m_kebakaran->simpan_barang($periode,$kecamatan,$kebakaran,$manusia,$status,$penginput);
		redirect('Kebakaran');   	
    }
}
public function proses_input_detail_kebakaran(){

      $cek = $this->db->query("SELECT * FROM banyak_kebakaran where kecamatan='".$this->input->post('kecamatan')."' and periode='".$this->input->post('periode')."'  and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Kebakaran','refresh');
           }
           else {
        $periode = $this->input->post('periode');
      $kecamatan=$this->input->post('kecamatan');
        $kebakaran=$this->input->post('kebakaran');
        $manusia=$this->input->post('manusia');
        $status = $this->input->post('status');
        $penginput = $this->input->post('penginput');
      $this->m_kebakaran->simpan_barang($periode,$kecamatan,$kebakaran,$manusia,$status,$penginput);
    redirect('Kebakaran/detail_jenis_kebakaran/'.$this->uri->segment(3));    
    }
}

	public function proses_edit_kebakaran(){
		$id=$this->input->post('id');
		$periode = $this->input->post('periode');
        $kecamatan=$this->input->post('kecamatan');
        $kebakaran=$this->input->post('kebakaran');
        $manusia=$this->input->post('manusia');
        $status = $this->input->post('status');
        $penginput = $this->input->post('penginput');
		$this->m_kebakaran->update_kebakaran($id,$periode,$kecamatan,$kebakaran,$manusia,$status,$penginput);
		redirect('Kebakaran');	
	}
    public function proses_edit_detail_kebakaran(){

    $id=$this->input->post('id');
    $periode = $this->input->post('periode');
        $kecamatan=$this->input->post('kecamatan');
        $kebakaran=$this->input->post('kebakaran');
        $manusia=$this->input->post('manusia');
        $status = $this->input->post('status');
        $penginput = $this->input->post('penginput');
    $this->m_kebakaran->update_kebakaran($id,$periode,$kecamatan,$kebakaran,$manusia,$status,$penginput);
    redirect('Kebakaran/detail_jenis_kebakaran/'.$this->uri->segment(3));  
  }	
	public function proses_delete_kebakaran(){
		$id=$this->input->post('kodeinput');
		$this->m_kebakaran->delete_kebakaran($id);
		redirect('Kebakaran');	
	}
  public function proses_delete_detail_kebakaran(){
    $id=$this->input->post('kodeinput');
    $this->m_kebakaran->delete_kebakaran($id);
    redirect('Kebakaran/detail_jenis_kebakaran/'.$this->uri->segment(3));  
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
