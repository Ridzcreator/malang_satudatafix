<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InputTerminal extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_inputterminal');

    }
    public function index() {
		  $data['data']=$this->m_inputterminal->tampil_bencana();
        $this->load->view('template/header');
        $this->load->view('perhubungan/v_terminal', $data);
        $this->load->view('template/footer');
    }
     
    public function proses_input_terminal(){
        $terminal = $this->input->post('terminal');
        $cek = $this->db->query("SELECT * FROM master_terminal where nama_terminal='$terminal'");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('InputTerminal','refresh');
           }
           else {
        $this->m_inputterminal->simpan_bencana($terminal);

        redirect('InputTerminal');  
        }  
    }
    public function proses_edit_terminal(){
        $id=$this->input->post('id');
        $terminal = $this->input->post('terminal');
        $this->m_inputterminal->update_bencana_alam($id,$terminal);
        redirect('InputTerminal');    
    } 
    public function proses_delete_terminal(){
        $id=$this->input->post('id');   
        $this->m_inputterminal->delete_bencana_alam($id);
        redirect('InputTerminal');    
    }  

}