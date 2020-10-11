<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_wisatawan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_wisatawan');
    }

    public function index() {
        $periode=date('y');
        $tahun =0000;
    	$data['data']=$this->m_wisatawan->tampil_wisatawan_datang($tahun);
    	$data['dataa']=$this->m_wisatawan->tampil_wisatawan_menginap($tahun);
        $data['datas']=$this->m_wisatawan->tampil_bulan();
        $data['datax']=$this->m_wisatawan->tampil_tahun();
        $this->load->view('template/header');
        $this->load->view('pariwisata/v_wisatawan',$data);
    }


    public function tampil_wisatawan(){

    	$this->load->view('template/header');
        $this->load->view('pariwisata/v_wisatawan');
        $this->load->view('template/footer');
    }


    public function get() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_wisatawan->tampil_wisatawan_datang($tahun);
        $no=0;
        $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                        $no++;
                        $id=$a['id'];
                        $tahun=$a['tahun'];
                        $domestik=$a['domestik'];
                        $mancanegara=$a['mancanegara'];
                        $jumlah=$a['jumlah'];
                        $penginput=$a['penginput'];
                        $temp[]=$no;
                        $temp[]=$tahun;
                        $temp[]=number_format($a['domestik'],0,",",".");
                        $temp[]=number_format($a['mancanegara'],0,",",".");
                        $temp[]=number_format($a['jumlah'],0,",",".");
                        $temp[]="<a class=\"btn btn-xs btn-warning\" href=\"C_wisatawan/tampil_detail_wisatawan_datang/$tahun\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span>Detail</a>";
                        $tabel[]=$temp;
                    }
                    echo json_encode(array('data' => $tabel));
    }

    public function tampil_detail_wisatawan_datang(){
        $id = $this->uri->segment(3); 
        $data['data']=$this->m_wisatawan->tampil_detail_wisatawan_datang($id);
        $data['datas']=$this->m_wisatawan->tampil_bulan();

        $this->load->view('template/header');
        $this->load->view('pariwisata/v_detail_wisatawan_datang', $data);
        $this->load->view('template/footer');
    }


    public function proses_ubah_wisatawan_datang(){
        $page = $this->uri->segment(3); 
        $id=$this->input->post('id');
        $bulan=$this->input->post('bulan');
        $tahun=$this->input->post('tahun');
        $domestik=$this->input->post('domestik');
        $mancanegara=$this->input->post('mancanegara');
        $penginput=$this->input->post('penginput');
        $jenis_wisatawan=$this->input->post('jenis_wisatawan');

        $this->m_wisatawan->proses_ubah_wisatawan_datang($id, $bulan, $tahun, $domestik, $mancanegara, $penginput, $jenis_wisatawan);

        redirect('C_wisatawan/tampil_detail_wisatawan_datang/'.$page);
    }

    public function proses_hapus_wisatawan_datang(){
        $page = $this->uri->segment(3); 
        $id=$this->input->post('id');

        $this->m_wisatawan->proses_hapus_wisatawan_datang($id);
        redirect('C_wisatawan/tampil_detail_wisatawan_datang/'.$page);
    }


    public function tambah_detail_wisatawan_datang(){
        $page = $this->uri->segment(3); 
        $bulan=$this->input->post('bulan');
        $tahun=$this->input->post('tahun');
        $domestik=$this->input->post('domestik');
        $mancanegara=$this->input->post('mancanegara');
        $penginput=$this->input->post('penginput');
        $jenis_wisatawan=$this->input->post('jenis_wisatawan');
        
        $this->m_wisatawan->simpan_wisatawan_datang($bulan, $tahun, $domestik, $mancanegara, $penginput, $jenis_wisatawan);

        redirect('C_wisatawan/tampil_detail_wisatawan_datang/'.$page);

    }

        public function proses_tambah_wisatawan(){
        $bulan=$this->input->post('bulan');
        $tahun=$this->input->post('tahun');
        $domestik=$this->input->post('domestik');
        $mancanegara=$this->input->post('mancanegara');
        $penginput=$this->input->post('penginput');
        $jenis_wisatawan=$this->input->post('jenis_wisatawan');
        
        $this->m_wisatawan->simpan_wisatawan($bulan, $tahun, $domestik, $mancanegara, $penginput, $jenis_wisatawan);

        redirect('C_wisatawan');

    }

    public function tampil_grafik_wisatawan_datang(){
        $page = $this->uri->segment(3);
        $data['data']=$this->m_wisatawan->tampil_detail_wisatawan_datang($page);
        $this->load->view('template/header');
        $this->load->view('pariwisata/v_grafik_wisatawan_datang',$data);
        $this->load->view('template/footer');
    }

    public function tampil_data_wisatawan_datang(){
        $id = $this->uri->segment(3); 
        $data['data']=$this->m_wisatawan->tampil_data_wisatawan_datang($id);
        $data['datas']=$this->m_wisatawan->tampil_bulan();

        $this->load->view('template/header');
        $this->load->view('pariwisata/v_semua_data_wisatawan_datang', $data);
        $this->load->view('template/footer');
    }

    public function tampil_crosstab_datang(){
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
        if($tahun1>$tahun2){
            list($tahun1, $tahun2) = array($tahun2, $tahun1);
        }
      $data['data']=$this->m_wisatawan->data_crosstab();
      $data['tahun']=$this->m_wisatawan->tampil_periodec($tahun1,$tahun2);
      $data['jumlah']=$this->m_wisatawan->tampil_jumlahc($tahun1,$tahun2);
      $data['bulan']=$this->m_wisatawan->tampil_bulanc();

        $this->load->view('template/header');
        $this->load->view('pariwisata/v_crosstab_wisatawan_datang', $data);
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
      $data['data']=$this->m_wisatawan->grafik_perbandingan_datang($tahun2, $tahun1);
      $this->load->view('template/header');
      if($datap=="all"){
        if($grafikp=="bar"){
            $this->load->view('pariwisata/grafik_perbandingan_datang_bar_all', $data);
            $this->load->view('template/footer');
        }else if($grafikp=="line"){
            $this->load->view('pariwisata/grafik_perbandingan_datang_line_all', $data);
            $this->load->view('template/footer');
        }
        else if($grafikp=="area"){
            $this->load->view('pariwisata/grafik_perbandingan_datang_area_all', $data);
            $this->load->view('template/footer');
        }
        else if($grafikp=="pie"){
            $this->load->view('pariwisata/grafik_perbandingan_datang_pie_all', $data);
            $this->load->view('template/footer');
        }
      }else{
      if($grafikp=="bar"){
        $this->load->view('pariwisata/grafik_perbandingan_datang_bar', $data);
        $this->load->view('template/footer');
      }else if($grafikp=="line"){
        $this->load->view('pariwisata/grafik_perbandingan_datang_line', $data);
        $this->load->view('template/footer');
      }
      else if($grafikp=="area"){
        $this->load->view('pariwisata/grafik_perbandingan_datang_area', $data);
        $this->load->view('template/footer');
      }
      else if($grafikp=="pie"){
        $this->load->view('pariwisata/grafik_perbandingan_datang_pie', $data);
        $this->load->view('template/footer');
      }
      }
    }

    public function grafik_datang() {
      $id = $this->uri->segment(3); 
      $data['data']=$this->m_wisatawan->tampil_grafik($id);
      $this->load->view('template/header');
      $this->load->view('pariwisata/grafik_datang', $data);
      $this->load->view('template/footer');
    }


}
?>