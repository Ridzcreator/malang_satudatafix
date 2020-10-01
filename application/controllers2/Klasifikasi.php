<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Klasifikasi extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_klasifikasi');
    }

    public function index() {
    	$data['data']=$this->m_klasifikasi->tampil_klasifikasi();
        $this->load->view('template/header');
        $this->load->view('perindustrian/klasifikasi', $data);
        $this->load->view('template/footer');
    }

   	public function proses_input_klasifikasi(){
   		$keterangan = $this->input->post('nama_klasifikasi');
   		$this->m_klasifikasi->simpan_barang($keterangan);
		redirect('Klasifikasi');   	}

	public function proses_edit_klasifikasi(){
		$id=$this->input->post('id');
		$keterangan=$this->input->post('nama_klasifikasi');
		$this->m_klasifikasi->update_klasifikasi($id,$keterangan);
		redirect('Klasifikasi');	
	}	
	public function proses_delete_klasifikasi(){
		$id=$this->input->post('id');
		
		
		$this->m_klasifikasi->delete_klasifikasi($id);
		redirect('Klasifikasi');	
	}	

	

}
