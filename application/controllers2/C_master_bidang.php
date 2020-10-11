<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_master_bidang extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_mstrbidang');
    }

    public function index() {
    	$data['data']=$this->m_mstrbidang->tampil_bidang();
        $this->load->view('template/header');
        $this->load->view('perindustrian/v_master_bidang_usaha', $data);
        $this->load->view('template/footer');
    }

   	public function proses_input_mstrbidang(){
   		$sktr = $this->input->post('sektor');
   		$keterangan = $this->input->post('keterangan');
   		$this->m_mstrbidang->simpan_bidang($sktr,$keterangan);
		redirect('C_master_bidang');   	
	}

	public function proses_edit_mstrbidang(){
		$id=$this->input->post('id');
		$sktr = $this->input->post('sektor');
		$keterangan=$this->input->post('keterangan');
		$this->m_mstrbidang->update_mstrbidang($id,$sktr,$keterangan);
		redirect('C_master_bidang');	
	}	
	public function proses_delete_mstrbidang(){
		$id=$this->input->post('id');
		
		
		$this->m_mstrbidang->delete_mstrbidang($id);
		redirect('C_master_bidang');	
	}	

	

}
