<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduanker extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_pengaduanker');
    }

    public function index() {
		$tahun ='0000';
    	$data['data']=$this->m_pengaduanker->tampil_pengaduanker($tahun);
		$data['datax']=$this->m_pengaduanker->tampil_tahun();
		$data['dataxs']=$this->m_pengaduanker->tampil_bulan();
        $this->load->view('template/header');
        $this->load->view('pemberdayaanpdpa/pengaduanker', $data);
		$this->load->view('template/footer');
    }
	
	public function get() {
		$thn = $this->input->get('tahun');
		$tahun=intval($thn);
		$data['data']=$this->m_pengaduanker->tampil_pengaduanker($tahun);
        $no=0;
		$tabel=array();
                    foreach ($data['data']->result_array() as $a) {
					$temp = array();
                        $no++;
                        $id = $a['id'];
						$periode=$a['periode'];
						$bulan=$a['bulan'];
						$lfisik=$a['lfisik'];
						$pfisik=$a['pfisik'];
						$lpsikis=$a['lpsikis'];
						$ppsikis=$a['ppsikis'];
						$lseksual=$a['lseksual'];
						$pseksual=$a['pseksual'];
						$leksploitasi=$a['leksploitasi'];
						$peksploitasi=$a['peksploitasi'];
						$lpenelantaran=$a['lpenelantaran'];
						$ppenelantaran=$a['ppenelantaran'];
						$llainnya=$a['llainnya'];
						$plainnya=$a['plainnya'];
						$temp[]=number_format($no,0,",",".");
						$temp[]=$periode;
						$temp[]=number_format($lfisik,0,",",".");
						$temp[]=number_format($pfisik,0,",",".");
						$temp[]=number_format($lpsikis,0,",",".");
						$temp[]=number_format($ppsikis,0,",",".");
						$temp[]=number_format($lseksual,0,",",".");
						$temp[]=number_format($pseksual,0,",",".");
						$temp[]=number_format($leksploitasi,0,",",".");
						$temp[]=number_format($peksploitasi,0,",",".");
						$temp[]=number_format($lpenelantaran,0,",",".");
						$temp[]=number_format($ppenelantaran,0,",",".");
						$temp[]=number_format($llainnya,0,",",".");
						$temp[]=number_format($plainnya,0,",",".");
						$temp[]="<a class=\"btn btn-xs btn-success\" href=\"Pengaduanker/detailpengaduanker/$periode\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>";
						$tabel[]=$temp;
					}
					echo json_encode(array('data' => $tabel));
	}
	
	public function detailpengaduanker() {
		$tahun = $this->uri->segment(3); 
    	$data['data']=$this->m_pengaduanker->tampil_detailpengaduanker($tahun);
		$data['datax']=$this->m_pengaduanker->tampil_tahun();
		$data['dataxs']=$this->m_pengaduanker->tampil_bulan();
        $this->load->view('template/header');
        $this->load->view('pemberdayaanpdpa/detailpengaduanker', $data);
		$this->load->view('template/footer');
    }
	
	public function grafikpengaduanker() {
	  $id = $this->uri->segment(3); 
      $data['data']=$this->m_pengaduanker->tampil_grafik($id);
      $this->load->view('template/header');
      $this->load->view('pemberdayaanpdpa/grafikpengaduanker', $data);
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
      $data['data']=$this->m_pengaduanker->grafik_perbandingan_pengaduankerx($tahun2, $tahun1);
      $this->load->view('template/header');
	  if($datap=="all"){
	  if($grafikp=="bar"){
      $this->load->view('pemberdayaanpdpa/grafik_perbandingan_pengaduanker_bar_all', $data);
      $this->load->view('template/footer');
	  }else if($grafikp=="line"){
      $this->load->view('pemberdayaanpdpa/grafik_perbandingan_pengaduanker_line_all', $data);
      $this->load->view('template/footer');
	  }}
	  else{
	  if($grafikp=="bar"){
      $this->load->view('pemberdayaanpdpa/grafik_perbandingan_pengaduanker_bar', $data);
      $this->load->view('template/footer');
	  }else if($grafikp=="line"){
      $this->load->view('pemberdayaanpdpa/grafik_perbandingan_pengaduanker_line', $data);
      $this->load->view('template/footer');
	  }}
    }

   	public function proses_input_pengaduanker(){
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$bulan = $this->input->post('bulan');
		$lfisik = $this->input->post('lfisik');
		$fisik = $this->input->post('fisik');
		$lpsikis = $this->input->post('lpsikis');
		$psikis = $this->input->post('psikis');
		$lseksual = $this->input->post('lseksual');
		$seksual = $this->input->post('seksual');
		$leksploitasi = $this->input->post('leksploitasi');
		$eksploitasi = $this->input->post('eksploitasi');
		$lpenelantaran = $this->input->post('lpenelantaran');
		$penelantaran = $this->input->post('penelantaran');
		$llainnya = $this->input->post('llainnya');
		$lainnya = $this->input->post('lainnya');

   		$this->m_pengaduanker->simpan_barang($penginput,$periode,$bulan,$lfisik,$fisik,$lpsikis,$psikis,$lseksual,$seksual,$leksploitasi,$eksploitasi,$lpenelantaran,$penelantaran,$llainnya,$lainnya);
		redirect('Pengaduanker');   	
	}
	
	public function proses_input_detailpengaduanker(){
		$page = $this->uri->segment(3);
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$bulan = $this->input->post('bulan');
		$lfisik = $this->input->post('lfisik');
		$fisik = $this->input->post('fisik');
		$lpsikis = $this->input->post('lpsikis');
		$psikis = $this->input->post('psikis');
		$lseksual = $this->input->post('lseksual');
		$seksual = $this->input->post('seksual');
		$leksploitasi = $this->input->post('leksploitasi');
		$eksploitasi = $this->input->post('eksploitasi');
		$lpenelantaran = $this->input->post('lpenelantaran');
		$penelantaran = $this->input->post('penelantaran');
		$llainnya = $this->input->post('llainnya');
		$lainnya = $this->input->post('lainnya');

   		$this->m_pengaduanker->simpan_barang($penginput,$periode,$bulan,$lfisik,$fisik,$lpsikis,$psikis,$lseksual,$seksual,$leksploitasi,$eksploitasi,$lpenelantaran,$penelantaran,$llainnya,$lainnya);
		redirect('Pengaduanker/detailpengaduanker/'.$page);   	
	}	
	
	public function proses_edit_detailpengaduanker(){
		$page = $this->uri->segment(3);
		$id=$this->input->post('id');
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$bulan = $this->input->post('bulan');
		$lfisik = $this->input->post('lfisik');
		$fisik = $this->input->post('fisik');
		$lpsikis = $this->input->post('lpsikis');
		$psikis = $this->input->post('psikis');
		$lseksual = $this->input->post('lseksual');
		$seksual = $this->input->post('seksual');
		$leksploitasi = $this->input->post('leksploitasi');
		$eksploitasi = $this->input->post('eksploitasi');
		$lpenelantaran = $this->input->post('lpenelantaran');
		$penelantaran = $this->input->post('penelantaran');
		$llainnya = $this->input->post('llainnya');
		$lainnya = $this->input->post('lainnya');
		
		$this->m_pengaduanker->update_pengaduanker($id,$penginput,$periode,$bulan,$lfisik,$fisik,$lpsikis,$psikis,$lseksual,$seksual,$leksploitasi,$eksploitasi,$lpenelantaran,$penelantaran,$llainnya,$lainnya);
		redirect('Pengaduanker/detailpengaduanker/'.$page);	
	}	
	
	public function proses_delete_pengaduanker(){
		$page = $this->uri->segment(3); 
		$id=$this->input->post('id');
		$this->m_pengaduanker->delete_pengaduanker($id);
		redirect('Pengaduanker/detailpengaduanker/'.$page);	
	}

}
