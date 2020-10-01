<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_user');
    }

    public function index() {
    	$data['data']=$this->m_user->tampil_user();
		$data['datas']=$this->m_user->tampil_userlevel();
        $this->load->view('template/header');
        $this->load->view('user/user', $data);
        $this->load->view('template/footer');
    }

   	public function proses_input_user(){
   		$user=$this->input->post('user');
   		$password = $this->input->post('password');
		$level = $this->input->post('level');
		$penginput = $this->input->post('penginput');
   		$this->m_user->simpan_barang($user,$password,$level,$penginput);
		redirect('User');   	
	}

	public function proses_edit_user(){
		$id=$this->input->post('id');
		$user=$this->input->post('user');
		$password=$this->input->post('password');
		$level=$this->input->post('level');
		$penginput = $this->input->post('penginput');
		$this->m_user->update_user($id,$user,$password,$level,$penginput);	
		redirect('User');	
	}	
	public function proses_delete_user(){
		$id=$this->input->post('id');
		$this->m_user->delete_user($id);
		redirect('User');	
	}	

	

}
