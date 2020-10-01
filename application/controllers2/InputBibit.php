<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InputBibit extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_inputbibit');

    }
    public function index() {
		  $data['data']=$this->m_inputbibit->tampil_bencana();
        $this->load->view('template/header');
        $this->load->view('distribusibibit/v_inputbibit', $data);
        $this->load->view('template/footer');
    }
     
    public function proses_input_bibit(){
        $bibit = $this->input->post('bibit');
        $cek = $this->db->query("SELECT * FROM inputbibit where bibit='$bibit'");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('InputBibit','refresh');
           }
           else {
        $this->m_inputbibit->simpan_bencana($bibit);

        redirect('InputBibit');  
        }  
    }
    public function proses_edit_bibit(){
        $id=$this->input->post('id');
        $bibit = $this->input->post('bibit');
        $this->m_inputbibit->update_bencana_alam($id,$bibit);
        redirect('InputBibit');    
    } 
    public function proses_delete_bibit(){
        $id=$this->input->post('id');   
        $this->m_inputbibit->delete_bencana_alam($id);
        redirect('InputBibit');    
    }  

}