<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_master_wisata extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_jenis_wisata');
    }

    public function index() {
        $data['data']=$this->m_jenis_wisata->tampil_jenis_wisata();
        $this->load->view('template/header');
        $this->load->view('pariwisata/v_jenis_wisata',$data);
        $this->load->view('template/footer');
    }

    public function simpan_jenis_wisata(){
        //$id=$this->input->post('id');
        $jenis_wisata=$this->input->post('jenis_wisata');
        
        $this->m_jenis_wisata->simpan_jenis_wisata($jenis_wisata);

        redirect('C_master_wisata');

    }

    public function update_jenis_wisata(){
        $id=$this->input->post('id');
        $jenis_wisata=$this->input->post('jenis_wisata');

        $this->m_jenis_wisata->update_jenis_wisata($id, $jenis_wisata);

        redirect('C_master_wisata');
    }

    public function delete_jenis_wisata(){
        $id=$this->input->post('id');

        $this->m_jenis_wisata->delete_jenis_wisata($id);
        redirect('C_master_wisata');
    }









}
?>