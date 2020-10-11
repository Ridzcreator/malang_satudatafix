<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Perempuankk extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_perempuankk');
    }

    public function index() {
		$tahun ='0000';
    	$data['data']=$this->m_perempuankk->tampil_perempuankk($tahun);
		$data['datax']=$this->m_perempuankk->tampil_tahun();
		$data['dataxs']=$this->m_perempuankk->tampil_kecamatan();
        $this->load->view('template/header');
        $this->load->view('pemberdayaanpdpa/perempuankk', $data);
		$this->load->view('template/footer');
    }
	
	public function get() {
		$thn = $this->input->get('tahun');
		$tahun=intval($thn);
		$data['data']=$this->m_perempuankk->tampil_perempuankk($tahun);
        $no=0;
		$tabel=array();
			$persentase=0;
			$persentase1=0;
                    foreach ($data['data']->result_array() as $a) {
					$temp = array();
                        $no++;
                        $id = $a['id'];
						$penginput=$a['penginput'];
						$periode=$a['periode'];
						$kecamatan=$a['kecamatan'];
						$pekka_jumlah=$a['pekka_jumlah'];
						$usiapro_kerja=$a['usiapro_jumlah'];
						$pekka_rentan=$a['pekka_rentan'];
						$persentase=($usiapro_kerja/$pekka_jumlah)*100;
						$persentase1=($pekka_rentan/$pekka_jumlah)*100;
						$temp[]=number_format($no,0,",",".");
						$temp[]=$periode;
						$temp[]=number_format($pekka_jumlah,0,",",".");
						$temp[]=number_format($usiapro_kerja,0,",",".");
						$temp[]=number_format($persentase,2,",",".")." %";
						$temp[]=number_format($pekka_rentan,0,",",".");
						$temp[]=number_format($persentase1,2,",",".")." %";
						$temp[]="<a class=\"btn btn-xs btn-success\" href=\"Perempuankk/detailperempuankk/$periode\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>";
						$tabel[]=$temp;
					}
					echo json_encode(array('data' => $tabel));
	}
	public function detailperempuankk() {
		$tahun = $this->uri->segment(3); 
    	$data['data']=$this->m_perempuankk->tampil_detailperempuankk($tahun);
		$data['datax']=$this->m_perempuankk->tampil_tahun();
		$data['dataxs']=$this->m_perempuankk->tampil_kecamatan();
        $this->load->view('template/header');
        $this->load->view('pemberdayaanpdpa/detailperempuankk', $data);
		$this->load->view('template/footer');
    }
	
	public function grafikperempuankk() {
	  $id = $this->uri->segment(3); 
      $data['data']=$this->m_perempuankk->tampil_grafik($id);
      $this->load->view('template/header');
      $this->load->view('pemberdayaanpdpa/grafikperempuankk', $data);
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
      $data['data']=$this->m_perempuankk->grafik_perbandingan_perempuankkx($tahun2, $tahun1);
      $this->load->view('template/header');
	  if($datap=="all"){
		if($grafikp=="bar"){
		$this->load->view('pemberdayaanpdpa/grafik_perbandingan_perempuankk_bar_all', $data);
		$this->load->view('template/footer');
		}else if($grafikp=="line"){
		$this->load->view('pemberdayaanpdpa/grafik_perbandingan_perempuankk_line_all', $data);
		$this->load->view('template/footer');
		}
	  }else{
	  if($grafikp=="bar"){
		$this->load->view('pemberdayaanpdpa/grafik_perbandingan_perempuankk_bar', $data);
		$this->load->view('template/footer');
		}else if($grafikp=="line"){
		$this->load->view('pemberdayaanpdpa/grafik_perbandingan_perempuankk_line', $data);
		$this->load->view('template/footer');
	  }
	  }
	  
	}
	
   	public function proses_input_perempuankk(){
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$kecamatan = $this->input->post('kecamatan');
		$penginput = $this->input->post('penginput');
		$jpekkapro = $this->input->post('jpekkapro');
		$jpekkarentan = $this->input->post('jpekkarentan');
		$jpekka = $jpekkapro + $jpekkarentan;
   		$this->m_perempuankk->simpan_barang($penginput,$periode,$kecamatan,$jpekka,$jpekkapro,$jpekkarentan);
		redirect('Perempuankk');   	
	}
	
	public function proses_input_detailperempuankk(){
		$page = $this->uri->segment(3);
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$kecamatan = $this->input->post('kecamatan');
		$penginput = $this->input->post('penginput');
		$jpekkapro = $this->input->post('jpekkapro');
		$jpekkarentan = $this->input->post('jpekkarentan');
		$jpekka = $jpekkapro + $jpekkarentan;
   		$this->m_perempuankk->simpan_barang($penginput,$periode,$kecamatan,$jpekka,$jpekkapro,$jpekkarentan);
		redirect('Perempuankk/detailperempuankk/'.$page);   	
	}	
	
	public function proses_edit_detailperempuankk(){
		$page = $this->uri->segment(3); 
		$id=$this->input->post('id');
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$kecamatan = $this->input->post('kecamatan');
		$penginput = $this->input->post('penginput');
		$jpekkapro = $this->input->post('jpekkapro');
		$jpekkarentan = $this->input->post('jpekkarentan');
		$jpekka = $jpekkapro + $jpekkarentan;
		$this->m_perempuankk->update_perempuankk($id,$penginput,$periode,$kecamatan,$jpekka,$jpekkapro,$jpekkarentan);
		redirect('Perempuankk/detailperempuankk/'.$page);	
	}
	
	public function proses_delete_perempuankk(){
		$id=$this->input->post('id');
		$this->m_perempuankk->delete_perempuankk($id);
		redirect('Perempuankk');	
	}	
	
	public function proses_delete_detailperempuankk(){
		$page = $this->uri->segment(3); 
		$id=$this->input->post('id');
		$this->m_perempuankk->delete_perempuankk($id);
		redirect('Perempuankk/detailperempuankk/'.$page);	
	}

	

}
