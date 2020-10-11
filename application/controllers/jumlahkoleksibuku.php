<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class jumlahkoleksibuku extends CI_Controller {

   
    function __construct() {
        parent::__construct();
        $this->load->model('m_jumlahkoleksi_buku');
    }

    public function index() {
      $periode=date('y');
      $tahun =0000;
      $data['data']=$this->m_jumlahkoleksi_buku->tampil_jumlah_koleksi_buku($tahun);
      $data['datas']=$this->m_jumlahkoleksi_buku->tampil_tajuk_buku();
      $data['datax']=$this->m_jumlahkoleksi_buku->tampil_tahun();
        $this->load->view('template/header');
        $this->load->view('perpustakaan/jumlah_koleksi_buku',$data);
        

  
   }
    public function get() {
   $thn = $this->input->get('tahun');
    $tahun=intval($thn);
    $data['data']=$this->m_jumlahkoleksi_buku->tampil_jumlah_koleksi_buku($tahun);
        $no=0;
    $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
          $temp = array();
                        $no++;
                        $id = $a['id']; 
                        $tahun=$a['tahun'];
                        $tb=$a['tajuk_buku'];
                        $jl=$a['judul'];
                        $er=$a['exemplar'];
            $temp[]=$no;
            $temp[]=$tahun;
            $temp[]=number_format($jl,2,'.','.');
            $temp[]=number_format($er,2,'.','.');
            $temp[]="<a class=\"btn btn-xs btn-success\" href=\"jumlahkoleksibuku/tampil_detail_jumlah_koleksi_buku/$tahun\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>";
            $tabel[]=$temp;
          
          }
          echo json_encode(array('data' => $tabel));
}

 
        public function tampil_detail_jumlah_koleksi_buku(){
        $id = $this->uri->segment(3); 
        $data['data']=$this->m_jumlahkoleksi_buku->tampil_detail_jumlah_koleksi_buku($id);
        $data['datas']=$this->m_jumlahkoleksi_buku->tampil_tajuk_buku();

        $this->load->view('template/header');
        $this->load->view('perpustakaan/detail_jumlah_koleksi_buku', $data);
        $this->load->view('template/footer');

  }
   	public function proses_input_jumlah_koleksi_buku(){            
                        $tahun=$this->input->post('tahun');
                        $tb=$this->input->post('tajuk_buku');
                        $jl=$this->input->post('judul');
                        $er=$this->input->post('exemplar');
                        $penginput=$this->input->post('penginput'); 
   		$this->m_jumlahkoleksi_buku->simpan_jumlah_koleksi_buku($tahun,$tb,$jl,$er,$penginput);


		redirect('jumlahkoleksibuku');   	
  }
  public function proses_input_detail_jumlah_koleksi_buku(){
                        $page = $this->uri->segment(3);             
                        $tahun=$this->input->post('tahun');
                        $tb=$this->input->post('tajuk_buku');
                        $jl=$this->input->post('judul');
                        $er=$this->input->post('exemplar');
                        $penginput=$this->input->post('penginput'); 
      $this->m_jumlahkoleksi_buku->simpan_jumlah_koleksi_buku($tahun,$tb,$jl,$er,$penginput);


    
        redirect('jumlahkoleksibuku/tampil_detail_jumlah_koleksi_buku/'.$page);    
  }
  public function proses_edit_jumlah_koleksi_buku(){
                        $page = $this->uri->segment(3); 
                        $id=$this->input->post('id');
                        $tahun=$this->input->post('tahun');
                        $tb=$this->input->post('tajuk_buku');
                        $jl=$this->input->post('judul');
                        $er=$this->input->post('exemplar');
                        $penginput=$this->input->post('penginput'); 
     $this->m_jumlahkoleksi_buku->edit_jumlah_koleksi_buku($id,$tahun,$tb,$jl,$er,$penginput);


     redirect('jumlahkoleksibuku/tampil_detail_jumlah_koleksi_buku/'.$page);     
  }
 public function proses_hapus_jumlah_koleksi_buku(){
  $page = $this->uri->segment(3); 
    $id=$this->input->post('id');
    
    
    $this->m_jumlahkoleksi_buku->delete_jumlah_koleksi_buku($id);
   redirect('jumlahkoleksibuku/tampil_detail_jumlah_koleksi_buku/'.$page);  


  }  

 public function tampil_crosstab_jumlah_koleksi_buku(){
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
        if($tahun1>$tahun2){
            list($tahun1, $tahun2) = array($tahun2, $tahun1);
        }
      $data['tajuk_buku']=$this->m_jumlahkoleksi_buku->data_crosstab();
      $data['tahun']=$this->m_jumlahkoleksi_buku->tampil_periodec($tahun1,$tahun2);
      $data['jumlah']=$this->m_jumlahkoleksi_buku->tampil_jumlahc($tahun1,$tahun2);
      $data['bulan']=$this->m_jumlahkoleksi_buku->tampil_bulanc();

        $this->load->view('template/header');
        $this->load->view('perpustakaan/v_crosstab_jumlah_koleksi_buku', $data);
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
      $data['data']=$this->m_jumlahkoleksi_buku->grafik_perbandingan_jumlah_koleksi_buku($tahun2, $tahun1);
      $this->load->view('template/header');
      if($datap=="all"){
        if($grafikp=="bar"){
            $this->load->view('perpustakaan/grafik_perbandingan_jumlah_buku_bar_all', $data);
            $this->load->view('template/footer');
        }else if($grafikp=="line"){
            $this->load->view('perpustakaan/grafik_perbandingan_jumlah_buku_line_all', $data);
            $this->load->view('template/footer');
        }
      }else{
      if($grafikp=="bar"){
        $this->load->view('perpustakaan/grafik_perbandingan_jumlah_buku_bar', $data);
        $this->load->view('template/footer');
      }else if($grafikp=="line"){
        $this->load->view('perpustakaan/grafik_perbandingan_jumlah_buku_line', $data);
        $this->load->view('template/footer');
      }
      }
    }

    public function grafik_jumlah_buku() {
      $id = $this->uri->segment(3); 
      $data['data']=$this->m_jumlahkoleksi_buku->tampil_grafik($id);
      $this->load->view('template/header');
      $this->load->view('perpustakaan/grafik_detail_jumlah_buku', $data);
      $this->load->view('template/footer');
    }


}
?>