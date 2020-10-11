<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Alatangkutd extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_alatangkutd');
    }

    public function index() {
		$tahun ='0000';
    	$data['data']=$this->m_alatangkutd->tampil_alatangkutd($tahun);
		$data['datax']=$this->m_alatangkutd->tampil_tahun();
		$data['dataxs']=$this->m_alatangkutd->tampil_alat();
        $this->load->view('template/header');
        $this->load->view('perumahan/alatangkutd', $data);
		$this->load->view('template/footer');
    }
	
	public function get() {
		$thn = $this->input->get('tahun');
		$tahun=intval($thn);
		$data['data']=$this->m_alatangkutd->tampil_alatangkutd($tahun);
        $no=0;
		$tabel=array();
                    foreach ($data['data']->result_array() as $a) {
					$temp = array();
                        $no++;
                        $id = $a['id'];
						$periode=$a['periode'];
						$jumlah=$a['jumlah'];
						$temp[]=number_format($no,0,",",".");
						$temp[]=$periode;
						$temp[]=number_format($jumlah,0,",",".");
						$temp[]="<a class=\"btn btn-xs btn-success\" href=\"Alatangkutd/detailalatangkutd/$periode\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>";
						$tabel[]=$temp;
					}
					echo json_encode(array('data' => $tabel));
	}
	public function detailalatangkutd() {
		$tahun = $this->uri->segment(3); 
    	$data['data']=$this->m_alatangkutd->tampil_detailalatangkutd($tahun);
		$data['datax']=$this->m_alatangkutd->tampil_tahun();
		$data['dataxs']=$this->m_alatangkutd->tampil_alat();
        $this->load->view('template/header');
        $this->load->view('perumahan/detail_alatangkutd', $data);
		$this->load->view('template/footer');
    }
	
	public function grafikalatangkutd() {
	  $id = $this->uri->segment(3); 
      $data['data']=$this->m_alatangkutd->tampil_grafik($id);
      $this->load->view('template/header');
      $this->load->view('perumahan/grafik_alatangkutd', $data);
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
      $data['data']=$this->m_alatangkutd->grafik_perbandingan_alatangkutdx($tahun2, $tahun1);
	  $data['datax']=$this->m_alatangkutd->tahun_crosstab();
      $data['tahun']=$this->m_alatangkutd->tampil_periodec($tahun1,$tahun2);
      $data['jumlah']=$this->m_alatangkutd->tampil_jumlahc($tahun1,$tahun2);
      $data['jumlah1']=$this->m_alatangkutd->tampil_jumlahxc($tahun1,$tahun2);
      $data['keterangan']=$this->m_alatangkutd->tampil_keteranganc();
      $this->load->view('template/header');
	  if($datap=="jumlah"){
		if($grafikp=="bar"){
		$this->load->view('perumahan/grafik_perbandingan_alatangkutd_bar_jumlah', $data);
		$this->load->view('template/footer');
		}else if($grafikp=="line"){
		$this->load->view('perumahan/grafik_perbandingan_alatangkutd_line_jumlah', $data);
		$this->load->view('template/footer');
		}
		}else{
		if($grafikp=="bar"){
		$this->load->view('perumahan/grafik_perbandingan_alatangkutd_bar_all', $data);
		$this->load->view('template/footer');
		}else if($grafikp=="line"){
		$this->load->view('perumahan/grafik_perbandingan_alatangkutd_line_all', $data);
		$this->load->view('template/footer');
		}	
		}
	}
	
	public function tampil_crosstab_alatangkutd(){
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
       if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['data']=$this->m_alatangkutd->tahun_crosstab();
      $data['tahun']=$this->m_alatangkutd->tampil_periodec($tahun1,$tahun2);
      $data['jumlah']=$this->m_alatangkutd->tampil_jumlahc($tahun1,$tahun2);
      $data['jumlah1']=$this->m_alatangkutd->tampil_jumlahxc($tahun1,$tahun2);
      $data['keterangan']=$this->m_alatangkutd->tampil_keteranganc();
        $this->load->view('template/header');
        $this->load->view('perumahan/tampil_crosstabalatangkutd', $data);
        $this->load->view('template/footer');
    }
	
   	public function proses_input_alatangkutd(){
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$alat = $this->input->post('alat');
		$unit = $this->input->post('unit');
   		$this->m_alatangkutd->simpan_barang($penginput,$periode,$alat,$unit);
		redirect('Alatangkutd');   	
	}
	
	public function proses_input_detailalatangkutd(){
		$page = $this->uri->segment(3);
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$alat = $this->input->post('alat');
		$unit = $this->input->post('unit');
   		$this->m_alatangkutd->simpan_barang($penginput,$periode,$alat,$unit);
		redirect('Alatangkutd/detailalatangkutd/'.$page);   	
	}	
	
	public function proses_edit_detailalatangkutd(){
		$page = $this->uri->segment(3); 
		$id=$this->input->post('id');
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$alat = $this->input->post('alat');
		$unit = $this->input->post('unit');
		$this->m_alatangkutd->update_alatangkutd($id,$penginput,$periode,$alat,$unit);
		redirect('Alatangkutd/detailalatangkutd/'.$page);	
	}
	
	public function proses_delete_alatangkutd(){
		$id=$this->input->post('id');
		$this->m_alatangkutd->delete_alatangkutd($id);
		redirect('Alatangkutd');	
	}	
	
	public function proses_delete_detailalatangkutd(){
		$page = $this->uri->segment(3); 
		$id=$this->input->post('id');
		$this->m_alatangkutd->delete_alatangkutd($id);
		redirect('Alatangkutd/detailalatangkutd/'.$page);	
	}

	

}
