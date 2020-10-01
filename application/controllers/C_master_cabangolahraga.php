<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_master_cabangolahraga extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_master_cabang');
    }

    public function index() {
    	$data['data']=$this->m_master_cabang->tampil_cabang();
        $this->load->view('template/header');
        $this->load->view('user/master_cabang_olahraga', $data);
        $this->load->view('template/footer');
    }

   	public function proses_input_master_cabang(){
   		$keterangan = $this->input->post('keterangan');
   		$this->m_master_cabang->simpan_barang($keterangan);
		redirect('C_master_cabangolahraga');   	}

	public function proses_edit_master_cabang(){
		$id=$this->input->post('id');
		$keterangan=$this->input->post('keterangan');
		$this->m_master_cabang->update_master_cabang($id,$keterangan);
		redirect('C_master_cabangolahraga');	
	}	
	public function proses_delete_kecamatan(){
		$id=$this->input->post('id');
		
		
		$this->m_master_cabang->delete_master_cabang($id);
		redirect('C_master_cabangolahraga');	
	}	

	

}
