<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class internetrumahsakit extends CI_Controller {

   
    function __construct() {
        parent::__construct();
        $this->load->model('m_internetrumahsakit');
    }
    

    public function index() {
        $periode=date('y');
      $tahun =0000;
      $data['data']=$this->m_internetrumahsakit->tampil_internet_rumahsakit($tahun);
      $data['datas']=$this->m_internetrumahsakit->tampil_rumah_sakit();
      $data['datax']=$this->m_internetrumahsakit->tampil_tahun();
      $data['datay']=$this->m_internetrumahsakit->tampil_provider();
        $this->load->view('template/header');
        $this->load->view('kominfo/internet_rumahsakit',$data);
        $this->load->view('template/footer');
    }

 public function get() {
    $thn=$this->input->get('tahun');
    $tahun=intval($thn);
    $data['data']=$this->m_internetrumahsakit->tampil_internet_rumahsakit($tahun);
        $no=0;
    $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
          $temp = array();
                         $no++;
                         $id = $a['id'];
                        $tahun=$a['tahun'];
                        $rm=$a['rumah_sakit'];
                        $tf=$a['terhubung_fixed'];
                        $kai=$a['kecepatan_akses_internet'];
                        $op=$a['operator_penyedia'];
 
            $temp[]=$no;
            $temp[]=$rm;
            $temp[]=$tf;
            $temp[]=$kai;
            $temp[]=$op;
            $temp[]=$tahun;
            $temp[]="<a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a> | 
                                 <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
            $tabel[]=$temp;
          }
          echo json_encode(array('data' => $tabel));
    }

    public function tampil_grafik_rumah_sakit(){
        $tahunx=$this->input->post('tahunx');
        $data['data']=$this->m_internetrumahsakit->tampil_internet_rumahsakit($tahunx);
        $this->load->view('template/header');
        $this->load->view('kominfo/grafik_rumahsakit_tahun',$data);
        $this->load->view('template/footer');
    }
   	public function proses_input_internet_rumahsakit(){
      $tahun= $this->input->post('tahun');
      $rm=$this->input->post('rumah_sakit');
      $tf=$this->input->post('terhubung_fixed');
      $kai=$this->input->post('kecepatan_akses_internet');
      $op= $this->input->post('operator_penyedia');
   		$this->m_internetrumahsakit->simpan_internet_rumahsakit($tahun,$rm,$tf,$kai,$op);


		redirect('internetrumahsakit');   	
  }
  public function proses_edit_internet_rumahsakit(){
      $id=$this->input->post('id');
      $tahun= $this->input->post('tahun');
      $rm=$this->input->post('rumah_sakit');
      $tf=$this->input->post('terhubung_fixed');
      $kai=$this->input->post('kecepatan_akses_internet');
      $op= $this->input->post('operator_penyedia');
     $this->m_internetrumahsakit->edit_internet_rumahsakit($id,$tahun,$rm,$tf,$kai,$op);


    redirect('internetrumahsakit');     
  }
 public function proses_hapus_internet_rumahsakit(){
    $id=$this->input->post('id');
    
    
    $this->m_internetrumahsakit->delete_internet_rumahsakit($id);
    redirect('internetrumahsakit');  

}
}