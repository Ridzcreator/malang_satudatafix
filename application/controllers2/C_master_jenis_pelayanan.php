<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_master_jenis_pelayanan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_master_jenis_pelayanan');
    }

    public function index() {
    	$data['data']=$this->m_master_jenis_pelayanan->tampil_data();
        $this->load->view('template/header');
        $this->load->view('kecamatan/v_master_jenis_pelayanan', $data);
        $this->load->view('template/footer');
    }

   	public function tambah_data(){
   		$keterangan = $this->input->post('keterangan');
   		$this->m_master_jenis_pelayanan->tambah_data($keterangan);
		redirect('C_master_jenis_pelayanan');   	}

	public function edit_data(){
		$id=$this->input->post('id');
		$keterangan=$this->input->post('keterangan');
		$this->m_master_jenis_pelayanan->edit_data($id,$keterangan);
		redirect('C_master_jenis_pelayanan');	
	}	
	public function hapus_data(){
		$id=$this->input->post('id');
		
		
		$this->m_master_jenis_pelayanan->hapus_data($id);
		redirect('C_master_jenis_pelayanan');	
	}	

	

}
