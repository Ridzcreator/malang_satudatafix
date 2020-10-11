<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_industri extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_jenis_industri');
    }

    public function index() {
    	$data['data']=$this->m_jenis_industri->tampil_jenis_industri();
        $this->load->view('template/header');
        $this->load->view('perindustrian/jenis_industri', $data);
        $this->load->view('template/footer');
    }

   	public function proses_input_jenis_industri(){
   		$keterangan = $this->input->post('nama_industri');
   		$this->m_jenis_industri->simpan_barang($keterangan);
		redirect('Jenis_industri');   	}

	public function proses_edit_jenis_industri(){
		$id=$this->input->post('id');
		$keterangan=$this->input->post('nama_industri');
		$this->m_jenis_industri->update_jenis_industri($id,$keterangan);
		redirect('Jenis_industri');	
	}	
	public function proses_delete_jenis_industri(){
		$id=$this->input->post('id');
		
		
		$this->m_jenis_industri->delete_jenis_industri($id);
		redirect(' Jenis_industri');	
	}	

	

}
