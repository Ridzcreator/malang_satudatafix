<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Industri_kecil extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_industri_kecil_rumah_tangga');
    }

    public function index() {
        $periode=date('y');
        $tahun =0000;
    	$data['data']=$this->m_industri_kecil_rumah_tangga->tampil_industri_kecil($tahun);
        $data['datax']=$this->m_industri_kecil_rumah_tangga->tampil_tahun_kecil();
        $data['datas']=$this->m_industri_kecil_rumah_tangga->tampil_industri();
        $this->load->view('template/header');
        $this->load->view('perindustrian/industri_kecil',$data);
        $this->load->view('template/footer');
    }

    public function get() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_industri_kecil_rumah_tangga->tampil_industri_kecil($tahun);
        $no=0;
        $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                    $no++;
                    $id=$a['id'];
                    $jenis=$a['jenis_industri'];
                    $j_unit=$a['jumlah_unit_produksi'];
                    $j_tenaga=$a['jumlah_tenaga_kerja'];
                    $j_produksi=$a['jumlah_produksi'];
                    $nilai_produksi=$a['nilai_produksi'];
                    $tahun=$a['tahun'];
                    $penginput=$a['penginput'];
                    $timestamp=$a['timestamp'];
                    $status=$a['status'];
                    $kategori=$a['kategori'];
                    $temp[]=$jenis;
                    $temp[]=$j_unit;
                    $temp[]=$j_tenaga;
                    $temp[]=$j_produksi;
                    $temp[]=number_format($nilai_produksi,2,".",",");
                    $temp[]=$tahun;
                       
                        $temp[]="<a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a>   
                                 <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
                        $tabel[]=$temp;
                    }
                    echo json_encode(array('data' => $tabel));
    }

    public function tampil_grafik_industri_kecil(){
        $tahunx=$this->input->post('tahunx');
        $data['data']=$this->m_industri_kecil_rumah_tangga->tampil_industri_kecil($tahunx);
        $this->load->view('template/header');
        $this->load->view('perindustrian/grafik_industri_kecil',$data);
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
      $data['data']=$this->m_industri_kecil_rumah_tangga->grafik_perbandingan_industri_kecilx($tahun2, $tahun1);
      $this->load->view('template/header');
      if($datap=="all"){
        if($grafikp=="bar"){
        $this->load->view('perindustrian/grafik_perbandingan_industri_kecil_bar_all', $data);
        $this->load->view('template/footer');
        }else if($grafikp=="line"){
        $this->load->view('perindustrian/grafik_perbandingan_industri_kecil_line_all', $data);
        $this->load->view('template/footer');
        }
      }else{
      if($grafikp=="bar"){
        $this->load->view('perindustrian/grafik_perbandingan_industri_kecil_bar', $data);
        $this->load->view('template/footer');
        }else if($grafikp=="line"){
        $this->load->view('perindustrian/grafik_perbandingan_industri_kecil_line', $data);
        $this->load->view('template/footer');
      }
      }
      
    }


    public function tampil_industri(){
        $this->load->view('template/header');
        $this->load->view('perindustrian/industri_kecil',$dataindustri);
        $this->load->view('template/footer');
    }


    public function proses_tambah_industri_kecil(){
        $jenis=$this->input->post('jenis_industri');
        $j_unit=$this->input->post('jumlah_unit_produksi');
        $j_tenaga=$this->input->post('jumlah_tenaga_kerja');

        $j_produksi=$this->input->post('jumlah_produksi');
        $nilai_produksi=$this->input->post('nilai_produksi');
        $tahun=$this->input->post('tahun');
        $penginput=$this->input->post('penginput');
        $kategori=$this->input->post('kategori');

        $cek = $this->db->query("SELECT * FROM industri_kecil_rumah_tangga where jenis_industri='$jenis' and tahun='$tahun' and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Industri_kecil','refresh');
           }
           else {

        $this->m_industri_kecil_rumah_tangga->simpan_industri_kecil($jenis, $j_unit, $j_tenaga, $j_produksi, $nilai_produksi , $tahun , $penginput, $kategori);

        redirect('Industri_kecil');
}
    }


    public function proses_hapus_industri_kecil(){
        $no=$this->input->post('no');

        $this->m_industri_kecil_rumah_tangga->hapus_industri_kecil_rumah_tangga($no);
        redirect('Industri_kecil');
    }

    public function proses_edit_industri_kecil(){
        $no=$this->input->post('no');
        $jenis=$this->input->post('jenis_industri');
        $j_unit=$this->input->post('jumlah_unit_produksi');
        $j_tenaga=$this->input->post('jumlah_tenaga_kerja');

        $j_produksi=$this->input->post('jumlah_produksi');
        $nilai_produksi=$this->input->post('nilai_produksi');
        $tahun=$this->input->post('tahun');
        $penginput=$this->input->post('penginput');
        $kategori=$this->input->post('kategori');

       $this->m_industri_kecil_rumah_tangga->ubah_industri_kecil($no, $jenis, $j_unit, $j_tenaga, $j_produksi, $nilai_produksi , $tahun , $penginput, $kategori);

        redirect('Industri_kecil');
    }
}