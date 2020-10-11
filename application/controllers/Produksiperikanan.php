<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produksiperikanan extends CI_Controller {

   
    function __construct() {
        parent::__construct();
        $this->load->model('m_produksiperikanan');
    }

    public function index() {
       $periode=date('y');
      $tahun =0000;
      $data['data']=$this->m_produksiperikanan->tampil_produksi_perikanan($tahun);
      $data['datas']=$this->m_produksiperikanan->tampil_kecamatan();
      $data['datax']=$this->m_produksiperikanan->tampil_tahun();
        $this->load->view('template/header');
        $this->load->view('Perikanan/produksi_perikanan',$data);
        $this->load->view('template/footer');
		
    }
    public function get() {
    $thn=$this->input->get('tahun');
    $tahun=intval($thn);
    $data['data']=$this->m_produksiperikanan->tampil_produksi_perikanan($tahun);
        $no=0;
    $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
          $temp = array();
                        $no++;
                        $id = $a['id'];
                        $tahun=$a['tahun'];
                        $kec=$a['kecamatan'];
                        $laut=$a['perikanan_laut'];
                        $umum=$a['perikanan_umum'];
                        $penginput=$a['penginput'];
            $temp[]=$no;
            $temp[]=$tahun;
            $temp[]=$kec;
            $temp[]=number_format($laut,2,",","");
            $temp[]=number_format($umum,2,",","");
              $temp[]="<a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a> | 
                                 <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
            $tabel[]=$temp;
          }
          echo json_encode(array('data' => $tabel));
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
      $data['data']=$this->m_produksiperikanan->grafik_perbandingan_produksi_perikanan($tahun2, $tahun1);
      $this->load->view('template/header');
    if($datap=="all"){
    if($grafikp=="bar"){
    $this->load->view('Perikanan/grafik_perbandingan_produksi_perikanan_bar_all', $data);
    $this->load->view('template/footer');
    }else if($grafikp=="line"){
    $this->load->view('Perikanan/grafik_perbandingan_produksi_perikanan_line_all', $data);
    $this->load->view('template/footer');
    }
    }else{
    if($grafikp=="bar"){
    $this->load->view('Perikanan/grafik_perbandingan_produksi_perikanan_bar', $data);
    $this->load->view('template/footer');
    }else if($grafikp=="line"){
    $this->load->view('Perikanan/grafik_perbandingan_produksi_perikanan_line', $data);
    $this->load->view('template/footer');
    }
    }
    
  }
    public function tampil_grafik_produksi_perikanan(){
        $tahunx=$this->input->post('tahunx');
        $data['data']=$this->m_produksiperikanan->tampil_produksi_perikanan($tahunx);
        $this->load->view('template/header');
        $this->load->view('Perikanan/grafik_produksi_perikanan_tahun',$data);
        $this->load->view('template/footer');
    }

   	public function proses_input_produksi_perikanan(){
     $tahun= $this->input->post('tahun');
      $kec=$this->input->post('kecamatan');
      $laut= $this->input->post('perikanan_laut');
      $umum= $this->input->post('perikanan_umum');
      $penginput= $this->input->post('penginput');
   		$this->m_produksiperikanan->simpan_produksi_perikanan($tahun,$kec,$laut,$umum,$penginput);


		redirect('Produksiperikanan');   	
  }
  public function proses_edit_produksi_perikanan(){
      $id=$this->input->post('id');
      $tahun= $this->input->post('tahun');
      $kec=$this->input->post('kecamatan');
      $laut= $this->input->post('perikanan_laut');
      $umum= $this->input->post('perikanan_umum');
      $penginput=$this->input->post('penginput');
     $this->m_produksiperikanan->edit_produksi_perikanan($id,$tahun,$kec,$laut,$umum,$penginput);


    redirect('Produksiperikanan');     
  }
 public function proses_hapus_produksi_perikanan(){
    $id=$this->input->post('id');
    
    
    $this->m_produksiperikanan->delete_produksi_perikanan($id);
    redirect('Produksiperikanan');  
  } 
   public function tampil_crosstab_produksi_perikanan(){
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
        if($tahun1>$tahun2){
            list($tahun1, $tahun2) = array($tahun2, $tahun1);
        }
      $data['kecamatan']=$this->m_produksiperikanan->data_crosstab();
      $data['tahun']=$this->m_produksiperikanan->tampil_periodec($tahun1,$tahun2);
      $data['jumlah']=$this->m_produksiperikanan->tampil_jumlahc($tahun1,$tahun2);
      $data['bulan']=$this->m_produksiperikanan->tampil_bulanc();

        $this->load->view('template/header');
        $this->load->view('perikanan/v_crosstab_produksi_perikanan', $data);
        $this->load->view('template/footer');
    }
   

}
