<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mlapanganolahraga extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('M_Mlapanganolahraga');
    }

    public function index() {
    	$data['data']=$this->M_Mlapanganolahraga->tampil_mlapanganolahraga();
        $this->load->view('template/header');
        $this->load->view('kecamatan/master_lapangan_olahraga', $data);
        $this->load->view('template/footer');
    }

   	public function proses_input_mlapanganolahraga(){
   		$keterangan = $this->input->post('keterangan');
   		$this->M_Mlapanganolahraga->simpan_barang($keterangan);
		redirect('Mlapanganolahraga');   	}

	public function proses_edit_mlapanganolahraga(){
		$id=$this->input->post('id');
		$keterangan=$this->input->post('keterangan');
		$this->M_Mlapanganolahraga->update_mlapanganolahraga($id,$keterangan);
		redirect('Mlapanganolahraga');	
	}	
	public function proses_delete_mlapanganolahraga(){
		$id=$this->input->post('id');
		
		
		$this->M_Mlapanganolahraga->delete_mlapanganolahraga($id);
		redirect('Mlapanganolahraga');	
	}	

	

}
