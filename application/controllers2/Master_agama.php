<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master_agama extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_agama');
    }

    public function index() {
    	$data['data']=$this->m_agama->tampil_agama();
        $this->load->view('template/header');
        $this->load->view('user/master_agama', $data);
        $this->load->view('template/footer');
    }

   	public function proses_input_agama(){
   		$keterangan = $this->input->post('keterangan');
   		$this->m_agama->simpan_barang($keterangan);
		redirect('Master_agama');   	}

	public function proses_edit_agama(){
		$id=$this->input->post('id');
		$keterangan=$this->input->post('keterangan');
		$this->m_agama->update_agama($id,$keterangan);
		redirect('Master_agama');	
	}	
	public function proses_delete_agama(){
		$id=$this->input->post('id');
		
		
		$this->m_agama->delete_agama($id);
		redirect('Master_agama');	
	}	

	

}
