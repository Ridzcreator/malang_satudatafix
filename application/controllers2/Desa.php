<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Desa extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_desa');
    }

    public function index() {
    	$data['data']=$this->m_desa->tampil_desa();
    	$data['kecamatan']=$this->m_desa->tampil_kecamatan();
        $this->load->view('template/header');
        $this->load->view('user/desa', $data);
        $this->load->view('template/footer');
    }

   	public function proses_input_desa(){
   		$kecamatan = $this->input->post('kecamatan');
   		$keterangan = $this->input->post('desa');
   		$this->m_desa->simpan_barang($keterangan,$kecamatan);
		redirect('desa');   	}

	public function proses_edit_desa(){
		$kecamatan = $this->input->post('kecamatan');
		$id=$this->input->post('id');
		$keterangan=$this->input->post('desa');
		$this->m_desa->update_desa($id,$keterangan,$kecamatan);
		redirect('desa');	
	}	
	public function proses_delete_desa(){
		$id=$this->input->post('id');
		
		
		$this->m_desa->delete_desa($id);
		redirect('desa');	
	}	

	

}
