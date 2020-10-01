<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_pencemaran extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_lokasi_pencemaran');
    }

    public function index() {
        $periode=date('y');
        $tahun =0000;
    	$data['data']=$this->m_lokasi_pencemaran->tampil_lokasi_pencemaran($tahun);
        $data['datax']=$this->m_lokasi_pencemaran->tampil_tahun();
        $this->load->view('template/header');
        $this->load->view('lingkunganhidup/lokasi_pencemaran',$data);
        $this->load->view('template/footer');
    }

    public function get() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_lokasi_pencemaran->tampil_lokasi_pencemaran($tahun);
        $no=0;
        $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                        $no++;
                        $id = $a['id'];
                        $tingkat_pencemaran=$a['tingkat_pencemaran'];
                        $jumlah_pencemaran_tanah=$a['jumlah_pencemaran_tanah'];
                        $jumlah_pencemaran_air=$a['jumlah_pencemaran_air'];
                        $jumlah_pencemaran_udara=$a['jumlah_pencemaran_udara'];
                        $jumlah=$a['jumlah'];
                        $tahun=$a['tahun'];
                        $penginput=$a['penginput'];
                        $timestamp=$a['timestamp'];
                        $status=$a['status'];

                        $temp[]=$no;
                        $temp[]=$tingkat_pencemaran;
                        $temp[]=$jumlah_pencemaran_tanah;
                        $temp[]=$jumlah_pencemaran_air;
                        $temp[]=$jumlah_pencemaran_udara;
                        $temp[]=$jumlah;
                        $temp[]=$tahun;
                        $temp[]="<a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a>   
                                 <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
                        $tabel[]=$temp;
                    }
                    echo json_encode(array('data' => $tabel));
    }

    public function tampil_lokasi_pencemaran(){
        $tahunx=$this->input->post('tahunx');
        $data['data']=$this->m_lokasi_pencemaran->tampil_lokasi_pencemaran($tahunx);
        $this->load->view('template/header');
        $this->load->view('lingkunganhidup/grafik_lokasi_pencemaran',$data);
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
      $data['data']=$this->m_lokasi_pencemaran->grafik_perbandingan_lokasi_pencemaranx($tahun2, $tahun1);
      $this->load->view('template/header');
      if($datap=="all"){
        if($grafikp=="bar"){
        $this->load->view('lingkunganhidup/grafik_perbandingan_lokasi_pencemaran_bar_all', $data);
        $this->load->view('template/footer');
        }else if($grafikp=="line"){
        $this->load->view('lingkunganhidup/grafik_perbandingan_lokasi_pencemaran_line_all', $data);
        $this->load->view('template/footer');
        }
      }else{
      if($grafikp=="bar"){
        $this->load->view('lingkunganhidup/grafik_perbandingan_lokasi_pencemaran_bar', $data);
        $this->load->view('template/footer');
        }else if($grafikp=="line"){
        $this->load->view('lingkunganhidup/grafik_perbandingan_lokasi_pencemaran_line', $data);
        $this->load->view('template/footer');
      }
      }
      
    }


    public function proses_tambah_lokasi_pencemaran(){
        $tingkat_pencemaran=$this->input->post('tingkat_pencemaran');
        $jumlah_pencemaran_tanah=$this->input->post('jumlah_pencemaran_tanah');
        $jumlah_pencemaran_air=$this->input->post('jumlah_pencemaran_air');
        $jumlah_pencemaran_udara=$this->input->post('jumlah_pencemaran_udara');
        $tahun=$this->input->post('tahun');
        $penginput = $this->input->post('penginput');
        $cek = $this->db->query("SELECT * FROM lokasi_pencemaran where tingkat_pencemaran='$tingkat_pencemaran' and tahun='$tahun'  and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Lokasi_pencemaran','refresh');
           }
           else {

        $this->m_lokasi_pencemaran->simpan_barang($tingkat_pencemaran, $jumlah_pencemaran_tanah, $jumlah_pencemaran_air, $jumlah_pencemaran_udara, $tahun, $penginput);

        redirect('Lokasi_pencemaran');

    }
}


    public function proses_hapus_lokasi_pencemaran(){
        $no=$this->input->post('no');

        $this->m_lokasi_pencemaran->hapus_lokasi_pencemaran($no);
        redirect('Lokasi_pencemaran');
    }

    public function proses_edit_lokasi_pencemaran(){
        $no=$this->input->post('no');
        $tingkat_pencemaran=$this->input->post('tingkat_pencemaran');
        $jumlah_pencemaran_tanah=$this->input->post('jumlah_pencemaran_tanah');
        $jumlah_pencemaran_air=$this->input->post('jumlah_pencemaran_air');
        $jumlah_pencemaran_udara=$this->input->post('jumlah_pencemaran_udara');
        $tahun=$this->input->post('tahun');
        $penginput = $this->input->post('penginput');

       $this->m_lokasi_pencemaran->ubah_lokasi_pencemaran($no, $tingkat_pencemaran, $jumlah_pencemaran_tanah, $jumlah_pencemaran_air, $jumlah_pencemaran_udara, $tahun, $penginput);

        redirect('Lokasi_pencemaran');
    }
}