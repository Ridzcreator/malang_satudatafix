<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pencariantapend extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_pencariantapend');
    }

    public function index() {
		$tahun ='0000';
    	$data['data']=$this->m_pencariantapend->tampil_pencariantapend($tahun);
		$data['datax']=$this->m_pencariantapend->tampil_tahun();
		$data['dataxs']=$this->m_pencariantapend->tampil_pendidikan();
        $this->load->view('template/header');
        $this->load->view('tenagakerja/pencarian_kerja_tamat_pendidikan', $data);
		$this->load->view('template/footer');
    }
	
	public function get() {
		$thn = $this->input->get('tahun');
		$tahun=intval($thn);
		$data['data']=$this->m_pencariantapend->tampil_pencariantapend($tahun);
        $no=0;
		$tabel=array();
			$persentase=0;
			$persentase1=0;
                    foreach ($data['data']->result_array() as $a) {
					$temp = array();
                        $no++;
                        $id = $a['id'];
						$periode=$a['periode'];
						$l=$a['l'];
						$p=$a['p'];
						$jumlah=$a['jumlah'];
						$temp[]=number_format($no,0,",",".");
						$temp[]=$periode;
						$temp[]=number_format($l,0,",",".");
						$temp[]=number_format($p,0,",",".");
						$temp[]=number_format($jumlah,0,",",".");
						$temp[]="<a class=\"btn btn-xs btn-success\" href=\"Pencariantapend/detailpencariantapend/$periode\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>";
						$tabel[]=$temp;
					}
					echo json_encode(array('data' => $tabel));
	}
	public function detailpencariantapend() {
		$tahun = $this->uri->segment(3); 
    	$data['data']=$this->m_pencariantapend->tampil_detailpencariantapend($tahun);
		$data['datax']=$this->m_pencariantapend->tampil_tahun();
		$data['dataxs']=$this->m_pencariantapend->tampil_pendidikan();
        $this->load->view('template/header');
        $this->load->view('tenagakerja/detail_pencarian_kerja_tamat_pendidikan', $data);
		$this->load->view('template/footer');
    }
	
	public function grafikpencariantapend() {
	  $id = $this->uri->segment(3); 
      $data['data']=$this->m_pencariantapend->tampil_grafik($id);
      $this->load->view('template/header');
      $this->load->view('tenagakerja/grafikpencariantapend', $data);
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
      $data['data']=$this->m_pencariantapend->grafik_perbandingan_pencariantapendx($tahun2, $tahun1);
      $this->load->view('template/header');
	  if($datap=="all"){
		if($grafikp=="bar"){
		$this->load->view('tenagakerja/grafik_perbandingan_pencarian_kerja_tamat_pendidikan_bar_all', $data);
		$this->load->view('template/footer');
		}else if($grafikp=="line"){
		$this->load->view('tenagakerja/grafik_perbandingan_pencarian_kerja_tamat_pendidikan_line_all', $data);
		$this->load->view('template/footer');
		}
	  }else{
	  if($grafikp=="bar"){
		$this->load->view('tenagakerja/grafik_perbandingan_pencarian_kerja_tamat_pendidikan_bar', $data);
		$this->load->view('template/footer');
		}else if($grafikp=="line"){
		$this->load->view('tenagakerja/grafik_perbandingan_pencarian_kerja_tamat_pendidikan_line', $data);
		$this->load->view('template/footer');
	  }
	  }
	  
	}
	
   	public function proses_input_pencariantapend(){
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$pendidikan = $this->input->post('pendidikan');
		$jl = $this->input->post('jl');
		$jp = $this->input->post('jp');
		$jumlah = $jl + $jp;
   		$this->m_pencariantapend->simpan_barang($penginput,$periode,$pendidikan,$jl,$jp,$jumlah);
		redirect('Pencariantapend');   	
	}
	
	public function proses_input_detailpencariantapend(){
		$page = $this->uri->segment(3);
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$pendidikan = $this->input->post('pendidikan');
		$jl = $this->input->post('jl');
		$jp = $this->input->post('jp');
		$jumlah = $jl + $jp;
   		$this->m_pencariantapend->simpan_barang($penginput,$periode,$pendidikan,$jl,$jp,$jumlah);
		redirect('pencariantapend/detailpencariantapend/'.$page);   	
	}	
	
	public function proses_edit_detailpencariantapend(){
		$page = $this->uri->segment(3); 
		$id=$this->input->post('id');
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$pendidikan = $this->input->post('pendidikan');
		$jl = $this->input->post('jl');
		$jp = $this->input->post('jp');
		$jumlah = $jl + $jp;
		$this->m_pencariantapend->update_pencariantapend($id,$penginput,$periode,$pendidikan,$jl,$jp,$jumlah);
		redirect('pencariantapend/detailpencariantapend/'.$page);	
	}
	
	public function proses_delete_pencariantapend(){
		$id=$this->input->post('id');
		$this->m_pencariantapend->delete_pencariantapend($id);
		redirect('pencariantapend');	
	}	
	
	public function proses_delete_detailpencariantapend(){
		$page = $this->uri->segment(3); 
		$id=$this->input->post('id');
		$this->m_pencariantapend->delete_pencariantapend($id);
		redirect('pencariantapend/detailpencariantapend/'.$page);	
	}

	

}
