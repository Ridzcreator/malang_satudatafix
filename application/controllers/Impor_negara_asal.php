<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Impor_negara_asal extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_ekspor_impor_negara');
    }

    public function index() {
        $periode=date('y');
        $tahun =0000;
        $data['data']=$this->m_ekspor_impor_negara->tampil_impor_negara($tahun);
        $data['datax']=$this->m_ekspor_impor_negara->tampil_tahun_impor();
        $data['datas']=$this->m_ekspor_impor_negara->tampil_negara();
        $this->load->view('template/header');
        $this->load->view('perdagangan/impor_negara_asal',$data);
        $this->load->view('template/footer');
    }

    public function get2() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_ekspor_impor_negara->tampil_impor_negara($tahun);
        $no=0;
        $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                        $no++;
                        $id = $a['id'];
                        $negara=$a['nama_negara_ekspor_impor'];
                        $volum=$a['volume_ekspor_impor'];
                        $nilai=$a['nilai_ekspor_impor'];
                        $tahun=$a['tahun'];
                        $penginput=$a['penginput'];
                        $timestamp=$a['timestamp'];
                        $status=$a['status'];
                        $kategori=$a['kategori'];
                        $temp[]=$negara;
                        $temp[]=number_format($volum,2,".",",");
                        $temp[]=number_format($nilai,2,".",",");
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
      $data['data']=$this->m_ekspor_impor_negara->grafik_perbandingan_impor_asalx($tahun2, $tahun1);
      $this->load->view('template/header');
      if($datap=="all"){
        if($grafikp=="bar"){
        $this->load->view('perdagangan/grafik_perbandingan_impor_asal_bar_all', $data);
        $this->load->view('template/footer');
        }else if($grafikp=="line"){
        $this->load->view('perdagangan/grafik_perbandingan_impor_asal_line_all', $data);
        $this->load->view('template/footer');
        }
      }else{
      if($grafikp=="bar"){
        $this->load->view('perdagangan/grafik_perbandingan_impor_asal_bar', $data);
        $this->load->view('template/footer');
        }else if($grafikp=="line"){
        $this->load->view('perdagangan/grafik_perbandingan_impor_asal_line', $data);
        $this->load->view('template/footer');
      }
      }
      
    }

    public function tampil_grafik_negara_asal(){
        $tahunx=$this->input->post('tahunx');
        $data['data']=$this->m_ekspor_impor_negara->tampil_impor_negara($tahunx);
        $this->load->view('template/header');
        $this->load->view('perdagangan/grafik_impor_negara_asal',$data);
        $this->load->view('template/footer');
    }

     public function tampil_negara(){
        $this->load->view('template/header');
        $this->load->view('perdagangan/impor_negara_asal');
        $this->load->view('template/footer');
    }

    public function proses_tambah_ekspor_impor_negara(){
        $negara=$this->input->post('nama_negara_ekspor_impor');
        $volum=$this->input->post('volume_ekspor_impor');
        $nilai=$this->input->post('nilai_ekspor_impor');

        $tahun=$this->input->post('tahun');
        $penginput=$this->input->post('penginput');
        $kategori=$this->input->post('kategori');

         $cek = $this->db->query("SELECT * FROM ekspor_impor_negara_tujuan_asal where nama_negara_ekspor_impor='$negara' and kategori='Impor Menurut Negara Asal' and tahun='$tahun' and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Impor_negara_asal','refresh');
           }
           else {

        $this->m_ekspor_impor_negara->simpan_ekspor_impor_negara($negara, $volum, $nilai, $tahun, $penginput, $kategori);

        redirect('Impor_negara_asal');

    }
}


    public function proses_hapus_ekspor_impor_negara(){
        $no=$this->input->post('no');

        $this->m_ekspor_impor_negara->hapus_ekspor_impor_negara($no);
        redirect('Impor_negara_asal');
    }

    public function proses_edit_ekspor_impor_negara(){
        $no=$this->input->post('no');
        $negara=$this->input->post('nama_negara_ekspor_impor');
        $volum=$this->input->post('volume_ekspor_impor');
        $nilai=$this->input->post('nilai_ekspor_impor');

        $tahun=$this->input->post('tahun');
        $penginput=$this->input->post('penginput');
        $kategori=$this->input->post('kategori');

       $this->m_ekspor_impor_negara->ubah_ekspor_impor_negara($no, $negara, $volum, $nilai, $tahun, $penginput, $kategori);

        redirect('Impor_negara_asal');
    }
}