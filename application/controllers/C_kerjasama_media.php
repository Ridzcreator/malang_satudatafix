<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_kerjasama_media extends CI_Controller {

   
    function __construct() {
        parent::__construct();
        $this->load->model('m_kerjasama_media');
    }

    public function index() {
      $periode=date('y');
      $tahun =0000;
      $data['data']=$this->m_kerjasama_media->tampil_kerjasama_media($tahun);
      $data['datax']=$this->m_kerjasama_media->tampil_tahun();
      $data['datas']=$this->m_kerjasama_media->tampil_media();
        $this->load->view('template/header');
        $this->load->view('kominfo/v_kerjasama_media',$data);
        $this->load->view('template/footer');
    }

    public function get() {
      $thn = $this->input->get('tahun');
      $tahun=intval($thn);
      $data['data']=$this->m_kerjasama_media->tampil_kerjasama_media($tahun);
      $no=0;
      $tabel=array();
        foreach ($data['data']->result_array() as $a) {
          $temp = array();
            $no++;
            $id = $a['id'];
            $nama=$a['nm_media'];
            $jml=$a['jumlah_krjsm'];
            $kategori=$a['kategori'];
            $tahun=$a['tahun'];
            $temp[]=$no;
            $temp[]=$nama;
            $temp[]=$jml;
            $temp[]=$kategori;
            $temp[]=$tahun;
            $temp[]="
                     <a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a> | 
                     <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
            $tabel[]=$temp;
          }
          echo json_encode(array('data' => $tabel));
    }
     
   	public function proses_input_km(){
      $nama=$this->input->post('nm_media');
      $jml=$this->input->post('jumlah_krjsm');
      $kategori=$this->input->post('kategori');
      $tahun= $this->input->post('tahun');
      $penginput = $this->input->post('penginput');
   		$this->m_kerjasama_media->simpan_kerjasama_media($nama,$jml,$kategori,$tahun,$penginput);
		  redirect('C_kerjasama_media');   	
    }

    public function tampil_grafik_kerjasama(){
        $tahunx=$this->input->post('tahunx');
        $data['data']=$this->m_kerjasama_media->tampil_kerjasama_media($tahunx);
        $this->load->view('template/header');
        $this->load->view('kominfo/grafik_kerjasama_tahun',$data);
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
      $data['data']=$this->m_kerjasama_media->grafik_perbandingan_kerjasama($tahun2, $tahun1);
      $this->load->view('template/header');
    if($datap=="all"){
    if($grafikp=="bar"){
    $this->load->view('kominfo/grafik_perbandingan_kerjasama_bar_all', $data);
    $this->load->view('template/footer');
    }else if($grafikp=="line"){
    $this->load->view('kominfo/grafik_perbandingan_kerjasama_line_all', $data);
    $this->load->view('template/footer');
    }
    }else{
    if($grafikp=="bar"){
    $this->load->view('kominfo/grafik_perbandingan_kerjasama_bar', $data);
    $this->load->view('template/footer');
    }else if($grafikp=="line"){
    $this->load->view('kominfo/grafik_perbandingan_kerjasama_line', $data);
    $this->load->view('template/footer');
    }
    }
    
  }
 
    public function proses_edit_km(){
      $id=$this->input->post('id');
      $nama=$this->input->post('nm_media');
      $jml=$this->input->post('jumlah_krjsm');
      $kategori=$this->input->post('kategori');
      $tahun= $this->input->post('tahun');
      $penginput = $this->input->post('penginput');
      $this->m_kerjasama_media->edit_kerjasama_media($id,$nama,$jml,$kategori,$tahun,$penginput);
      redirect('C_kerjasama_media');     
    }
 
    public function proses_hapus_km(){
      $id=$this->input->post('id');
      $this->m_kerjasama_media->delete_kerjasama_media($id);
      redirect('C_kerjasama_media');  
    }    

}
