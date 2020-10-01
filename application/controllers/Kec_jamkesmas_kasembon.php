<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kec_jamkesmas_kasembon extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_jamkesmas');
    }

    public function index() {
		$tahun ='0000';
		$kecamatan='19';
    	$data['data']=$this->m_jamkesmas->tampil_jaminan_kesehatan($tahun,$kecamatan);
		$data['datax']=$this->m_jamkesmas->tampil_tahun($kecamatan);
		$data['dataxs']=$this->m_jamkesmas->tampil_desa($kecamatan);
		$data['datakec']=$kecamatan;
        $this->load->view('template/header');
        $this->load->view('kecamatan/kec_jaminan_kesehatan', $data);
		$this->load->view('template/footer');
    }
	
	public function get() {
		$thn = $this->input->get('tahun');
		$tahun=intval($thn);
		$kecamatan=19;
		$data['data']=$this->m_jamkesmas->tampil_jaminan_kesehatan($tahun,$kecamatan);
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
						$temp[]="<a class=\"btn btn-xs btn-success\" href=\"Kec_jamkesmas_kasembon/detailkec_jaminan_kesehatan/$periode\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>";
						$tabel[]=$temp;
					}
					echo json_encode(array('data' => $tabel));
	}
	public function detailkec_jaminan_kesehatan() {
		$tahun = $this->uri->segment(3); 
		$kecamatan=19;
    	$data['data']=$this->m_jamkesmas->tampil_detailkec_jaminan_kesehatan($tahun,$kecamatan);
		$data['datax']=$this->m_jamkesmas->tampil_tahun($kecamatan);
		$data['dataxs']=$this->m_jamkesmas->tampil_desa($kecamatan);
		$data['datakec']=$kecamatan;
        $this->load->view('template/header');
        $this->load->view('kecamatan/detail_kec_jaminan_kesehatan', $data);
		$this->load->view('template/footer');
    }
	
	public function grafikkec_jamkesmas() {
	  $id = $this->uri->segment(3);
	  $kecamatan=19;
	  $data['datakec']=$kecamatan;
      $data['data']=$this->m_jamkesmas->tampil_grafik($id,$kecamatan);
      $this->load->view('template/header');
      $this->load->view('kecamatan/grafik_kec_jamkesmas', $data);
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
      $data['data']=$this->m_jamkesmas->grafik_perbandingan_kec_jamkesmasx($tahun2, $tahun1, $kecamatan);
      $data['dataz']=$this->m_jamkesmas->tahun_crosstab($kecamatan);
      $data['tahun']=$this->m_jamkesmas->tampil_periodec($tahun1,$tahun2,$kecamatan);
      $data['jumlah']=$this->m_jamkesmas->tampil_jumlahc($tahun1,$tahun2,$kecamatan);
      $data['jumlah1']=$this->m_jamkesmas->tampil_jumlahxc($tahun1,$tahun2,$kecamatan);
      $data['keterangan']=$this->m_jamkesmas->tampil_keteranganc($kecamatan);
      $this->load->view('template/header');
	  if($datap=="jumlah"){
		if($grafikp=="bar"){
		$this->load->view('kecamatan/grafik_kec_jamkesmas_bar_jumlah', $data);
		$this->load->view('template/footer');
		}else if($grafikp=="line"){
		$this->load->view('kecamatan/grafik_kec_jamkesmas_line_jumlah', $data);
		$this->load->view('template/footer');
		}
		}else{
		if($grafikp=="bar"){
		$this->load->view('kecamatan/grafik_kec_jamkesmas_bar_all', $data);
		$this->load->view('template/footer');
		}else if($grafikp=="line"){
		$this->load->view('kecamatan/grafik_kec_jamkesmas_line_all', $data);
		$this->load->view('template/footer');
		}	
		}
	}
	
	public function tampil_crosstab_kec_jamkesmas(){
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
	  $kecamatan=$this->input->post('kecamatan');
	  $data['datakec']=$kecamatan;
       if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['data']=$this->m_jamkesmas->tahun_crosstab($kecamatan);
      $data['tahun']=$this->m_jamkesmas->tampil_periodec($tahun1,$tahun2,$kecamatan);
      $data['jumlah']=$this->m_jamkesmas->tampil_jumlahc($tahun1,$tahun2,$kecamatan);
      $data['jumlah1']=$this->m_jamkesmas->tampil_jumlahxc($tahun1,$tahun2,$kecamatan);
      $data['keterangan']=$this->m_jamkesmas->tampil_keteranganc($kecamatan);
        $this->load->view('template/header');
        $this->load->view('kecamatan/tampil_crosstab_kec_jamkesmas', $data);
        $this->load->view('template/footer');
    }
	
   	public function proses_input_kec_jamkesmas(){
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$ket = $this->input->post('desa');
		$unit = $this->input->post('unit');
		$kecamatan = $this->input->post('kecamatan');
		$status= $this->input->post('status');
		$alamat="kasembon";
   		$this->m_jamkesmas->simpan_barang($penginput,$kecamatan,$periode,$ket,$unit,$alamat,$status);
		redirect('Kec_jamkesmas_kasembon');   	
	}
	
	public function proses_input_detailkec_jamkesmas(){
		$page = $this->uri->segment(3);
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$ket = $this->input->post('desa');
		$unit = $this->input->post('unit');
		$kecamatan = $this->input->post('kecamatan');
		$status= $this->input->post('status');
		$alamat="kasembon";
   		$this->m_jamkesmas->simpan_barang($penginput,$kecamatan,$periode,$ket,$unit,$alamat,$status);
		redirect('Kec_jamkesmas_kasembon/detailkec_jaminan_kesehatan/'.$page);   	
	}	
	
	public function proses_edit_detailkec_jamkesmas(){
		$page = $this->uri->segment(3); 
		$id=$this->input->post('id');
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$ket = $this->input->post('desa');
		$unit = $this->input->post('unit');
		$kecamatan = $this->input->post('kecamatan');
		$status= $this->input->post('status');
   		$this->m_jamkesmas->update_kec_jamkesmas($id,$penginput,$kecamatan,$periode,$ket,$unit,$alamat,$status);
	
		redirect('Kec_jamkesmas_kasembon/detailkec_jaminan_kesehatan/'.$page);	
	}
	
	public function proses_delete_kec_jamkesmas(){
		$id=$this->input->post('id');
		$this->m_jamkesmas->delete_kec_jamkesmas($id);
		redirect('Kec_jamkesmas_kasembon');	
	}	
	
	public function proses_delete_detailkec_jamkesmas(){
		$page = $this->uri->segment(3); 
		$id=$this->input->post('id');
		$this->m_jamkesmas->delete_kec_jamkesmas($id);
		redirect('Kec_jamkesmas_kasembon/detailkec_jaminan_kesehatan/'.$page);	
	}

	

}
