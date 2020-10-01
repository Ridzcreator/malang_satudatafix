<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InputBencana extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_inputbencana');

    }
    public function index() {
		  $data['data']=$this->m_inputbencana->tampil_bencana();
        $this->load->view('template/header');
        $this->load->view('bencana/bencana', $data);
        $this->load->view('template/footer');
    }
     
    public function proses_input_master_bencana(){
        $bencana = $this->input->post('bencana');
        $cek = $this->db->query("SELECT * FROM bencana where bencana='$bencana'");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('InputBencana','refresh');
           }
           else {
       

        $this->m_inputbencana->simpan_bencana($bencana);

        redirect('InputBencana');  
        }  
    }
    public function proses_edit_bencana_alam(){
        $id=$this->input->post('id');
        $bencana = $this->input->post('bencana');
        $this->m_inputbencana->update_bencana_alam($id,$bencana);
        redirect('InputBencana');    
    } 
    public function proses_delete_bencana_alam(){
        $id=$this->input->post('id');   
        $this->m_inputbencana->delete_bencana_alam($id);
        redirect('InputBencana');    
    }  

}