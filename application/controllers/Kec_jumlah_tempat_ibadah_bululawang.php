<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kec_jumlah_tempat_ibadah_bululawang extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('M_jumlah_tempat_ibadah');
    }

    public function index() {
		$periode=date('y');
		$tahun = '0000';
		$kecamatan='10';
    	$data['data']=$this->M_jumlah_tempat_ibadah->tampil_jumlah_tempat_ibadah($tahun,$kecamatan);
		$data['datax']=$this->M_jumlah_tempat_ibadah->tampil_tahun($kecamatan);
		$data['dataxs']=$this->M_jumlah_tempat_ibadah->tampil_agama();
		$data['datakec']=$kecamatan;
        $this->load->view('template/header');
        $this->load->view('kecamatan/kec_jumlah_tempat_ibadah', $data);
		$this->load->view('template/footer');
    }
	
	public function get() {
		$thn = $this->input->get('tahun');
		$tahun=intval($thn);
		$kecamatan='10';
		$data['data']=$this->M_jumlah_tempat_ibadah->tampil_jumlah_tempat_ibadah($tahun,$kecamatan);
        $no=0;
		$total=0;
		$tabel=array();
                    foreach ($data['data']->result_array() as $a) {
					$temp = array();
                        $no++;
                        $id = $a['id'];
						$periode=$a['periode'];
						$value=$a['jumlah'];
						$temp[]=$no;
						$temp[]=number_format($value,0,",",".");
						$temp[]=$periode;
						$temp[]="
						<a class=\"btn btn-xs btn-success\" href=\"Kec_jumlah_tempat_ibadah_bululawang/detail_jumlah_tempat_ibadah/$periode\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>";
						$tabel[]=$temp;
					}
					echo json_encode(array('data' => $tabel));
	}
	
	public function detail_jumlah_tempat_ibadah() {
		$periode = $this->uri->segment(3); 
		$kecamatan=10;
		$data['datakec']=$kecamatan;
		$data['data']=$this->M_jumlah_tempat_ibadah->tampil_jumlah_tempat_ibadahx($periode,$kecamatan);
		$data['datax']=$this->M_jumlah_tempat_ibadah->tampil_tahun($kecamatan);
		$data['dataxs']=$this->M_jumlah_tempat_ibadah->tampil_agama();
    	$this->load->view('template/header');
        $this->load->view('kecamatan/detail_kec_jumlah_tempat_ibadah', $data);
        $this->load->view('template/footer');		
    }
	
	public function grafik_jumlah_tempat_ibadah() {
	  $periode = $this->uri->segment(3); 
	  $kecamatan=10;
	  $data['datakec']=$kecamatan;
      $data['data']=$this->M_jumlah_tempat_ibadah->tampil_jumlah_tempat_ibadahx($periode,$kecamatan);
      $this->load->view('template/header');
      $this->load->view('kecamatan/grafik_jumlah_tempat_ibadah', $data);
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
      $data['data']=$this->M_jumlah_tempat_ibadah->grafik_perbandingan_jumlah_tempat_ibadahx($tahun2, $tahun1, $kecamatan);
      $data['datax']=$this->M_jumlah_tempat_ibadah->tahun_crosstab($kecamatan);
      $data['tahun']=$this->M_jumlah_tempat_ibadah->tampil_periodec($tahun1,$tahun2,$kecamatan);
      $data['jumlah']=$this->M_jumlah_tempat_ibadah->tampil_jumlahc($tahun1,$tahun2,$kecamatan);
      $data['jumlah1']=$this->M_jumlah_tempat_ibadah->tampil_jumlahxc($tahun1,$tahun2,$kecamatan);
      $data['keterangan']=$this->M_jumlah_tempat_ibadah->tampil_keteranganc();
      $this->load->view('template/header');
      if($datap=="jumlah"){
      if($grafikp=="bar"){
        $this->load->view('kecamatan/grafik_perbandingan_jumlah_tempat_ibadah_bar', $data);
        $this->load->view('template/footer');
        }else if($grafikp=="line"){
        $this->load->view('kecamatan/grafik_perbandingan_jumlah_tempat_ibadah_line', $data);
        $this->load->view('template/footer');
      }
		}else{
		if($grafikp=="bar"){
		$this->load->view('kecamatan/grafik_perbandingan_jumlah_tempat_ibadah_bar_all', $data);
		$this->load->view('template/footer');
		}else if($grafikp=="line"){
		$this->load->view('kecamatan/grafik_perbandingan_jumlah_tempat_ibadah_line_all', $data);
		$this->load->view('template/footer');
		}
    }
	}

    public function tampil_crosstab_jumlah_tempat_ibadah(){
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
	  $kecamatan=$this->input->post('kecamatan');
	  $data['datakec']=$kecamatan;
       if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['data']=$this->M_jumlah_tempat_ibadah->tahun_crosstab($kecamatan);
      $data['tahun']=$this->M_jumlah_tempat_ibadah->tampil_periodec($tahun1,$tahun2,$kecamatan);
      $data['jumlah']=$this->M_jumlah_tempat_ibadah->tampil_jumlahc($tahun1,$tahun2,$kecamatan);
      $data['jumlah1']=$this->M_jumlah_tempat_ibadah->tampil_jumlahxc($tahun1,$tahun2,$kecamatan);
      $data['keterangan']=$this->M_jumlah_tempat_ibadah->tampil_keteranganc();
        $this->load->view('template/header');
        $this->load->view('kecamatan/tampil_crosstab_jumlah_tempat_ibadah', $data);
        $this->load->view('template/footer');
    }

   	public function proses_input_jumlah_tempat_ibadah(){
		$alamat="bululawang";
		$penginput=$this->input->post('penginput');
		$periode=$this->input->post('periode');
		$kecamatan=$this->input->post('kecamatan');
		$value = $this->input->post('agama');
		$value1 = $this->input->post('jumlah');
   		$this->M_jumlah_tempat_ibadah->simpan_barang($penginput,$periode,$kecamatan,$value,$value1,$alamat);
		redirect('Kec_jumlah_tempat_ibadah_bululawang');   	
	}
	
	public function proses_input_detail_jumlah_tempat_ibadah(){
		$page = $this->uri->segment(3);
		$alamat="bululawang";
		$penginput=$this->input->post('penginput');
		$periode=$this->input->post('periode');
		$kecamatan=$this->input->post('kecamatan');
		$value = $this->input->post('agama');
		$value1 = $this->input->post('jumlah');
   		$this->M_jumlah_tempat_ibadah->simpan_barang($penginput,$periode,$kecamatan,$value,$value1,$alamat);
		redirect('Kec_jumlah_tempat_ibadah_bululawang/detail_jumlah_tempat_ibadah/'.$page);   
	}
	
	public function proses_edit_jumlah_tempat_ibadah(){
		$page = $this->uri->segment(3);
		$alamat="bululawang";
		$id=$this->input->post('id');
		$penginput=$this->input->post('penginput');
		$periode=$this->input->post('periode');
		$kecamatan=$this->input->post('kecamatan');
		$value = $this->input->post('agama');
		$value1 = $this->input->post('jumlah');
   		$this->M_jumlah_tempat_ibadah->update_jumlah_tempat_ibadah($id,$penginput,$periode,$kecamatan,$value,$value1);
		redirect('Kec_jumlah_tempat_ibadah_bululawang/detail_jumlah_tempat_ibadah/'.$page);	
	}
	
	public function proses_delete_jumlah_tempat_ibadah(){
		$id=$this->input->post('id');	
		$this->M_jumlah_tempat_ibadah->delete_jumlah_tempat_ibadah($id);
		redirect('Kec_jumlah_tempat_ibadah_bululawang');	
	}	

	

}
