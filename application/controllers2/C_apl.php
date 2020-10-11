<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_apl extends CI_Controller {

   
    function __construct() {
        parent::__construct();
        $this->load->model('m_apl');
    }

    public function index() {
      $periode=date('y');
      $tahun =0000;
      $data['data']=$this->m_apl->tampil_apl($tahun);
      $data['datax']=$this->m_apl->tampil_tahun();
        $this->load->view('template/header');
        $this->load->view('kominfo/v_apl',$data);
        $this->load->view('template/footer');
    }

    public function get() {
      $thn = $this->input->get('tahun');
      $tahun=intval($thn);
      $data['data']=$this->m_apl->tampil_apl($tahun);
      $no=0;
      $tabel=array();
        foreach ($data['data']->result_array() as $a) {
          $temp = array();
            $no++;
            $id = $a['id'];
            $nama=$a['nama_apl'];
            $stts=$a['stts'];
            $tahun=$a['tahun'];
            $temp[]=$no;
            $temp[]=$nama;
            $temp[]=$stts;
            $temp[]=$tahun;
            $temp[]="
                     <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
            $tabel[]=$temp;
          }
          echo json_encode(array('data' => $tabel));
    }

     public function tampil_crosstab_apl(){
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
       if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['data']=$this->m_apl->semua_data_crosstab();
      $data['tahun']=$this->m_apl->tampil_periodec($tahun1,$tahun2);
      $data['nama_apl']=$this->m_apl->tampil_aplc();

        $this->load->view('template/header');
        $this->load->view('kominfo/tampil_crosstab_apl', $data);
        $this->load->view('template/footer');

    }
     
   	public function proses_input_apl(){
      $nama=$this->input->post('nama_apl');
      $stts=$this->input->post('stts');
      $tahun= $this->input->post('tahun');
      $penginput = $this->input->post('penginput');
   		$this->m_apl->simpan_apl($nama,$stts,$tahun,$penginput);
		  redirect('C_apl');   	
    }
 
    public function proses_edit_apl(){
      $id=$this->input->post('id');
      $nama=$this->input->post('nama_apl');
      $stts=$this->input->post('stts');
      $tahun= $this->input->post('tahun');
      $penginput = $this->input->post('penginput');
      $this->m_apl->edit_apl($id,$nama,$stts,$tahun,$penginput);
      redirect('C_apl');     
    }
 
    public function proses_hapus_apl(){
      $id=$this->input->post('id');
      $this->m_apl->delete_apl($id);
      redirect('C_apl');  
    }    

}
