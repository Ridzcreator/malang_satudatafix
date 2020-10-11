<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduanank extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_pengaduanank');
    }

    public function index() {
		$tahun ='0000';
    	$data['data']=$this->m_pengaduanank->tampil_pengaduanank($tahun);
		$data['datax']=$this->m_pengaduanank->tampil_tahun();
		$data['dataxs']=$this->m_pengaduanank->tampil_bulan();
        $this->load->view('template/header');
        $this->load->view('pemberdayaanpdpa/pengaduanank', $data);
		$this->load->view('template/footer');
    }
	
	public function get() {
		$thn = $this->input->get('tahun');
		$tahun=intval($thn);
		$data['data']=$this->m_pengaduanank->tampil_pengaduanank($tahun);
        $no=0;
		$tabel=array();
                    foreach ($data['data']->result_array() as $a) {
					$temp = array();
                        $no++;
                        $id = $a['id'];
						$periode=$a['periode'];
						$bulan=$a['bulan'];
						$jumlahk=$a['jumlah_kasus'];
						$l=$a['l'];
						$p=$a['p'];
						$l06=$a['l06'];
						$p06=$a['p06'];
						$l712=$a['l712'];
						$p712=$a['p712'];
						$l1315=$a['l1315'];
						$p1315=$a['p1315'];
						$l1618=$a['l1618'];
						$p1618=$a['p1618'];
						$temp[]=number_format($no,0,",",".");
						$temp[]=$periode;
						$temp[]=number_format($jumlahk,0,",",".");
						$temp[]=number_format($l,0,",",".");
						$temp[]=number_format($p,0,",",".");
						$temp[]=number_format($l06,0,",",".");
						$temp[]=number_format($p06,0,",",".");
						$temp[]=number_format($l712,0,",",".");
						$temp[]=number_format($p712,0,",",".");
						$temp[]=number_format($l1315,0,",",".");
						$temp[]=number_format($p1315,0,",",".");
						$temp[]=number_format($l1618,0,",",".");
						$temp[]=number_format($p1618,0,",",".");
						$temp[]="<a class=\"btn btn-xs btn-success\" href=\"Pengaduanank/detailpengaduanank/$periode\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>";
						$tabel[]=$temp;
					}
					echo json_encode(array('data' => $tabel));
	}
	public function detailpengaduanank() {
		$tahun = $this->uri->segment(3); 
    	$data['data']=$this->m_pengaduanank->tampil_detailpengaduanank($tahun);
		$data['datax']=$this->m_pengaduanank->tampil_tahun();
		$data['dataxs']=$this->m_pengaduanank->tampil_bulan();
        $this->load->view('template/header');
        $this->load->view('pemberdayaanpdpa/detailpengaduanank', $data);
		$this->load->view('template/footer');
    }
	
	public function grafikpengaduanank() {
	  $id = $this->uri->segment(3); 
      $data['data']=$this->m_pengaduanank->tampil_grafik($id);
      $this->load->view('template/header');
      $this->load->view('pemberdayaanpdpa/grafikpengaduanank', $data);
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
      $data['data']=$this->m_pengaduanank->grafik_perbandingan_pengaduanankx($tahun2, $tahun1);
      $this->load->view('template/header');
	  if($datap=="all"){
	  if($grafikp=="bar"){
      $this->load->view('pemberdayaanpdpa/grafik_perbandingan_pengaduanank_bar_all', $data);
      $this->load->view('template/footer');
	  }else if($grafikp=="line"){
      $this->load->view('pemberdayaanpdpa/grafik_perbandingan_pengaduanank_line_all', $data);
      $this->load->view('template/footer');
	  }
	  }else{
	  if($grafikp=="bar"){
      $this->load->view('pemberdayaanpdpa/grafik_perbandingan_pengaduanank_bar', $data);
      $this->load->view('template/footer');
	  }else if($grafikp=="line"){
      $this->load->view('pemberdayaanpdpa/grafik_perbandingan_pengaduanank_line', $data);
      $this->load->view('template/footer');
	  }
	  }
    }
	
   	public function proses_input_pengaduanank(){
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$bulan = $this->input->post('bulan');
		$usia6l = $this->input->post('usia6l');
		$usia6p = $this->input->post('usia6p');
		$usia12l = $this->input->post('usia12l');
		$usia12p = $this->input->post('usia12p');
		$usia15p = $this->input->post('usia15p');
		$usia15l = $this->input->post('usia15l');
		$usia18l = $this->input->post('usia18l');
		$usia18p = $this->input->post('usia18p');
		$jumlahl=$usia6l+$usia12l+$usia15l+$usia18l;
		$jumlahp=$usia6p+$usia12p+$usia15p+$usia18p;
		$jumlaht=$jumlahl+$jumlahp;
   		$this->m_pengaduanank->simpan_barang($penginput,$periode,$bulan,$usia6l,$usia6p,$usia12l,$usia12p,$usia15p,$usia15l,$usia18l,$usia18p,$jumlahl,$jumlahp,$jumlaht);
		redirect('Pengaduanank');   	
	}
	
	public function proses_input_detailpengaduanank(){
		$page = $this->uri->segment(3);
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$bulan = $this->input->post('bulan');
		$usia6l = $this->input->post('usia6l');
		$usia6p = $this->input->post('usia6p');
		$usia12l = $this->input->post('usia12l');
		$usia12p = $this->input->post('usia12p');
		$usia15p = $this->input->post('usia15p');
		$usia15l = $this->input->post('usia15l');
		$usia18l = $this->input->post('usia18l');
		$usia18p = $this->input->post('usia18p');
		$jumlahl=$usia6l+$usia12l+$usia15l+$usia18l;
		$jumlahp=$usia6p+$usia12p+$usia15p+$usia18p;
		$jumlaht=$jumlahl+$jumlahp;
   		$this->m_pengaduanank->simpan_barang($penginput,$periode,$bulan,$usia6l,$usia6p,$usia12l,$usia12p,$usia15p,$usia15l,$usia18l,$usia18p,$jumlahl,$jumlahp,$jumlaht);
		redirect('Pengaduanank/detailpengaduanank/'.$page);   	
	}	
	
	public function proses_edit_detailpengaduanank(){
		$page = $this->uri->segment(3);
		$id=$this->input->post('id');
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$bulan = $this->input->post('bulan');
		$usia6l = $this->input->post('usia6l');
		$usia6p = $this->input->post('usia6p');
		$usia12l = $this->input->post('usia12l');
		$usia12p = $this->input->post('usia12p');
		$usia15p = $this->input->post('usia15p');
		$usia15l = $this->input->post('usia15l');
		$usia18l = $this->input->post('usia18l');
		$usia18p = $this->input->post('usia18p');
		$jumlahl=$usia6l+$usia12l+$usia15l+$usia18l;
		$jumlahp=$usia6p+$usia12p+$usia15p+$usia18p;
		$jumlaht=$jumlahl+$jumlahp;
   		$this->m_pengaduanank->update_pengaduanank($id,$penginput,$periode,$bulan,$usia6l,$usia6p,$usia12l,$usia12p,$usia15p,$usia15l,$usia18l,$usia18p,$jumlahl,$jumlahp,$jumlaht);
		redirect('Pengaduanank/detailpengaduanank/'.$page);	
	}	
	
	
	public function proses_delete_pengaduanank(){
		$page = $this->uri->segment(3); 
		$id=$this->input->post('id');
		$this->m_pengaduanank->delete_pengaduanank($id);
		redirect('Pengaduanank/detailpengaduanank/'.$page);	
	}

	

}
