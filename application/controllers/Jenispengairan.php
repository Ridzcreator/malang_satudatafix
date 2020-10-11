<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jenispengairan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_jenispengairan');
    }

    public function index() {
		$tahun ='0000';
    	$data['data']=$this->m_jenispengairan->tampil_jenispengairan($tahun);
		$data['datax']=$this->m_jenispengairan->tampil_tahun();
		$data['dataxs']=$this->m_jenispengairan->tampil_kecamatan();
        $this->load->view('template/header');
        $this->load->view('pangan/jenispengairan', $data);
		$this->load->view('template/footer');
    }
	
	public function get() {
		$thn = $this->input->get('tahun');
		$tahun=intval($thn);
		$data['data']=$this->m_jenispengairan->tampil_jenispengairan($tahun);
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
						$value=$a['irigasi'];
						$value1=$a['tadah'];
						$value2=$a['rawa_pasang'];
						$value3=$a['rawa_lebak'];
						$temp[]=number_format($no,0,",",".");
						$temp[]=$periode;
						$temp[]=number_format($value,0,",",".");
						$temp[]=number_format($value1,0,",",".");
						$temp[]=number_format($value2,0,",",".");
						$temp[]=number_format($value3,0,",",".");
						$temp[]="<a class=\"btn btn-xs btn-success\" href=\"Jenispengairan/detailjenispengairan/$periode\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>";
						$tabel[]=$temp;
					}
					echo json_encode(array('data' => $tabel));
	}
	public function detailjenispengairan() {
		$tahun = $this->uri->segment(3); 
    	$data['data']=$this->m_jenispengairan->tampil_detailjenispengairan($tahun);
		$data['datax']=$this->m_jenispengairan->tampil_tahun();
		$data['dataxs']=$this->m_jenispengairan->tampil_kecamatan();
        $this->load->view('template/header');
        $this->load->view('pangan/detailjenispengairan', $data);
		$this->load->view('template/footer');
    }
	
	public function grafikjenispengairan() {
	  $id = $this->uri->segment(3); 
      $data['data']=$this->m_jenispengairan->tampil_grafik($id);
      $this->load->view('template/header');
      $this->load->view('pangan/grafikjenispengairan', $data);
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
      $data['data']=$this->m_jenispengairan->grafik_perbandingan_jenispengairanx($tahun2, $tahun1);
      $this->load->view('template/header');
	  if($datap=="all"){
		if($grafikp=="bar"){
		$this->load->view('pangan/grafik_perbandingan_jenispengairan_bar_all', $data);
		$this->load->view('template/footer');
		}else if($grafikp=="line"){
		$this->load->view('pangan/grafik_perbandingan_jenispengairan_line_all', $data);
		$this->load->view('template/footer');
		}
	  }else{
	  if($grafikp=="bar"){
		$this->load->view('pangan/grafik_perbandingan_jenispengairan_bar', $data);
		$this->load->view('template/footer');
		}else if($grafikp=="line"){
		$this->load->view('pangan/grafik_perbandingan_jenispengairan_line', $data);
		$this->load->view('template/footer');
	  }
	  }
	  
	}
	
   	public function proses_input_jenispengairan(){
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$kecamatan = $this->input->post('kecamatan');
		$irigasi = $this->input->post('irigasi');
		$tadah = $this->input->post('tadah');
		$pasang = $this->input->post('pasang');
		$lebak = $this->input->post('lebak');

   		$this->m_jenispengairan->simpan_barang($penginput,$periode,$kecamatan,$irigasi,$tadah,$pasang,$lebak);
		redirect('Jenispengairan');   	
	}
	
	public function proses_input_detailjenispengairan(){
		$page = $this->uri->segment(3);
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$kecamatan = $this->input->post('kecamatan');
		$irigasi = $this->input->post('irigasi');
		$tadah = $this->input->post('tadah');
		$pasang = $this->input->post('pasang');
		$lebak = $this->input->post('lebak');
   		
		$this->m_jenispengairan->simpan_barang($penginput,$periode,$kecamatan,$irigasi,$tadah,$pasang,$lebak);
		redirect('Jenispengairan/detailjenispengairan/'.$page);   	
	}	
	
	public function proses_edit_detailjenispengairan(){
		$page = $this->uri->segment(3); 
		$id=$this->input->post('id');
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$kecamatan = $this->input->post('kecamatan');
		$irigasi = $this->input->post('irigasi');
		$tadah = $this->input->post('tadah');
		$pasang = $this->input->post('pasang');
		$lebak = $this->input->post('lebak');
		$this->m_jenispengairan->update_jenispengairan($id,$penginput,$periode,$kecamatan,$irigasi,$tadah,$pasang,$lebak);
		redirect('Jenispengairan/detailjenispengairan/'.$page);	
	}
	
	public function proses_delete_jenispengairan(){
		$id=$this->input->post('id');
		$this->m_jenispengairan->delete_jenispengairan($id);
		redirect('jenispengairan');	
	}	
	
	public function proses_delete_detailjenispengairan(){
		$page = $this->uri->segment(3); 
		$id=$this->input->post('id');
		$this->m_jenispengairan->delete_jenispengairan($id);
		redirect('Jenispengairan/detailjenispengairan/'.$page);	
	}

	

}
