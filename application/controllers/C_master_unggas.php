<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_master_unggas extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_master_unggas');
    }

    public function index() {
        $data['data']=$this->m_master_unggas->tampil_data();
        $this->load->view('template/header');
        $this->load->view('pertanian/v_master_unggas',$data);
        $this->load->view('template/footer');
    }

    public function tambah_data(){
        $nama_hewan=$this->input->post('nama_hewan');
        
        $this->m_master_unggas->simpan_data($nama_hewan);

        redirect('C_master_unggas');

    }

    public function ubah_data(){
        $id=$this->input->post('id');
        $nama_hewan=$this->input->post('nama_hewan');

        $this->m_master_unggas->ubah_data($id, $nama_hewan);

        redirect('C_master_unggas');
    }

    public function hapus_data(){
        $id=$this->input->post('id');

        $this->m_master_unggas->hapus_data($id);
        redirect('C_master_unggas');
    }









}
?>