<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Banding_kembang_realisasi_ekspor extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_banding_kembang_realisasi_ekspor');
    }

    public function index() {
		$tahun ='0000';
    	$data['data']=$this->m_banding_kembang_realisasi_ekspor->tampil_banding_kembang_realisasi_ekspor($tahun);
		$data['datax']=$this->m_banding_kembang_realisasi_ekspor->tampil_tahun();
		$data['datas']=$this->m_banding_kembang_realisasi_ekspor->tampil_komoditi();
        $this->load->view('template/header');
        $this->load->view('perindustrian/banding_kembang_realisasi_ekspor', $data);
		$this->load->view('template/footer');
    }
	
	public function get() {
		$thn = $this->input->get('tahun');
		$tahun=intval($thn);
		$data['data']=$this->m_banding_kembang_realisasi_ekspor->tampil_banding_kembang_realisasi_ekspor($tahun);
        $no=0;
		$tabel=array();
                    foreach ($data['data']->result_array() as $a) {
					$temp = array();
                        $no++;
                        $id = $a['id'];
                        $tahun=$a['tahun'];
						$volum=$a['volum'];
						$nilai=$a['nilai'];
						$total_ekspor=$a['total_ekspor'];
						$naik_turun=$a['naik_turun'];

						$temp[]=number_format($no,0,",",".");
						$temp[]=$tahun;
						$temp[]=number_format($volum,2,".",",");
						$temp[]=number_format($nilai,2,".",",");
						$temp[]=number_format($total_ekspor,2,".",",");
						$temp[]=number_format($naik_turun,2,".",",");
						$temp[]="<a class=\"btn btn-xs btn-success\" href=\"Banding_kembang_realisasi_ekspor/detail_banding_kembang_realisasi_ekspor/$tahun\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>";
						$tabel[]=$temp;
					}
					echo json_encode(array('data' => $tabel));
	}

	public function tampil_komoditi(){
        $this->load->view('template/header');
        $this->load->view('perindustrian/banding_kembang_realisasi_ekspor',$datakomoditi);
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
      $data['data']=$this->m_banding_kembang_realisasi_ekspor->grafik_perbandingan_banding_kembang_realisasi_eksporx($tahun2, $tahun1);
      $this->load->view('template/header');
	  if($datap=="all"){
		if($grafikp=="bar"){
		$this->load->view('perindustrian/grafik_perbandingan_banding_kembang_realisasi_ekspor_bar_all', $data);
		$this->load->view('template/footer');
		}else if($grafikp=="line"){
		$this->load->view('perindustrian/grafik_perbandingan_banding_kembang_realisasi_ekspor_line_all', $data);
		$this->load->view('template/footer');
		}
	  }else{
	  if($grafikp=="bar"){
		$this->load->view('perindustrian/grafik_perbandingan_banding_kembang_realisasi_ekspor_bar', $data);
		$this->load->view('template/footer');
		}else if($grafikp=="line"){
		$this->load->view('perindustrian/grafik_perbandingan_banding_kembang_realisasi_ekspor_line', $data);
		$this->load->view('template/footer');
	  }
	  }
	  
	}
	
	public function detail_banding_kembang_realisasi_ekspor() {
		$tahun = $this->uri->segment(3); 
    	$data['datab']=$this->m_banding_kembang_realisasi_ekspor->tampil_detail_banding_kembang_realisasi_ekspor($tahun);
		$data['datas']=$this->m_banding_kembang_realisasi_ekspor->tampil_komoditi();
        $this->load->view('template/header');
        $this->load->view('perindustrian/detail_banding_kembang_realisasi_ekspor', $data);
		$this->load->view('template/footer');
    }
	
	public function grafik_banding_kembang_realisasi_ekspor() {
	  $id = $this->uri->segment(3); 
      $data['data']=$this->m_banding_kembang_realisasi_ekspor->tampil_grafik($id);
      $this->load->view('template/header');
      $this->load->view('perindustrian/grafik_detail_banding_kembang_realisasi_ekspor', $data);
      $this->load->view('template/footer');
    }

   	public function proses_input_banding_kembang_realisasi_ekspor(){
		
		$komoditi = $this->input->post('komoditi');
		$volum = $this->input->post('volum');
		$nilai = $this->input->post('nilai');
		$total_ekspor = $this->input->post('total_ekspor');
		$naik_turun = $this->input->post('naik_turun');
		$naik_turun_nilai = $this->input->post('naik_turun_nilai');
		$tahun = $this->input->post('tahun');
		$penginput = $this->input->post('penginput');

		$cek = $this->db->query("SELECT * FROM banding_kembang_realisasi_ekspor where komoditi='$komoditi' and tahun='$tahun' and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Banding_kembang_realisasi_ekspor','refresh');
           }
           else {

   		$this->m_banding_kembang_realisasi_ekspor->simpan_barang($komoditi,$volum,$nilai,$total_ekspor,$naik_turun,$naik_turun_nilai,$tahun,$penginput);
		redirect('Banding_kembang_realisasi_ekspor');   	
	}
		}
	
	public function proses_input_detail_banding_kembang_realisasi_ekspor(){
		$page = $this->uri->segment(3);
		$komoditi = $this->input->post('komoditi');
		$volum = $this->input->post('volum');
		$nilai = $this->input->post('nilai');
		$total_ekspor = $this->input->post('total_ekspor');
		$naik_turun = $this->input->post('naik_turun');
		$naik_turun_nilai = $this->input->post('naik_turun_nilai');
		$tahun = $this->input->post('tahun');
		$penginput = $this->input->post('penginput');

		$cek = $this->db->query("SELECT * FROM banding_kembang_realisasi_ekspor where komoditi='$komoditi' and tahun='$tahun' and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Banding_kembang_realisasi_ekspor/detail_banding_kembang_realisasi_ekspor/'.$page,'refresh');
           }
           else {

   		$this->m_banding_kembang_realisasi_ekspor->simpan_barang($komoditi,$volum,$nilai,$total_ekspor,$naik_turun,$naik_turun_nilai,$tahun,$penginput);
		redirect('Banding_kembang_realisasi_ekspor/detail_banding_kembang_realisasi_ekspor/'.$page);   	
	}	
		}
	
	public function proses_edit_detail_banding_kembang_realisasi_ekspor(){
		$page = $this->uri->segment(3);
		$id=$this->input->post('id');
		$penginput = $this->input->post('penginput');
		$tahun = $this->input->post('tahun');
		$komoditi = $this->input->post('komoditi');
		$volum = $this->input->post('volum');
		$nilai = $this->input->post('nilai');
		$total_ekspor = $this->input->post('total_ekspor');
		$naik_turun_nilai = $this->input->post('naik_turun_nilai');
		$naik_turun = $this->input->post('naik_turun');
		
		$this->m_banding_kembang_realisasi_ekspor->update_detail_banding_kembang_realisasi_ekspor($id,$komoditi,$volum,$nilai,$total_ekspor,$naik_turun,$naik_turun_nilai,$tahun,$penginput);
		redirect('Banding_kembang_realisasi_ekspor/detail_banding_kembang_realisasi_ekspor/'.$page);	
	}	
	
	public function proses_hapus_banding_kembang_realisasi_ekspor(){
		$page = $this->uri->segment(3); 
		$id=$this->input->post('id');
		$this->m_banding_kembang_realisasi_ekspor->delete_banding_kembang_realisasi_ekspor($id);
		redirect('Banding_kembang_realisasi_ekspor/detail_banding_kembang_realisasi_ekspor/'.$page);	
	}

}
