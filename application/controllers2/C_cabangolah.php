<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_cabangolah extends CI_Controller {

   
    function __construct() {
        parent::__construct();
        $this->load->model('m_cabangolah');
    }

    public function index() {
      $periode=date('y');
      $tahun =0000;
      $data['data']=$this->m_cabangolah->tampil_cabang_olah($tahun);
      $data['datas']=$this->m_cabangolah->tampil_cabang();
      $data['datax']=$this->m_cabangolah->tampil_tahun();
      
        $this->load->view('template/header');
        $this->load->view('cabangolahraga/v_cabang_olah',$data);
        $this->load->view('template/footer');
    }

    public function get() {
      $thn = $this->input->get('tahun');
      $tahun=intval($thn);
      $data['data']=$this->m_cabangolah->tampil_cabang_olah($tahun);
        $no=0;
      $tabel=array();
        foreach ($data['data']->result_array() as $a) {
          $temp = array();
            $no++;
            $id = $a['id'];
            $co=$a['cabang_olahraga'];
            $ps=$a['prestasi'];
            $db=$a['dibina'];
            $jm=$a['jumlah'];
            $tahun=$a['tahun'];
            $temp[]=$no;
            $temp[]=$co;
            $temp[]=$ps;
            $temp[]=$db;
            $temp[]=$jm;
            $temp[]=$tahun;
            $temp[]="
                     <a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a> | 
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
      $data['data']=$this->m_cabangolah->grafik_perbandingan_cabangolah($tahun2, $tahun1);
      $this->load->view('template/header');
    if($datap=="all"){
    if($grafikp=="bar"){
    $this->load->view('cabangolahraga/grafik_perbandingan_cabangolah_bar_all', $data);
    $this->load->view('template/footer');
    }else if($grafikp=="line"){
    $this->load->view('cabangolahraga/grafik_perbandingan_cabangolah_line_all', $data);
    $this->load->view('template/footer');
    }
    }else{
    if($grafikp=="bar"){
    $this->load->view('cabangolahraga/grafik_perbandingan_cabangolah_bar', $data);
    $this->load->view('template/footer');
    }else if($grafikp=="line"){
    $this->load->view('cabangolahraga/grafik_perbandingan_cabangolah_line', $data);
    $this->load->view('template/footer');
    }
    }
    
  }
    public function tampil_grafik_cabangolah(){
        $tahunx=$this->input->post('tahunx');
        $data['data']=$this->m_cabangolah->tampil_cabang_olah($tahunx);
        $this->load->view('template/header');
        $this->load->view('cabangolahraga/grafik_cabang_olah_tahun',$data);
        $this->load->view('template/footer');
    }

    // public function grafikdetailcabangolahraga() {
    //   $id = $this->uri->segment(3); 
    //   $data['data']=$this->m_cabangolah->tampil_grafik($id);
    //   $this->load->view('template/header');
    //   $this->load->view('cabangolahraga/grafik_perbandingan_cabangolah_bar', $data);
    //   $this->load->view('template/footer');
    // }

    // public function grafik_perbandingan_prestasi() {
    // $datap = $this->input->post('datap');
    // $grafikp = $this->input->post('grafikp');
    // $data['datap']=$datap;
    //   $data['data']=$this->m_cabangolah->grafik_perbandingan_prestasi();
    //   $this->load->view('template/header');
    // if($grafikp=="bar"){
    //   $this->load->view('cabangolahraga/grafik_prestasi_bar', $data);
    //   $this->load->view('template/footer');
    // }else if($grafikp=="line"){
    //   $this->load->view('cabangolahraga/grafik_prestasi_line', $data);
    //   $this->load->view('template/footer');
    // }
    // }

     
    public function proses_input_cabang_olah(){
      $co=$this->input->post('cabang_olahraga');
      $ps=$this->input->post('prestasi');
      $db= $this->input->post('dibina');
      $jm= $this->input->post('jumlah');
      $tahun= $this->input->post('tahun');
      $penginput = $this->input->post('penginput');

      $cek = $this->db->query("SELECT * FROM cabang_olahraga where cabang_olahraga='$co' and tahun='$tahun' and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('C_cabangolah','refresh');
           }
           else {

          $this->m_cabangolah->simpan_cabang_olah($co,$ps,$db,$jm,$tahun,$penginput);

      redirect('C_cabangolah');     
    
}
    }

    
 
    public function proses_edit_cabang_olah(){
      $id=$this->input->post('id');
      $co=$this->input->post('cabang_olahraga');
      $ps=$this->input->post('prestasi');
      $db= $this->input->post('dibina');
      $jm= $this->input->post('jumlah');
      $tahun= $this->input->post('tahun');
      $penginput = $this->input->post('penginput');
      $this->m_cabangolah->edit_cabang_olah($id,$co,$ps,$db,$jm,$tahun,$penginput);

      redirect('C_cabangolah');     
    }
 
    public function proses_hapus_cabang_olah(){
      $id=$this->input->post('id');
      $this->m_cabangolah->delete_cabang_olah($id);
      redirect('C_cabangolah');  
    }    

}
