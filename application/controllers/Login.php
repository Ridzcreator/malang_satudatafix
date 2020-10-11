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
         $idadmin=$xcadmin['id'];
         $user_nama=$xcadmin['user_nama'];
		 $level=$xcadmin['level'];
			$m1=$xcadmin['m1'];
			$m2=$xcadmin['m2'];
			$m3=$xcadmin['m3'];
			$m4=$xcadmin['m4'];
			$m5=$xcadmin['m5'];
			$m6=$xcadmin['m6'];
			$m7=$xcadmin['m7'];
			$m8=$xcadmin['m8'];
			$m9=$xcadmin['m9'];
			$m10=$xcadmin['m10'];
			$m11=$xcadmin['m11'];
			$m12=$xcadmin['m12'];
			$m13=$xcadmin['m13'];
			$m14=$xcadmin['m14'];
			$m15=$xcadmin['m15'];
			$m16=$xcadmin['m16'];
			$m17=$xcadmin['m17'];
			$m18=$xcadmin['m18'];
			$m19=$xcadmin['m19'];
			$m20=$xcadmin['m20'];
			$m21=$xcadmin['m21'];
			$k1=$xcadmin['k1'];
			$k2=$xcadmin['k2'];
			$k3=$xcadmin['k3'];
			$k4=$xcadmin['k4'];
			$k5=$xcadmin['k5'];
			$k6=$xcadmin['k6'];
			$k7=$xcadmin['k7'];
			$k8=$xcadmin['k8'];
			$k9=$xcadmin['k9'];
			$k10=$xcadmin['k10'];
			$k11=$xcadmin['k11'];
			$k12=$xcadmin['k12'];
			$k13=$xcadmin['k13'];
			$k14=$xcadmin['k14'];
			$k15=$xcadmin['k15'];
			$k16=$xcadmin['k16'];
			$k17=$xcadmin['k17'];
			$k18=$xcadmin['k18'];
			$k19=$xcadmin['k19'];
			$k20=$xcadmin['k20'];
			$k21=$xcadmin['k21'];
			$k22=$xcadmin['k22'];
			$k23=$xcadmin['k23'];
			$k24=$xcadmin['k24'];
			$k25=$xcadmin['k25'];
			$k26=$xcadmin['k26'];
			$k27=$xcadmin['k27'];
			$k28=$xcadmin['k28'];
			$k29=$xcadmin['k29'];
			$k30=$xcadmin['k30'];
			$k31=$xcadmin['k31'];
			$k32=$xcadmin['k32'];
			$k33=$xcadmin['k33'];
			$this->session->set_userdata('level',$level);
            $this->session->set_userdata('idadmin',$idadmin);
            $this->session->set_userdata('nama',$user_nama);
			$this->session->set_userdata('menu1',$m1);
			$this->session->set_userdata('menu2',$m2);
			$this->session->set_userdata('menu3',$m3);
			$this->session->set_userdata('menu4',$m4);
			$this->session->set_userdata('menu5',$m5);
			$this->session->set_userdata('menu6',$m6);
			$this->session->set_userdata('menu7',$m7);
			$this->session->set_userdata('menu8',$m8);
			$this->session->set_userdata('menu9',$m9);
			$this->session->set_userdata('menu10',$m10);
			$this->session->set_userdata('menu11',$m11);
			$this->session->set_userdata('menu12',$m12);
			$this->session->set_userdata('menu13',$m13);
			$this->session->set_userdata('menu14',$m14);
			$this->session->set_userdata('menu15',$m15);
			$this->session->set_userdata('menu16',$m16);
			$this->session->set_userdata('menu17',$m17);
			$this->session->set_userdata('menu18',$m18);
			$this->session->set_userdata('menu19',$m19);
			$this->session->set_userdata('menu20',$m20);
			$this->session->set_userdata('menu21',$m21);
			$this->session->set_userdata('kec1',$k1);
			$this->session->set_userdata('kec2',$k2);
			$this->session->set_userdata('kec3',$k3);
			$this->session->set_userdata('kec4',$k4);
			$this->session->set_userdata('kec5',$k5);
			$this->session->set_userdata('kec6',$k6);
			$this->session->set_userdata('kec7',$k7);
			$this->session->set_userdata('kec8',$k8);
			$this->session->set_userdata('kec9',$k9);
			$this->session->set_userdata('kec10',$k10);
			$this->session->set_userdata('kec11',$k11);
			$this->session->set_userdata('kec12',$k12);
			$this->session->set_userdata('kec13',$k13);
			$this->session->set_userdata('kec14',$k14);
			$this->session->set_userdata('kec15',$k15);
			$this->session->set_userdata('kec16',$k16);
			$this->session->set_userdata('kec17',$k17);
			$this->session->set_userdata('kec18',$k18);
			$this->session->set_userdata('kec19',$k19);
			$this->session->set_userdata('kec20',$k20);
			$this->session->set_userdata('kec21',$k21);
			$this->session->set_userdata('kec22',$k22);
			$this->session->set_userdata('kec23',$k23);
			$this->session->set_userdata('kec24',$k24);
			$this->session->set_userdata('kec25',$k25);
			$this->session->set_userdata('kec26',$k26);
			$this->session->set_userdata('kec27',$k27);
			$this->session->set_userdata('kec28',$k28);
			$this->session->set_userdata('kec29',$k29);
			$this->session->set_userdata('kec30',$k30);
			$this->session->set_userdata('kec31',$k31);
			$this->session->set_userdata('kec32',$k32);
			$this->session->set_userdata('kec33',$k33);
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