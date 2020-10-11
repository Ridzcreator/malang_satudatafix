<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_potensi_unggulan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_potensi_unggulan');
    }

    public function index() {
        $tahun = '0000';
    	$data['data']=$this->m_potensi_unggulan->tampil_potensi_unggulan($tahun);
        $data['datazx']=$this->m_potensi_unggulan->tampil_kecamatan();
        $data['datax']=$this->m_potensi_unggulan->tampil_tahun();
       
         $this->load->view('template/header');
        $this->load->view('pariwisata/v_potensi_unggulan',$data);
        $this->load->view('template/footer');
    }

    public function get() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_potensi_unggulan->tampil_potensi_unggulan($tahun);
        $tabel=array();
        foreach ($data['data']->result_array() as $a) {
            $temp = array();
            $id=$a['id'];
            $kecamatan=$a['nama_kecamatan'];
            $desa=$a['nama_desa'];
            $tahun=$a['tahun'];
            $kelembagaan=$a['kelembagaan'];
            $potensi=$a['potensi_unggulan'];
            $keterangan=$a['keterangan'];
            $temp[]=$tahun;
            $temp[]=$kecamatan;
            $temp[]=$desa;
            $temp[]=$kelembagaan;
            $temp[]=$potensi;
            $temp[]=$keterangan;
            $temp[]="<a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span>Edit</a>
                <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span>Hapus</a>";
            $tabel[]=$temp;
        }
        echo json_encode(array('data' => $tabel));
    }


    public function pilih_kelurahan(){
        $data['kelurahan']=$this->m_potensi_unggulan->tampil_desa($this->uri->segment(3));
        $this->load->view('bencana/v_drop_down_kelurahan',$data);
    }


    public function tampil_potensi_unggulan(){

    	$this->load->view('template/header');
        $this->load->view('pariwisata/v_potensi_unggulan');
        $this->load->view('template/footer');
    }

    public function proses_hapus_potensi_unggulan(){
        $no=$this->input->post('no');

        $this->m_potensi_unggulan->hapus_potensi_unggulan($no);
        redirect('C_potensi_unggulan');
    }

    public function proses_tambah_potensi_unggulan(){
        $kecamatan=$this->input->post('kecamatan_id');
        $desa=$this->input->post('kelurahan_id');
        $kelembagaan=$this->input->post('kelembagaan');
        $potensi_unggulan=$this->input->post('potensi_unggulan');
        $keterangan=$this->input->post('keterangan');
        $penginput=$this->input->post('penginput');
        $tahun=$this->input->post('tahun');
        
        $this->m_potensi_unggulan->simpan_potensi($kecamatan, $desa, $kelembagaan, $potensi_unggulan, $keterangan, $penginput, $tahun);

        redirect('C_potensi_unggulan');

    }

     public function proses_edit_potensi_unggulan(){
        $no=$this->input->post('no');
        $kelembagaan=$this->input->post('kelembagaan');
        $potensi_unggulan=$this->input->post('potensi_unggulan');
        $keterangan=$this->input->post('keterangan');
        $penginput=$this->input->post('penginput');
        $tahun=$this->input->post('tahun');

        $this->m_potensi_unggulan->ubah_potensi_unggulan($no, $kelembagaan, $potensi_unggulan, $keterangan, $penginput, $tahun);

        redirect('C_potensi_unggulan');
    }
}