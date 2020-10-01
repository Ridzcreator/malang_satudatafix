<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_master_provider extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_master_provider');
    }

    public function index() {
    	$data['data']=$this->m_master_provider->tampil_provider();
        $this->load->view('template/header');
        $this->load->view('user/v_master_provider', $data);
        $this->load->view('template/footer');
    }

   	public function proses_input_master_provider(){
   		$keterangan = $this->input->post('keterangan');
   		$this->m_master_provider->simpan_barang($keterangan);
		redirect('C_master_provider');   	}

	public function proses_edit_master_provider(){
		$id=$this->input->post('id');
		$keterangan=$this->input->post('keterangan');
		$this->m_master_provider->update_master_provider($id,$keterangan);
		redirect('C_master_provider');	
	}	
	public function proses_delete_master_provider(){
		$id=$this->input->post('id');
		
		
		$this->m_master_provider->delete_master_provider($id);
		redirect('C_master_provider');	
	}	

	

}
