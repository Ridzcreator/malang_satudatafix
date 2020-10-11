<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class pengunjungperpusspekerjaan extends CI_Controller {

   
    function __construct() {
        parent::__construct();
        $this->load->model('m_pengunjungperpus_spekerjaan');
    }

    public function index() {
      $periode=date('y');
      $tahun =0000;
      $data['data']=$this->m_pengunjungperpus_spekerjaan->tampil_pengunjung_perpus_spekerjaan($tahun);
      $data['datas']=$this->m_pengunjungperpus_spekerjaan->tampil_bulan();
      $data['datax']=$this->m_pengunjungperpus_spekerjaan->tampil_tahun();
        $this->load->view('template/header');
        $this->load->view('perpustakaan/pengunjung_perpus_spekerjaan',$data);
   }
    public function get() {
    $thn=$this->input->get('tahun');
    $tahun=intval($thn);
    $data['data']=$this->m_pengunjungperpus_spekerjaan->tampil_pengunjung_perpus_spekerjaan($tahun);
        $no=0;
    $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
          $temp = array();
                        $no++;
                        $id = $a['id']; 
                        $tahun=$a['tahun'];  
                        $bln=$a['bulan'];
                        $tb=$a['tidak_bekerja'];
                        $pr=$a['pelajar'];
                        $kr=$a['karyawan'];
                        $jml=$a['jumlah'];
            $temp[]=$no;
            $temp[]=$tahun;
            $temp[]=number_format($tb,2,'.','.');
            $temp[]=number_format($pr,2,'.','.');
            $temp[]=number_format($kr,2,'.','.');
            $temp[]=number_format($jml,2,'.','.');
             $temp[]="<a class=\"btn btn-xs btn-success\" href=\"pengunjungperpusspekerjaan/tampil_detail_pengunjung_perpus_spekerjaan/$tahun\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>";
            $tabel[]=$temp;
          }
          echo json_encode(array('data' => $tabel));
}
public function tampil_detail_pengunjung_perpus_spekerjaan(){
        $id = $this->uri->segment(3); 
        $data['data']=$this->m_pengunjungperpus_spekerjaan->tampil_detail_pengunjung_perpus_spekerjaan($id);
        $data['datas']=$this->m_pengunjungperpus_spekerjaan->tampil_bulan();
        
        $this->load->view('template/header');
        $this->load->view('perpustakaan/detail_pengunjung_perpus_spekerjaan', $data);
        $this->load->view('template/footer');
}
 public function tampil_perpustakaanspekerjaan_grafik(){
        $tahun =0000;
        $data['data']=$this->m_pengunjungperpus_spekerjaan->tampil_pengunjung_perpus_spekerjaan($tahun);
        $this->load->view('template/header');
        $this->load->view('perpustakaan/grafik_perpus_spekerjaan',$data);
        $this->load->view('template/footer');
}
   	public function proses_input_pengunjung_perpus_spekerjaan(){
                      $page = $this->uri->segment(3);
                      $tahun=$this->input->post('tahun');
                       $bln=$this->input->post('bulan');
                        $tb=$this->input->post('tidak_bekerja');
                        $pr=$this->input->post('pelajar');
                        $kr=$this->input->post('karyawan');
                        $jml=$this->input->post('jumlah');
                        $penginput =$this->input->post('penginput');  
   		$this->m_pengunjungperpus_spekerjaan->simpan_pengunjung_perpus_spekerjaan($tahun,$bln,$tb,$pr,$kr,$jml,$penginput);


		redirect('pengunjungperpusspekerjaan');   	
  }
  public function proses_input_detail_pengunjung_perpus_spekerjaan(){
                        $page = $this->uri->segment(3);
                        $tahun=$this->input->post('tahun');
                       $bln=$this->input->post('bulan');
                        $tb=$this->input->post('tidak_bekerja');
                        $pr=$this->input->post('pelajar');
                        $kr=$this->input->post('karyawan');
                        $jml=$this->input->post('jumlah');
                        $penginput=$this->input->post('penginput');  
      $this->m_pengunjungperpus_spekerjaan->simpan_pengunjung_perpus_spekerjaan($tahun,$bln,$tb,$pr,$kr,$jml,$penginput);


    redirect('pengunjungperpusspekerjaan/tampil_detail_pengunjung_perpus_spekerjaan/'.$page);    
  }
  public function proses_edit_pengunjung_perpus_spekerjaan(){
                      $page = $this->uri->segment(3);
                         $id=$this->input->post('id');
                         $tahun=$this->input->post('tahun');
                       $bln=$this->input->post('bulan');
                        $tb=$this->input->post('tidak_bekerja');
                        $pr=$this->input->post('pelajar');
                        $kr=$this->input->post('karyawan');
                        $jml=$this->input->post('jumlah');
                        $penginput=$this->input->post('penginput');  
     $this->m_pengunjungperpus_spekerjaan->edit_pengunjung_perpus_spekerjaan($id,$tahun,$bln,$tb,$pr,$kr,$jml,$penginput);


    redirect('pengunjungperpusspekerjaan/tampil_detail_pengunjung_perpus_spekerjaan/'.$page);     
  }
 public function proses_hapus_pengunjung_perpus_spekerjaan(){
 $page = $this->uri->segment(3);
    $id=$this->input->post('id');
    
    
    $this->m_pengunjungperpus_spekerjaan->delete_pengunjung_perpus_spekerjaan($id);
    redirect('pengunjungperpusspekerjaan/tampil_detail_pengunjung_perpus_spekerjaan/'.$page);  


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
      $data['data']=$this->m_pengunjungperpus_spekerjaan->grafik_perbandingan_perpus_spekerjaan($tahun2, $tahun1);
      $this->load->view('template/header');
      if($datap=="all"){
        if($grafikp=="bar"){
            $this->load->view('perpustakaan/grafik_perbandingan_pengunjung_spekerjaan_bar_all', $data);
            $this->load->view('template/footer');
        }else if($grafikp=="line"){
            $this->load->view('perpustakaan/grafik_perbandingan_pengunjung_spekerjaan_line_all', $data);
            $this->load->view('template/footer');
        }
      }else{
      if($grafikp=="bar"){
        $this->load->view('perpustakaan/grafik_perbandingan_pengunjung_spekerjaan_bar', $data);
        $this->load->view('template/footer');
      }else if($grafikp=="line"){
        $this->load->view('perpustakaan/grafik_perbandingan_pengunjung_spekerjaan_line', $data);
        $this->load->view('template/footer');
      }
      }
 }   
   public function grafik_detail_pengunjung_spekerjaan() {
      $id = $this->uri->segment(3); 
      $data['data']=$this->m_pengunjungperpus_spekerjaan->tampil_grafik($id);
      $this->load->view('template/header');
      $this->load->view('perpustakaan/grafik_detail_pengunjung_spekerjaan', $data);
      $this->load->view('template/footer');
    }







}
?>