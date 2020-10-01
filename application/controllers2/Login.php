<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_login');
    }

public function index(){
	$this->load->view('Login');
}
function cekuser(){
        $username=strip_tags(stripslashes($this->input->post('username',TRUE)));
        $password=strip_tags(stripslashes($this->input->post('password',TRUE)));
        $u=$username;
        $p=$password;
        $cadmin=$this->m_login->cekadmin($u,$p);
        if($cadmin->num_rows() > 0){
         $this->session->set_userdata('masuk',true);
         $this->session->set_userdata('user',$u);
         $xcadmin=$cadmin->row_array();
         if($xcadmin['level']=='1')
            $this->session->set_userdata('akses','1');
            $idadmin=$xcadmin['id'];
            $user_nama=$xcadmin['user_nama'];
            $this->session->set_userdata('idadmin',$idadmin);
            $this->session->set_userdata('nama',$user_nama);
         if($xcadmin['user_level']=='2'){
             $this->session->set_userdata('akses','2');
             $idadmin=$xcadmin['id'];
             $user_nama=$xcadmin['user_nama'];
             $this->session->set_userdata('idadmin',$idadmin);
             $this->session->set_userdata('nama',$user_nama);
         } //Front Office
           
         
         
        }
        
        if($this->session->userdata('masuk')==true){
            redirect('login/berhasillogin');
        }else{
            redirect('login/gagallogin');
        }
    }
        function berhasillogin(){
            redirect('welcomee');
        }
        function gagallogin(){
            $url=base_url('login');
            echo $this->session->set_flashdata('msg','<script> alert("Username atau Password anda salah") </script>');
            redirect($url);
        }
        function logout(){
            $this->session->sess_destroy();
            $url=base_url('login');
            redirect($url);
        }

}