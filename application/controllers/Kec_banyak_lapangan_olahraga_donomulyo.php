<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kec_banyak_lapangan_olahraga_donomulyo extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_banyak_lapangan_olahraga');
    }

    public function index() {
		$tahun ='0000';
		$kecamatan='23';
    	$data['data']=$this->m_banyak_lapangan_olahraga->tampil_kec_banyak_lapangan_olahraga($tahun,$kecamatan);
		$data['datax']=$this->m_banyak_lapangan_olahraga->tampil_tahun($kecamatan);
		$data['dataxs']=$this->m_banyak_lapangan_olahraga->tampil_ket();
		$data['datakec']=$kecamatan;
        $this->load->view('template/header');
        $this->load->view('kecamatan/kec_banyak_lapangan_olahraga', $data);
		$this->load->view('template/footer');
    }
	
	public function get() {
		$thn = $this->input->get('tahun');
		$tahun=intval($thn);
		$kecamatan=23;
		$data['data']=$this->m_banyak_lapangan_olahraga->tampil_kec_banyak_lapangan_olahraga($tahun,$kecamatan);
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
						$temp[]="<a class=\"btn btn-xs btn-success\" href=\"Kec_banyak_lapangan_olahraga_donomulyo/detailkec_banyak_lapangan_olahraga/$periode\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>";
						$tabel[]=$temp;
					}
					echo json_encode(array('data' => $tabel));
	}
	public function detailkec_banyak_lapangan_olahraga() {
		$tahun = $this->uri->segment(3); 
		$kecamatan=23;
    	$data['data']=$this->m_banyak_lapangan_olahraga->tampil_detailkec_banyak_lapangan_olahraga($tahun,$kecamatan);
		$data['datax']=$this->m_banyak_lapangan_olahraga->tampil_tahun($kecamatan);
		$data['dataxs']=$this->m_banyak_lapangan_olahraga->tampil_ket();
		$data['datakec']=$kecamatan;
        $this->load->view('template/header');
        $this->load->view('kecamatan/detail_kec_banyak_lapangan_olahraga', $data);
		$this->load->view('template/footer');
    }
	
	public function grafikkec_banyak_lapangan_olahraga() {
	  $id = $this->uri->segment(3);
	  $kecamatan=23;
	  $data['datakec']=$kecamatan;
      $data['data']=$this->m_banyak_lapangan_olahraga->tampil_grafik($id,$kecamatan);
      $this->load->view('template/header');
      $this->load->view('kecamatan/grafik_kec_banyak_lapangan_olahraga', $data);
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
      $data['data']=$this->m_banyak_lapangan_olahraga->grafik_perbandingan_kec_banyak_lapangan_olahragax($tahun2, $tahun1, $kecamatan);
      $data['datax']=$this->m_banyak_lapangan_olahraga->tahun_crosstab($kecamatan);
      $data['tahun']=$this->m_banyak_lapangan_olahraga->tampil_periodec($tahun1,$tahun2,$kecamatan);
      $data['jumlah']=$this->m_banyak_lapangan_olahraga->tampil_jumlahc($tahun1,$tahun2,$kecamatan);
      $data['jumlah1']=$this->m_banyak_lapangan_olahraga->tampil_jumlahxc($tahun1,$tahun2,$kecamatan);
      $data['keterangan']=$this->m_banyak_lapangan_olahraga->tampil_keteranganc();
      $this->load->view('template/header');
	  if($datap=="jumlah"){
		if($grafikp=="bar"){
		$this->load->view('kecamatan/grafik_kec_banyak_lapangan_olahraga_bar_jumlah', $data);
		$this->load->view('template/footer');
		}else if($grafikp=="line"){
		$this->load->view('kecamatan/grafik_kec_banyak_lapangan_olahraga_line_jumlah', $data);
		$this->load->view('template/footer');
		}
		}else{
		if($grafikp=="bar"){
		$this->load->view('kecamatan/grafik_kec_banyak_lapangan_olahraga_bar_all', $data);
		$this->load->view('template/footer');
		}else if($grafikp=="line"){
		$this->load->view('kecamatan/grafik_kec_banyak_lapangan_olahraga_line_all', $data);
		$this->load->view('template/footer');
		}	
		}
	}
	
	public function tampil_crosstab_kec_banyak_lapangan_olahraga(){
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
	  $kecamatan=$this->input->post('kecamatan');
	  $data['datakec']=$kecamatan;
       if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['data']=$this->m_banyak_lapangan_olahraga->tahun_crosstab($kecamatan);
      $data['tahun']=$this->m_banyak_lapangan_olahraga->tampil_periodec($tahun1,$tahun2,$kecamatan);
      $data['jumlah']=$this->m_banyak_lapangan_olahraga->tampil_jumlahc($tahun1,$tahun2,$kecamatan);
      $data['jumlah1']=$this->m_banyak_lapangan_olahraga->tampil_jumlahxc($tahun1,$tahun2,$kecamatan);
      $data['keterangan']=$this->m_banyak_lapangan_olahraga->tampil_keteranganc();
        $this->load->view('template/header');
        $this->load->view('kecamatan/tampil_crosstab_kec_banyak_lapangan_olahraga', $data);
        $this->load->view('template/footer');
    }
	
   	public function proses_input_kec_banyak_lapangan_olahraga(){
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$ket = $this->input->post('ket');
		$unit = $this->input->post('unit');
		$kecamatan = $this->input->post('kecamatan');
		$alamat="donomulyo";
   		$this->m_banyak_lapangan_olahraga->simpan_barang($penginput,$kecamatan,$periode,$ket,$unit,$alamat);
		redirect('Kec_banyak_lapangan_olahraga_donomulyo');   	
	}
	
	public function proses_input_detailkec_banyak_lapangan_olahraga(){
		$page = $this->uri->segment(3);
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$ket = $this->input->post('ket');
		$unit = $this->input->post('unit');
		$kecamatan = $this->input->post('kecamatan');
		$alamat="donomulyo";
   		$this->m_banyak_lapangan_olahraga->simpan_barang($penginput,$kecamatan,$periode,$ket,$unit,$alamat);
		redirect('Kec_banyak_lapangan_olahraga_donomulyo/detailkec_banyak_lapangan_olahraga/'.$page);   	
	}	
	
	public function proses_edit_detailkec_banyak_lapangan_olahraga(){
		$page = $this->uri->segment(3); 
		$id=$this->input->post('id');
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$ket = $this->input->post('ket');
		$unit = $this->input->post('unit');
		$this->m_banyak_lapangan_olahraga->update_kec_banyak_lapangan_olahraga($id,$penginput,$periode,$ket,$unit);
		redirect('Kec_banyak_lapangan_olahraga_donomulyo/detailkec_banyak_lapangan_olahraga/'.$page);	
	}
	
	public function proses_delete_kec_banyak_lapangan_olahraga(){
		$id=$this->input->post('id');
		$this->m_banyak_lapangan_olahraga->delete_kec_banyak_lapangan_olahraga($id);
		redirect('Kec_banyak_lapangan_olahraga_donomulyo');	
	}	
	
	public function proses_delete_detailkec_banyak_lapangan_olahraga(){
		$page = $this->uri->segment(3); 
		$id=$this->input->post('id');
		$this->m_banyak_lapangan_olahraga->delete_kec_banyak_lapangan_olahraga($id);
		redirect('Kec_banyak_lapangan_olahraga_donomulyo/detailkec_banyak_lapangan_olahraga/'.$page);	
	}

	

}
