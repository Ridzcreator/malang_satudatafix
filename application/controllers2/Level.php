<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_level');
    }

    public function index() {
    	$data['data']=$this->m_level->tampil_level();
        $this->load->view('template/header');
        $this->load->view('user/level', $data);
        $this->load->view('template/footer');
    }

   	public function proses_input_level(){
   		$kode=$this->input->post('kode');
   		$keterangan = $this->input->post('keterangan');
   		$this->m_level->simpan_barang($kode,$keterangan);


		redirect('level');   	}

	public function proses_edit_level(){
		$id=$this->input->post('id');
		$kode=$this->input->post('kode');
		$keterangan=$this->input->post('keterangan');
		
		$this->m_level->update_level($id,$kode,$keterangan);
		redirect('level');	
	}	
	public function proses_delete_level(){
		$id=$this->input->post('id');
		
		
		$this->m_level->delete_level($id);
		redirect('level');	
	}	

	

}
