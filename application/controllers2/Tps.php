<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tps extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_tps');
    }

    public function index() {
		$periode=date('y');
		$tahun = '0000';
    	$data['data']=$this->m_tps->tampil_tps($tahun);
		$data['datax']=$this->m_tps->tampil_tahun();
        $this->load->view('template/header');
        $this->load->view('perumahan/tps', $data);
		$this->load->view('template/footer');
    }
	
	public function get() {
		$thn = $this->input->get('tahun');
		$tahun=intval($thn);
		$data['data']=$this->m_tps->tampil_tps($tahun);
        $no=0;
		$tabel=array();
                    foreach ($data['data']->result_array() as $a) {
					$temp = array();
                        $no++;
                        $id = $a['id'];
						$penginput=$a['penginput'];
						$periode=$a['periode'];
						$waktu=$a['waktu'];
						$tps=$a['TPS'];
						$tpst=$a['TPST'];
						$tpal=$a['TPAlokal'];
						$tpar=$a['TPAregional'];
						$temp[]=number_format($no,0,",",".");
						$temp[]=number_format($tps,0,",",".");
						$temp[]=number_format($tpst,0,",",".");
						$temp[]=number_format($tpal,0,",",".");
						$temp[]=number_format($tpar,0,",",".");
						$temp[]=$periode;
						$temp[]="<a class=\"btn btn-xs btn-success\" href=\"Tps/detail_tps/$id\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>
								 <a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a> 
                                 <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
						$tabel[]=$temp;
					}
					echo json_encode(array('data' => $tabel));
	}
	
	public function detail_tps() {
		$id = $this->uri->segment(3); 
		$data['data']=$this->m_tps->tampil_tpsx($id);
    	$this->load->view('template/header');
        $this->load->view('perumahan/detail_tps', $data);
        $this->load->view('template/footer');		
    }
	
	public function grafik_tps() {
	  $id = $this->uri->segment(3); 
      $data['data']=$this->m_tps->tampil_tpsx($id);
      $this->load->view('template/header');
      $this->load->view('perumahan/grafik_tps', $data);
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
      $data['data']=$this->m_tps->grafik_perbandingan_tpsx($tahun2, $tahun1);
      $this->load->view('template/header');
	  if($datap=="all"){
	  if($grafikp=="bar"){
      $this->load->view('perumahan/grafik_perbandingan_tps_bar_all', $data);
      $this->load->view('template/footer');
	  }else if($grafikp=="line"){
      $this->load->view('perumahan/grafik_perbandingan_tps_line_all', $data);
      $this->load->view('template/footer');
	  }
	  }else{
	  if($grafikp=="bar"){
      $this->load->view('perumahan/grafik_perbandingan_tps_bar', $data);
      $this->load->view('template/footer');
	  }else if($grafikp=="pie"){
      $this->load->view('perumahan/grafik_perbandingan_tps_pie', $data);
      $this->load->view('template/footer');
	  }else if($grafikp=="line"){
      $this->load->view('perumahan/grafik_perbandingan_tps_line', $data);
      $this->load->view('template/footer');
	  }
	  }
    }

   	public function proses_input_tps(){
		$penginput=$this->input->post('penginput');
		$periode=$this->input->post('periode');
   		$tps = $this->input->post('tps');
		$tpst = $this->input->post('tpst');
		$tpal = $this->input->post('tpal');
		$tpar = $this->input->post('tpar');
   		$this->m_tps->simpan_barang($penginput,$periode,$tps,$tpst,$tpal,$tpar);
		redirect('Tps');   	
	}
	
	public function proses_edit_tps(){
		$id=$this->input->post('id');
		$penginput=$this->input->post('penginput');
		$periode=$this->input->post('periode');
   		$tps = $this->input->post('tps');
		$tpst = $this->input->post('tpst');
		$tpal = $this->input->post('tpal');
		$tpar = $this->input->post('tpar');
   		$this->m_tps->update_tps($id,$penginput,$periode,$tps,$tpst,$tpal,$tpar);
		redirect('Tps');	
	}
	
	public function proses_delete_tps(){
		$id=$this->input->post('id');	
		$this->m_tps->delete_tps($id);
		redirect('Tps');	
	}	

	

}
