<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master_aset extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_aset');
    }

    public function index() {
    	$data['data']=$this->m_aset->tampil_aset();
        $this->load->view('template/header');
        $this->load->view('kecamatan/master_aset', $data);
        $this->load->view('template/footer');
    }

   	public function proses_input_aset(){
   		$keterangan = $this->input->post('keterangan');
   		$this->m_aset->simpan_barang($keterangan);
		redirect('Master_aset');   	}

	public function proses_edit_aset(){
		$id=$this->input->post('id');
		$keterangan=$this->input->post('keterangan');
		$this->m_aset->update_aset($id,$keterangan);
		redirect('Master_aset');	
	}	
	public function proses_delete_aset(){
		$id=$this->input->post('id');
		
		
		$this->m_aset->delete_aset($id);
		redirect('Master_aset');	
	}	

	

}
