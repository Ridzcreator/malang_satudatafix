<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kec_jumlah_aset_dihapus_bantur extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('M_jumlah_aset_dihapus');
    }

    public function index() {
		$periode=date('y');
		$tahun = '0000';
		$kecamatan='29';
    	$data['data']=$this->M_jumlah_aset_dihapus->tampil_jumlah_aset($tahun,$kecamatan);
		$data['datax']=$this->M_jumlah_aset_dihapus->tampil_tahun($kecamatan);
		$data['dataxs']=$this->M_jumlah_aset_dihapus->tampil_aset();
		$data['datakec']=$kecamatan;
        $this->load->view('template/header');
        $this->load->view('kecamatan/kec_jumlah_aset_dihapus', $data);
		$this->load->view('template/footer');
    }
	
	public function get() {
		$thn = $this->input->get('tahun');
		$tahun=intval($thn);
		$kecamatan='29';
		$data['data']=$this->M_jumlah_aset_dihapus->tampil_jumlah_aset($tahun,$kecamatan);
        $no=0;
		$total=0;
		$tabel=array();
                    foreach ($data['data']->result_array() as $a) {
					$temp = array();
                        $no++;
                        $id = $a['id'];
						$periode=$a['periode'];
						$value=$a['jumlah'];
						$value1=$a['nominal'];
						$temp[]=$no;
						$temp[]=number_format($value,0,",",".");
						$temp[]=number_format($value1,0,",",".");
						$temp[]=$periode;
						$temp[]="
						<a class=\"btn btn-xs btn-success\" href=\"Kec_jumlah_aset_dihapus_bantur/detail_jumlah_aset_dihapus/$periode\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>";
						$tabel[]=$temp;
					}
					echo json_encode(array('data' => $tabel));
	}
	
	public function detail_jumlah_aset_dihapus() {
		$periode = $this->uri->segment(3); 
		$kecamatan=29;
		$data['datakec']=$kecamatan;
		$data['data']=$this->M_jumlah_aset_dihapus->tampil_jumlah_asetx($periode,$kecamatan);
		$data['datax']=$this->M_jumlah_aset_dihapus->tampil_tahun($kecamatan);
		$data['dataxs']=$this->M_jumlah_aset_dihapus->tampil_aset();
    	$this->load->view('template/header');
        $this->load->view('kecamatan/detail_kec_jumlah_aset_dihapus', $data);
        $this->load->view('template/footer');		
    }
	
	public function grafik_jumlah_aset_dihapus() {
	  $periode = $this->uri->segment(3); 
	  $kecamatan=29;
	  $data['datakec']=$kecamatan;
      $data['data']=$this->M_jumlah_aset_dihapus->tampil_jumlah_asetx($periode,$kecamatan);
      $this->load->view('template/header');
      $this->load->view('kecamatan/grafik_jumlah_aset_dihapus', $data);
      $this->load->view('template/footer');
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
      $data['data']=$this->M_jumlah_aset_dihapus->grafik_perbandingan_jumlah_asetx($tahun2, $tahun1, $kecamatan);
      $this->load->view('template/header');
      if($datap=="jumlah"){
      if($grafikp=="bar"){
        $this->load->view('kecamatan/grafik_perbandingan_jumlah_aset_dihapus_bar', $data);
        $this->load->view('template/footer');
        }else if($grafikp=="line"){
        $this->load->view('kecamatan/grafik_perbandingan_jumlah_aset_dihapus_line', $data);
        $this->load->view('template/footer');
      }
		}else{
		if($grafikp=="bar"){
		$this->load->view('kecamatan/grafik_perbandingan_jumlah_aset_dihapus_bar_all', $data);
		$this->load->view('template/footer');
		}else if($grafikp=="line"){
		$this->load->view('kecamatan/grafik_perbandingan_jumlah_aset_dihapus_line_all', $data);
		$this->load->view('template/footer');
		}
    }
	}

   	public function proses_input_jumlah_aset_dihapus(){
		$alamat="bantur";
		$penginput=$this->input->post('penginput');
		$periode=$this->input->post('periode');
		$kecamatan=$this->input->post('kecamatan');
		$value = $this->input->post('aset');
		$value1 = $this->input->post('jumlah');
		$value2 = $this->input->post('nominal');
   		$this->M_jumlah_aset_dihapus->simpan_barang($penginput,$periode,$kecamatan,$value,$value1,$value2,$alamat);
		redirect('Kec_jumlah_aset_dihapus_bantur');   	
	}
	
	public function proses_input_detail_jumlah_aset_dihapus(){
		$page = $this->uri->segment(3);
		$alamat="bantur";
		$penginput=$this->input->post('penginput');
		$periode=$this->input->post('periode');
		$kecamatan=$this->input->post('kecamatan');
		$value = $this->input->post('aset');
		$value1 = $this->input->post('jumlah');
		$value2 = $this->input->post('nominal');
   		$this->M_jumlah_aset_dihapus->simpan_barang($penginput,$periode,$kecamatan,$value,$value1,$value2,$alamat);
		redirect('Kec_jumlah_aset_dihapus_bantur/detail_jumlah_aset_dihapus/'.$page);   
	}
	
	public function proses_edit_jumlah_aset_dihapus(){
		$page = $this->uri->segment(3);
		$id=$this->input->post('id');
		$alamat="bantur";
		$penginput=$this->input->post('penginput');
		$periode=$this->input->post('periode');
		$kecamatan=$this->input->post('kecamatan');
		$value = $this->input->post('aset');
		$value1 = $this->input->post('jumlah');
		$value2 = $this->input->post('nominal');
   		$this->M_jumlah_aset_dihapus->update_jumlah_aset($id,$penginput,$periode,$kecamatan,$value,$value1,$value2,$alamat);
		redirect('Kec_jumlah_aset_dihapus_bantur/detail_jumlah_aset_dihapus/'.$page);	
	}
	
	public function proses_delete_jumlah_aset_dihapus(){
		$page = $this->uri->segment(3);
		$id=$this->input->post('id');	
		$this->M_jumlah_aset_dihapus->delete_jumlah_aset($id);
		redirect('Kec_jumlah_aset_dihapus_bantur');
	}	

	

}
