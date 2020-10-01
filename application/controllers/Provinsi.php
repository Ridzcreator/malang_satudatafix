<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_provinsi');
    }

    public function index() {
    	$data['data']=$this->m_provinsi->tampil_provinsi();
        $this->load->view('template/header');
        $this->load->view('transmigrasi/provinsi', $data);
        $this->load->view('template/footer');
    }

   	public function proses_input_provinsi(){
   		$keterangan = $this->input->post('nama_provinsi');
   		$this->m_provinsi->simpan_barang($keterangan);
		redirect(' Provinsi');   	}

	public function proses_edit_provinsi(){
		$id=$this->input->post('id');
		$keterangan=$this->input->post('nama_provinsi');
		$this->m_provinsi->update_provinsi($id,$keterangan);
		redirect('Provinsi');	
	}	
	public function proses_delete_provinsi(){
		$id=$this->input->post('id');
		
		
		$this->m_provinsi->delete_provinsi($id);
		redirect('Provinsi');	
	}	

	

}
