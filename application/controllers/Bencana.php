<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bencana extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_bencana');
        $this->load->model('m_sarana');
    }

    public function index() {
		$tahun="0000";
        $data['datasx']=$this->m_bencana->tampil_tahun();
    	$data['data']=$this->m_bencana->tampil_jumlah($tahun);
        $data['dataz']=$this->m_bencana->tampil_tampil($tahun);
        $data['datas']=$this->m_bencana->tampil_bencana();
        $data['datazx']=$this->m_bencana->tampil_kecamatan();
        $data['datazz']=$this->m_bencana->tampil_desa();
        $data['kecamatan']=$this->m_bencana->ambil_kecamatan();
        $data['periode']=$this->m_bencana->tampil_tahunn();
        $data['kelurahan']=$this->m_bencana->tampil_kelurahan($this->uri->segment(3));
 
        $this->load->view('template/header');
        $this->load->view('bencana/tampil', $data);
        $this->load->view('template/footer');
    }
    public function get() {
        $thn = $this->input->get('tahun');
		if($thn=="00"){
			$data['periode']=$this->m_bencana->tampil_tahunn();
			foreach ($data['periode']->result_array() as $a) {
			$tahun=$a['periode'];
			}
			$thn=$tahun;
		}else
		{}
        $tahun=intval($thn);
        $data['data']=$this->m_bencana->tampil_jumlah($tahun);
        $no=0;
        $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                        $no++;
                        $id = $a['id'];
                        // $name=$a['nama_kecamatan'];
                        $bencana_alam=$a['bencana_alam'];
                        $bencana=$a['bencana'];
                        $banyak=$a['banyak_bencana'];
                        $meninggal=$a['meninggal'];
                        $luka=$a['luka'];
                        $tahun=$a['periode'];
                        $temp[]=$no;
                        // $temp[]=$name;
                        $temp[]=$bencana;
                        $temp[]=$banyak;
                        $temp[]=$meninggal;
                        $temp[]=$luka;
                        $temp[]=$tahun;
                        
                        $temp[]="<a class=\"btn btn-xs btn-success\" href=\"bencana/detail_bencana/$id/$bencana_alam/$tahun\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>";
                        $tabel[]=$temp;
                    }
                    
                    echo json_encode(array('data' => $tabel));
    }
    public function detail_bencana() {
        $id = $this->uri->segment(3); 
        $bencana = $this->uri->segment(4);
        $tahun = $this->uri->segment(5);
        $data['datasx']=$this->m_bencana->tampil_tahun();
        $data['dataa']=$this->m_bencana->tampil_detail_bencana($tahun,$bencana);
        $data['dataz']=$this->m_bencana->tampil_tampil($tahun);
        $data['datas']=$this->m_bencana->tampil_bencana();
        $data['datazx']=$this->m_bencana->tampil_kecamatan();
        $data['datazz']=$this->m_bencana->tampil_desa();
        $data['kecamatan']=$this->m_bencana->ambil_kecamatan();
        $data['periode']=$this->m_bencana->tampil_tahunn();
        $data['kelurahan']=$this->m_bencana->tampil_kelurahan($this->uri->segment(3));
        // $data['data']=$this->m_bencana->tampil_bencanax($id);
        // $data['datas']=$this->m_bencana->tampil_bencana();
        $this->load->view('template/header');
        $this->load->view('bencana/detail_bencana', $data);
        $this->load->view('template/footer');
    }

  //   public function tampil_desa(){
  //   $kecamatan=$this->input->get('kecamatan');
  //   $data['dataz']=$this->m_sarana->tampil_desa($kecamatan);
  //   $option ='';
  //    foreach ($data['dataz']->result() as $row){
  //       $option = "<option value=\"$row->nama_desa\">$row->nama_desa</option>";
  //    }
  //    echo $option;
  // }
    public function grafik_perbandingan() {
      $datap = $this->input->post('datap');
      $grafikp = $this->input->post('grafikp');
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
      if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['datax']=$this->m_bencana->grafik_Perbandingan_bencana($tahun1,$tahun2,$datap);
      $data['data']=$this->m_bencana->grafik_Perbandingan_perumahanx($tahun1,$tahun2);
      $data['tahun']=$this->m_bencana->tahun_grafik($tahun1,$tahun2);

      $this->load->view('template/header');
      if($datap=="all"){
      if($grafikp=="bar"){
      $this->load->view('bencana/grafik_perbandingan_bencana_bar', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('bencana/grafik_perbandingan_bencana_line', $data);
      $this->load->view('template/footer');
      }
    } else if ($datap=="1") {
        if($grafikp=="bar"){
      $this->load->view('bencana/grafik_perbandingan_banjir_bar', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('bencana/grafik_perbandingan_banjir_line', $data);
      $this->load->view('template/footer');
      }
    }else if ($datap=="2") {
        if($grafikp=="bar"){
      $this->load->view('bencana/grafik_perbandingan_longsor_bar', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('bencana/grafik_perbandingan_longsor_line', $data);
      $this->load->view('template/footer');
      }
    }else if ($datap=="3") {
        if($grafikp=="bar"){
      $this->load->view('bencana/grafik_perbandingan_gempa_bar', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('bencana/grafik_perbandingan_gempa_line', $data);
      $this->load->view('template/footer');
      }
    }else if ($datap=="4") {
        if($grafikp=="bar"){
      $this->load->view('bencana/grafik_perbandingan_topan_bar', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('bencana/grafik_perbandingan_topan_line', $data);
      $this->load->view('template/footer');
      }
    }else if ($datap=="5") {
        if($grafikp=="bar"){
      $this->load->view('bencana/grafik_perbandingan_kekeringan_bar', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('bencana/grafik_perbandingan_kekeringan_line', $data);
      $this->load->view('template/footer');
      }
    }else if ($datap=="6") {
        if($grafikp=="bar"){
      $this->load->view('bencana/grafik_perbandingan_tsunami_bar', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('bencana/grafik_perbandingan_tsunami_line', $data);
      $this->load->view('template/footer');
      }
    }else if ($datap=="7") {
        if($grafikp=="bar"){
      $this->load->view('bencana/grafik_perbandingan_kebakaran_bar', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('bencana/grafik_perbandingan_kebakaran_line', $data);
      $this->load->view('template/footer');
      }
    }else if ($datap=="8") {
        if($grafikp=="bar"){
      $this->load->view('bencana/grafik_perbandingan_beliung_bar', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('bencana/grafik_perbandingan_beliung_line', $data);
      $this->load->view('template/footer');
      }
    }

    }
    public function pilih_kelurahan(){
        $data['kelurahan']=$this->m_bencana->tampil_kelurahan($this->uri->segment(3));
        $this->load->view('bencana/v_drop_down_kelurahan',$data);
    }

    public function pilih_edit_kelurahan(){
        $data['kelurahan']=$this->m_bencana->tampil_kelurahan($this->uri->segment(3));
        $this->load->view('bencana/v_drop_down_kelurahan_edit',$data);
    }



    public function tampil_edit_coba() {

    	$this->load->view('template/header');
        $this->load->view('coba/edit');
        $this->load->view('template/footer');
    }

    public function tampil_input_bencana() {
     $data['data']=$this->m_bencana->tampil_bencana();
        $this->load->view('template/header');
        $this->load->view('bencana/input',$data);
        $this->load->view('template/footer');
    }
    
   	public function proses_input_bencana(){
       $bencana = $this->input->post('bencana');
      $banyak_bencana=$this->input->post('banyak_bencana');
        $meninggal = $this->input->post('meninggal');
        $luka = $this->input->post('luka');
        $date = $this->input->post('date');
        $penginput = $this->input->post('penginput');
        $status = $this->input->post('status');
        $kecamatann = $this->input->post('kecamatan_id');
        $desaa = $this->input->post('kelurahan_id');
        $cek = $this->db->query("SELECT * FROM jumlah_korban where kecamatan='$kecamatann' and desa='$desaa' and bencana_alam='$bencana' and periode='$date' and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Bencana','refresh');
           }
           else {
       
   		$this->m_bencana->simpan_barang($bencana,$banyak_bencana,$meninggal,$luka,$date,$penginput,$status,$kecamatann,$desaa);

		redirect('Bencana');   	
    }
  }

    public function proses_input_detail_bencana(){
        $idd = $this->uri->segment(3);
        $becana = $this->uri->segment(4);
        $tahun = $this->uri->segment(5);
        $bencana = $this->input->post('bencana');
        $banyak_bencana=$this->input->post('banyak_bencana');
        $meninggal = $this->input->post('meninggal');
        $luka = $this->input->post('luka');
        $date = $this->input->post('date');
        $penginput = $this->input->post('penginput');
        $status = $this->input->post('status');
        $kecamatann = $this->input->post('kecamatan_id');
        $desaa = $this->input->post('kelurahan_id');

       $cek = $this->db->query("SELECT * FROM jumlah_korban where kecamatan='$kecamatann' and desa='$desaa' and bencana_alam='$bencana' and periode='$date' and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Bencana','refresh');
           }
           else {
       
        $this->m_bencana->simpan_detail_barang($bencana,$banyak_bencana,$meninggal,$luka,$date,$penginput,$status,$kecamatann,$desaa);

        redirect('Bencana');    
    }
}


	public function proses_edit_bencana(){
		$id=$this->input->post('id');
		$bencana = $this->input->post('bencana');
    $banyak_bencana=$this->input->post('banyak_bencana');
    $meninggal = $this->input->post('meninggal');
    $luka = $this->input->post('luka');
    $tahun = $this->input->post('tahun');
    $kecamatannn = $this->input->post('kecamatan_idd');
		$desaaa = $this->input->post('kelurahan_idd');
		$this->m_bencana->update_bencana($id,$bencana,$banyak_bencana,$meninggal,$luka,$tahun,$kecamatannn,$desaaa);
		redirect('Bencana');	
	}	
	public function proses_delete_bencana(){
		$id=$this->input->post('id');
		
		
		$this->m_bencana->delete_bencana($id);
		redirect('Bencana');	
	}
    public function tampil_grafik(){
        $tahun =  $this->uri->segment(3);
        $bencana =  $this->uri->segment(4);
        
        $data['datasx']=$this->m_bencana->tampil_tahun();
        $data['data']=$this->m_bencana->tampil_detail_bencana_grafik($tahun,$bencana);
        $data['datas']=$this->m_bencana->tampil_bencana();
        $this->load->view('template/header');
        $this->load->view('bencana/grafik', $data);
         $this->load->view('template/footer');
      
    }

    public function tampil_grafika(){
        $tahun =  $this->uri->segment(3);

        $data['grafik']=$this->m_bencana->tampil_grafik($tahun);
        $this->load->view('template/header');
        $this->load->view('bencana/v_tampil_grafik',$data);
      
    }
    // public function tampil_bencana(){
    //     $data['data']=$this->m_bencana->tampil_bencana();
    //     $this->load->view('template/header');
    //     $this->load->view('bencana/bencana', $data);
    //     $this->load->view('template/footer');
    // }	
    // public function proses_input_master_bencana(){
        
    //     $bencana = $this->input->post('bencana');

    //     $this->m_bencana->simpan_bencana($bencana);

    //     redirect('Bencana/tampil_bencana');    
    // }
    // public function proses_edit_bencana_alam(){
    //     $id=$this->input->post('id');
    //     $bencana = $this->input->post('bencana');
    //     $this->m_bencana->update_bencana_alam($id,$bencana);
    //     redirect('Bencana/tampil_bencana');    
    // } 
    // public function proses_delete_bencana_alam(){
    //     $id=$this->input->post('id');   
    //     $this->m_bencana->delete_bencana_alam($id);
    //     redirect('Bencana/tampil_bencana');    
    // }  

	

}
