<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PasarM extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_pasarm');
    }

    public function index() {
    	$data['data']=$this->m_pasarm->tampil_pasarm();
        $this->load->view('template/header');
        $this->load->view('user/pasarm', $data);
        $this->load->view('template/footer');
    }

   	public function proses_input_pasarm(){
   		$keterangan = $this->input->post('nama_pasar_modern');
   		$this->m_pasarm->simpan_barang($keterangan);
		redirect('Pasarm');   	}

	public function proses_edit_pasarm(){
		$id=$this->input->post('id_pasar');
		$keterangan=$this->input->post('nama_pasar_modern');
		$this->m_pasarm->update_pasarm($id,$keterangan);
		redirect('Pasarm');	
	}	
	public function proses_delete_pasarm(){
		$id=$this->input->post('id_pasar');
		
		
		$this->m_pasarm->delete_pasarm($id);
		redirect('Pasarm');	
	}	

	

}
