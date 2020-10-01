<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_kecamatan');
    }

    public function index() {
    	$data['data']=$this->m_kecamatan->tampil_kecamatan();
        $this->load->view('template/header');
        $this->load->view('user/kecamatan', $data);
        $this->load->view('template/footer');
    }

   	public function proses_input_kecamatan(){
   		$keterangan = $this->input->post('keterangan');
   		$this->m_kecamatan->simpan_barang($keterangan);
		redirect('kecamatan');   	}

	public function proses_edit_kecamatan(){
		$id=$this->input->post('id');
		$keterangan=$this->input->post('keterangan');
		$this->m_kecamatan->update_kecamatan($id,$keterangan);
		redirect('kecamatan');	
	}	
	public function proses_delete_kecamatan(){
		$id=$this->input->post('id');
		
		
		$this->m_kecamatan->delete_kecamatan($id);
		redirect('kecamatan');	
	}	

	

}
