<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_pengunjung_negara extends CI_Controller {

   
    function __construct() {
        parent::__construct();
        $this->load->model('m_pengunjung_negara');
    }

    public function index() {
      $periode=date('y');
      $tahun =0000;
      $data['data']=$this->m_pengunjung_negara->tampil_pengunjung_negara($tahun);
      $data['pengunjung']=$this->m_pengunjung_negara->tampil_pengunjung_negarax($tahun);
      $data['datasum']=$this->m_pengunjung_negara->tampil_sum($tahun);
      $data['datax']=$this->m_pengunjung_negara->tampil_tahun();
	  $data['dataxi']=$this->m_pengunjung_negara->tampil_tahunmax();
      $data['datay']=$this->m_pengunjung_negara->tampil_negara();

        $this->load->view('template/header');
        $this->load->view('kominfo/v_pengunjung_negara',$data);
        $this->load->view('template/footer');
    }

    public function get() {
	  
	  $data['dataxi']=$this->m_pengunjung_negara->tampil_tahunmax();
	  foreach ($data['dataxi']->result_array() as $a) {
                        $max = $a['max'];
      }
      $thn = $this->input->get('tahun');
	  if(!isset($thn)){
		  $thn=$max;
	  }
      $tahun=intval($thn);
      $data['data']=$this->m_pengunjung_negara->tampil_pengunjung_negara($tahun);
      $data['datasum']=$this->m_pengunjung_negara->tampil_sum($tahun);
      $data['datax']=$this->m_pengunjung_negara->tampil_tahun();
      $data['datay']=$this->m_pengunjung_negara->tampil_negara();
      foreach ($data['datasum']->result_array() as $a) {
                        $sum = $a['total'];
      }
      $no=0;
      $tabel=array();
      $persentase1=0;
        foreach ($data['data']->result_array() as $a) {
          
          $temp = array();
            $no++;
            $id = $a['id'];
            $penginput=$a['penginput'];
            $tahun=$a['tahun'];
            $negara=$a['negara'];
            $total=$a['total'];
            $persentase1=($total/$sum)*100;
            $temp[]=$no;
            $temp[]=$negara;
            $temp[]=$total;
            $temp[]=number_format($persentase1,2,",",",")." %";
            $temp[]=$tahun;
            $temp[]="<a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a> | 
                     <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
            $tabel[]=$temp;
          }
          echo json_encode(array('data' => $tabel));
    }
     
    public function tampil_crosstab_pengunjung_ngr(){
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
       if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['data']=$this->m_pengunjung_negara->semua_data_crosstab();
      $data['tahun']=$this->m_pengunjung_negara->tampil_periodec($tahun1,$tahun2);
      $data['jumlah']=$this->m_pengunjung_negara->tampil_jumlahc($tahun1,$tahun2);
      $data['negara']=$this->m_pengunjung_negara->tampil_negarac();

        $this->load->view('template/header');
        $this->load->view('kominfo/tampil_crosstab_pengunjung_negara', $data);
        $this->load->view('template/footer');

    }
    public function tampil_grafik_pengunjung_ngr(){
        $tahunx=$this->input->post('tahunx');
        $data['data']=$this->m_pengunjung_negara->tampil_pengunjung_negara($tahunx);
        $this->load->view('template/header');
        $this->load->view('kominfo/grafik_pengunjung_ngr_tahun',$data);
        $this->load->view('template/footer');
    }
   	public function proses_input_pengunjung_negara(){
      $ngr=$this->input->post('negara');
      $jml=$this->input->post('total');
      $tahun= $this->input->post('tahun');
      $penginput = $this->input->post('penginput');
   		$this->m_pengunjung_negara->simpan_pengunjung_negara($ngr,$jml,$tahun,$penginput);
		  redirect('C_pengunjung_negara');   	
    }
 
    public function proses_edit_pengunjung_negara(){
      $id=$this->input->post('id');
      $ngr=$this->input->post('negara');
      $jml=$this->input->post('total');
      $tahun= $this->input->post('tahun');
      $penginput = $this->input->post('penginput');
      $this->m_pengunjung_negara->edit_pengunjung_negara($id,$ngr,$jml,$tahun,$penginput);
      redirect('C_pengunjung_negara');     
    }
 
    public function proses_hapus_pengunjung_negara(){
      $id=$this->input->post('id');
      $this->m_pengunjung_negara->delete_pengunjung_negara($id);
      redirect('C_pengunjung_negara');  
    }    

}
