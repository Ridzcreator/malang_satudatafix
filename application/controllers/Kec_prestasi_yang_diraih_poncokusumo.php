<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kec_prestasi_yang_diraih_poncokusumo extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_prestasi_yang_diraih');
    }

    public function index() {
		$tahun ='0000';
		$kecamatan='21';
    	$data['data']=$this->m_prestasi_yang_diraih->tampil_kec_prestasi_yang_diraih($tahun,$kecamatan);
		$data['datax']=$this->m_prestasi_yang_diraih->tampil_tahun($kecamatan);
		$data['dataxs']=$this->m_prestasi_yang_diraih->tampil_ket();
		$data['datakec']=$kecamatan;
        $this->load->view('template/header');
        $this->load->view('kecamatan/kec_prestasi_yang_diraih', $data);
		$this->load->view('template/footer');
    }
	
	public function get() {
		$thn = $this->input->get('tahun');
		$tahun=intval($thn);
		$kecamatan=21;
		$data['data']=$this->m_prestasi_yang_diraih->tampil_kec_prestasi_yang_diraih($tahun,$kecamatan);
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
						$temp[]="<a class=\"btn btn-xs btn-success\" href=\"Kec_prestasi_yang_diraih_poncokusumo/detail_kec_prestasi_yang_diraih/$periode\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>| 
                                 <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$periode\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
						$tabel[]=$temp;
					}
					echo json_encode(array('data' => $tabel));
	}
	public function detail_kec_prestasi_yang_diraih() {
		$tahun = $this->uri->segment(3); 
		$kecamatan=21;
    	$data['data']=$this->m_prestasi_yang_diraih->tampil_detailkec_penduduk_berdasarkan_prestasi($tahun,$kecamatan);
		$data['datax']=$this->m_prestasi_yang_diraih->tampil_tahun($kecamatan);
		$data['dataxs']=$this->m_prestasi_yang_diraih->tampil_ket();
		$data['datakec']=$kecamatan;
        $this->load->view('template/header');
        $this->load->view('kecamatan/detail_kec_prestasi_yang_diraih', $data);
		$this->load->view('template/footer');
    }
	
	public function grafik_kec_banyak_prestasi() {
	  $id = $this->uri->segment(3);
	  $kecamatan=21;
	  $data['datakec']=$kecamatan;
      $data['data']=$this->m_prestasi_yang_diraih->tampil_grafik($id,$kecamatan);
      $this->load->view('template/header');
      $this->load->view('kecamatan/grafik_kec_banyak_prestasi', $data);
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
      $data['data']=$this->m_prestasi_yang_diraih->grafik_perbandingan_kec_banyak_prestasix($tahun2, $tahun1, $kecamatan);
      $data['datax']=$this->m_prestasi_yang_diraih->tahun_crosstab($kecamatan);
      $data['tahun']=$this->m_prestasi_yang_diraih->tampil_periodec($tahun1,$tahun2,$kecamatan);
      $data['jumlah']=$this->m_prestasi_yang_diraih->tampil_jumlahc($tahun1,$tahun2,$kecamatan);
      $data['jumlah1']=$this->m_prestasi_yang_diraih->tampil_jumlahxc($tahun1,$tahun2,$kecamatan);
      $data['keterangan']=$this->m_prestasi_yang_diraih->tampil_keteranganc();
      $this->load->view('template/header');
	  if($datap=="jumlah"){
		if($grafikp=="bar"){
		$this->load->view('kecamatan/grafik_kec_banyak_prestasi_bar_jumlah', $data);
		$this->load->view('template/footer');
		}else if($grafikp=="line"){
		$this->load->view('kecamatan/grafik_kec_banyak_prestasi_line_jumlah', $data);
		$this->load->view('template/footer');
		}
		}else{
		if($grafikp=="bar"){
		$this->load->view('kecamatan/grafik_kec_banyak_prestasi_bar_all', $data);
		$this->load->view('template/footer');
		}else if($grafikp=="line"){
		$this->load->view('kecamatan/grafik_kec_banyak_prestasi_line_all', $data);
		$this->load->view('template/footer');
		}	
		}
	}
	
	public function tampil_crosstab_banyak_prestasi(){
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
	  $kecamatan=$this->input->post('kecamatan');
	  $data['datakec']=$kecamatan;
       if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['data']=$this->m_prestasi_yang_diraih->tahun_crosstab($kecamatan);
      $data['tahun']=$this->m_prestasi_yang_diraih->tampil_periodec($tahun1,$tahun2,$kecamatan);
      $data['jumlah']=$this->m_prestasi_yang_diraih->tampil_jumlahc($tahun1,$tahun2,$kecamatan);
      $data['jumlah1']=$this->m_prestasi_yang_diraih->tampil_jumlahxc($tahun1,$tahun2,$kecamatan);
      $data['keterangan']=$this->m_prestasi_yang_diraih->tampil_keteranganc();
        $this->load->view('template/header');
        $this->load->view('kecamatan/tampil_crosstab_banyak_prestasi', $data);
        $this->load->view('template/footer');
    }
	
   	public function proses_input_kec_prestasi() {
    $jenis = $this->input->post('jenis_kasus');
    $jumlah = $this->input->post('jumlah');
    $tahun = $this->input->post('tahun');
    $status = $this->input->post('status');
    $kecamatan = $this->input->post('kecamatan');
    $penginput = $this->input->post('penginput');
      $i=0;
      foreach ($jenis as $key) {
       $cek = $this->db->query("SELECT * FROM kec_penduduk_berdasarkan_prestasi where prestasi='".$jenis[$i]."' and kecamatan='".$kecamatan[$i]."' and periode='".$tahun[$i]."' and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Kec_prestasi_yang_diraih_poncokusumo','refresh');
           }

           else {

    $jenis = $this->input->post('jenis_kasus');
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
      "prestasi"  => $jenis[$index],
      "jumlah"  => $jumlah[$index],
      "periode"  => $tahun[$index],
      "status"  => $status[$index],
      "penginput"  => $penginput[$index]));

    $index++;
    

      }
               
    
    $test= $this->db->insert_batch('kec_penduduk_berdasarkan_prestasi', $data); // fungsi  untuk menyimpan multi array ke database
    
    
     
            redirect('Kec_prestasi_yang_diraih_poncokusumo');  
           }
      }
      
           


   }
	
	public function proses_input_detailkec_banyak_lapangan_olahraga(){
		$page = $this->uri->segment(3);
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$ket = $this->input->post('ket');
		$unit = $this->input->post('unit');
		$kecamatan = $this->input->post('kecamatan');
		$alamat="poncokusumo";
   		$this->m_prestasi_yang_diraih->simpan_barang($penginput,$kecamatan,$periode,$ket,$unit,$alamat);
		redirect('Kec_banyak_lapangan_olahraga_poncokusumo/detailkec_banyak_lapangan_olahraga/'.$page);   	
	}	
	
	public function proses_edit_kec_prestasi_yang_diraih(){
		$page = $this->uri->segment(3); 
		$id=$this->input->post('id');
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$prestasi = $this->input->post('prestasi');
		$jumlah = $this->input->post('jumlah');
		$test=$this->m_prestasi_yang_diraih->update_kec_banyak_prestasi($id,$penginput,$periode,$prestasi,$jumlah);
		if (!$test) {
			echo "<script>alert('Maaf data salah di inputkan.');</script>";
            redirect('Kec_prestasi_yang_diraih_poncokusumo','refresh');
		}else{
					redirect('Kec_prestasi_yang_diraih_poncokusumo/detail_kec_prestasi_yang_diraih/'.$page);	

		}
	}
	
	public function proses_delete_banyak_prestasi(){
		$id=$this->input->post('id');
		$this->m_prestasi_yang_diraih->delete_kec_banyak_prestasi($id);
		redirect('Kec_prestasi_yang_diraih_poncokusumo');	
	}	
	
	

}
