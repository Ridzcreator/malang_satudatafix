<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kec_jumlah_jenis_pelayanan_wagir extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('M_jumlah_jenis_pelayanan');
    }

    public function index() {
		$periode=date('y');
		$tahun = '0000';
		$kecamatan='28';
    	$data['data']=$this->M_jumlah_jenis_pelayanan->tampil_jumlah_jenis_pelayanan($tahun,$kecamatan);
		$data['datax']=$this->M_jumlah_jenis_pelayanan->tampil_tahun($kecamatan);
		$data['dataxs']=$this->M_jumlah_jenis_pelayanan->tampil_pelayanan();
		$data['datakec']=$kecamatan;
        $this->load->view('template/header');
        $this->load->view('kecamatan/kec_jumlah_jenis_pelayanan', $data);
		$this->load->view('template/footer');
    }
	
	public function get() {
		$thn = $this->input->get('tahun');
		$tahun=intval($thn);
		$kecamatan='28';
		$data['data']=$this->M_jumlah_jenis_pelayanan->tampil_jumlah_jenis_pelayanan($tahun,$kecamatan);
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
						<a class=\"btn btn-xs btn-success\" href=\"Kec_jumlah_jenis_pelayanan_wagir/detail_jumlah_jenis_pelayanan/$periode\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>";
						$tabel[]=$temp;
					}
					echo json_encode(array('data' => $tabel));
	}
	
	public function detail_jumlah_jenis_pelayanan() {
		$periode = $this->uri->segment(3); 
		$kecamatan=28;
		$data['datakec']=$kecamatan;
		$data['data']=$this->M_jumlah_jenis_pelayanan->tampil_jumlah_jenis_pelayananx($periode,$kecamatan);
		$data['datax']=$this->M_jumlah_jenis_pelayanan->tampil_tahun($kecamatan);
		$data['dataxs']=$this->M_jumlah_jenis_pelayanan->tampil_pelayanan();
    	$this->load->view('template/header');
        $this->load->view('kecamatan/detail_kec_jumlah_jenis_pelayanan', $data);
        $this->load->view('template/footer');		
    }
	
	public function grafik_jumlah_jenis_pelayanan() {
	  $periode = $this->uri->segment(3); 
	  $kecamatan=28;
	  $data['datakec']=$kecamatan;
      $data['data']=$this->M_jumlah_jenis_pelayanan->tampil_jumlah_jenis_pelayananx($periode,$kecamatan);
      $this->load->view('template/header');
      $this->load->view('kecamatan/grafik_jumlah_jenis_pelayanan', $data);
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
      $data['data']=$this->M_jumlah_jenis_pelayanan->grafik_perbandingan_jumlah_jenis_pelayananx($tahun2, $tahun1, $kecamatan);
      $data['datax']=$this->M_jumlah_jenis_pelayanan->tahun_crosstab($kecamatan);
      $data['tahun']=$this->M_jumlah_jenis_pelayanan->tampil_periodec($tahun1,$tahun2,$kecamatan);
      $data['jumlah']=$this->M_jumlah_jenis_pelayanan->tampil_jumlahc($tahun1,$tahun2,$kecamatan);
      $data['jumlah1']=$this->M_jumlah_jenis_pelayanan->tampil_jumlahxc($tahun1,$tahun2,$kecamatan);
      $data['keterangan']=$this->M_jumlah_jenis_pelayanan->tampil_keteranganc();
      $this->load->view('template/header');
      if($datap=="jumlah"){
      if($grafikp=="bar"){
        $this->load->view('kecamatan/grafik_perbandingan_jumlah_jenis_pelayanan_bar', $data);
        $this->load->view('template/footer');
        }else if($grafikp=="line"){
        $this->load->view('kecamatan/grafik_perbandingan_jumlah_jenis_pelayanan_line', $data);
        $this->load->view('template/footer');
      }
		}else{
		if($grafikp=="bar"){
		$this->load->view('kecamatan/grafik_perbandingan_jumlah_jenis_pelayanan_bar_all', $data);
		$this->load->view('template/footer');
		}else if($grafikp=="line"){
		$this->load->view('kecamatan/grafik_perbandingan_jumlah_jenis_pelayanan_line_all', $data);
		$this->load->view('template/footer');
		}
    }
	}

    public function tampil_crosstab_jumlah_jenis_pelayanan(){
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
	  $kecamatan=$this->input->post('kecamatan');
	  $data['datakec']=$kecamatan;
       if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['data']=$this->M_jumlah_jenis_pelayanan->tahun_crosstab($kecamatan);
      $data['tahun']=$this->M_jumlah_jenis_pelayanan->tampil_periodec($tahun1,$tahun2,$kecamatan);
      $data['jumlah']=$this->M_jumlah_jenis_pelayanan->tampil_jumlahc($tahun1,$tahun2,$kecamatan);
      $data['jumlah1']=$this->M_jumlah_jenis_pelayanan->tampil_jumlahxc($tahun1,$tahun2,$kecamatan);
      $data['keterangan']=$this->M_jumlah_jenis_pelayanan->tampil_keteranganc();
        $this->load->view('template/header');
        $this->load->view('kecamatan/tampil_crosstab_jumlah_jenis_pelayanan', $data);
        $this->load->view('template/footer');
    }

   	public function proses_input_jumlah_jenis_pelayanan(){
		$alamat="wagir";
		$penginput=$this->input->post('penginput');
		$periode=$this->input->post('periode');
		$kecamatan=$this->input->post('kecamatan');
		$value = $this->input->post('pelayanan');
		$value1 = $this->input->post('jumlah');
   		$this->M_jumlah_jenis_pelayanan->simpan_barang($penginput,$periode,$kecamatan,$value,$value1,$alamat);
		redirect('Kec_jumlah_jenis_pelayanan_wagir');   	
	}
	
	public function proses_input_detail_jumlah_jenis_pelayanan(){
		$page = $this->uri->segment(3);
		$alamat="wagir";
		$penginput=$this->input->post('penginput');
		$periode=$this->input->post('periode');
		$kecamatan=$this->input->post('kecamatan');
		$value = $this->input->post('pelayanan');
		$value1 = $this->input->post('jumlah');
   		$this->M_jumlah_jenis_pelayanan->simpan_barang($penginput,$periode,$kecamatan,$value,$value1,$alamat);
		redirect('Kec_jumlah_jenis_pelayanan_wagir/detail_jumlah_jenis_pelayanan/'.$page);   
	}
	
	public function proses_edit_jumlah_jenis_pelayanan(){
		$page = $this->uri->segment(3);
		$alamat="wagir";
		$id=$this->input->post('id');
		$penginput=$this->input->post('penginput');
		$periode=$this->input->post('periode');
		$kecamatan=$this->input->post('kecamatan');
		$value = $this->input->post('pelayanan');
		$value1 = $this->input->post('jumlah');
   		$this->M_jumlah_jenis_pelayanan->update_jumlah_jenis_pelayanan($id,$penginput,$periode,$kecamatan,$value,$value1);
		redirect('Kec_jumlah_jenis_pelayanan_wagir/detail_jumlah_jenis_pelayanan/'.$page);	
	}
	
	public function proses_delete_jumlah_jenis_pelayanan(){
		$id=$this->input->post('id');	
		$this->M_jumlah_jenis_pelayanan->delete_jumlah_jenis_pelayanan($id);
		redirect('Kec_jumlah_jenis_pelayanan_wagir');	
	}	

	

}
