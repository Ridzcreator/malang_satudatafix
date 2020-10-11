<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kec_jumlah_pembinaan_tumpang extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('M_jumlah_pembinaan');
    }

    public function index() {
		$tahun ='0000';
		$kecamatan='14';
    	$data['data']=$this->M_jumlah_pembinaan->tampil_jumlah_pembinaan($tahun,$kecamatan);
		$data['datax']=$this->M_jumlah_pembinaan->tampil_tahun($kecamatan);
		$data['datakec']=$kecamatan;
        $this->load->view('template/header');
        $this->load->view('kecamatan/kec_jumlah_pembinaan', $data);
		$this->load->view('template/footer');
    }
	
	public function get() {
		$thn = $this->input->get('tahun');
		$tahun=intval($thn);
		$kecamatan=14;
		$data['data']=$this->M_jumlah_pembinaan->tampil_jumlah_pembinaan($tahun,$kecamatan);
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
						$temp[]="<a class=\"btn btn-xs btn-success\" href=\"Kec_jumlah_pembinaan_tumpang/detail_kec_jumlah_pembinaan/$periode\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>| 
                                 <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$periode\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
						$tabel[]=$temp;
					}
					echo json_encode(array('data' => $tabel));
	}
	public function detail_kec_jumlah_pembinaan() {
		$tahun = $this->uri->segment(3); 
		$kecamatan=14;
    	$data['data']=$this->M_jumlah_pembinaan->tampil_detailkec_jumlah_pembinaan($tahun,$kecamatan);
		$data['datax']=$this->M_jumlah_pembinaan->tampil_tahun($kecamatan);
		$data['datakec']=$kecamatan;
        $this->load->view('template/header');
        $this->load->view('kecamatan/detail_kec_jumlah_pembinaan', $data);
		$this->load->view('template/footer');
    }
	
	public function grafik_kec_jumlah_pembinaan() {
	  $periode = $this->uri->segment(3); 
	  $kecamatan=14;
	  $data['datakec']=$kecamatan;
     $data['data']=$this->M_jumlah_pembinaan->tampil_jumlah_pembinaanx($periode,$kecamatan);
      $this->load->view('template/header');
      $this->load->view('kecamatan/grafik_kec_jumlah_pembinaan', $data);
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
      $data['dataz']=$this->M_jumlah_pembinaan->grafik_perbandingan_kec_jumlah_pembinaanx($tahun2, $tahun1, $kecamatan);
      $data['data']=$this->M_jumlah_pembinaan->tahun_crosstab($kecamatan);
      $data['periode']=$this->M_jumlah_pembinaan->tampil_periodec($tahun1,$tahun2,$kecamatan);
      $data['jumlah']=$this->M_jumlah_pembinaan->tampil_jumlahc($tahun1,$tahun2,$kecamatan);
      $data['jenis_pembinaan']=$this->M_jumlah_pembinaan->tampil_keteranganc();
      $this->load->view('template/header');
	  if($datap=="jumlah"){
		if($grafikp=="bar"){
		$this->load->view('kecamatan/grafik_kec_jumlah_pembinaan_bar_jumlah', $data);
		$this->load->view('template/footer');
		}else if($grafikp=="line"){
		$this->load->view('kecamatan/grafik_kec_jumlah_pembinaan_line_jumlah', $data);
		$this->load->view('template/footer');
		}
		}else{
		if($grafikp=="bar"){
		$this->load->view('kecamatan/grafik_kec_jumlah_pembinaan_bar_all', $data);
		$this->load->view('template/footer');
		}else if($grafikp=="line"){
		$this->load->view('kecamatan/grafik_kec_jumlah_pembinaan_line_all', $data);
		$this->load->view('template/footer');
		}	
		}
	}
	
	public function tampil_crosstab_jumlah_pembinaan(){
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
	  $kecamatan=$this->input->post('kecamatan');
	  $data['datakec']=$kecamatan;
       if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['data']=$this->M_jumlah_pembinaan->tahun_crosstab($kecamatan);
      $data['periode']=$this->M_jumlah_pembinaan->tampil_periodec($tahun1,$tahun2,$kecamatan);
      $data['jumlah']=$this->M_jumlah_pembinaan->tampil_jumlahc($tahun1,$tahun2,$kecamatan);
      $data['jenis_pembinaan']=$this->M_jumlah_pembinaan->tampil_keteranganc();
        $this->load->view('template/header');
        $this->load->view('kecamatan/tampil_crosstab_jumlah_pembinaan', $data);
        $this->load->view('template/footer');
    }
	
   	public function proses_input_jumlah_pembinaan() {
    $jenis = $this->input->post('jenis_pembinaan');
    $jumlah = $this->input->post('jumlah');
    $tahun = $this->input->post('tahun');
    $status = $this->input->post('status');
    $kecamatan = $this->input->post('kecamatan');
    $penginput = $this->input->post('penginput');
      $i=0;
      foreach ($jenis as $key) {
       $cek = $this->db->query("SELECT * FROM kec_jumlah_pembinaan where kecamatan='".$kecamatan[$i]."' and jenis_pembinaan='".$jenis[$i]."' and periode='".$tahun[$i]."' and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Kec_jumlah_pembinaan_tumpang','refresh');
           }

           else {

    $jenis = $this->input->post('jenis_pembinaan');
    $jumlah = $this->input->post('jumlah');
    $kecamatan = $this->input->post('kecamatan');
    $tahun = $this->input->post('tahun');
    $status = $this->input->post('status');
    $penginput = $this->input->post('penginput');
    $data = array();
    $index=0;
    foreach($jenis AS $key){
    array_push($data, array(  
      "id"    => '',
      "kecamatan"    => $kecamatan[$index], 
      "jenis_pembinaan"  => $jenis[$index],
      "jumlah"  => $jumlah[$index],
      "periode"  => $tahun[$index],
      "status"  => $status[$index],
      "penginput"  => $penginput[$index]));

    $index++;
    

      }
               
    
    $test= $this->db->insert_batch('kec_jumlah_pembinaan', $data); // fungsi  untuk menyimpan multi array ke database
    
    
     
            redirect('Kec_jumlah_pembinaan_tumpang');  
           }
      }
      
           


   }
	
	public function proses_edit_kec_jumlah_pembinaan(){
		$page = $this->uri->segment(3); 
		$id=$this->input->post('id');
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$jenis = $this->input->post('jenis_pembinaan');
		$jumlah = $this->input->post('jumlah');
		$test=$this->M_jumlah_pembinaan->update_kec_jumlah_pembinaan($id,$penginput,$periode,$jenis,$jumlah);
		if (!$test) {
			echo "<script>alert('Maaf data salah di inputkan.');</script>";
            redirect('Kec_jumlah_pembinaan_tumpang','refresh');
		}else{
					redirect('Kec_jumlah_pembinaan_tumpang/detail_kec_jumlah_pembinaan/'.$page);	

		}
	}
	
	public function proses_delete_jumlah_pembinaan(){
		$id=$this->input->post('id');
		$this->M_jumlah_pembinaan->delete_kec_jumlah_pembinaan($id);
		redirect('Kec_jumlah_pembinaan_tumpang');	
	}	
	
	

}
