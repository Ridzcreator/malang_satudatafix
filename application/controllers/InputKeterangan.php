<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InputKeterangan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_inputketerangan');

    }
    public function index() {
		  $data['data']=$this->m_inputketerangan->tampil_bencana();
        $this->load->view('template/header');
        $this->load->view('perhubungan/v_keterangan', $data);
        $this->load->view('template/footer');
    }
     
    public function proses_input_keterangan(){
        $keterangan = $this->input->post('keterangan');
        $cek = $this->db->query("SELECT * FROM master_keterangan_terminal where nama_keterangan='$keterangan'");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('InputKeterangan','refresh');
           }
           else {
        $this->m_inputketerangan->simpan_bencana($keterangan);

        redirect('InputKeterangan');  
        }  
    }
    public function proses_edit_terminal(){
        $id=$this->input->post('id');
        $keterangan = $this->input->post('keterangan');
        $this->m_inputketerangan->update_bencana_alam($id,$keterangan);
        redirect('InputKeterangan');    
    } 
    public function proses_delete_terminal(){
        $id=$this->input->post('id');   
        $this->m_inputketerangan->delete_bencana_alam($id);
        redirect('InputKeterangan');    
    }  

}