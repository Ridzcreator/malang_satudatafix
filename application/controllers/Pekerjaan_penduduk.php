<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan_penduduk extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_pekerjaan_penduduk');
    }

    public function index() {
		$tahun ='0000';
    	$data['data']=$this->m_pekerjaan_penduduk->tampil_pekerjaan_penduduk($tahun);
		$data['datax']=$this->m_pekerjaan_penduduk->tampil_tahun();
		$data['datas']=$this->m_pekerjaan_penduduk->tampil_pekerjaan();
        $this->load->view('template/header');
        $this->load->view('tenagakerja/pekerjaan_penduduk', $data);
		$this->load->view('template/footer');
    }
	
	public function get() {
		$thn = $this->input->get('tahun');
		$tahun=intval($thn);
		$data['data']=$this->m_pekerjaan_penduduk->tampil_pekerjaan_penduduk($tahun);
        $no=0;
		$tabel=array();
                    foreach ($data['data']->result_array() as $a) {
					$temp = array();
                        $no++;
                        $id = $a['id'];
                        $tahun=$a['tahun'];
						$jumlah=$a['jumlah'];
						$temp[]=$no;
						$temp[]=$tahun;
						$temp[]=number_format("$jumlah",0,",",".");
						$temp[]="<a class=\"btn btn-xs btn-success\" href=\"Pekerjaan_penduduk/detail_pekerjaan_penduduk/$tahun\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>";
						$tabel[]=$temp;
					}
					echo json_encode(array('data' => $tabel));
	}

	public function tampil_pekerjaan(){
        $this->load->view('template/header');
        $this->load->view('tenagakerja/pekerjaan_penduduk',$datapekerjaan);
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
      $data['data']=$this->m_pekerjaan_penduduk->grafik_perbandingan_pekerjaan_pendudukx($tahun2, $tahun1);
      $this->load->view('template/header');
	  if($datap=="all"){
		if($grafikp=="bar"){
		$this->load->view('tenagakerja/grafik_perbandingan_pekerjaan_penduduk_bar_all', $data);
		$this->load->view('template/footer');
		}else if($grafikp=="line"){
		$this->load->view('transmigrasi/grafik_perbandingan_pekerjaan_penduduk_line_all', $data);
		$this->load->view('template/footer');
		}
	  }
	  
	}
	
	public function detail_pekerjaan_penduduk() {
		$tahun = $this->uri->segment(3); 
    	$data['datab']=$this->m_pekerjaan_penduduk->tampil_detail_pekerjaan_penduduk($tahun);
		$data['datas']=$this->m_pekerjaan_penduduk->tampil_pekerjaan();
        $this->load->view('template/header');
        $this->load->view('tenagakerja/detail_pekerjaan_penduduk', $data);
		$this->load->view('template/footer');
    }
	
	public function grafik_pekerjaan_penduduk() {
	  $id = $this->uri->segment(3); 
      $data['data']=$this->m_pekerjaan_penduduk->tampil_grafik($id);
      $this->load->view('template/header');
      $this->load->view('tenagakerja/grafik_detail_pekerjaan_penduduk', $data);
      $this->load->view('template/footer');
    }

   	public function proses_input_pekerjaan_penduduk(){
		
		$nama_pekerjaan = $this->input->post('nama_pekerjaan');
		$jumlah = $this->input->post('jumlah');
		$tahun = $this->input->post('tahun');
		$penginput = $this->input->post('penginput');

		$cek = $this->db->query("SELECT * FROM pekerjaan_penduduk where nama_pekerjaan='$nama_pekerjaan' and tahun='$tahun' and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Pekerjaan_penduduk','refresh');
           }
           else {

   		$this->m_pekerjaan_penduduk->simpan_barang($nama_pekerjaan,$jumlah,$tahun,$penginput);
		redirect('Pekerjaan_penduduk');   	
	}
		}
	
	public function proses_input_detail_pekerjaan_penduduk(){
		$page = $this->uri->segment(3);
		$nama_pekerjaan = $this->input->post('nama_pekerjaan');
		$jumlah = $this->input->post('jumlah');
		$tahun = $this->input->post('tahun');
		$penginput = $this->input->post('penginput');

		$cek = $this->db->query("SELECT * FROM pekerjaan_penduduk where nama_pekerjaan='$nama_pekerjaan' and tahun='$tahun' and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Pekerjaan_penduduk/detail_pekerjaan_penduduk/'.$page,'refresh');
           }
           else {

   		$this->m_pekerjaan_penduduk->simpan_barang($nama_pekerjaan,$jumlah,$tahun,$penginput);
		redirect('Pekerjaan_penduduk/detail_pekerjaan_penduduk/'.$page);   	
	}	
		}
	
	public function proses_edit_detail_pekerjaan_penduduk(){
		$page = $this->uri->segment(3);
		$id=$this->input->post('id');
		$penginput = $this->input->post('penginput');
		$tahun = $this->input->post('tahun');
		$nama_pekerjaan = $this->input->post('nama_pekerjaan');
		$jumlah = $this->input->post('jumlah');
		
		$this->m_pekerjaan_penduduk->update_detail_pekerjaan_penduduk($id,$nama_pekerjaan,$jumlah,$tahun,$penginput);
		redirect('Pekerjaan_penduduk/detail_pekerjaan_penduduk/'.$page);	
	}	
	
	public function proses_hapus_pekerjaan_penduduk(){
		$page = $this->uri->segment(3); 
		$id=$this->input->post('id');
		$this->m_pekerjaan_penduduk->delete_pekerjaan_penduduk($id);
		redirect('Pekerjaan_penduduk/detail_pekerjaan_penduduk/'.$page);	
	}

}
