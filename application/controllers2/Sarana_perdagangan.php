<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class sarana_perdagangan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_sarana_perdagangan');
    }

    public function index() {
        $periode=date('y');
        $tahun =0000;
    	$data['data']=$this->m_sarana_perdagangan->tampil_sarana_perdagangan($tahun);
        $data['datax']=$this->m_sarana_perdagangan->tampil_tahun();
        $data['datas']=$this->m_sarana_perdagangan->tampil_kecamatan();
        $this->load->view('template/header');
        $this->load->view('perdagangan/sarana_perdagangan',$data);
        $this->load->view('template/footer');
    }

     public function get() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_sarana_perdagangan->tampil_sarana_perdagangan($tahun);
        $no=0;
        $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                        $no++;
                        $id = $a['id'];
                        $no=$a['id'];
                        $kecamatan=$a['kecamatan'];
                        $pasar_umum=$a['pasar_umum'];
                        $toko=$a['toko'];
                        $rumah_makan=$a['rumah_makan'];
                        $tahun=$a['tahun'];
                        $penginput=$a['penginput'];
                        $timestamp=$a['timestamp'];
                        $status=$a['status'];
                        $temp[]=$kecamatan;
                        $temp[]=$pasar_umum;
                        $temp[]=$toko;
                        $temp[]=$rumah_makan;
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
      $data['data']=$this->m_sarana_perdagangan->grafik_perbandingan_sarana_perdaganganx($tahun2, $tahun1);
      $this->load->view('template/header');
      if($datap=="all"){
        if($grafikp=="bar"){
        $this->load->view('perdagangan/grafik_perbandingan_sarana_perdagangan_bar_all', $data);
        $this->load->view('template/footer');
        }else if($grafikp=="line"){
        $this->load->view('perdagangan/grafik_perbandingan_sarana_perdagangan_line_all', $data);
        $this->load->view('template/footer');
        }
      }else{
      if($grafikp=="bar"){
        $this->load->view('perdagangan/grafik_perbandingan_sarana_perdagangan_bar', $data);
        $this->load->view('template/footer');
        }else if($grafikp=="line"){
        $this->load->view('perdagangan/grafik_perbandingan_sarana_perdagangan_line', $data);
        $this->load->view('template/footer');
      }
      }
      
    }


    public function tampil_sarana_perdagangan(){

    	$this->load->view('template/header');
        $this->load->view('perdagangan/sarana_perdagangan');
        $this->load->view('template/footer');
    }

        public function tampil_sarana_grafik(){
        $tahunx=$this->input->post('tahunx');
        $data['data']=$this->m_sarana_perdagangan->tampil_sarana_perdagangan($tahunx);
        $this->load->view('template/header');
        $this->load->view('perdagangan/grafik_sarana_perdagangan',$data);
        $this->load->view('template/footer');
    }

        public function tambah_sarana_perdagangan(){
        $data['data']=$this->m_sarana_perdagangan->tampil_kecamatan();
        $this->load->view('template/header');
        $this->load->view('perdagangan/tambah_sarana_perdagangan',$data);
        $this->load->view('template/footer');
    }
    public function proses_tambah_sarana_perdagangan(){
        $kecamatan=$this->input->post('kecamatan');
        $pasar_umum=$this->input->post('pasar_umum');
        $toko=$this->input->post('toko');
        $rumah_makan=$this->input->post('rumah_makan');
        $tahun=$this->input->post('tahun');
        $penginput = $this->input->post('penginput');

        $cek = $this->db->query("SELECT * FROM sarana_perdagangan where kecamatan='$kecamatan' and tahun='$tahun' and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Sarana_perdagangan','refresh');
           }
           else {

         $this->m_sarana_perdagangan->simpan_barang($kecamatan, $pasar_umum, $toko, $rumah_makan, $tahun, $penginput);

        redirect('Sarana_perdagangan');

}
    }

    public function proses_hapus_sarana_perdagangan(){
        $no=$this->input->post('no');

        $this->m_sarana_perdagangan->hapus_sarana_perdagangan($no);
        redirect('Sarana_perdagangan');
    }

    public function proses_edit_sarana_perdagangan(){
        $no=$this->input->post('no');
        $kecamatan=$this->input->post('kecamatan');
        $pasar_umum=$this->input->post('pasar_umum');
        $toko=$this->input->post('toko');
        $rumah_makan=$this->input->post('rumah_makan');
        $tahun=$this->input->post('tahun');
        $penginput = $this->input->post('penginput');
       $this->m_sarana_perdagangan->ubah_sarana_perdagangan($no, $kecamatan, $pasar_umum, $toko, $rumah_makan, $tahun, $penginput);


        redirect('Sarana_perdagangan');
    }
}