<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gedangan_struktur_pemerintahan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_gedangan_struktur_pemerintahan');
    }

    public function index() {
		$periode=date('y');
		$tahun = '0000';
    	$data['data']=$this->m_gedangan_struktur_pemerintahan->tampil_gedangan_struktur_pemerintahan($tahun);
		$data['datax']=$this->m_gedangan_struktur_pemerintahan->tampil_tahun();
        $this->load->view('template/header');
        $this->load->view('kecamatan/gedangan_struktur_pemerintahan', $data);
		$this->load->view('template/footer');
    }
	
	public function get() {
		$thn = $this->input->get('tahun');
		$tahun=intval($thn);
		$data['data']=$this->m_gedangan_struktur_pemerintahan->tampil_gedangan_struktur_pemerintahan($tahun);
        $no=0;
		$total=0;
		$tabel=array();
                    foreach ($data['data']->result_array() as $a) {
					$temp = array();
                        $no++;
                        $id = $a['id'];
						$penginput=$a['penginput'];
						$periode=$a['periode'];
						$waktu=$a['waktu'];
						$value=$a['desa'];
						$value1=$a['dusun'];
						$value2=$a['rw'];
						$value3=$a['rt'];
						$total=$value+$value1+$value2+$value3;
						$temp[]=number_format($no,0,",",".");
						$temp[]=number_format($value,0,",",".");
						$temp[]=number_format($value1,0,",",".");
						$temp[]=number_format($value2,0,",",".");
						$temp[]=number_format($value3,0,",",".");
						$temp[]=number_format($total,0,",",".");
						$temp[]=$periode;
						$temp[]="<a class=\"btn btn-xs btn-success\" href=\"Gedangan_struktur_pemerintahan/detail_gedangan_struktur_pemerintahan/$id\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>
								 <a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a> 
                                 <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
						$tabel[]=$temp;
					}
					echo json_encode(array('data' => $tabel));
	}
	
	public function detail_gedangan_struktur_pemerintahan() {
		$id = $this->uri->segment(3); 
		$data['data']=$this->m_gedangan_struktur_pemerintahan->tampil_gedangan_struktur_pemerintahanx($id);
    	$this->load->view('template/header');
        $this->load->view('kecamatan/detail_gedangan_struktur_pemerintahan', $data);
        $this->load->view('template/footer');		
    }
	
	public function grafik_gedangan_struktur_pemerintahan() {
	  $id = $this->uri->segment(3); 
      $data['data']=$this->m_gedangan_struktur_pemerintahan->tampil_gedangan_struktur_pemerintahanx($id);
      $this->load->view('template/header');
      $this->load->view('kecamatan/grafik_struktur_pemerintahan', $data);
      $this->load->view('template/footer');
    }
	
	public function grafik_perbandingan() {
	  $datap = $this->input->post('datap');
	  $grafikp = $this->input->post('grafikp');
	  $tahun1 = $this->input->post('tahun1');
	  $tahun2 = $this->input->post('tahun2');
	  $kecamatan = $this->input->post('kecamatan');
	  if($tahun1>$tahun2){
		list($tahun1, $tahun2) = array($tahun2, $tahun1);
	  }
	  $data['datap']=$datap;
      $data['data']=$this->m_gedangan_struktur_pemerintahan->grafik_perbandingan_gedangan_struktur_pemerintahanx($tahun2, $tahun1, $kecamatan);
      $this->load->view('template/header');
	  if($datap=="all"){
	  if($grafikp=="bar"){
      $this->load->view('kecamatan/grafik_perbandingan_struktur_pemerintahan_bar_all', $data);
      $this->load->view('template/footer');
	  }else if($grafikp=="line"){
      $this->load->view('kecamatan/grafik_perbandingan_struktur_pemerintahan_line_all', $data);
      $this->load->view('template/footer');
	  }
	  }else{
	  if($grafikp=="bar"){
      $this->load->view('kecamatan/grafik_perbandingan_struktur_pemerintahan_bar', $data);
      $this->load->view('template/footer');
	  }else if($grafikp=="pie"){
      $this->load->view('kecamatan/grafik_perbandingan_struktur_pemerintahan_pie', $data);
      $this->load->view('template/footer');
	  }else if($grafikp=="line"){
      $this->load->view('kecamatan/grafik_perbandingan_struktur_pemerintahan_line', $data);
      $this->load->view('template/footer');
	  }
	  }
    }

   	public function proses_input_gedangan_struktur_pemerintahan(){
		$penginput=$this->input->post('penginput');
		$periode=$this->input->post('periode');
		$kecamatan=$this->input->post('kecamatan');
		$value = $this->input->post('desa');
		$value1 = $this->input->post('dusun');
		$value2 = $this->input->post('rw');
		$value3 = $this->input->post('rt');
   		$this->m_gedangan_struktur_pemerintahan->simpan_barang($penginput,$periode,$kecamatan,$value,$value1,$value2,$value3);
		redirect('Gedangan_struktur_pemerintahan');   	
	}
	
	public function proses_edit_gedangan_struktur_pemerintahan(){
		$id=$this->input->post('id');
		$penginput=$this->input->post('penginput');
		$kecamatan=$this->input->post('kecamatan');
		$periode=$this->input->post('periode');
		$value = $this->input->post('desa');
		$value1 = $this->input->post('dusun');
		$value2 = $this->input->post('rw');
		$value3 = $this->input->post('rt');
   		$this->m_gedangan_struktur_pemerintahan->update_gedangan_struktur_pemerintahan($id,$penginput,$periode,$kecamatan,$value,$value1,$value2,$value3);
		redirect('Gedangan_struktur_pemerintahan');	
	}
	
	public function proses_delete_gedangan_struktur_pemerintahan(){
		$id=$this->input->post('id');	
		$this->m_gedangan_struktur_pemerintahan->delete_gedangan_struktur_pemerintahan($id);
		redirect('Gedangan_struktur_pemerintahan');	
	}	

	

}
