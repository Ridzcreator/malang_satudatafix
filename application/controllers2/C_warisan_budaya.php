<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_warisan_budaya extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_warisan_budaya');
    }

    public function index() {
    	$data['data']=$this->m_warisan_budaya->tampil_data();
        $this->load->view('template/header');
        $this->load->view('pariwisata/v_warisan_budaya', $data);
        $this->load->view('template/footer');
    }

    public function tampil_grafik_warisan() {
        $data['data']=$this->m_warisan_budaya->tampil_data();
        $this->load->view('template/header');
        $this->load->view('pariwisata/grafik_warisan_budaya', $data);
        $this->load->view('template/footer');
    }



}
?>