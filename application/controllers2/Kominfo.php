<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kominfo extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('template/header');
        $this->load->view('kominfo/kominfo');
        $this->load->view('template/footer');
    }

}
