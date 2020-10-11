<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_vaksinasi_avian extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_vaksinasi_avian');
    }

    public function index() {
        $periode=date('y');
        $tahun =0000;
        $data['data']=$this->m_vaksinasi_avian->tampil_vaksinasi($tahun);
        $data['datas']=$this->m_vaksinasi_avian->tampil_kecamatan();
        $data['datax']=$this->m_vaksinasi_avian->tampil_tahun();
        $data['datam']=$this->m_vaksinasi_avian->master_hewan_ternak();
        $data['kecam']=$this->m_vaksinasi_avian->tampil_kecam();
        $this->load->view('template/header');
        $this->load->view('pertanian/v_vaksinasi_avian',$data);
        $this->load->view('template/footer');
    }

    public function get() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_vaksinasi_avian->tampil_vaksinasi($tahun);
        $tabel=array();
        foreach ($data['data']->result_array() as $a) {
            $temp = array();
            $id=$a['id'];
            $tahun=$a['tahun'];
            $kecamatan=$a['kecamatan'];
            $jumlah=$a['jumlah'];
            $temp[]=$kecamatan;
            $temp[]=number_format($jumlah,0,",",".");
            $temp[]=$tahun;
            $temp[]="<a class=\"btn btn-xs btn-warning\" href=\"C_vaksinasi_avian/tampil_detail_vaksinasi/$tahun/$kecamatan\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span>Detail</a>";
            $tabel[]=$temp;
        }
        echo json_encode(array('data' => $tabel));
    }

    public function tampil_detail_vaksinasi(){
        $page = $this->uri->segment(3); 
        $kcmtn = $this->uri->segment(4); 
        $data['data']=$this->m_vaksinasi_avian->tampil_detail_vaksinasi($page, $kcmtn);
        $data['datas']=$this->m_vaksinasi_avian->tampil_kecamatan();
        $data['datax']=$this->m_vaksinasi_avian->tampil_tahun();
        $data['datam']=$this->m_vaksinasi_avian->master_hewan_ternak();

        $this->load->view('template/header');
        $this->load->view('pertanian/v_detail_vaksinasi_avian', $data);
        $this->load->view('template/footer');
    }

    public function tambah_vaksinasi(){
        $kecamatan=$this->input->post('kecamatan');
        $nama_ternak=$this->input->post('nama_ternak');
        $jumlah=$this->input->post('jumlah');
        $tahun=$this->input->post('tahun');
        $penginput=$this->input->post('penginput');
        
        $this->m_vaksinasi_avian->simpan_vaksinasi($kecamatan, $nama_ternak, $jumlah, $tahun, $penginput);

        redirect('C_vaksinasi_avian');

    }

    public function tambah_detail_vaksinasi(){
    	$page=$this->uri->segment(3);
        $kcmtn = $this->uri->segment(4); 
        $kecamatan=$this->input->post('kecamatan');
        $nama_ternak=$this->input->post('nama_ternak');
        $jumlah=$this->input->post('jumlah');
        $tahun=$this->input->post('tahun');
        $penginput=$this->input->post('penginput');
        
        $this->m_vaksinasi_avian->simpan_vaksinasi($kecamatan, $nama_ternak, $jumlah, $tahun, $penginput);

        redirect('C_vaksinasi_avian/tampil_detail_vaksinasi/'.$page.'/'.$kcmtn);

    }

    public function ubah_vaksinasi(){
        $page = $this->uri->segment(3);
        $kcmtn = $this->uri->segment(4);  
        
        $id=$this->input->post('id');
        $kecamatan=$this->input->post('kecamatan');
        $nama_ternak=$this->input->post('nama_ternak');
        $jumlah=$this->input->post('jumlah');
        $tahun=$this->input->post('tahun');
        $penginput=$this->input->post('penginput');

        $this->m_vaksinasi_avian->ubah_vaksinasi($id, $kecamatan, $nama_ternak, $jumlah, $tahun, $penginput);

        redirect('C_vaksinasi_avian/tampil_detail_vaksinasi/'.$page.'/'.$kcmtn);
    }

    public function proses_hapus_vaksinasi(){
        $page = $this->uri->segment(3); 
        $kcmtn = $this->uri->segment(4); 
        $id=$this->input->post('id');

        $this->m_vaksinasi_avian->proses_hapus_vaksinasi($id);
        redirect('C_vaksinasi_avian/tampil_detail_vaksinasi/'.$page.'/'.$kcmtn);
    }


    public function tampil_crosstab_vaksinasi(){
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
      $kecam = $this->input->post('kecam');
        if($tahun1>$tahun2){
            list($tahun1, $tahun2) = array($tahun2, $tahun1);
        }
      $data['data']=$this->m_vaksinasi_avian->data_crosstab($kecam);
      $data['tahun']=$this->m_vaksinasi_avian->tampil_periodec($tahun1,$tahun2,$kecam);
      $data['jumlah']=$this->m_vaksinasi_avian->tampil_jumlahc($tahun1,$tahun2,$kecam);
      $data['bulan']=$this->m_vaksinasi_avian->tampil_bulanc($kecam);
      $data['kecam']=$this->m_vaksinasi_avian->tampil_kecam();

        $this->load->view('template/header');
        $this->load->view('pertanian/v_crosstab_vaksinasi_avian', $data);
        $this->load->view('template/footer');
    }










}
?>