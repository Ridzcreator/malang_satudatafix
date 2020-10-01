<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kec_wisata_lokal_poncokusumo extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('M_wisata_lokal');
    }

    public function index() {
		$periode=date('y');
		$tahun = '0000';
		$kecamatan='21';
    	$data['data']=$this->M_wisata_lokal->tampil_wisata_lokal($tahun,$kecamatan);
		$data['datax']=$this->M_wisata_lokal->tampil_tahun($kecamatan);
		$data['datakec']=$kecamatan;
        $this->load->view('template/header');
        $this->load->view('kecamatan/kec_wisata_lokal', $data);
		$this->load->view('template/footer');
    }
	
	public function get() {
		$thn = $this->input->get('tahun');
		$tahun=intval($thn);
		$kecamatan='21';
		$data['data']=$this->M_wisata_lokal->tampil_wisata_lokal($tahun,$kecamatan);
        $no=0;
		$total=0;
		$tabel=array();
                    foreach ($data['data']->result_array() as $a) {
					$temp = array();
                        $no++;
                        $id = $a['id'];
						$periode=$a['periode'];
						$value=$a['wisata_alam'];
						$value1=$a['wisata_buatan'];
						$value2=$a['wisata_edukasi'];
						$value3=$a['wisata_budaya'];
						$total=$value+$value1+$value2+$value3;
						$temp[]=$no;
						$temp[]=number_format($value,0,",",".");
						$temp[]=number_format($value1,0,",",".");
						$temp[]=number_format($value2,0,",",".");
						$temp[]=number_format($value3,0,",",".");
						$temp[]=number_format($total,0,",",".");
						$temp[]=$periode;
						$temp[]="
						<a class=\"btn btn-xs btn-success\" href=\"Kec_wisata_lokal_poncokusumo/detail_wisata_lokal/$periode\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a> |
						<a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a> | 
                        <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
						$tabel[]=$temp;
					}
					echo json_encode(array('data' => $tabel));
	}
	
	public function detail_wisata_lokal() {
		$periode = $this->uri->segment(3); 
		$kecamatan=21;
		$data['datakec']=$kecamatan;
		$data['data']=$this->M_wisata_lokal->tampil_wisata_lokalx($periode,$kecamatan);
		$data['datax']=$this->M_wisata_lokal->tampil_tahun($kecamatan);
    	$this->load->view('template/header');
        $this->load->view('kecamatan/detail_kec_wisata_lokal', $data);
        $this->load->view('template/footer');		
    }
	
	public function grafik_wisata_lokal() {
	  $id = $this->uri->segment(3); 
	  $kecamatan=21;
	  $data['datakec']=$kecamatan;
      $data['data']=$this->M_wisata_lokal->tampil_wisata_lokalxx($id,$kecamatan);
      $this->load->view('template/header');
      $this->load->view('kecamatan/grafik_wisata_lokal', $data);
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
      $data['data']=$this->M_wisata_lokal->grafik_perbandingan_wisata_lokalx($tahun2, $tahun1, $kecamatan);
      $this->load->view('template/header');
      if($datap=="all"){
		if($grafikp=="bar"){
		$this->load->view('kecamatan/grafik_perbandingan_wisata_lokal_bar_all', $data);
		$this->load->view('template/footer');
		}else if($grafikp=="line"){
		$this->load->view('kecamatan/grafik_perbandingan_wisata_lokal_line_all', $data);
		$this->load->view('template/footer');
		}
    }
	}

   	public function proses_input_wisata_lokal(){
		$alamat="poncokusumo";
		$penginput=$this->input->post('penginput');
		$periode=$this->input->post('periode');
		$kecamatan=$this->input->post('kecamatan');
		$value = $this->input->post('value');
		$value1 = $this->input->post('value1');
		$value2 = $this->input->post('value2');
		$value3 = $this->input->post('value3');
   		$this->M_wisata_lokal->simpan_barang($penginput,$periode,$kecamatan,$value,$value1,$value2,$value3,$alamat);
		redirect('Kec_wisata_lokal_poncokusumo');   	
	}
	
	public function proses_input_detail_wisata_lokal(){
		$page = $this->uri->segment(3);
		$alamat="poncokusumo";
		$penginput=$this->input->post('penginput');
		$periode=$this->input->post('periode');
		$kecamatan=$this->input->post('kecamatan');
		$value = $this->input->post('value');
		$value1 = $this->input->post('value1');
		$value2 = $this->input->post('value2');
		$value3 = $this->input->post('value3');
   		$this->M_wisata_lokal->simpan_barang($penginput,$periode,$kecamatan,$value,$value1,$value2,$value3,$alamat);
		redirect('Kec_wisata_lokal_poncokusumo/detail_wisata_lokal/'.$page);   
	}
	
	public function proses_edit_detail_wisata_lokal(){
		$page = $this->uri->segment(3);
		$alamat="poncokusumo";
		$id=$this->input->post('id');
		$penginput=$this->input->post('penginput');
		$periode=$this->input->post('periode');
		$kecamatan=$this->input->post('kecamatan');
		$value = $this->input->post('value');
		$value1 = $this->input->post('value1');
		$value2 = $this->input->post('value2');
		$value3 = $this->input->post('value3');
   		$this->M_wisata_lokal->update_wisata_lokal($id,$penginput,$periode,$kecamatan,$value,$value1,$value2,$value3);
		redirect('Kec_wisata_lokal_poncokusumo/detail_wisata_lokal/'.$page);	
	}
	
	public function proses_edit_wisata_lokal(){
		$alamat="poncokusumo";
		$id=$this->input->post('id');
		$penginput=$this->input->post('penginput');
		$periode=$this->input->post('periode');
		$kecamatan=$this->input->post('kecamatan');
		$value = $this->input->post('value');
		$value1 = $this->input->post('value1');
		$value2 = $this->input->post('value2');
		$value3 = $this->input->post('value3');
   		$this->M_wisata_lokal->update_wisata_lokal($id,$penginput,$periode,$kecamatan,$value,$value1,$value2,$value3);
		redirect('Kec_wisata_lokal_poncokusumo');	
	}
	
	public function proses_delete_wisata_lokal(){
		$id=$this->input->post('id');	
		$this->M_wisata_lokal->delete_wisata_lokal($id);
		redirect('Kec_wisata_lokal_poncokusumo');	
	}	

	

}
