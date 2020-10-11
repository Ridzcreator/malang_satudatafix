<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduanper extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_pengaduanper');
    }

    public function index() {
		$tahun ='0000';
    	$data['data']=$this->m_pengaduanper->tampil_pengaduanper($tahun);
		$data['datax']=$this->m_pengaduanper->tampil_tahun();
		$data['dataxs']=$this->m_pengaduanper->tampil_bulan();
        $this->load->view('template/header');
        $this->load->view('pemberdayaanpdpa/pengaduanper', $data);
		$this->load->view('template/footer');
    }
	
	public function get() {
		$thn = $this->input->get('tahun');
		$tahun=intval($thn);
		$data['data']=$this->m_pengaduanper->tampil_pengaduanper($tahun);
        $no=0;
		$tabel=array();
                    foreach ($data['data']->result_array() as $a) {
					$temp = array();
                        $no++;
                        $id = $a['id'];
						$periode=$a['periode'];
						$bulan=$a['bulan'];
						$jumlahk=$a['jumlah_kasus'];
						$muda=$a['19an'];
						$sedang=$a['25an'];
						$tua=$a['45an'];
						$kdrt=$a['kdrt'];
						$psikis=$a['psikis'];
						$seksual=$a['seksual'];
						$eksploitasi=$a['eksploitasi'];
						$penelantaran=$a['penelantaran'];
						$lainnya=$a['lainnya'];
						$temp[]=number_format($no,0,",",".");
						$temp[]=$periode;
						$temp[]=number_format($jumlahk,0,",",".");
						$temp[]=number_format($muda,0,",",".");
						$temp[]=number_format($sedang,0,",",".");
						$temp[]=number_format($tua,0,",",".");
						$temp[]=number_format($kdrt,0,",",".");
						$temp[]=number_format($psikis,0,",",".");
						$temp[]=number_format($seksual,0,",",".");
						$temp[]=number_format($eksploitasi,0,",",".");
						$temp[]=number_format($penelantaran,0,",",".");
						$temp[]=number_format($lainnya,0,",",".");
						$temp[]="<a class=\"btn btn-xs btn-success\" href=\"Pengaduanper/detailpengaduanper/$periode\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>";
						$tabel[]=$temp;
					}
					echo json_encode(array('data' => $tabel));
	}
	public function detailpengaduanper() {
		$tahun = $this->uri->segment(3); 
    	$data['data']=$this->m_pengaduanper->tampil_detailpengaduanper($tahun);
		$data['datax']=$this->m_pengaduanper->tampil_tahun();
		$data['dataxs']=$this->m_pengaduanper->tampil_bulan();
        $this->load->view('template/header');
        $this->load->view('pemberdayaanpdpa/detailpengaduanper', $data);
		$this->load->view('template/footer');
    }
	
	public function grafikpengaduanper() {
	  $id = $this->uri->segment(3); 
      $data['data']=$this->m_pengaduanper->tampil_grafik($id);
      $this->load->view('template/header');
      $this->load->view('pemberdayaanpdpa/grafikpengaduanper', $data);
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
      $data['data']=$this->m_pengaduanper->grafik_perbandingan_pengaduanperx($tahun2, $tahun1);
      $this->load->view('template/header');
	  if($datap=="all"){
	  if($grafikp=="bar"){
      $this->load->view('pemberdayaanpdpa/grafik_perbandingan_pengaduanper_bar_all', $data);
      $this->load->view('template/footer');
	  }else if($grafikp=="line"){
      $this->load->view('pemberdayaanpdpa/grafik_perbandingan_pengaduanper_line_all', $data);
      $this->load->view('template/footer');
	  }}
	  else{
	  if($grafikp=="bar"){
      $this->load->view('pemberdayaanpdpa/grafik_perbandingan_pengaduanper_bar', $data);
      $this->load->view('template/footer');
	  }else if($grafikp=="line"){
      $this->load->view('pemberdayaanpdpa/grafik_perbandingan_pengaduanper_line', $data);
      $this->load->view('template/footer');
	  }}
    }

   	public function proses_input_pengaduanper(){
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$bulan = $this->input->post('bulan');
		$usia19 = $this->input->post('usia19');
		$usia25 = $this->input->post('usia25');
		$usia45 = $this->input->post('usia45');
		$fisik = $this->input->post('fisik');
		$psikis = $this->input->post('psikis');
		$seksual = $this->input->post('seksual');
		$eksploitasi = $this->input->post('eksploitasi');
		$penelantaran = $this->input->post('penelantaran');
		$lainnya = $this->input->post('lainnya');
		$jumlahk=$usia19+$usia25+$usia45;

   		$this->m_pengaduanper->simpan_barang($penginput,$periode,$bulan,$jumlahk,$usia19,$usia25,$usia45,$fisik,$psikis,$seksual,$eksploitasi,$penelantaran,$lainnya);
		redirect('Pengaduanper');   	
	}
	
	public function proses_input_detailpengaduanper(){
		$page = $this->uri->segment(3);
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$bulan = $this->input->post('bulan');
		$usia19 = $this->input->post('usia19');
		$usia25 = $this->input->post('usia25');
		$usia45 = $this->input->post('usia45');
		$fisik = $this->input->post('fisik');
		$psikis = $this->input->post('psikis');
		$seksual = $this->input->post('seksual');
		$eksploitasi = $this->input->post('eksploitasi');
		$penelantaran = $this->input->post('penelantaran');
		$lainnya = $this->input->post('lainnya');
		$jumlahk=$usia19+$usia25+$usia45;

   		$this->m_pengaduanper->simpan_barang($penginput,$periode,$bulan,$jumlahk,$usia19,$usia25,$usia45,$fisik,$psikis,$seksual,$eksploitasi,$penelantaran,$lainnya);
		redirect('Pengaduanper/detailpengaduanper/'.$page);   	
	}	
	
	public function proses_edit_detailpengaduanper(){
		$page = $this->uri->segment(3);
		$id=$this->input->post('id');
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$bulan = $this->input->post('bulan');
		$usia19 = $this->input->post('usia19');
		$usia25 = $this->input->post('usia25');
		$usia45 = $this->input->post('usia45');
		$fisik = $this->input->post('fisik');
		$psikis = $this->input->post('psikis');
		$seksual = $this->input->post('seksual');
		$eksploitasi = $this->input->post('eksploitasi');
		$penelantaran = $this->input->post('penelantaran');
		$lainnya = $this->input->post('lainnya');
		$jumlahk=$usia19+$usia25+$usia45;
		
		$this->m_pengaduanper->update_pengaduanper($id,$penginput,$periode,$bulan,$jumlahk,$usia19,$usia25,$usia45,$fisik,$psikis,$seksual,$eksploitasi,$penelantaran,$lainnya);
		redirect('Pengaduanper/detailpengaduanper/'.$page);	
	}	
	
	
	public function proses_delete_pengaduanper(){
		$page = $this->uri->segment(3); 
		$id=$this->input->post('id');
		$this->m_pengaduanper->delete_pengaduanper($id);
		redirect('Pengaduanper/detailpengaduanper/'.$page);	
	}

	

}
