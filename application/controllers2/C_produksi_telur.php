<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_produksi_telur extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_produksi_telur');
    }

    public function index() {
        $periode=date('y');
        $tahun =0000;
        $data['data']=$this->m_produksi_telur->tampil_produksi_telur($tahun);
        $data['datas']=$this->m_produksi_telur->tampil_nama_unggas();
        $data['datax']=$this->m_produksi_telur->tampil_tahun();
        $data['datak']=$this->m_produksi_telur->tampil_kecamatan();
        $data['kecam']=$this->m_produksi_telur->tampil_kecam();
        $this->load->view('template/header');
        $this->load->view('pertanian/v_produksi_telur',$data);
        $this->load->view('template/footer');
    }

    public function get() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_produksi_telur->tampil_produksi_telur($tahun);
        $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                        $id=$a['id'];
                        $kecamatan=$a['kecamatan'];
                        $tahun=$a['tahun'];
                        $per_butir=$a['per_butir'];
                        $per_kg=$a['per_kg'];
                        $temp[]=$tahun;
                        $temp[]=$kecamatan;
                        $temp[]=number_format($a['per_butir'],0,",",".");
                        $temp[]=number_format($a['per_kg'],0,",",".");
                        $temp[]="<a class=\"btn btn-xs btn-warning\" href=\"C_produksi_telur/tampil_detail_produksi_telur/$tahun/$kecamatan\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span>Detail</a>";
                        $tabel[]=$temp;
                    }
                    echo json_encode(array('data' => $tabel));
    }

    public function tampil_detail_produksi_telur(){
        $page = $this->uri->segment(3); 
        $kcmtn = $this->uri->segment(4); 
        $data['data']=$this->m_produksi_telur->tampil_detail_produksi_telur($page, $kcmtn);
        $data['datas']=$this->m_produksi_telur->tampil_nama_unggas();
        $data['datax']=$this->m_produksi_telur->tampil_tahun();
        $data['datak']=$this->m_produksi_telur->tampil_kecamatan();

        $this->load->view('template/header');
        $this->load->view('pertanian/v_detail_produksi_telur', $data);
        $this->load->view('template/footer');
    }

    public function tambah_detail_produksi_telur(){
        $page = $this->uri->segment(3); 
        $kcmtn = $this->uri->segment(4); 
        $nama_unggas=$this->input->post('nama_unggas');
        $tahun=$this->input->post('tahun');
        $kecamatan=$this->input->post('kecamatan');
        $per_butir=$this->input->post('per_butir');
        $per_kg=$this->input->post('per_kg');
        $penginput=$this->input->post('penginput');
        
        $this->m_produksi_telur->simpan_produksi_telur($kecamatan, $nama_unggas, $tahun, $per_butir, $per_kg, $penginput);

        redirect('C_produksi_telur/tampil_detail_produksi_telur/'.$page.'/'.$kcmtn);

    }

        public function tambah_produksi_telur(){
        $nama_unggas=$this->input->post('nama_unggas');
        $tahun=$this->input->post('tahun');
        $kecamatan=$this->input->post('kecamatan');
        $per_butir=$this->input->post('per_butir');
        $per_kg=$this->input->post('per_kg');
        $penginput=$this->input->post('penginput');
        
        $this->m_produksi_telur->simpan_produksi_telur($kecamatan, $nama_unggas, $tahun, $per_butir, $per_kg, $penginput);

        redirect('C_produksi_telur');
    }

        public function proses_ubah_produksi_telur(){
        $page = $this->uri->segment(3); 
        $kcmtn = $this->uri->segment(4); 
        $id=$this->input->post('id');
        $nama_unggas=$this->input->post('nama_unggas');
        $tahun=$this->input->post('tahun');
        $kecamatan=$this->input->post('kecamatan');
        $per_butir=$this->input->post('per_butir');
        $per_kg=$this->input->post('per_kg');
        $penginput=$this->input->post('penginput');
        

        $this->m_produksi_telur->proses_ubah_produksi_telur($id, $kecamatan, $nama_unggas, $tahun, $per_butir, $per_kg, $penginput);

        redirect('C_produksi_telur/tampil_detail_produksi_telur/'.$page.'/'.$kcmtn);
    }

    public function proses_hapus_produksi_telur(){
        $page = $this->uri->segment(3); 
        $kcmtn = $this->uri->segment(4); 
        $id=$this->input->post('id');

        $this->m_produksi_telur->proses_hapus_produksi_telur($id);
        redirect('C_produksi_telur/tampil_detail_produksi_telur/'.$page.'/'.$kcmtn);
    }


    public function tampil_crosstab_telur(){
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
      $kecam = $this->input->post('kecam');
        if($tahun1>$tahun2){
            list($tahun1, $tahun2) = array($tahun2, $tahun1);
        }
      $data['data']=$this->m_produksi_telur->data_crosstab($kecam);
      $data['tahun']=$this->m_produksi_telur->tampil_periodec($tahun1,$tahun2,$kecam);
      $data['jumlah']=$this->m_produksi_telur->tampil_jumlahc($tahun1,$tahun2,$kecam);
      $data['bulan']=$this->m_produksi_telur->tampil_bulanc($kecam);
      $data['kecam']=$this->m_produksi_telur->tampil_kecam();

        $this->load->view('template/header');
        $this->load->view('pertanian/v_crosstab_produksi_telur', $data);
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
      $data['data']=$this->m_wisatawan_menginap->grafik_perbandingan_perempuankkx($tahun2, $tahun1);
      $this->load->view('template/header');
      if($datap=="all"){
        if($grafikp=="bar"){
            $this->load->view('pariwisata/grafik_perbandingan_menginap_bar_all', $data);
            $this->load->view('template/footer');
        }else if($grafikp=="line"){
            $this->load->view('pariwisata/grafik_perbandingan_menginap_line_all', $data);
            $this->load->view('template/footer');
        }
      }else{
      if($grafikp=="bar"){
        $this->load->view('pariwisata/grafik_perbandingan_menginap_bar', $data);
        $this->load->view('template/footer');
      }else if($grafikp=="line"){
        $this->load->view('pariwisata/grafik_perbandingan_menginap_line', $data);
        $this->load->view('template/footer');
      }
      }
    }







}
?>