<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pasar_modern extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_pasar_modern');
    }

    public function index() {
        $periode=date('y');
        $tahun =0000;
    	$data['data']=$this->m_pasar_modern->tampil_pasar_modern($tahun);
        $data['datax']=$this->m_pasar_modern->tampil_tahun();
        $data['datas']=$this->m_pasar_modern->tampil_kecamatan();
        $this->load->view('template/header');
        $this->load->view('perdagangan/pasar_modern',$data);
        $this->load->view('template/footer');
    }

    public function get() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_pasar_modern->tampil_pasar_modern($tahun);
        $no=0;
        $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                        $no++;
                        $id = $a['id'];
                        $kecamatan=$a['kecamatan'];
                        $indomart=$a['indomart'];
                        $alfamart=$a['alfamart'];
                        $jumlah=$a['jumlah'];
                        $tahun=$a['tahun'];
                        $penginput=$a['penginput'];
                        $timestamp=$a['timestamp'];
                        $status=$a['status'];
                        $temp[]=$no;
                        $temp[]=$kecamatan;
                        $temp[]=$indomart;
                        $temp[]=$alfamart;
                        $temp[]=$jumlah;
                        $temp[]=$tahun;
                        $temp[]="<a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a>   
                                 <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
                        $tabel[]=$temp;
                    }
                    echo json_encode(array('data' => $tabel));
    }

    public function tampil_pasar_grafik(){
        $tahunx=$this->input->post('tahunx');
        $data['data']=$this->m_pasar_modern->tampil_pasar_modern($tahunx);
        $this->load->view('template/header');
        $this->load->view('perdagangan/grafik_pasar_modern',$data);
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
      $data['data']=$this->m_pasar_modern->grafik_perbandingan_pasar_modernx($tahun2, $tahun1);
      $this->load->view('template/header');
      if($datap=="all"){
        if($grafikp=="bar"){
        $this->load->view('perdagangan/grafik_perbandingan_pasar_modern_bar_all', $data);
        $this->load->view('template/footer');
        }else if($grafikp=="line"){
        $this->load->view('perdagangan/grafik_perbandingan_pasar_modern_line_all', $data);
        $this->load->view('template/footer');
        }
      }else{
      if($grafikp=="bar"){
        $this->load->view('perdagangan/grafik_perbandingan_pasar_modern_bar', $data);
        $this->load->view('template/footer');
        }else if($grafikp=="line"){
        $this->load->view('perdagangan/grafik_perbandingan_pasar_modern_line', $data);
        $this->load->view('template/footer');
      }
      }
      
    }


    public function tampil_kecamatan(){
        $this->load->view('template/header');
        $this->load->view('perdagangan/pasar_modern',$datakec);
        $this->load->view('template/footer');
    }
    public function proses_tambah_pasar_modern(){
        $kecamatan=$this->input->post('kecamatan');
        $indomart=$this->input->post('indomart');
        $alfamart=$this->input->post('alfamart');

        $tahun=$this->input->post('tahun');
        $penginput = $this->input->post('penginput');

        $cek = $this->db->query("SELECT * FROM pasar_modern where kecamatan='$kecamatan' and tahun='$tahun' and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Pasar_modern','refresh');
           }
           else {

          $this->m_pasar_modern->simpan_barang($kecamatan, $indomart, $alfamart, $tahun, $penginput);

        redirect('Pasar_modern');
}
    }

    public function proses_hapus_pasar_modern(){
        $no=$this->input->post('no');

        $this->m_pasar_modern->hapus_pasar_modern($no);
        redirect('Pasar_modern');
    }

    public function proses_edit_pasar_modern(){
        $no=$this->input->post('no');
       $kecamatan=$this->input->post('kecamatan');
        $indomart=$this->input->post('indomart');
        $alfamart=$this->input->post('alfamart');

        $tahun=$this->input->post('tahun');
        $penginput = $this->input->post('penginput');

       $this->m_pasar_modern->ubah_pasar_modern($no, $kecamatan, $indomart, $alfamart, $tahun, $penginput);

        redirect('Pasar_modern');
    }
}