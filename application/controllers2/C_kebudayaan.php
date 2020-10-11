<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_kebudayaan extends CI_Controller {

   
    function __construct() {
        parent::__construct();
        $this->load->model('m_kebudayaan');
    }

    public function index() {
      $periode=date('y');
      $tahun =0000;
      $data['data']=$this->m_kebudayaan->tampil_kebudayaan($tahun);
      $data['datax']=$this->m_kebudayaan->tampil_tahun();
      $data['datay']=$this->m_kebudayaan->tampil_warisan();
        $this->load->view('template/header');
        $this->load->view('kebudayaan/v_awal_kebudayaan',$data);
        $this->load->view('template/footer');

    }

    public function get() {
    $thn = $this->input->get('tahun');
    $tahun=intval($thn);
    $data['data']=$this->m_kebudayaan->tampil_kebudayaan($tahun);
        $no=0;
    $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
          $temp = array();
            $no++;
            $id = $a['id'];
            $jns=$a['jns_warisan'];
            $jumlah=$a['jml_warisan'];
            $tahun=$a['tahun'];
            $temp[]=$no;
            $temp[]=$tahun;
            $temp[]=$jns;
            $temp[]=$jumlah;
            $temp[]="<a class=\"btn btn-xs btn-warning\" href=\"C_kebudayaan/tampil_detail_kebudayaan/$tahun/$jns\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span>Detail</a>";
            $tabel[]=$temp;
          }
          echo json_encode(array('data' => $tabel));
  }

  //  	public function proses_input_kebudayaan(){
  //     $warisan=$this->input->post('jns_warisan');
  //     $jumlah=$this->input->post('jml_warisan');
  //     $tahun=$this->input->post('tahun');
  //     $penginput = $this->input->post('penginput');
  //     $this->m_kebudayaan->simpan_kebudayaan($warisan,$jumlah,$tahun,$penginput);


		// redirect('C_kebudayaan');   	
  // }

    public function proses_input_awal_kebudayaan(){
      $nama=$this->input->post('nama_warisan');
      $jns=$this->input->post('jns_warisan');
      $lokasi=$this->input->post('lokasi');
      $jumlah=$this->input->post('jml_warisan');
      $tahun= $this->input->post('tahun');
      $penginput = $this->input->post('penginput');
      $this->m_kebudayaan->simpan_kebudayaan($nama,$jns,$lokasi,$jumlah,$tahun,$penginput);
      redirect('C_kebudayaan');    
    }

    public function proses_edit_kebudayaan(){
      $id=$this->input->post('id');
      $warisan=$this->input->post('jns_warisan');
      $jumlah=$this->input->post('jml_warisan');
      $tahun=$this->input->post('tahun');
      $penginput = $this->input->post('penginput');
      $this->m_kebudayaan->edit_kebudayaan($id,$warisan,$jumlah,$tahun,$penginput);


    redirect('C_kebudayaan');     
  }
   public function tampil_grafik_kebudayaan(){
        $tahun =0000;
        $data['data']=$this->m_kebudayaan->tampil_kebudayaan($tahun);
        $this->load->view('template/header');
        $this->load->view('kebudayaan/grafik_kebudayaan',$data);
        $this->load->view('template/footer');
    }

    public function tampil_detail_kebudayaan(){
        $tahun = $this->uri->segment(3);
        $data['data']=$this->m_kebudayaan->tampil_detail_kebudayaan($tahun);

        $this->load->view('template/header');
        $this->load->view('kebudayaan/v_detail_kebudayaan', $data);
        $this->load->view('template/footer');
    }
 
 public function proses_hapus_kebudayaan(){
    $id=$this->input->post('id');
    $this->m_kebudayaan->delete_kebudayaan($id);
    redirect('C_kebudayaan');  
  }    

}
