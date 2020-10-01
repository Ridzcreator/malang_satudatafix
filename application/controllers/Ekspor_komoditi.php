<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ekspor_komoditi extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_ekspor_komoditi');
    }

    public function index() {
        $periode=date('y');
        $tahun =0000;
    	$data['data']=$this->m_ekspor_komoditi->tampil_ekspor_komoditi($tahun);
        $data['datax']=$this->m_ekspor_komoditi->tampil_tahun();
        $this->load->view('template/header');
        $this->load->view('perdagangan/ekspor_komoditi',$data);
        $this->load->view('template/footer');
    }

    public function get() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_ekspor_komoditi->tampil_ekspor_komoditi($tahun);
        $no=0;
        $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                        $no++;
                        $id = $a['id'];
                        $jenis=$a['jenis_komoditi'];
                        $volum=$a['volume_ekspor'];
                        $nilai=$a['nilai_ekspor'];
                        $tahun=$a['tahun'];
                        $temp[]=$jenis;
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
      $data['data']=$this->m_ekspor_komoditi->grafik_perbandingan_ekspor_komoditix($tahun2, $tahun1);
      $this->load->view('template/header');
      if($datap=="all"){
        if($grafikp=="bar"){
        $this->load->view('perdagangan/grafik_perbandingan_ekspor_komoditi_bar_all', $data);
        $this->load->view('template/footer');
        }else if($grafikp=="line"){
        $this->load->view('perdagangan/grafik_perbandingan_ekspor_komoditi_line_all', $data);
        $this->load->view('template/footer');
        }
      }else{
      if($grafikp=="bar"){
        $this->load->view('perdagangan/grafik_perbandingan_ekspor_komoditi_bar', $data);
        $this->load->view('template/footer');
        }else if($grafikp=="line"){
        $this->load->view('perdagangan/grafik_perbandingan_ekspor_komoditi_line', $data);
        $this->load->view('template/footer');
      }
      }
      
    }


    public function tampil_grafik_ekspor_komoditi(){
        $tahunx=$this->input->post('tahunx');
        $data['data']=$this->m_ekspor_komoditi->tampil_ekspor_komoditi($tahunx);
        $this->load->view('template/header');
        $this->load->view('perdagangan/grafik_ekspor_komoditi',$data);
        $this->load->view('template/footer');

    }

    public function proses_tambah_ekspor_komoditi(){
        $jenis=$this->input->post('jenis_komoditi');
        $volum=$this->input->post('volume_ekspor');
        $nilai=$this->input->post('nilai_ekspor');

        $tahun=$this->input->post('tahun');
        $penginput = $this->input->post('penginput');

        $cek = $this->db->query("SELECT * FROM ekspor_komoditi where jenis_komoditi='$jenis' and tahun='$tahun' and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Ekspor_komoditi','refresh');
           }
           else {

        $this->m_ekspor_komoditi->simpan_ekspor_komoditi($jenis, $volum, $nilai, $tahun, $penginput);

        redirect('Ekspor_komoditi');
}
    }


    public function proses_hapus_ekspor_komoditi(){
        $no=$this->input->post('no');

        $this->m_ekspor_komoditi->hapus_ekspor_komoditi($no);
        redirect('Ekspor_komoditi');
    }

    public function proses_edit_ekspor_komoditi(){
        $no=$this->input->post('no');
        $jenis=$this->input->post('jenis_komoditi');
        $volum=$this->input->post('volume_ekspor');
        $nilai=$this->input->post('nilai_ekspor');

        $tahun=$this->input->post('tahun');
        $penginput = $this->input->post('penginput');

       $this->m_ekspor_komoditi->ubah_ekspor_komoditi($no, $jenis, $volum, $nilai, $tahun, $penginput);

        redirect('Ekspor_komoditi');
    }
}