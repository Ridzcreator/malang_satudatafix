<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_twr extends CI_Controller {

   
    function __construct() {
        parent::__construct();
        $this->load->model('m_twr');
    }

    public function index() {
      $periode=date('y');
      $tahun =0000;
      $data['data']=$this->m_twr->tampil_tower($tahun);
      $data['datax']=$this->m_twr->tampil_tahun();
      $data['datas']=$this->m_twr->tampil_kecamatan();
        $this->load->view('template/header');
        $this->load->view('kominfo/v_awal_tower',$data);
        $this->load->view('template/footer');
    }

    public function get() {
      $thn = $this->input->get('tahun');
      $tahun=intval($thn);
      $data['data']=$this->m_twr->tampil_tower($tahun);
      $no=0;
      $tabel=array();
        foreach ($data['data']->result_array() as $a) {
          $temp = array();
            $no++;
            $id = $a['id'];
            $jml=$a['jml_tower'];
            $tahun=$a['tahun'];
            $temp[]=$no;
            $temp[]=$tahun;
            $temp[]=$jml;
            $temp[]="<a class=\"btn btn-xs btn-success\" href=\"C_twr/tampil_detail_tower/$tahun\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span>Detail</a>";
            $tabel[]=$temp;
          }
          echo json_encode(array('data' => $tabel));
    }

    public function tampil_detail_tower(){
        $id = $this->uri->segment(3); 
        $data['data']=$this->m_twr->tampil_detail_tower($id);
        $data['datas']=$this->m_twr->tampil_kecamatan();

        $this->load->view('template/header');
        $this->load->view('kominfo/v_detail_tower', $data);
        $this->load->view('template/footer');
    }

    public function grafik_perbandingan() {
    $datap = $this->input->post('datap');
    $grafikp = $this->input->post('grafikp');
    $tahun1 = $this->input->post('tahun1');
    $tahun2 = $this->input->post('tahun2');
    if($tahun1>$tahun2){
    list($tahun1, $tahun2) = array($tahun2, $tahun1);
    }
    $data['datap']=$datap;
      $data['data']=$this->m_twr->grafik_perbandingan_tower($tahun2, $tahun1);
      $this->load->view('template/header');
    if($datap=="all"){
    if($grafikp=="bar"){
    $this->load->view('kominfo/grafik_perbandingan_tower_bar_all', $data);
    $this->load->view('template/footer');
    }else if($grafikp=="line"){
    $this->load->view('kominfo/grafik_perbandingan_tower_line_all', $data);
    $this->load->view('template/footer');
    }
    }else{
    if($grafikp=="bar"){
    $this->load->view('kominfo/grafik_perbandingan_tower_bar', $data);
    $this->load->view('template/footer');
    }else if($grafikp=="line"){
    $this->load->view('kominfo/grafik_perbandingan_tower_line', $data);
    $this->load->view('template/footer');
    }
    }
    
  }

  public function grafikdetailtower() {
    $id = $this->uri->segment(3); 
      $data['data']=$this->m_twr->tampil_grafik($id);
      $this->load->view('template/header');
      $this->load->view('kominfo/grafik_detail_tower', $data);
      $this->load->view('template/footer');
    }

    public function tampil_crosstab_tower(){
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
       if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['data']=$this->m_twr->semua_data_crosstab();
      $data['tahun']=$this->m_twr->tampil_periodec($tahun1,$tahun2);
      $data['jumlah']=$this->m_twr->tampil_jumlahc($tahun1,$tahun2);
      $data['kecamatan']=$this->m_twr->tampil_kecamatanc();

        $this->load->view('template/header');
        $this->load->view('kominfo/tampil_crosstab_twr', $data);
        $this->load->view('template/footer');

    }
     
   	public function proses_input_awal_tower(){
      $kec=$this->input->post('kecamatan');
      $jml=$this->input->post('jml_tower');
      $tahun= $this->input->post('tahun');
      $penginput = $this->input->post('penginput');
   		$this->m_twr->simpan_tower($kec,$jml,$tahun,$penginput);
		  redirect('C_twr');   	
    }



    public function proses_input_detail_tower(){
    $page = $this->uri->segment(3); 
      $kec=$this->input->post('kecamatan');
      $jml=$this->input->post('jml_tower');
      $tahun= $this->input->post('tahun');
      $penginput = $this->input->post('penginput');
      $this->m_twr->simpan_tower($kec,$jml,$tahun,$penginput);


    redirect('C_twr/tampil_detail_tower/'.$page);    
  }
 
    public function proses_edit_tower(){
      $id=$this->input->post('id');
      $kec=$this->input->post('kecamatan');
      $jml=$this->input->post('jml_tower');
      $tahun= $this->input->post('tahun');
      $penginput = $this->input->post('penginput');
      $this->m_twr->edit_tower($id,$kec,$jml,$tahun,$penginput);
      redirect('C_twr');     
    }
 
    public function proses_hapus_tower(){
      $id=$this->input->post('id');
      $this->m_twr->delete_tower($id);
      redirect('C_twr');  
    }    

}
