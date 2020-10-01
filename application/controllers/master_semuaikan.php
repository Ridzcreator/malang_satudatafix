<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class master_semuaikan extends CI_Controller {

   
    function __construct() {
        parent::__construct();
        $this->load->model('m_master_semuaikan');
    }

    public function index() {
      $data['data']=$this->m_master_semuaikan->tampil_semua_ikan();
        $this->load->view('template/header');
        $this->load->view('user/master_semua_ikan',$data);
		
    }
    public function get() {
    //$thn=$this->input->get('tahun');
    //$tahun=intval($thn);
    $data['data']=$this->m_master_semuaikan->tampil_semua_ikan();
        $no=0;
    $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
          $temp = array();
                        $no++;
                         $id = $a['id'];
                        $jnsikan=$a['jenis_ikan'];
                        $ktr=$a['keterangan'];
            $temp[]=$no;
            $id = $a['id'];
            $temp[]=$jnsikan;
            $temp[]=$ktr;
            $temp[]="<a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a> | 
                                 <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
            $tabel[]=$temp;
          }
          echo json_encode(array('data' => $tabel));
}
   	public function proses_input_semua_ikan(){
   		$jnsikan=$this->input->post('jenis_ikan');
   		$ktr= $this->input->post('keterangan');
   		$this->m_master_semuaikan->simpan_semua_ikan($jnsikan,$ktr);


		redirect('master_semuaikan');   	
  }
  public function proses_edit_semua_ikan(){
      $id=$this->input->post('id');
      $jnsikan=$this->input->post('jenis_ikan');
      $ktr= $this->input->post('keterangan');
     $this->m_master_semuaikan->edit_semua_ikan($id,$jnsikan,$ktr);


    redirect('master_semuaikan');     
  }
 public function proses_hapus_semua_ikan(){
    $id=$this->input->post('id');
    
    
    $this->m_master_semuaikan->delete_semua_ikan($id);
    redirect('master_semuaikan');  
  }    

}
