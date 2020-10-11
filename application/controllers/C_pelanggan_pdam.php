<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_pelanggan_pdam extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_pelanggan_pdam');
    }

    public function index() {
        $periode=date('y');
        $tahun =0000;
        $data['data']=$this->m_pelanggan_pdam->tampil_pelanggan_pdam($tahun);
        $data['datas']=$this->m_pelanggan_pdam->tampil_kecamatan();
        $data['datax']=$this->m_pelanggan_pdam->tampil_tahun();
        $this->load->view('template/header');
        $this->load->view('energidansda/v_pelanggan_pdam',$data);
        $this->load->view('template/footer');
    }

    public function get() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_pelanggan_pdam->tampil_pelanggan_pdam($tahun);
        $tabel=array();
        foreach ($data['data']->result_array() as $a) {
            $temp = array();
            $id=$a['id'];
            $tahun=$a['tahun'];
            $kecamatan=$a['kecamatan'];
            $jumlah=$a['jumlah'];
            $temp[]=$tahun;
            $temp[]=number_format($jumlah,0,",",".");
            $temp[]="<a class=\"btn btn-xs btn-warning\" href=\"C_pelanggan_pdam/tampil_detail_pelanggan_pdam/$tahun\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span>Detail</a>";
            $tabel[]=$temp;
        }
        echo json_encode(array('data' => $tabel));
    }

    public function tampil_detail_pelanggan_pdam(){
        $page = $this->uri->segment(3); 
        $data['data']=$this->m_pelanggan_pdam->tampil_detail_pelanggan_pdam($page);
        $data['datas']=$this->m_pelanggan_pdam->tampil_kecamatan();
        $data['datax']=$this->m_pelanggan_pdam->tampil_tahun();

        $this->load->view('template/header');
        $this->load->view('energidansda/v_detail_pelanggan_pdam', $data);
        $this->load->view('template/footer');
    }

    public function tambah_data(){
        $kecamatan=$this->input->post('kecamatan');
        $jumlah=$this->input->post('jumlah');
        $tahun=$this->input->post('tahun');
        $penginput=$this->input->post('penginput');
        
        $this->m_pelanggan_pdam->simpan_pelanggan_pdam($kecamatan, $jumlah, $tahun, $penginput);

        redirect('C_pelanggan_pdam');

    }

    public function tambah_detail_pdam(){
        $page=$this->uri->segment(3);
        $kecamatan=$this->input->post('kecamatan');
        $jumlah=$this->input->post('jumlah');
        $tahun=$this->input->post('tahun');
        $penginput=$this->input->post('penginput');
        
        $this->m_pelanggan_pdam->simpan_pelanggan_pdam($kecamatan, $jumlah, $tahun, $penginput);

        redirect('C_pelanggan_pdam/tampil_detail_pelanggan_pdam/'.$page);

    }


    public function ubah_pdam(){
        $page = $this->uri->segment(3);
        
        $id=$this->input->post('id');
        $kecamatan=$this->input->post('kecamatan');
        $jumlah=$this->input->post('jumlah');
        $tahun=$this->input->post('tahun');
        $penginput=$this->input->post('penginput');

        $this->m_pelanggan_pdam->ubah_pelanggan_pdam($id, $kecamatan, $jumlah, $tahun, $penginput);

        redirect('C_pelanggan_pdam/tampil_detail_pelanggan_pdam/'.$page);
    }

    public function proses_hapus_pdam(){
        $page = $this->uri->segment(3); 
        $id=$this->input->post('id');

        $this->m_pelanggan_pdam->proses_hapus_pdam($id);
        redirect('C_pelanggan_pdam/tampil_detail_pelanggan_pdam/'.$page);
    }


    public function tampil_crosstab_pdam(){
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
        if($tahun1>$tahun2){
            list($tahun1, $tahun2) = array($tahun2, $tahun1);
        }
      $data['data']=$this->m_pelanggan_pdam->data_crosstab();
      $data['tahun']=$this->m_pelanggan_pdam->tampil_periodec($tahun1,$tahun2);
      $data['jumlah']=$this->m_pelanggan_pdam->tampil_jumlahc($tahun1,$tahun2);
      $data['bulan']=$this->m_pelanggan_pdam->tampil_bulanc();

        $this->load->view('template/header');
        $this->load->view('energidansda/v_crosstab_pelanggan_pdam', $data);
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
      $data['data']=$this->m_pelanggan_pdam->grafik_perbandingan_pdam($tahun2, $tahun1);
      $this->load->view('template/header');
      if($datap=="all"){
        if($grafikp=="bar"){
            $this->load->view('energidansda/grafik_perbandingan_pdam_bar_all', $data);
            $this->load->view('template/footer');
        }else if($grafikp=="line"){
            $this->load->view('energidansda/grafik_perbandingan_pdam_line_all', $data);
            $this->load->view('template/footer');
        }
      }else{
      if($grafikp=="bar"){
        $this->load->view('energidansda/grafik_perbandingan_pdam_bar', $data);
        $this->load->view('template/footer');
      }else if($grafikp=="line"){
        $this->load->view('energidansda/grafik_perbandingan_pdam_line', $data);
        $this->load->view('template/footer');
      }
      }
    }

        public function tampil_grafik(){
        $page = $this->uri->segment(3);
        $data['data']=$this->m_pelanggan_pdam->tampil_detail_pelanggan_pdam($page);
        $this->load->view('template/header');
        $this->load->view('energidansda/v_grafik_pelanggan_pdam',$data);
        $this->load->view('template/footer');
    }










}
?>