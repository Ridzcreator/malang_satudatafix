<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_produksi_daging extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_produksi_daging');
    }

    public function index() {
        $periode=date('y');
        $tahun =0000;
    	$data['data']=$this->m_produksi_daging->tampil_produksi_daging($tahun);
        $data['datax']=$this->m_produksi_daging->tampil_tahun();
        $data['datas']=$this->m_produksi_daging->tampil_daging();
        $this->load->view('template/header');
        $this->load->view('pertanian/v_produksi_daging',$data);
        $this->load->view('template/footer');
    }

    public function get() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_produksi_daging->tampil_produksi_daging($tahun);
        $no=0;
        $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                    $no++;
                    $id=$a['id'];
                    $jenis_daging=$a['jenis_daging'];
                    $satuan=$a['satuan'];
                    $total_produksi=$a['total_produksi'];
                    $tahun=$a['tahun'];
                    $penginput=$a['penginput'];
                    $timestamp=$a['timestamp'];
                    $status=$a['status'];
                    $temp[]=$jenis_daging;
                    $temp[]=$satuan;
                    $temp[]=number_format($total_produksi,2,".",",");
                    $temp[]=$tahun;
                       
                        $temp[]="<a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a>   
                                 <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
                        $tabel[]=$temp;
                    }
                    echo json_encode(array('data' => $tabel));
    }

    // public function tampil_grafik_industri_rumah_tangga(){
    //     $tahunx=$this->input->post('tahunx');
    //     $data['data']=$this->m_produksi_daging->tampil_industri_rumah_tangga($tahunx);
    //     $this->load->view('template/header');
    //     $this->load->view('pertanian/grafik_industri_rumah_tangga',$data);
    //     $this->load->view('template/footer');
    // }

    public function tampil_crosstab_produksi_daging(){
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
       if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['data']=$this->m_produksi_daging->tahun_crosstab();
      $data['tahun']=$this->m_produksi_daging->tampil_periodec($tahun1,$tahun2);
      $data['jumlah']=$this->m_produksi_daging->tampil_jumlahc($tahun1,$tahun2);
      $data['jenis_daging']=$this->m_produksi_daging->tampil_dagingc();

        $this->load->view('template/header');
        $this->load->view('pertanian/tampil_crosstab_produksi_daging', $data);
        $this->load->view('template/footer');

    }

    public function tampil_produksi_daging(){
        $tahunx=$this->input->post('tahunx');
        $data['data']=$this->m_produksi_daging->tampil_produksi_daging($tahunx);
        $this->load->view('template/header');
        $this->load->view('pertanian/grafik_produksi_daging',$data);
        $this->load->view('template/footer');
    }

     public function tampil_dagingc(){
        $this->load->view('template/header');
        $this->load->view('pertanian/v_produksi_daging',$datadaging);
        $this->load->view('template/footer');
    }


    public function proses_tambah_produksi_daging(){
        $jenis_daging=$this->input->post('jenis_daging');
        $satuan=$this->input->post('satuan');
        $total_produksi=$this->input->post('total_produksi');
        $tahun=$this->input->post('tahun');
        $penginput=$this->input->post('penginput');

        $this->m_produksi_daging->simpan_produksi_daging($jenis_daging, $satuan, $total_produksi, $tahun, $penginput);

        redirect('C_produksi_daging');

    }


    public function proses_hapus_produksi_daging(){
        $no=$this->input->post('no');

        $this->m_produksi_daging->hapus_produksi_daging($no);
        redirect('C_produksi_daging');
    }

    public function proses_edit_produksi_daging(){
        $no=$this->input->post('no');
        $jenis_daging=$this->input->post('jenis_daging');
        $satuan=$this->input->post('satuan');
        $total_produksi=$this->input->post('total_produksi');
        $tahun=$this->input->post('tahun');
        $penginput=$this->input->post('penginput');
       $this->m_produksi_daging->ubah_produksi_daging($no, $jenis_daging, $satuan, $total_produksi, $tahun, $penginput);

        redirect('C_produksi_daging');
    }
}