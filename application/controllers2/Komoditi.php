<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Komoditi extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_komoditi');
    }

    public function index() {
    	$data['data']=$this->m_komoditi->tampil_komoditi();
        $this->load->view('template/header');
        $this->load->view('perindustrian/komoditi', $data);
        $this->load->view('template/footer');
    }

   	public function proses_input_komoditi(){
   		$keterangan = $this->input->post('nama_komoditi');
   		$this->m_komoditi->simpan_barang($keterangan);
		redirect('Komoditi');   	}

	public function proses_edit_komoditi(){
		$id=$this->input->post('id');
		$keterangan=$this->input->post('nama_komoditi');
		$this->m_komoditi->update_komoditi($id,$keterangan);
		redirect('Komoditi');	
	}	
	public function proses_delete_komoditi(){
		$id=$this->input->post('id');
		
		
		$this->m_komoditi->delete_komoditi($id);
		redirect(' Komoditi');	
	}	

	

}
