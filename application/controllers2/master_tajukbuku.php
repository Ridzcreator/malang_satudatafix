<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class master_tajukbuku extends CI_Controller {

   
    function __construct() {
        parent::__construct();
        $this->load->model('m_master_tajukbuku');
    }

    public function index() {
      $data['data']=$this->m_master_tajukbuku->tampil_tajuk_buku();
        $this->load->view('template/header');
        $this->load->view('user/master_tajuk_buku',$data);
		
    }
    public function get() {
    //$thn=$this->input->get('tahun');
    //$tahun=intval($thn);
    $data['data']=$this->m_master_tajukbuku->tampil_tajuk_buku();
        $no=0;
    $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
          $temp = array();
                        $no++;
                         $id = $a['id'];
                        $tb=$a['tajuk_buku'];
                        
            $temp[]=$no;
            $id = $a['id'];
            $temp[]=$tb;
            $temp[]="<a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a> | 
                                 <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
            $tabel[]=$temp;
          }
          echo json_encode(array('data' => $tabel));
}
   	public function proses_input_tajuk_buku(){
   		$tb=$this->input->post('tajuk_buku');
   		
   		$this->m_master_tajukbuku->simpan_tajuk_buku($tb);


		redirect('master_tajukbuku');   	
  }
  public function proses_edit_tajuk_buku(){
      $id=$this->input->post('id');
      $tb=$this->input->post('tajuk_buku');
      
     $this->m_master_tajukbuku->edit_tajuk_buku($id,$tb);


    redirect('master_tajukbuku');     
  }
 public function proses_hapus_tajuk_buku(){
    $id=$this->input->post('id');
    
    
    $this->m_master_tajukbuku->delete_tajuk_buku($id);
    redirect('master_tajukbuku');  
  }    

}
