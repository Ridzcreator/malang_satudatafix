<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bulan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_bulan');
    }

    public function index() {
    	$data['data']=$this->m_bulan->tampil_bulan();
        $this->load->view('template/header');
        $this->load->view('user/bulan', $data);
        $this->load->view('template/footer');
    }

   	public function proses_input_bulan(){
   		$keterangan = $this->input->post('keterangan');
   		$this->m_bulan->simpan_barang($keterangan);
		redirect('Bulan');   	}

	public function proses_edit_bulan(){
		$id=$this->input->post('id');
		$keterangan=$this->input->post('keterangan');
		$this->m_bulan->update_bulan($id,$keterangan);
		redirect('Bulan');	
	}	
	public function proses_delete_bulan(){
		$id=$this->input->post('id');
		
		
		$this->m_bulan->delete_bulan($id);
		redirect('Bulan');	
	}	

	

}
