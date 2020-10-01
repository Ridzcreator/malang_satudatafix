<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Malatangkut extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_Malatangkut');
    }

    public function index() {
    	$data['data']=$this->m_Malatangkut->tampil_malatangkut();
        $this->load->view('template/header');
        $this->load->view('perumahan/master_alatangkut', $data);
        $this->load->view('template/footer');
    }

   	public function proses_input_malatangkut(){
   		$keterangan = $this->input->post('keterangan');
   		$this->m_Malatangkut->simpan_barang($keterangan);
		redirect('Malatangkut');   	}

	public function proses_edit_malatangkut(){
		$id=$this->input->post('id');
		$keterangan=$this->input->post('keterangan');
		$this->m_Malatangkut->update_malatangkut($id,$keterangan);
		redirect('Malatangkut');	
	}	
	public function proses_delete_malatangkut(){
		$id=$this->input->post('id');
		
		
		$this->m_Malatangkut->delete_malatangkut($id);
		redirect('Malatangkut');	
	}	

	

}
