<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kec_jumlah_aset_ngajum extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('M_jumlah_aset');
    }

    public function index() {
		$periode=date('y');
		$tahun = '0000';
		$kecamatan='24';
    	$data['data']=$this->M_jumlah_aset->tampil_jumlah_aset($tahun,$kecamatan);
		$data['datax']=$this->M_jumlah_aset->tampil_tahun($kecamatan);
		$data['dataxs']=$this->M_jumlah_aset->tampil_aset();
		$data['datakec']=$kecamatan;
        $this->load->view('template/header');
        $this->load->view('kecamatan/kec_jumlah_aset', $data);
		$this->load->view('template/footer');
    }
	
	public function get() {
		$thn = $this->input->get('tahun');
		$tahun=intval($thn);
		$kecamatan='24';
		$data['data']=$this->M_jumlah_aset->tampil_jumlah_aset($tahun,$kecamatan);
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
						<a class=\"btn btn-xs btn-success\" href=\"Kec_jumlah_aset_ngajum/detail_jumlah_aset/$periode\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>";
						$tabel[]=$temp;
					}
					echo json_encode(array('data' => $tabel));
	}
	
	public function detail_jumlah_aset() {
		$periode = $this->uri->segment(3); 
		$kecamatan=24;
		$data['datakec']=$kecamatan;
		$data['data']=$this->M_jumlah_aset->tampil_jumlah_asetx($periode,$kecamatan);
		$data['datax']=$this->M_jumlah_aset->tampil_tahun($kecamatan);
		$data['dataxs']=$this->M_jumlah_aset->tampil_aset();
    	$this->load->view('template/header');
        $this->load->view('kecamatan/detail_kec_jumlah_aset', $data);
        $this->load->view('template/footer');		
    }
	
	public function grafik_jumlah_aset() {
	  $periode = $this->uri->segment(3); 
	  $kecamatan=24;
	  $data['datakec']=$kecamatan;
      $data['data']=$this->M_jumlah_aset->tampil_jumlah_asetx($periode,$kecamatan);
      $this->load->view('template/header');
      $this->load->view('kecamatan/grafik_jumlah_aset', $data);
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
      $data['data']=$this->M_jumlah_aset->grafik_perbandingan_jumlah_asetx($tahun2, $tahun1, $kecamatan);
      $this->load->view('template/header');
      if($datap=="jumlah"){
      if($grafikp=="bar"){
        $this->load->view('kecamatan/grafik_perbandingan_jumlah_aset_bar', $data);
        $this->load->view('template/footer');
        }else if($grafikp=="line"){
        $this->load->view('kecamatan/grafik_perbandingan_jumlah_aset_line', $data);
        $this->load->view('template/footer');
      }
		}else{
		if($grafikp=="bar"){
		$this->load->view('kecamatan/grafik_perbandingan_jumlah_aset_bar_all', $data);
		$this->load->view('template/footer');
		}else if($grafikp=="line"){
		$this->load->view('kecamatan/grafik_perbandingan_jumlah_aset_line_all', $data);
		$this->load->view('template/footer');
		}
    }
	}

    public function tampil_crosstab_jumlah_aset(){
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
	  $kecamatan=$this->input->post('kecamatan');
	  $data['datakec']=$kecamatan;
       if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['data']=$this->M_jumlah_aset->tahun_crosstab($kecamatan);
      $data['tahun']=$this->M_jumlah_aset->tampil_periodec($tahun1,$tahun2,$kecamatan);
      $data['jumlah']=$this->M_jumlah_aset->tampil_jumlahc($tahun1,$tahun2,$kecamatan);
      $data['jumlah1']=$this->M_jumlah_aset->tampil_jumlahxc($tahun1,$tahun2,$kecamatan);
      $data['keterangan']=$this->M_jumlah_aset->tampil_keteranganc();
        $this->load->view('template/header');
        $this->load->view('kecamatan/tampil_crosstab_jumlah_aset', $data);
        $this->load->view('template/footer');
    }

   	public function proses_input_jumlah_aset(){
		$alamat="ngajum";
		$penginput=$this->input->post('penginput');
		$periode=$this->input->post('periode');
		$kecamatan=$this->input->post('kecamatan');
		$value = $this->input->post('aset');
		$value1 = $this->input->post('jumlah');
		$value2 = $this->input->post('nominal');
   		$this->M_jumlah_aset->simpan_barang($penginput,$periode,$kecamatan,$value,$value1,$value2,$alamat);
		redirect('Kec_jumlah_aset_ngajum');   	
	}
	
	public function proses_input_detail_jumlah_aset(){
		$page = $this->uri->segment(3);
		$alamat="ngajum";
		$penginput=$this->input->post('penginput');
		$periode=$this->input->post('periode');
		$kecamatan=$this->input->post('kecamatan');
		$value = $this->input->post('aset');
		$value1 = $this->input->post('jumlah');
		$value2 = $this->input->post('nominal');
   		$this->M_jumlah_aset->simpan_barang($penginput,$periode,$kecamatan,$value,$value1,$value2,$alamat);
		redirect('Kec_jumlah_aset_ngajum/detail_jumlah_aset/'.$page);   
	}
	
	public function proses_edit_jumlah_aset(){
		$page = $this->uri->segment(3);
		$id=$this->input->post('id');
		$alamat="ngajum";
		$penginput=$this->input->post('penginput');
		$periode=$this->input->post('periode');
		$kecamatan=$this->input->post('kecamatan');
		$value = $this->input->post('aset');
		$value1 = $this->input->post('jumlah');
		$value2 = $this->input->post('nominal');
   		$this->M_jumlah_aset->update_jumlah_aset($id,$penginput,$periode,$kecamatan,$value,$value1,$value2,$alamat);
		redirect('Kec_jumlah_aset_ngajum/detail_jumlah_aset/'.$page);	
	}
	
	public function proses_delete_jumlah_aset(){
		$page = $this->uri->segment(3);
		$id=$this->input->post('id');	
		$this->M_jumlah_aset->delete_jumlah_aset($id);
		redirect('Kec_jumlah_aset_ngajum');
	}	

	

}
