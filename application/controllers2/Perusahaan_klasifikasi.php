<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan_klasifikasi extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_perusahaan_klasifikasi');
    }

    public function index() {
        $periode=date('y');
        $tahun =0000;
    	$data['data']=$this->m_perusahaan_klasifikasi->tampil_perusahaan_klasifikasi($tahun);
        $data['datax']=$this->m_perusahaan_klasifikasi->tampil_tahun();
        $data['datas']=$this->m_perusahaan_klasifikasi->tampil_klasifikasi();
        $this->load->view('template/header');
        $this->load->view('perindustrian/perusahaan_klasifikasi',$data);
        $this->load->view('template/footer');
    }

    public function get() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_perusahaan_klasifikasi->tampil_perusahaan_klasifikasi($tahun);
        $no=0;
        $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                    $no++;
                    $id=$a['id'];
                    $nama_klasifikasi=$a['nama_klasifikasi'];
                    $jumlah_perusahaan=$a['jumlah_perusahaan'];
                    $tahun=$a['tahun'];
                    $penginput=$a['penginput'];
                    $timestamp=$a['timestamp'];
                    $status=$a['status'];
                    $temp[]=$nama_klasifikasi;
                    $temp[]=$jumlah_perusahaan;
                    $temp[]=$tahun;
                       
                        $temp[]="<a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a>   
                                 <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
                        $tabel[]=$temp;
                    }
                    echo json_encode(array('data' => $tabel));
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
       $data['data']=$this->m_perusahaan_klasifikasi->tahun_crosstab();
      $data['tahun']=$this->m_perusahaan_klasifikasi->tampil_periodec($tahun1,$tahun2);
      $data['jumlah']=$this->m_perusahaan_klasifikasi->tampil_jumlahc($tahun1,$tahun2);
      $data['nama_klasifikasi']=$this->m_perusahaan_klasifikasi->tampil_klasifikasic();
      $this->load->view('template/header');
      if($datap=="1"){
      if($grafikp=="bar"){
        $this->load->view('perindustrian/grafik_perbandingan_perusahaan_klasifikasi_bar', $data);
        $this->load->view('template/footer');
        }else if($grafikp=="line"){
        $this->load->view('perindustrian/grafik_perbandingan_perusahaan_klasifikasi_line', $data);
        $this->load->view('template/footer');
      }
      }
      
    }

    public function tampil_grafik_perusahaan_klasifikasi(){
        $tahunx=$this->input->post('tahunx');
        $data['data']=$this->m_perusahaan_klasifikasi->tampil_perusahaan_klasifikasi($tahunx);
        $this->load->view('template/header');
        $this->load->view('perindustrian/grafik_perusahaan_klasifikasi',$data);
        $this->load->view('template/footer');

    }


    public function tampil_crosstab_perusahaan_klasifikasi(){
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
       if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['data']=$this->m_perusahaan_klasifikasi->tahun_crosstab();
      $data['tahun']=$this->m_perusahaan_klasifikasi->tampil_periodec($tahun1,$tahun2);
      $data['jumlah']=$this->m_perusahaan_klasifikasi->tampil_jumlahc($tahun1,$tahun2);
      $data['nama_klasifikasi']=$this->m_perusahaan_klasifikasi->tampil_klasifikasic();

        $this->load->view('template/header');
        $this->load->view('perindustrian/tampil_crosstab_perusahaan_klasifikasi', $data);
        $this->load->view('template/footer');

    }

    public function tampil_grafik_industri_rumah_tangga_2(){
        $tahuny=$this->input->post('tahuny');
        $data['data']=$this->m_perusahaan_klasifikasi->tampil_industri_rumah_tangga($tahuny);
        $this->load->view('template/header');
        $this->load->view('perindustrian/grafik_industri_rumah_tangga_2',$data);
        $this->load->view('template/footer');
    }

     public function tampil_klasifikasi(){
        $this->load->view('template/header');
        $this->load->view('perindustrian/perusahaan_klasifikasi',$dataklasifikasi);
        $this->load->view('template/footer');
    }


    public function proses_tambah_perusahaan_klasifikasi(){
        $nama_klasifikasi=$this->input->post('nama_klasifikasi');
        $jumlah_perusahaan=$this->input->post('jumlah_perusahaan');
        $tahun=$this->input->post('tahun');
        $penginput=$this->input->post('penginput');

              $cek = $this->db->query("SELECT * FROM perusahaan_klasifikasi where nama_klasifikasi='$nama_klasifikasi' and tahun='$tahun' and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Perusahaan_klasifikasi','refresh');
           }
           else {

        $this->m_perusahaan_klasifikasi->simpan_perusahaan_klasifikasi($nama_klasifikasi, $jumlah_perusahaan, $tahun, $penginput);

        redirect('Perusahaan_klasifikasi');

    }
      }


    public function proses_hapus_perusahaan_klasifikasi(){
        $no=$this->input->post('no');

        $this->m_perusahaan_klasifikasi->hapus_perusahaan_klasifikasi($no);
        redirect('Perusahaan_klasifikasi');
    }

    public function proses_edit_perusahaan_klasifikasi(){
        $no=$this->input->post('no');
        $nama_klasifikasi=$this->input->post('nama_klasifikasi');
        $jumlah_perusahaan=$this->input->post('jumlah_perusahaan');
        $tahun=$this->input->post('tahun');
        $penginput=$this->input->post('penginput');

       $this->m_perusahaan_klasifikasi->ubah_perusahaan_klasifikasi($no, $nama_klasifikasi, $jumlah_perusahaan, $tahun, $penginput);

        redirect('Perusahaan_klasifikasi');
    }
}