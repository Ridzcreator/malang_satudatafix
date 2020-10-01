<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class internetkecamatan extends CI_Controller {

   
    function __construct() {
        parent::__construct();
        $this->load->model('m_internetkecamatan');
    }
    

    public function index() {
        $periode=date('y');
      $tahun =0000;
      $data['data']=$this->m_internetkecamatan->tampil_internet_kecamatan($tahun);
      $data['datas']=$this->m_internetkecamatan->tampil_kecamatan();
       $data['datax']=$this->m_internetkecamatan->tampil_tahun();
       $data['datay']=$this->m_internetkecamatan->tampil_provider();
        $this->load->view('template/header');
        $this->load->view('kominfo/internet_kecamatan',$data);
        $this->load->view('template/footer');
    }

 public function get() {
    $thn=$this->input->get('tahun');
    $tahun=intval($thn);
    $data['data']=$this->m_internetkecamatan->tampil_internet_kecamatan($tahun);
        $no=0;
    $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
          $temp = array();
                         $no++;
                            $id = $a['id'];
                        $tahun=$a['tahun'];
                        $kec=$a['kecamatan'];
                        $tf=$a['terhubung_fixed'];
                        $kai=$a['kecepatan_akses_internet'];
                        $op=$a['operator_penyedia'];
 
            $temp[]=$no;
            $temp[]=$kec;
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

    public function tampil_grafik_kec(){
        $tahunx=$this->input->post('tahunx');
        $data['data']=$this->m_internetkecamatan->tampil_internet_kecamatan($tahunx);
        $this->load->view('template/header');
        $this->load->view('kominfo/grafik_kec_tahun',$data);
        $this->load->view('template/footer');
    }
   	public function proses_input_internet_kecamatan(){
      $tahun= $this->input->post('tahun');
      $kec=$this->input->post('kecamatan');
      $tf=$this->input->post('terhubung_fixed');
      $kai=$this->input->post('kecepatan_akses_internet');
      $op= $this->input->post('operator_penyedia');
      $penginput= $this->input->post('penginput');
   		$this->m_internetkecamatan->simpan_internet_kecamatan($tahun,$kec,$tf,$kai,$op,$penginput);


		redirect('internetkecamatan');   	
  }
  public function proses_edit_internet_kecamatan(){
      $id=$this->input->post('id');
      $tahun= $this->input->post('tahun');
      $kec=$this->input->post('kecamatan');
      $tf=$this->input->post('terhubung_fixed');
      $kai=$this->input->post('kecepatan_akses_internet');
      $op= $this->input->post('operator_penyedia');
     $this->m_internetkecamatan->edit_internet_kecamatan($id,$tahun,$kec,$tf,$kai,$op);


    redirect('internetkecamatan');     
  }

 public function proses_hapus_internet_kecamatan(){
    $id=$this->input->post('id');
    
    
    $this->m_internetkecamatan->delete_internet_kecamatan($id);
    redirect('internetkecamatan');  

}
}