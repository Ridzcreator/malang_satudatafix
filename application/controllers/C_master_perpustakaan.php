<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_master_perpustakaan extends CI_Controller {

   
    function __construct() {
        parent::__construct();
        $this->load->model('m_master_perpustakaan');
    }

    public function index() {
      $data['data']=$this->m_master_perpustakaan->tampil_perpustakaan();
        $this->load->view('template/header');
        $this->load->view('user/master_perpustakaan',$data);
		
    }
    public function get() {
    //$thn=$this->input->get('tahun');
    //$tahun=intval($thn);
    $data['data']=$this->m_master_perpustakaan->tampil_perpustakaan();
        $no=0;
    $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
          $temp = array();
                        $no++;
                        $id = $a['id'];
                        $nama_perpustakaan=$a['nama_perpustakaan'];
                        $lattitude=$a['lattitude'];
                        $longitude=$a['longitude'];
                        $alamat=$a['alamat'];
                        
            $temp[]=$no;
            $id = $a['id'];
            $temp[]=$nama_perpustakaan;
            $temp[]=$lattitude;
            $temp[]=$longitude;
            $temp[]=$alamat;
            $temp[]="<a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a> | 
                                 <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
            $tabel[]=$temp;
          }
          echo json_encode(array('data' => $tabel));
}
   	public function proses_input_perpustakaan(){
           $nama_perpustakaan=$this->input->post('nama_perpustakaan');
           $lattitude=$this->input->post('lattitude');
           $longitude=$this->input->post('longitude');
           $alamat=$this->input->post('alamat');
   		
   		$this->m_master_perpustakaan->simpan_perpustakaan($nama_perpustakaan, $lattitude, $longitude, $alamat);


		redirect('C_master_perpustakaan');   	
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
