<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_master_kerjasama extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_master_kerjasama');
    }

    public function index() {
    	$data['data']=$this->m_master_kerjasama->tampil_kerjasama();
        $this->load->view('template/header');
        $this->load->view('user/v_master_kerjasama', $data);
        $this->load->view('template/footer');
    }

   	public function proses_input_master_kerjasama(){
   		$keterangan = $this->input->post('keterangan');
   		$this->m_master_kerjasama->simpan_barang($keterangan);
		redirect('C_master_kerjasama');   	}

	public function proses_edit_master_kerjasama(){
		$id=$this->input->post('id');
		$keterangan=$this->input->post('keterangan');
		$this->m_master_kerjasama->update_master_kerjasama($id,$keterangan);
		redirect('C_master_kerjasama');	
	}	
	public function proses_delete_master_kerjasama(){
		$id=$this->input->post('id');
		
		
		$this->m_master_kerjasama->delete_master_kerjasama($id);
		redirect('C_master_kerjasama');	
	}	

	

}
