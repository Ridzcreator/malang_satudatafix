<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_master_negara extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_master_negara');
    }

    public function index() {
    	$data['data']=$this->m_master_negara->tampil_negara();
        $this->load->view('template/header');
        $this->load->view('user/v_master_negara', $data);
        $this->load->view('template/footer');
    }

   	public function proses_input_master_negara(){
   		$keterangan = $this->input->post('keterangan');
   		$this->m_master_negara->simpan_barang($keterangan);
		redirect('C_master_negara');   	}

	public function proses_edit_master_negara(){
		$id=$this->input->post('id');
		$keterangan=$this->input->post('keterangan');
		$this->m_master_negara->update_master_negara($id,$keterangan);
		redirect('C_master_negara');	
	}	
	public function proses_delete_master_negara(){
		$id=$this->input->post('id');
		
		
		$this->m_master_negara->delete_master_negara($id);
		redirect('C_master_negara');	
	}	

	

}
