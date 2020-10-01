<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Investasi_pmdn extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_investasi_pmdn');
    }

    public function index() {
        $periode=date('y');
        $tahun =0000;
    	$data['data']=$this->m_investasi_pmdn->tampil_investasi_pmdn($tahun);
        $data['datax']=$this->m_investasi_pmdn->tampil_tahun();
        $data['datas']=$this->m_investasi_pmdn->tampil_bidang_usaha();
        $this->load->view('template/header');
        $this->load->view('perindustrian/investasi_pmdn',$data);
        $this->load->view('template/footer');
    }

    public function get() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_investasi_pmdn->tampil_investasi_pmdn($tahun);
        $no=0;
        $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                    $no++;
                    $id=$a['id'];
                    $nama_bidang=$a['nama_bidang'];
                    $unit_usaha=$a['unit_usaha'];
                    $realisasi_investasi=$a['realisasi_investasi'];
                    $tenaga_kerja_indonesia=$a['tenaga_kerja_indonesia'];
                    $sumber_data=$a['sumber_data'];
                    $tahun=$a['tahun'];
                    $penginput=$a['penginput'];
                    $timestamp=$a['timestamp'];
                    $status=$a['status'];
                    $temp[]=$nama_bidang;
                    $temp[]=$unit_usaha;
                    $temp[]=number_format($realisasi_investasi,2,".",",");
                    $temp[]=$tenaga_kerja_indonesia;
                    $temp[]=$sumber_data;  
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
      $data['data']=$this->m_investasi_pmdn->grafik_perbandingan_investasi_pmdnx($tahun2, $tahun1);
      $this->load->view('template/header');
      if($datap=="all"){
        if($grafikp=="bar"){
        $this->load->view('perindustrian/grafik_perbandingan_investasi_pmdn_bar_all', $data);
        $this->load->view('template/footer');
        }else if($grafikp=="line"){
        $this->load->view('perindustrian/grafik_perbandingan_investasi_pmdn_line_all', $data);
        $this->load->view('template/footer');
        }
      }else{
      if($grafikp=="bar"){
        $this->load->view('perindustrian/grafik_perbandingan_investasi_pmdn_bar', $data);
        $this->load->view('template/footer');
        }else if($grafikp=="line"){
        $this->load->view('perindustrian/grafik_perbandingan_investasi_pmdn_line', $data);
        $this->load->view('template/footer');
      }
      }
      
    }

     public function tampil_grafik_investasi_pmdn(){
        $tahunx=$this->input->post('tahunx');
        $data['data']=$this->m_investasi_pmdn->tampil_investasi_pmdn($tahunx);
        $this->load->view('template/header');
        $this->load->view('perindustrian/grafik_investasi_pmdn',$data);
        $this->load->view('template/footer');
    }


    public function tampil_bidang_usaha(){
        $this->load->view('template/header');
        $this->load->view('perindustrian/investasi_pmdn',$databidang);
        $this->load->view('template/footer');
    }


    public function proses_tambah_investasi_pmdn(){
        $nama_bidang=$this->input->post('nama_bidang');
        $unit_usaha=$this->input->post('unit_usaha');
        $realisasi_investasi=$this->input->post('realisasi_investasi');
        $tenaga_kerja_indonesia=$this->input->post('tenaga_kerja_indonesia');
        $sumber_data=$this->input->post('sumber_data');
        $tahun=$this->input->post('tahun');
        $penginput=$this->input->post('penginput');

              $cek = $this->db->query("SELECT * FROM investasi_pmdn where nama_bidang='$nama_bidang' and tahun='$tahun' and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Investasi_pmdn','refresh');
           }
           else {

        $this->m_investasi_pmdn->simpan_investasi_pmdn($nama_bidang, $unit_usaha, $realisasi_investasi, $tenaga_kerja_indonesia, $sumber_data , $tahun , $penginput);

        redirect('Investasi_pmdn');

    }
        }


    public function proses_hapus_investasi_pmdn(){
        $no=$this->input->post('no');

        $this->m_investasi_pmdn->hapus_investasi_pmdn($no);
        redirect('Investasi_pmdn');
    }

    public function proses_edit_investasi_pmdn(){
        $no=$this->input->post('no');
        $nama_bidang=$this->input->post('nama_bidang');
        $unit_usaha=$this->input->post('unit_usaha');
        $realisasi_investasi=$this->input->post('realisasi_investasi');
        $tenaga_kerja_indonesia=$this->input->post('tenaga_kerja_indonesia');
        $sumber_data=$this->input->post('sumber_data');
        $tahun=$this->input->post('tahun');
        $penginput=$this->input->post('penginput');

       $this->m_investasi_pmdn->ubah_investasi_pmdn($no, $nama_bidang, $unit_usaha, $realisasi_investasi, $tenaga_kerja_indonesia, $sumber_data , $tahun , $penginput);

        redirect('Investasi_pmdn');
    }
}