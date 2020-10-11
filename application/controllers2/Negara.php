<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Negara extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_negara');
    }

    public function index() {
    	$data['data']=$this->m_negara->tampil_negara();
        $this->load->view('template/header');
        $this->load->view('perdagangan/negara', $data);
        $this->load->view('template/footer');
    }

   	public function proses_input_negara(){
   		$keterangan = $this->input->post('nama_negara');
   		$this->m_negara->simpan_barang($keterangan);
		redirect('Negara');   	}

	public function proses_edit_negara(){
		$id=$this->input->post('id');
		$keterangan=$this->input->post('nama_negara');
		$this->m_negara->update_negara($id,$keterangan);
		redirect('Negara');	
	}	
	public function proses_delete_negara(){
		$id=$this->input->post('id');
		
		
		$this->m_negara->delete_negara($id);
		redirect(' Negara');	
	}	

	

}
