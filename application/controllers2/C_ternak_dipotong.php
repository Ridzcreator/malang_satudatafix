<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_ternak_dipotong extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_ternak_dipotong');
    }

    public function index() {
        $periode=date('y');
        $tahun =0000;
        $data['data']=$this->m_ternak_dipotong->tampil_ternak_dipotong($tahun);
        $data['datas']=$this->m_ternak_dipotong->tampil_kecamatan();
        $data['datax']=$this->m_ternak_dipotong->tampil_tahun();
        $data['datam']=$this->m_ternak_dipotong->master_hewan_ternak();
        $data['kecam']=$this->m_ternak_dipotong->tampil_kecam();
        $this->load->view('template/header');
        $this->load->view('pertanian/v_ternak_dipotong',$data);
        $this->load->view('template/footer');
    }

    public function get() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_ternak_dipotong->tampil_ternak_dipotong($tahun);
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
            $temp[]="<a class=\"btn btn-xs btn-warning\" href=\"C_ternak_dipotong/tampil_detail_ternak_dipotong/$tahun/$kecamatan\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span>Detail</a>";
            $tabel[]=$temp;
        }
        echo json_encode(array('data' => $tabel));
    }

    public function tampil_detail_ternak_dipotong(){
        $page = $this->uri->segment(3); 
        $kcmtn = $this->uri->segment(4); 
        $data['data']=$this->m_ternak_dipotong->tampil_detail_ternak_dipotong($page, $kcmtn);
        $data['datas']=$this->m_ternak_dipotong->tampil_kecamatan();
        $data['datax']=$this->m_ternak_dipotong->tampil_tahun();
        $data['datam']=$this->m_ternak_dipotong->master_hewan_ternak();

        $this->load->view('template/header');
        $this->load->view('pertanian/v_detail_ternak_dipotong', $data);
        $this->load->view('template/footer');
    }

    public function tambah_ternak_dipotong(){
        $kecamatan=$this->input->post('kecamatan');
        $nama_ternak=$this->input->post('nama_ternak');
        $jumlah=$this->input->post('jumlah');
        $tahun=$this->input->post('tahun');
        $penginput=$this->input->post('penginput');
        
        $this->m_ternak_dipotong->simpan_ternak_dipotong($kecamatan, $nama_ternak, $jumlah, $tahun, $penginput);

        redirect('C_ternak_dipotong');

    }

    public function tambah_detail_ternak_dipotong(){
    	$page=$this->uri->segment(3);
        $kcmtn = $this->uri->segment(4); 
        $kecamatan=$this->input->post('kecamatan');
        $nama_ternak=$this->input->post('nama_ternak');
        $jumlah=$this->input->post('jumlah');
        $tahun=$this->input->post('tahun');
        $penginput=$this->input->post('penginput');
        
        $this->m_ternak_dipotong->simpan_ternak_dipotong($kecamatan, $nama_ternak, $jumlah, $tahun, $penginput);

        redirect('C_ternak_dipotong/tampil_detail_ternak_dipotong/'.$page.'/'.$kcmtn);

    }

    public function ubah_ternak_dipotong(){
        $page = $this->uri->segment(3);
        $kcmtn = $this->uri->segment(4);  
        
        $id=$this->input->post('id');
        $kecamatan=$this->input->post('kecamatan');
        $nama_ternak=$this->input->post('nama_ternak');
        $jumlah=$this->input->post('jumlah');
        $tahun=$this->input->post('tahun');
        $penginput=$this->input->post('penginput');

        $this->m_ternak_dipotong->ubah_ternak_dipotong($id, $kecamatan, $nama_ternak, $jumlah, $tahun, $penginput);

        redirect('C_ternak_dipotong/tampil_detail_ternak_dipotong/'.$page.'/'.$kcmtn);
    }

    public function proses_hapus_ternak_dipotong(){
        $page = $this->uri->segment(3); 
        $kcmtn = $this->uri->segment(4); 
        $id=$this->input->post('id');

        $this->m_ternak_dipotong->proses_hapus_ternak_dipotong($id);
        redirect('C_ternak_dipotong/tampil_detail_ternak_dipotong/'.$page.'/'.$kcmtn);
    }

    public function tampil_crosstab_ternak(){
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
      $kecam = $this->input->post('kecam');
        if($tahun1>$tahun2){
            list($tahun1, $tahun2) = array($tahun2, $tahun1);
        }
      $data['data']=$this->m_ternak_dipotong->data_crosstab($kecam);
      $data['tahun']=$this->m_ternak_dipotong->tampil_periodec($tahun1,$tahun2,$kecam);
      $data['jumlah']=$this->m_ternak_dipotong->tampil_jumlahc($tahun1,$tahun2,$kecam);
      $data['bulan']=$this->m_ternak_dipotong->tampil_bulanc($kecam);
      $data['kecam']=$this->m_ternak_dipotong->tampil_kecam();

        $this->load->view('template/header');
        $this->load->view('pertanian/v_crosstab_ternak_dipotong', $data);
        $this->load->view('template/footer');
    }

        public function tampil_grafik_ternak(){
        $tahunx=$this->input->post('tahunx');
        $kecam = $this->input->post('kecam');
        $data['data']=$this->m_ternak_dipotong->tampil_grafik($tahunx, $kecam);
        $this->load->view('template/header');
        $this->load->view('pertanian/grafik_ternak_dipotong',$data);
        $this->load->view('template/footer');
    }








}
?>