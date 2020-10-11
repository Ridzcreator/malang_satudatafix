<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kec_luas_wilayah_ampelgading extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('M_luas_wilayah');
    }

    public function index() {
		$periode=date('y');
		$tahun = '0000';
		$kecamatan='20';
    	$data['data']=$this->M_luas_wilayah->tampil_luas_wilayah($tahun,$kecamatan);
		$data['datax']=$this->M_luas_wilayah->tampil_tahun($kecamatan);
		$data['datakec']=$kecamatan;
        $this->load->view('template/header');
        $this->load->view('kecamatan/kec_luas_wilayah', $data);
		$this->load->view('template/footer');
    }
	
	public function get() {
		$thn = $this->input->get('tahun');
		$tahun=intval($thn);
		$kecamatan='20';
		$data['data']=$this->M_luas_wilayah->tampil_luas_wilayah($tahun,$kecamatan);
        $no=0;
		$total=0;
		$tabel=array();
                    foreach ($data['data']->result_array() as $a) {
					$temp = array();
                        $no++;
                        $id = $a['id'];
						$periode=$a['periode'];
						$value=$a['luas_wilayah'];
						$temp[]=$no;
						$temp[]=number_format($value,0,",",".");
						$temp[]=$periode;
						$temp[]="
						<a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a> 
                                 <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a";
						$tabel[]=$temp;
					}
					echo json_encode(array('data' => $tabel));
	}
	
	 public function grafik_perbandingan() {
      $datap = $this->input->post('datap');
      $grafikp = $this->input->post('grafikp');
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
	  $kecamatan=$this->input->post('kecamatan');
	  $data['datakec']=$kecamatan;
      if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
	  $data['datap']=$datap;
      $data['data']=$this->M_luas_wilayah->grafik_perbandingan_luas_wilayahx($tahun2, $tahun1, $kecamatan);
      $this->load->view('template/header');
      if($datap=="luas"){
      if($grafikp=="bar"){
       $this->load->view('kecamatan/grafik_perbandingan_luas_wilayah_bar_all', $data);
        $this->load->view('template/footer');
        }else if($grafikp=="line"){
      $this->load->view('kecamatan/grafik_perbandingan_luas_wilayah_line_all', $data);
        $this->load->view('template/footer');
      }
		}
	}

   	public function proses_input_luas_wilayah(){
		$alamat="ampelgading";
		$penginput=$this->input->post('penginput');
		$periode=$this->input->post('periode');
		$kecamatan=$this->input->post('kecamatan');
		$value = $this->input->post('luas_wilayah');
   		$this->M_luas_wilayah->simpan_barang($penginput,$periode,$kecamatan,$value,$alamat);
		redirect('Kec_luas_wilayah_ampelgading');   	
	}
	
	public function proses_edit_luas_wilayah(){
		$page = $this->uri->segment(3);
		$alamat="ampelgading";
		$id=$this->input->post('id');
		$penginput=$this->input->post('penginput');
		$periode=$this->input->post('periode');
		$kecamatan=$this->input->post('kecamatan');
		$value = $this->input->post('luas_wilayah');
   		$this->M_luas_wilayah->update_luas_wilayah($id,$penginput,$periode,$kecamatan,$value);
		redirect('Kec_luas_wilayah_ampelgading');	
	}
	
	public function proses_delete_luas_wilayah(){
		$id=$this->input->post('id');	
		$this->M_luas_wilayah->delete_luas_wilayah($id);
		redirect('Kec_luas_wilayah_ampelgading');	
	}	

	

}
