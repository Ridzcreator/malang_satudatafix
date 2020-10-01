<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Perhubungan extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('template/header');
        $this->load->view('perhubungan/perhubungan');
        $this->load->view('template/footer');
    }

}
