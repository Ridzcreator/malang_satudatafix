<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jumlahphk extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_jumlahphk');
    }

    public function index() {
		$tahun ='0000';
    	$data['data']=$this->m_jumlahphk->tampil_jumlahphk($tahun);
		$data['datax']=$this->m_jumlahphk->tampil_tahun();
        $this->load->view('template/header');
        $this->load->view('tenagakerja/jumlahphk', $data);
		$this->load->view('template/footer');
    }
	
	public function get() {
		$thn = $this->input->get('tahun');
		$tahun=intval($thn);
		$data['data']=$this->m_jumlahphk->tampil_jumlahphk($tahun);
        $no=0;
		$tabel=array();
                    foreach ($data['data']->result_array() as $a) {
					$temp = array();
                        $no++;
                        $id = $a['id'];
						$periode=$a['periode'];
						$kasus=$a['kasus'];
						$pekerja=$a['pekerja'];
						$temp[]=number_format($no,0,",",".");
						$temp[]=$periode;
						$temp[]=number_format($kasus,0,",",".");
						$temp[]=number_format($pekerja,0,",",".");
						$temp[]=number_format($pekerja+$kasus,0,",",".");
						$temp[]="<a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a> | 
                                 <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
						$tabel[]=$temp;
					}
	echo json_encode(array('data' => $tabel));
	}

   	public function proses_input_jumlahphk(){
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$kasus = $this->input->post('kasus');
		$pekerja = $this->input->post('pekerja');
   		$this->m_jumlahphk->simpan_barang($penginput,$periode,$kasus,$pekerja);
		redirect('Jumlahphk');   	
	}
		
	public function proses_edit_jumlahphk(){
		$id=$this->input->post('id');
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$kasus = $this->input->post('kasus');
		$pekerja = $this->input->post('pekerja');
		$this->m_jumlahphk->update_jumlahphk($id,$penginput,$periode,$kasus,$pekerja);
		redirect('Jumlahphk'); 	
	}	
	
	public function proses_delete_jumlahphk(){
		$id=$this->input->post('id');
		$this->m_jumlahphk->delete_jumlahphk($id);
		redirect('Jumlahphk'); 
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
      $data['data']=$this->m_jumlahphk->grafik_perbandingan_jumlahphk($tahun2, $tahun1);
      $this->load->view('template/header');
	  if($datap=="all"){
	  if($grafikp=="bar"){
      $this->load->view('tenagakerja/grafik_perbandingan_jumlahphk_bar_all', $data);
      $this->load->view('template/footer');
	  }else if($grafikp=="line"){
      $this->load->view('tenagakerja/grafik_perbandingan_jumlahphk_line_all', $data);
      $this->load->view('template/footer');
	  }
	  }else{
	  if($grafikp=="bar"){
      $this->load->view('tenagakerja/grafik_perbandingan_jumlahphk_bar', $data);
      $this->load->view('template/footer');
	  }else if($grafikp=="line"){
      $this->load->view('tenagakerja/grafik_perbandingan_jumlahphk_line', $data);
      $this->load->view('template/footer');
	  }
	  }
    }
}
