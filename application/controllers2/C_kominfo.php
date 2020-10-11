<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_kominfo extends CI_Controller {

   
    function __construct() {
        parent::__construct();
        $this->load->model('m_kominfo');
    }

    public function index() {
      $periode=date('y');
      $tahun =0000;
      $data['data']=$this->m_kominfo->tampil_perda($tahun);
      $data['datas']=$this->m_kominfo->tampil_nmperda();
      $data['dataz']=$this->m_kominfo->tampil_provider();
      $data['datax']=$this->m_kominfo->tampil_tahun();
      
        $this->load->view('template/header');
        $this->load->view('kominfo/v_kominfo',$data);
        $this->load->view('template/footer');
    }

    public function get() {
      $thn = $this->input->get('tahun');
      $tahun=intval($thn);
      $data['data']=$this->m_kominfo->tampil_perda($tahun);
      $no=0;
      $tabel=array();
        foreach ($data['data']->result_array() as $a) {
          $temp = array();
                        $no++;
                        $id = $a['id'];
                        $nama=$a['nama_perda'];
                        $stts=$a['terhubung'];
                        $akses=$a['akses'];
                        $oprtr=$a['operator'];
                        $tahun=$a['tahun'];
            $temp[]=$no;
            $temp[]=$nama;
            $temp[]=$stts;
            $temp[]=$akses;
            $temp[]=$oprtr;
            $temp[]=$tahun;
            $temp[]="
                     <a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a> | 
                     <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
            $tabel[]=$temp;
          }
          echo json_encode(array('data' => $tabel));
  }

    public function tampil_grafik_perda1(){
        $tahun =0000;
        $data['data']=$this->m_kominfo->tampil_perda($tahun);
        $this->load->view('template/header');
        $this->load->view('kominfo/grafik_perda',$data);
        $this->load->view('template/footer');
    }

    public function tampil_grafik_perda(){
        $tahunx=$this->input->post('tahunx');
        $data['data']=$this->m_kominfo->tampil_perda($tahunx);
        $this->load->view('template/header');
        $this->load->view('kominfo/grafik_perda',$data);
        $this->load->view('template/footer');
    }
     
   	public function proses_input_perda(){
      $nama=$this->input->post('nama_perda');
      $hbg=$this->input->post('terhubung');
      $akses= $this->input->post('akses');
      $oprtr= $this->input->post('operator');
      $tahun= $this->input->post('tahun');
      $penginput = $this->input->post('penginput');
   		$this->m_kominfo->simpan_kominfo($nama,$hbg,$akses,$oprtr,$tahun,$penginput);

		  redirect('C_kominfo');   	
    }
 
    public function proses_edit_perda(){
      $id=$this->input->post('id');
      $nama=$this->input->post('nama_perda');
      $hbg=$this->input->post('terhubung');
      $akses= $this->input->post('akses');
      $oprtr= $this->input->post('operator');
      $tahun= $this->input->post('tahun');
      $penginput = $this->input->post('penginput');
      $this->m_kominfo->edit_kominfo($id,$nama,$hbg,$akses,$oprtr,$tahun,$penginput);


      redirect('C_kominfo');     
    }
 
    public function proses_hapus_perda(){
      $id=$this->input->post('id');
      $this->m_kominfo->delete_perda($id);
      redirect('C_kominfo');  
    }    

}
