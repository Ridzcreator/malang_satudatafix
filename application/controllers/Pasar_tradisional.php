<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pasar_tradisional extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_pasar_tradisional');
    }

    public function index() {
        $periode=date('y');
        $tahun =0000;
    	$data['data']=$this->m_pasar_tradisional->tampil_pasar_tra($tahun);
        $data['datax']=$this->m_pasar_tradisional->tampil_tahun();
        $data['datas']=$this->m_pasar_tradisional->tampil_pengelola_pemerintah($tahun);
        $data['datap']=$this->m_pasar_tradisional->tampil_pengelola_masyarakat($tahun);
        $data['dataq']=$this->m_pasar_tradisional->tampil_pengelola_swasta($tahun);
        $this->load->view('template/header');
        $this->load->view('perdagangan/pasar_tradisional',$data);
        $this->load->view('template/footer');
    }

     public function get() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_pasar_tradisional->tampil_pasar_tra($tahun);
        $no=0;
        $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                        $no++;
                        $id = $a['No'];
                        $nama_pasar=$a['Nama_Pasar'];
                        $alamat=$a['Alamat_Lengkap'];
                        $luas=$a['Luas_Lahan'];
                        $luas_bangunan=$a['Luas_Bangunan'];
                        $pengelola=$a['Pengelola'];
                        $nama_pengelola=$a['Nama_Pengelola'];
                        $tahun_b=$a['Tahun_Berdiri'];
                        $tahun_akhir=$a['Tahun_Terakhir'];
                        $kondisi=$a['Kondisi_Fisik'];
                        $penginput=$a['Penginput'];
                        $timestamp=$a['Timestamp'];
                        $status=$a['Status'];
                        $temp[]=$no;
                        $temp[]=$nama_pasar;
                        $temp[]=$alamat;
                        $temp[]=$luas;
                        $temp[]=$luas_bangunan;
                        $temp[]=$nama_pengelola;
                        $temp[]=$tahun_b;
                        $temp[]=$tahun_akhir;
                        $temp[]=$kondisi;
                        $temp[]="<a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a>   
                                 <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
                        $tabel[]=$temp;
                    }
                    echo json_encode(array('data' => $tabel));
    }
    public function get1() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_pasar_tradisional->detail_pasar_tra_masyarakat($tahun);
        $no=0;
        $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                        $no++;
                        $id = $a['No'];
                        $nama_pasar=$a['Nama_Pasar'];
                        $alamat=$a['Alamat_Lengkap'];
                        $luas=$a['Luas_Lahan'];
                        $luas_bangunan=$a['Luas_Bangunan'];
                        $pengelola=$a['Pengelola'];
                        $nama_pengelola=$a['Nama_Pengelola'];
                        $tahun_b=$a['Tahun_Berdiri'];
                        $tahun_akhir=$a['Tahun_Terakhir'];
                        $kondisi=$a['Kondisi_Fisik'];
                        $penginput=$a['Penginput'];
                        $timestamp=$a['Timestamp'];
                        $status=$a['Status'];
                        $temp[]=$no;
                        $temp[]=$nama_pasar;
                        $temp[]=$alamat;
                        $temp[]=$luas;
                        $temp[]=$luas_bangunan;
                        $temp[]=$nama_pengelola;
                        $temp[]=$tahun_b;
                        $temp[]=$tahun_akhir;
                        $temp[]=$kondisi;
                        $temp[]="<a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a>   
                                 <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
                        $tabel[]=$temp;
                    }
                    echo json_encode(array('data' => $tabel));
    }
    public function get2() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_pasar_tradisional->detail_pasar_tra_pemerintah($tahun);
        $no=0;
        $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                        $no++;
                        $id = $a['No'];
                        $nama_pasar=$a['Nama_Pasar'];
                        $alamat=$a['Alamat_Lengkap'];
                        $luas=$a['Luas_Lahan'];
                        $luas_bangunan=$a['Luas_Bangunan'];
                        $pengelola=$a['Pengelola'];
                        $nama_pengelola=$a['Nama_Pengelola'];
                        $tahun_b=$a['Tahun_Berdiri'];
                        $tahun_akhir=$a['Tahun_Terakhir'];
                        $kondisi=$a['Kondisi_Fisik'];
                        $penginput=$a['Penginput'];
                        $timestamp=$a['Timestamp'];
                        $status=$a['Status'];
                        $temp[]=$no;
                        $temp[]=$nama_pasar;
                        $temp[]=$alamat;
                        $temp[]=$luas;
                        $temp[]=$luas_bangunan;
                        $temp[]=$nama_pengelola;
                        $temp[]=$tahun_b;
                        $temp[]=$tahun_akhir;
                        $temp[]=$kondisi;
                        $temp[]="<a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a>   
                                 <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
                        $tabel[]=$temp;
                    }
                    echo json_encode(array('data' => $tabel));
    }
    public function get3() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_pasar_tradisional->detail_pasar_tra_swasta($tahun);
        $no=0;
        $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                        $no++;
                        $id = $a['No'];
                        $nama_pasar=$a['Nama_Pasar'];
                        $alamat=$a['Alamat_Lengkap'];
                        $luas=$a['Luas_Lahan'];
                        $luas_bangunan=$a['Luas_Bangunan'];
                        $pengelola=$a['Pengelola'];
                        $nama_pengelola=$a['Nama_Pengelola'];
                        $tahun_b=$a['Tahun_Berdiri'];
                        $tahun_akhir=$a['Tahun_Terakhir'];
                        $kondisi=$a['Kondisi_Fisik'];
                        $penginput=$a['Penginput'];
                        $timestamp=$a['Timestamp'];
                        $status=$a['Status'];
                        $temp[]=$no;
                        $temp[]=$nama_pasar;
                        $temp[]=$alamat;
                        $temp[]=$luas;
                        $temp[]=$luas_bangunan;
                        $temp[]=$nama_pengelola;
                        $temp[]=$tahun_b;
                        $temp[]=$tahun_akhir;
                        $temp[]=$kondisi;
                        $temp[]="<a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a>   
                                 <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
                        $tabel[]=$temp;
                    }
                    echo json_encode(array('data' => $tabel));
    }


    public function detail_pasar_tradisional(){
        $tahun =0000;
        $data['data']=$this->m_pasar_tradisional->tampil_pasar_tra($tahun);
        $data['datax']=$this->m_pasar_tradisional->tampil_tahun();
    	$this->load->view('template/header');
        $this->load->view('perdagangan/detail_pasar_tradisional', $data);
        $this->load->view('template/footer');

    }

    public function detail_pasar_tra_pemerintah(){
        $tahun =0000;
        $data['data']=$this->m_pasar_tradisional->detail_pasar_tra_pemerintah($tahun);
        $data['datax']=$this->m_pasar_tradisional->tampil_tahun();
        $this->load->view('template/header');
        $this->load->view('perdagangan/detail_pasar_tra_pemerintah',$data);
        $this->load->view('template/footer');
    }

    public function detail_pasar_tra_swasta(){
        $tahun =0000;
        $data['data']=$this->m_pasar_tradisional->detail_pasar_tra_swasta($tahun);
        $data['datax']=$this->m_pasar_tradisional->tampil_tahun();
        $this->load->view('template/header');
        $this->load->view('perdagangan/detail_pasar_tra_swasta',$data);
        $this->load->view('template/footer');
    }

    public function detail_pasar_tra_masyarakat(){
        $tahun =0000;
        $data['data']=$this->m_pasar_tradisional->detail_pasar_tra_masyarakat($tahun);
        $data['datax']=$this->m_pasar_tradisional->tampil_tahun();
        $this->load->view('template/header');
        $this->load->view('perdagangan/detail_pasar_tra_masyarakat',$data);
        $this->load->view('template/footer');
    }

     public function tampil_pasar_tra(){
        $this->load->view('template/header');
        $this->load->view('perdagangan/pasar_tradisional');
        $this->load->view('template/footer');
    }


    public function proses_tambah_pasar_tradisional(){
    	$nama_pasar=$this->input->post('nama_pasar');
    	$alamat_lengkap=$this->input->post('alamat_lengkap');
    	$luas_lahan=$this->input->post('luas_lahan');
    	$luas_bangunan=$this->input->post('luas_bangunan');
        $pengelola=$this->input->post('pengelola');
        $nama_pengelola=$this->input->post('nama_pengelola');
        $tahun_berdiri=$this->input->post('tahun_berdiri');
        $tahun_terakhir=$this->input->post('tahun_terakhir');
        $kondisi_fisik=$this->input->post('kondisi_fisik');
        $tahun=$this->input->post('tahun');
        $penginput = $this->input->post('penginput');

        $cek = $this->db->query("SELECT * FROM pasar_tradisional where nama_pasar='$nama_pasar' and pengelola='$pengelola' and tahun='$tahun' and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Pasar_tradisional/detail_pasar_tradisional','refresh');
           }
           else {

        $this->m_pasar_tradisional->simpan_barang($nama_pasar, $alamat_lengkap, $luas_lahan, $luas_bangunan, $pengelola, 
            $nama_pengelola, $tahun_berdiri, $tahun_terakhir, $kondisi_fisik, $tahun ,$penginput);

        redirect('Pasar_tradisional/detail_pasar_tradisional');
    }
        }

    public function proses_hapus_pasar_tradisional(){
        $no=$this->input->post('no');

        $this->m_pasar_tradisional->hapus_pasar_tradisional($no);
        redirect('Pasar_tradisional/detail_pasar_tradisional');
    }

    public function proses_edit_pasar_tradisional(){
        $no=$this->input->post('no');
        $nama_pasar=$this->input->post('nama_pasar');
        $alamat_lengkap=$this->input->post('alamat_lengkap');
        $luas_lahan=$this->input->post('luas_lahan');
        $luas_bangunan=$this->input->post('luas_bangunan');
        $pengelola=$this->input->post('pengelola');
        $nama_pengelola=$this->input->post('nama_pengelola');
        $tahun_berdiri=$this->input->post('tahun_berdiri');
        $tahun_terakhir=$this->input->post('tahun_terakhir');
        $kondisi_fisik=$this->input->post('kondisi_fisik');
        $penginput = $this->input->post('penginput');
        $this->m_pasar_tradisional->ubah_pasar_tradisional($no, $nama_pasar, $alamat_lengkap, $luas_lahan, $luas_bangunan, $pengelola, $nama_pengelola, $tahun_berdiri, $tahun_terakhir, $kondisi_fisik, $penginput);
        redirect('Pasar_tradisional/detail_pasar_tradisional');
    }
}
