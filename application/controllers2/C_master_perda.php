<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_master_perda extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_master_perda');
    }

    public function index() {
    	$data['data']=$this->m_master_perda->tampil_perda();
        $this->load->view('template/header');
        $this->load->view('kominfo/v_master_perda', $data);
        $this->load->view('template/footer');
    }

   	public function proses_input_master_perda(){
   		$keterangan = $this->input->post('keterangan');
   		$this->m_master_perda->simpan_barang($keterangan);
		redirect('C_master_perda');   	}

	public function proses_edit_master_perda(){
		$id=$this->input->post('id');
		$keterangan=$this->input->post('keterangan');
		$this->m_master_perda->update_master_perda($id,$keterangan);
		redirect('C_master_perda');	
	}	
	public function proses_delete_master_perda(){
		$id=$this->input->post('id');
		
		
		$this->m_master_perda->delete_master_perda($id);
		redirect('C_master_perda');	
	}	

	

}
