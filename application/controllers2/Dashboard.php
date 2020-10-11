<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    	function __construct() {
		parent::__construct();
		// if($this->session->userdata('masuk') !=TRUE){
  //           $url=base_url('Login');
  //           redirect($url);
  //       };
    $this->load->model('m_bencana');
    $this->load->model('m_transmigrasi');
    $this->load->model('m_alatangkutd');
    $this->load->model('m_jumlahphk');
    $this->load->model('m_pasar_modern');
    $this->load->model('m_jenispengairan');
    $this->load->model('m_cabangolah');
    $this->load->model('m_diztribusi');
    $this->load->model('m_jumlahkoleksi_buku');
    $this->load->model('m_wisata_alam');
    $this->load->model('m_produksiperikanan');
    $this->load->model('m_ekspor_komoditi');
    $this->load->model('m_banyakbencana');
    $this->load->model('m_perumahan');
    $this->load->model('m_wisatawan');
    $this->load->model('m_unjukrasa');
    $this->load->model('m_penanaman');
    $this->load->model('m_produksiikan');




    

    }

    public function index() {
      //bencana
        $this->load->view('template/header');
        $data['periode']=$this->m_bencana->tampil_tahunn();
      foreach ($data['periode']->result_array() as $a) {
      $tahunbencana=$a['periode'];
      }
      $thn=$tahunbencana;
        $tahunbencana=intval($thn);
        $data['data']=$this->m_bencana->tampil_jumlah($tahunbencana);
      //
      // Transmigrasi
        $data['tahun']=$this->m_transmigrasi->tampil_tahunmax();
        $data['tahunmin']=$this->m_transmigrasi->tampil_tahunmin();
      foreach ($data['tahun']->result_array() as $ab) {
      $tahuntransmigran=$ab['tahun'];
      $data['tahuntransmigran']= $tahuntransmigran;
      }
      foreach ($data['tahunmin']->result_array() as $b) {
      $tahunmin=$b['tahun'];
      $data['tahunmin']= $tahunmin;
      }

      $thnx=$tahuntransmigran;
      $thnm=$tahunmin;
        $tahunt=intval($thnx);
        $tahunm=intval($thnm);
        $data['transmigrasi']=$this->m_transmigrasi->tampil_transmigrasix($tahunt);
        $data['grafiktransmigrasi']=$this->m_transmigrasi->tampil_grafikx($tahunt);
        //






      //Alat Angkut
        $data['tahun']=$this->m_alatangkutd->tampil_tahunmax();
      foreach ($data['tahun']->result_array() as $q) {
      $tahuntruk=$q['tahun'];
      $data['tahuntruk']= $tahuntruk;
      }
      $thnx=$tahuntruk;
        $tahunt=intval($thnx);
         $data['truk']=$this->m_alatangkutd->tampil_truk($tahunt); 
      //
      //Jumlah PHK
         $data['tahun']=$this->m_jumlahphk->tampil_tahunmax();
      foreach ($data['tahun']->result_array() as $q) {
      $tahunphk=$q['periode'];
      $data['tahunphk']= $tahunphk;
      }
      $thnx=$tahunphk;
        $tahunt=intval($thnx);
         $data['phk']=$this->m_jumlahphk->tampil_jumlahphkx($tahunt); 
      //
      // Pasar Modern
      $data['tahun']=$this->m_pasar_modern->tampil_tahunmax();
      foreach ($data['tahun']->result_array() as $q) {
      $tahunmodern=$q['tahun'];
      $data['tahunmodern']= $tahunmodern;
      }
      $thnx=$tahunmodern;
        $tahunt=intval($thnx);
         $data['modern']=$this->m_pasar_modern->tampil_pasar_modernx($tahunt); 
      //
      // Irigasi Tahun   
          $data['tahun']=$this->m_jenispengairan->tampil_tahunmax();
      foreach ($data['tahun']->result_array() as $q) {
      $tahunair=$q['tahun'];
      $data['tahunpengairan']= $tahunair;
      }
      $thnx=$tahunair;
        $tahunt=intval($thnx);
         $data['air']=$this->m_jenispengairan->tampil_jenispengairanx($tahunt); 
        $data['airmax']=$this->m_jenispengairan->tampil_jenispengairanmaximum($tahunt); 
      //
      //Atlit Berprestasi   
         $data['tahun']=$this->m_cabangolah->tampil_tahunmax();
      foreach ($data['tahun']->result_array() as $q) {
      $tahunolah=$q['tahun'];
      $data['tahunolah']= $tahunolah;
      }
      $thnx=$tahunolah;
        $tahunt=intval($thnx);
        $data['olah']=$this->m_cabangolah->tampil_cabang_olahmax($tahunt); 
        $data['olahmax']=$this->m_cabangolah->tampil_cabang_olahmaximum($tahunt); 
      //
      //Distribusi Tanaman
        $data['tahun']=$this->m_diztribusi->tampil_tahunn();
      foreach ($data['tahun']->result_array() as $q) {
      $tahundistribusi=$q['periode'];
      $data['tahundistribusi']= $tahundistribusi;
      }
      $thnx=$tahundistribusi;
        $tahunt=intval($thnx);
        $data['distribusi']=$this->m_diztribusi->tampil_jumlahmax($tahunt);
        $data['distribusimax']=$this->m_diztribusi->tampil_jumlahmaximum();
      //
      //Jumlah Buku  
      $data['tahun']=$this->m_jumlahkoleksi_buku->tampil_tahunmax();
      foreach ($data['tahun']->result_array() as $q) {
      $tahunbuku=$q['tahun'];
      $data['tahunbuku']= $tahunbuku;
      }
      $thnx=$tahunbuku;
        $tahunt=intval($thnx);
        $data['buku']=$this->m_jumlahkoleksi_buku->tampil_jumlahmax($tahunt);
        $data['bukumax']=$this->m_jumlahkoleksi_buku->tampil_jumlahmaximum();
      

      //
      //Jumlah Wisata Alam
      $data['wisata']=$this->m_wisata_alam->tampil_jumlahmax();
      //
      //Produksi Perikanan
      $data['tahun']=$this->m_produksiperikanan->tampil_tahunmax();
      $data['tahunmin']=$this->m_produksiperikanan->tampil_tahunmin();
      foreach ($data['tahun']->result_array() as $q) {
      $tahunbuku=$q['tahun'];
      $data['tahunikan']= $tahunbuku;
      }
      foreach ($data['tahunmin']->result_array() as $q) {
      $tahunmin=$q['tahun'];
      $data['tahunmin']= $tahunmin;
      }
      $thnx=$tahunbuku;
      $thnm=$tahunmin;
        $tahunt=intval($thnx);
        $tahunm=intval($thnm);
        $data['ikan']=$this->m_produksiperikanan->tampil_jumlahmax($tahunt);
        $data['ikanmin']=$this->m_produksiperikanan->tampil_jumlahmin($tahunm);

      //
      // Ekspor Komoditi

      $data['tahun']=$this->m_ekspor_komoditi->tampil_tahunmax();
      $data['tahunmin']=$this->m_ekspor_komoditi->tampil_tahunmin();
      foreach ($data['tahun']->result_array() as $q) {
      $tahunekspor=$q['tahun'];
      $data['tahunekspor']= $tahunekspor;
      }
      foreach ($data['tahunmin']->result_array() as $q) {
      $tahunmin=$q['tahun'];
      $data['tahunmin']= $tahunmin;
      }
      $thnx=$tahunekspor;
      $thnm=$tahunmin;
        $tahunt=intval($thnx);
        $tahunm=intval($thnm);
        $data['ekspor']=$this->m_ekspor_komoditi->tampil_jumlahmax($tahunt);
        $data['ekspormin']=$this->m_ekspor_komoditi->tampil_jumlahmin($tahunm);
      //
      // Banyak Bencana

      $data['tahun']=$this->m_banyakbencana->tampil_tahunmax();
      $data['tahunmin']=$this->m_banyakbencana->tampil_tahunmin();
      foreach ($data['tahun']->result_array() as $q) {
      $tahunbanyak=$q['tahun'];
      $data['tahunbanyak']= $tahunbanyak;
      }
      foreach ($data['tahunmin']->result_array() as $q) {
      $tahunmin=$q['tahun'];
      $data['tahunmin']= $tahunmin;
      }
      $thnx=$tahunbanyak;
      $thnm=$tahunmin;
        $tahunt=intval($thnx);
        $tahunm=intval($thnm);
        $data['rugi']=$this->m_banyakbencana->tampil_jumlahmax($tahunt);
        $data['rugimin']=$this->m_banyakbencana->tampil_jumlahmin($tahunm);

      //

      // Jumlah Sampah

      $data['tahun']=$this->m_perumahan->tampil_tahunmax();
      $data['tahunmin']=$this->m_perumahan->tampil_tahunmin();
      foreach ($data['tahun']->result_array() as $q) {
      $tahunrumah=$q['tahun'];
      $data['tahunrumah']= $tahunrumah;
      }
      foreach ($data['tahunmin']->result_array() as $q) {
      $tahunmin=$q['tahun'];
      $data['tahunmin']= $tahunmin;
      }
      $thnx=$tahunrumah;
      $thnm=$tahunmin;
        $tahunt=intval($thnx);
        $tahunm=intval($thnm);
        $data['sampah']=$this->m_perumahan->tampil_jumlahmax($tahunt);
        $data['sampahmin']=$this->m_perumahan->tampil_jumlahmin($tahunm);
      //
      //  Wisatawan Datang
      $data['tahun']=$this->m_wisatawan->tampil_tahunmax();
       foreach ($data['tahun']->result_array() as $q) {
      $tahunwisata=$q['tahun'];
      $data['tahunwisata']= $tahunwisata;
      }
      $thnx=$tahunwisata;
      $tahunt=intval($thnx);
      $data['wisatawan']=$this->m_wisatawan->tampil_detail_wisatawan_datang($tahunt);

      //
      // Unjukrasa
      $data['tahun']=$this->m_unjukrasa->tampil_tahunmax();
       foreach ($data['tahun']->result_array() as $q) {
      $tahununjukrasa=$q['periode'];
      $data['tahununjukrasa']= $tahununjukrasa;
      }
      $thnx=$tahununjukrasa;
      $tahunt=intval($thnx);
      $data['dataz']=$this->m_unjukrasa->tahun_crosstab();
      $data['tahun']=$this->m_unjukrasa->tampil_periodec($tahunt,$tahunt);
      $data['jumlahxx']=$this->m_unjukrasa->tampil_jumlahc($tahunt,$tahunt);
      $data['jumlahxxx']=$this->m_unjukrasa->tampil_jumlahxc($tahunt,$tahunt);
      $data['unjukrasa']=$this->m_unjukrasa->tampil_unjukrasac();

      // Penanaman Modal
          
      $data['tahunx']=$this->m_penanaman->tampil_tahunmax();
       foreach ($data['tahunx']->result_array() as $q) {
      $tahunpenanaman=$q['tahun'];
      $data['penanaman']= $tahunpenanaman;
      }
      $thnx=$tahunpenanaman;
      $tahuntx=intval($thnx);
      $data['grafik_tanam']=$this->m_penanaman->grafik_perbandingan_penanaman($tahuntx, $tahuntx);  

      // Alat Angkut
      $data['tahunxz']=$this->m_alatangkutd->tampil_tahunmax();
       foreach ($data['tahunxz']->result_array() as $q) {
      $tahunangkut=$q['tahun'];
      $data['angkut']= $tahunangkut;
      }
      $thnx=$tahunpenanaman;
      $tahuntx=intval($thnx);
      $data['grafikangkut']=$this->m_alatangkutd->tampil_grafik($tahuntx);  

      // Produksi Ikan
      $data['tahunx']=$this->m_produksiikan->tampil_tahunmax();
      $data['tahunminx']=$this->m_produksiikan->tampil_tahunmin();
      foreach ($data['tahunx']->result_array() as $q) {
      $tahunbanyak=$q['tahun'];
      $data['tahunbanyak']= $tahunbanyak;
      }
      foreach ($data['tahunminx']->result_array() as $q) {
      $tahunmin=$q['tahun'];
      $data['tahunmin']= $tahunmin;
      }
      $thnx=$tahunbanyak;
      $thnm=$tahunmin;
        $tahunt=intval($thnx);
        $tahunm=intval($thnm);
        $data['grafikikan']=$this->m_produksiikan->tampil_grafikx($tahunm,$tahunt);
       






        $this->load->view('dashboard',$data);
        $this->load->view('template/footer');
    }

}
