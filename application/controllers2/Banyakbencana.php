<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Banyakbencana extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_banyakbencana');
    }

    public function index() {
		$tahun='0000';
        $data['datasx']=$this->m_banyakbencana->tampil_tahun();
    	$data['data']=$this->m_banyakbencana->tampil_jumlah($tahun);
        $data['dataa']=$this->m_banyakbencana->tampil_tampil($tahun);
        $data['datas']=$this->m_banyakbencana->tampil_detailjumlah($tahun);
        $data['dataz']=$this->m_banyakbencana->tampil_bencana();
        $data['datazx']=$this->m_banyakbencana->tampil_kecamatan();
        // $data['datazz']=$this->m_bencana->tampil_desa();
        // $data['kecamatan']=$this->m_bencana->ambil_kecamatan();
        $data['periode']=$this->m_banyakbencana->tampil_tahunn();
        // $data['kelurahan']=$this->m_bencana->tampil_kelurahan($this->uri->segment(3));
 
        $this->load->view('template/header');
        $this->load->view('bencana/tampil_banyakbencana', $data);
        $this->load->view('template/footer');
    }
    public function get() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_banyakbencana->tampil_jumlah($tahun);
        $no=0;
        $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                        $no++;
                        $id = $a['id'];
                        $periode=$a['periode'];
                        $jumlah_bencana=$a['jumlah_bencana'];
                        $mati =$a['mati'];
                        $luka=$a['luka'];
                        $menderita=$a['menderita'];
                        $hancur=$a['hancur'];
                        $rusak=$a['rusak'];
                        $kerugian=number_format($a['kerugian'],2,".",",");
                       
                      
                        $temp[]=$no;
                        $temp[]=$periode;
                        $temp[]=$jumlah_bencana;
                        $temp[]=$mati;  
                        $temp[]=$luka;
                        $temp[]=$menderita;
                        $temp[]=$hancur;      
                        $temp[]=$rusak;
                        $temp[]=$kerugian;  
                        
                        $temp[]="<a class=\"btn btn-xs btn-success\" href=\"Banyakbencana/detail_banyakbencana/$periode\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>";
                        $tabel[]=$temp;
                    }
                    
                    echo json_encode(array('data' => $tabel));
    }
    public function detail_banyakbencana() {
        $tahun = $this->uri->segment(3);
        $data['datasx']=$this->m_banyakbencana->tampil_tahun();
        $data['data']=$this->m_banyakbencana->tampil_jumlah($tahun);
        $data['dataz']=$this->m_banyakbencana->tampil_detailjumlah($tahun);
        $data['dataa']=$this->m_banyakbencana->tampil_tampil($tahun);
        $data['datas']=$this->m_banyakbencana->tampil_bencana();
        $data['datazx']=$this->m_banyakbencana->tampil_kecamatan();
        // $data['datazz']=$this->m_bencana->tampil_desa();
        // $data['kecamatan']=$this->m_bencana->ambil_kecamatan();
        $data['periode']=$this->m_banyakbencana->tampil_tahunn();
        // $data['kelurahan']=$this->m_bencana->tampil_kelurahan($this->uri->segment(3));
        $this->load->view('template/header');
        $this->load->view('bencana/detail_banyakbencana', $data);
        $this->load->view('template/footer');
    }

    public function grafikbanyakbencana() {
      $id = $this->uri->segment(3); 
      $data['data']=$this->m_banyakbencana->tampil_grafik($id);
      $this->load->view('template/header');
      $this->load->view('bencana/grafikbanyakbencana', $data);
      $this->load->view('template/footer');
    }


     public function grafik_perbandingan() {
    $datap = $this->input->post('datap');
    $grafikp = $this->input->post('grafikp');
    $tahun1 = $this->input->post('tahun1');
    $tahun2 = $this->input->post('tahun2');
    if($tahun1>$tahun2){
    list($tahun1, $tahun2) = array($tahun2, $tahun1);
    }
    $data['datap']=$datap;
      $data['data']=$this->m_banyakbencana->grafik_perbandingan_perumahanx($tahun1, $tahun2);
      $this->load->view('template/header');
    if($datap=="all"){
    if($grafikp=="bar"){
    $this->load->view('bencana/grafik_banyak_bar_all', $data);
    $this->load->view('template/footer');
    }else if($grafikp=="line"){
    $this->load->view('bencana/grafik_banyak_line_all', $data);
    $this->load->view('template/footer');
    }
    }else{
    if($grafikp=="bar"){
    $this->load->view('bencana/grafik_perbandingan_banyak_bar', $data);
    $this->load->view('template/footer');
    }else if($grafikp=="line"){
    $this->load->view('bencana/grafik_perbandingan_banyak_line', $data);
    $this->load->view('template/footer');
    }
    }
    
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
    
   	public function proses_input_bencana(){
         $cek = $this->db->query("SELECT * FROM banyak_bencana where kecamatan='".$this->input->post('kecamatan')."' and periode='".$this->input->post('periode')."'  and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Banyakbencana','refresh');
           }
           else {
        $periode = $this->input->post('periode');
   		  $kecamatan=$this->input->post('kecamatan');
        $jumlah=$this->input->post('jumlah');
        $mati=$this->input->post('mati');
        $luka=$this->input->post('luka');
        $menderita=$this->input->post('menderita');
        $hancur=$this->input->post('hancur');
        $rusak= $this->input->post('rusak');
        $rugi= $this->input->post('rugi');
        $status = $this->input->post('status');
        $penginput = $this->input->post('penginput');
   		$this->m_banyakbencana->simpan_barang($periode,$kecamatan,$jumlah,$mati,$luka,$menderita,$hancur,$rusak,$rugi,$status,$penginput);
		redirect('Banyakbencana');   	
    }
  }

  public function proses_input_detail_bencana(){
         $cek = $this->db->query("SELECT * FROM banyak_bencana where kecamatan='".$this->input->post('kecamatan')."' and periode='".$this->input->post('periode')."'  and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Banyakbencana','refresh');
           }
           else {
        $periode = $this->input->post('periode');
        $kecamatan=$this->input->post('kecamatan');
        $jumlah=$this->input->post('jumlah');
        $mati=$this->input->post('mati');
        $luka=$this->input->post('luka');
        $menderita=$this->input->post('menderita');
        $hancur=$this->input->post('hancur');
        $rusak= $this->input->post('rusak');
        $rugi= $this->input->post('rugi');
        $status = $this->input->post('status');
        $penginput = $this->input->post('penginput');
      $this->m_banyakbencana->simpan_barang($periode,$kecamatan,$jumlah,$mati,$luka,$menderita,$hancur,$rusak,$rugi,$status,$penginput);
    redirect('Banyakbencana/detail_banyakbencana/'.$this->uri->segment(3));    
    }
  }

	public function proses_edit_bencana(){
		$id=$this->input->post('id');
		$periode = $this->input->post('periode');
        $kecamatan=$this->input->post('kecamatan');
        $jumlah=$this->input->post('jumlah');
        $mati=$this->input->post('mati');
        $luka=$this->input->post('luka');
        $menderita=$this->input->post('menderita');
        $hancur=$this->input->post('hancur');
        $rusak= $this->input->post('rusak');
        $rugi= $this->input->post('rugi');
        $status = $this->input->post('status');
        $penginput = $this->input->post('penginput');
		$this->m_banyakbencana->update_bencana($id,$periode,$kecamatan,$jumlah,$mati,$luka,$menderita,$hancur,$rusak,$rugi,$status,$penginput);
		redirect('Banyakbencana');	
	}	
    public function proses_edit_detail_bencana(){
    $id=$this->input->post('id');
    $periode = $this->input->post('periode');
        $kecamatan=$this->input->post('kecamatan');
        $jumlah=$this->input->post('jumlah');
        $mati=$this->input->post('mati');
        $luka=$this->input->post('luka');
        $menderita=$this->input->post('menderita');
        $hancur=$this->input->post('hancur');
        $rusak= $this->input->post('rusak');
        $rugi= $this->input->post('rugi');
        $status = $this->input->post('status');
        $penginput = $this->input->post('penginput');
    $this->m_banyakbencana->update_bencana($id,$periode,$kecamatan,$jumlah,$mati,$luka,$menderita,$hancur,$rusak,$rugi,$status,$penginput);
    redirect('Banyakbencana/detail_banyakbencana/'.$this->uri->segment(3));  
  } 
	public function proses_delete_bencana(){
		$id=$this->input->post('kodeinput');
		$this->m_banyakbencana->delete_bencanaa($id);
		redirect('Banyakbencana');	
	}
  public function proses_delete_detail_bencana(){
    $id=$this->input->post('kodeinput');
    $this->m_banyakbencana->delete_bencanaa($id);
    redirect('Banyakbencana/detail_banyakbencana/'.$this->uri->segment(3));  
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
