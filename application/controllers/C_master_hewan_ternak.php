<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_master_hewan_ternak extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_master_hewan_ternak');
    }

    public function index() {
        $data['data']=$this->m_master_hewan_ternak->tampil_data();
        $this->load->view('template/header');
        $this->load->view('pertanian/v_master_hewan_ternak',$data);
        $this->load->view('template/footer');
    }

    public function tambah_data(){
        $nama_hewan=$this->input->post('nama_hewan');
        
        $this->m_master_hewan_ternak->simpan_data($nama_hewan);

        redirect('C_master_hewan_ternak');

    }

    public function ubah_data(){
        $id=$this->input->post('id');
        $nama_hewan=$this->input->post('nama_hewan');

        $this->m_master_hewan_ternak->ubah_data($id, $nama_hewan);

        redirect('C_master_hewan_ternak');
    }

    public function hapus_data(){
        $id=$this->input->post('id');

        $this->m_master_hewan_ternak->hapus_data($id);
        redirect('C_master_hewan_ternak');
    }









}
?>