<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class pengunjungperpusjkel extends CI_Controller {

   
    function __construct() {
        parent::__construct();
        $this->load->model('m_pengunjungperpus_jkel');
    }

    public function index() {
      $periode=date('y');
      $tahun =0000;
      $data['data']=$this->m_pengunjungperpus_jkel->tampil_pengunjung_perpus_jkel($tahun);
      $data['datas']=$this->m_pengunjungperpus_jkel->tampil_bulan();
      $data['datax']=$this->m_pengunjungperpus_jkel->tampil_tahun();
        $this->load->view('template/header');
        $this->load->view('perpustakaan/pengunjung_perpus_jkel',$data);
  
   }
    public function get() {
    $thn=$this->input->get('tahun');
    $tahun=intval($thn);
    $data['data']=$this->m_pengunjungperpus_jkel->tampil_pengunjung_perpus_jkel($tahun);
        $no=0;
    $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
          $temp = array();
                        $no++;
                        $id = $a['id'];  
                        $tahun=$a['tahun'];
                        $bln=$a['bulan'];
                        $lk=$a['laki_laki'];
                        $pr=$a['perempuan'];
                        $j=$a['jumlah'];
                        $penginput=$a['penginput'];   
            $temp[]=$no;
            $temp[]=$tahun;
            $temp[]=number_format($lk,2,'.','.');
            $temp[]=number_format($pr,2,'.','.');
            $temp[]=number_format($j,2,'.','.');
           $temp[]="<a class=\"btn btn-xs btn-success\" href=\"pengunjungperpusjkel/tampil_detail_pengunjung_perpus_jkel/$tahun\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>";
            $tabel[]=$temp;
          }
          echo json_encode(array('data' => $tabel));
           }

 public function tampil_detail_pengunjung_perpus_jkel(){
        $id = $this->uri->segment(3); 
        $data['data']=$this->m_pengunjungperpus_jkel->tampil_detail_pengunjung_perpus_jkel($id);
        $data['datas']=$this->m_pengunjungperpus_jkel->tampil_bulan();
        $this->load->view('template/header');
        $this->load->view('perpustakaan/detail_pengunjung_perpus_jkel', $data);
          $this->load->view('template/footer');
    }
 public function tampil_perpustakaanjkel_grafik(){

        $tahun =0000;
        $data['data']=$this->m_pengunjungperpus_jkel->tampil_pengunjung_perpus_jkel($tahun);
        $this->load->view('template/header');
        $this->load->view('perpustakaan/grafik_perpustakaanjkel',$data);
        $this->load->view('template/footer');
    }
     public function tampil_detail_perpustakaanjkel_grafik(){
        $page = $this->uri->segment(3);
        $tahun =0000;
        $data['data']=$this->m_pengunjungperpus_jkel->tampil_detail_pengunjung_perpus_jkel($page);
        $this->load->view('template/header');
        $this->load->view('perpustakaan/grafik_perpustakaanjkel',$data);
        $this->load->view('template/footer');
    }

   	public function proses_input_pengunjung_perpus_jkel(){
      $page = $this->uri->segment(3); 
                        $tahun=$this->input->post('tahun'); 
                       $bln=$this->input->post('bulan');
                        $lk=$this->input->post('laki_laki');
                        $pr=$this->input->post('perempuan');
                        $j=$this->input->post('jumlah');
                        $penginput=$this->input->post('penginput');
   		$this->m_pengunjungperpus_jkel->simpan_pengunjung_perpus_jkel($tahun,$bln,$lk,$pr,$j,$penginput);


		redirect('pengunjungperpusjkel');   	
  }
    public function proses_input_detail_pengunjung_perpus_jkel(){
      $page = $this->uri->segment(3);
                        $tahun=$this->input->post('tahun'); 
                       $bln=$this->input->post('bulan');
                        $lk=$this->input->post('laki_laki');
                        $pr=$this->input->post('perempuan');
                        $j=$this->input->post('jumlah');
                        $penginput=$this->input->post('penginput');
      $this->m_pengunjungperpus_jkel->simpan_pengunjung_perpus_jkel($tahun,$bln,$lk,$pr,$j,$penginput);


    redirect('pengunjungperpusjkel/tampil_detail_pengunjung_perpus_jkel/'.$page);     
  }
  public function proses_edit_pengunjung_perpus_jkel(){
                  $page = $this->uri->segment(3);
                         $id=$this->input->post('id');
                        $tahun=$this->input->post('tahun');
                        $bln=$this->input->post('bulan');
                        $lk=$this->input->post('laki_laki');
                        $pr=$this->input->post('perempuan');
                        $j=$this->input->post('jumlah'); 
                        $penginput=$this->input->post('penginput');

     $this->m_pengunjungperpus_jkel->edit_pengunjung_perpus_jkel($id,$tahun,$bln,$lk,$pr,$j,$penginput);


    redirect('pengunjungperpusjkel/tampil_detail_pengunjung_perpus_jkel/'.$page);       
  }
 public function proses_hapus_pengunjung_perpus_jkel(){
  $page = $this->uri->segment(3); 
    $id=$this->input->post('id');
    
    
    $this->m_pengunjungperpus_jkel->delete_pengunjung_perpus_jkel($id);
   redirect('pengunjungperpusjkel/tampil_detail_pengunjung_perpus_jkel/'.$page);   
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
      $data['data']=$this->m_pengunjungperpus_jkel->grafik_perbandingan_perpus_jkel($tahun2, $tahun1);
      $this->load->view('template/header');
      if($datap=="all"){
        if($grafikp=="bar"){
            $this->load->view('perpustakaan/grafik_perbandingan_pengunjung_jkel_bar_all', $data);
            $this->load->view('template/footer');
        }else if($grafikp=="line"){
            $this->load->view('perpustakaan/grafik_perbandingan_pengunjung_jkel_line_all', $data);
            $this->load->view('template/footer');
        }
      }else{
      if($grafikp=="bar"){
        $this->load->view('perpustakaan/grafik_perbandingan_pengunjung_jkel_bar', $data);
        $this->load->view('template/footer');
      }else if($grafikp=="line"){
        $this->load->view('perpustakaan/grafik_perbandingan_pengunjung_jkel_line', $data);
        $this->load->view('template/footer');
      }
      }
 }   
   public function grafik_detail_pengunjung_jkel() {
      $id = $this->uri->segment(3); 
      $data['data']=$this->m_pengunjungperpus_jkel->tampil_grafik($id);
      $this->load->view('template/header');
      $this->load->view('perpustakaan/grafik_detail_pengunjung_jkel', $data);
      $this->load->view('template/footer');
    }







}
?>