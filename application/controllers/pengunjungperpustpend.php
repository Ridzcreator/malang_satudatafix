<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class pengunjungperpustpend extends CI_Controller {

   
    function __construct() {
        parent::__construct();
        $this->load->model('m_pengunjungperpus_tpend');
    }

    public function index() {
      $periode=date('y');
      $tahun =0000;
      $data['data']=$this->m_pengunjungperpus_tpend->tampil_pengunjung_perpus_tpend($tahun);
      $data['datas']=$this->m_pengunjungperpus_tpend->tampil_bulan();
      $data['datax']=$this->m_pengunjungperpus_tpend->tampil_tahun();
        $this->load->view('template/header');
        $this->load->view('perpustakaan/pengunjung_perpus_tpend',$data);
        $this->load->view('template/footer');
   }
    public function get() {
    $thn=$this->input->get('tahun');
    $tahun=intval($thn);
    $data['data']=$this->m_pengunjungperpus_tpend->tampil_pengunjung_perpus_tpend($tahun);
        $no=0;
    $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
          $temp = array();
                        $no++;
                        $id = $a['id']; 
                        $tahun=$a['tahun']; 
                        $bln=$a['bulan'];
                        $sp=$a['smp'];
                        $sa=$a['sma'];
                        $pt=$a['perguruan_tinggi'];
                        $jml=$a['jumlah'];
                        $penginput=$a['penginput'];  

            $temp[]=$no;
            $temp[]=$tahun;
            $temp[]=number_format($sp,2,'.','.');
            $temp[]=number_format($sa,2,'.','.');
            $temp[]=number_format($pt,2,'.','.');
            $temp[]=number_format($jml,2,'.','.');
            $temp[]="<a class=\"btn btn-xs btn-success\" href=\"pengunjungperpustpend/tampil_detail_pengunjung_perpus_tpend/$tahun\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>";
            $tabel[]=$temp;
          }
          echo json_encode(array('data' => $tabel));
}

 public function tampil_pengunjung_tpen_grafik(){
        $tahun =0000;
        $data['data']=$this->m_pengunjungperpus_tpend->tampil_pengunjung_perpus_tpend($tahun);
        $this->load->view('template/header');
        $this->load->view('perpustakaan/grafik_perpus_tpend',$data);
        $this->load->view('template/footer');

}
 public function tampil_detail_pengunjung_perpus_tpend(){
        $id = $this->uri->segment(3); 
        $data['data']=$this->m_pengunjungperpus_tpend->tampil_detail_pengunjung_perpus_tpend($id);
        $data['datas']=$this->m_pengunjungperpus_tpend->tampil_bulan();
        
        $this->load->view('template/header');
        $this->load->view('perpustakaan/detail_pengunjung_perpus_tpend', $data);
        $this->load->view('template/footer');
}

   	public function proses_input_pengunjung_perpus_tpend(){ 
                      $page = $this->uri->segment(3);
                        $tahun=$this->input->post('tahun'); 
                       $bln=$this->input->post('bulan');
                        $sp=$this->input->post('smp');
                        $sa=$this->input->post('sma');
                        $pt=$this->input->post('perguruan_tinggi');
                        $jml=$this->input->post('jumlah');
                        $penginput=$this->input->post('penginput');
   		$this->m_pengunjungperpus_tpend->simpan_pengunjung_perpus_tpend($tahun,$bln,$sp,$sa,$pt,$jml,$penginput);


		redirect('pengunjungperpustpend');   	
  }

  public function proses_input_detail_pengunjung_perpus_tpend(){ 
                         $page = $this->uri->segment(3);
                        $tahun=$this->input->post('tahun'); 
                       $bln=$this->input->post('bulan');
                        $sp=$this->input->post('smp');
                        $sa=$this->input->post('sma');
                        $pt=$this->input->post('perguruan_tinggi');
                        $jml=$this->input->post('jumlah');
                        $penginput=$this->input->post('penginput');
      $this->m_pengunjungperpus_tpend->simpan_pengunjung_perpus_tpend($tahun,$bln,$sp,$sa,$pt,$jml,$penginput);


    redirect('pengunjungperpustpend/tampil_detail_pengunjung_perpus_tpend/'.$page);
  }
  public function proses_edit_pengunjung_perpus_tpend(){
         $page = $this->uri->segment(3);
                         $id=$this->input->post('id');
                       $tahun=$this->input->post('tahun'); 
                       $bln=$this->input->post('bulan');
                        $sp=$this->input->post('smp');
                        $sa=$this->input->post('sma');
                        $pt=$this->input->post('perguruan_tinggi');
                        $jml=$this->input->post('jumlah');
                        $penginput=$this->input->post('penginput');
     $this->m_pengunjungperpus_tpend->edit_pengunjung_perpus_tpend($id,$tahun,$bln,$sp,$sa,$pt,$jml,$penginput);


    redirect('pengunjungperpustpend/tampil_detail_pengunjung_perpus_tpend/'.$page);   
  }
 public function proses_hapus_pengunjung_perpus_tpend(){
  $page = $this->uri->segment(3);

    $id=$this->input->post('id');
    
    
    $this->m_pengunjungperpus_tpend->delete_pengunjung_perpus_tpend($id);
    redirect('pengunjungperpustpend/tampil_detail_pengunjung_perpus_tpend/'.$page);  
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
      $data['data']=$this->m_pengunjungperpus_tpend->grafik_perbandingan_perpus_tpend($tahun2, $tahun1);
      $this->load->view('template/header');
      if($datap=="all"){
        if($grafikp=="bar"){
            $this->load->view('perpustakaan/grafik_perbandingan_pengunjung_tpend_bar_all', $data);
            $this->load->view('template/footer');
        }else if($grafikp=="line"){
            $this->load->view('perpustakaan/grafik_perbandingan_pengunjung_tpend_line_all', $data);
            $this->load->view('template/footer');
        }
      }else{
      if($grafikp=="bar"){
        $this->load->view('perpustakaan/grafik_perbandingan_pengunjung_tpend_bar', $data);
        $this->load->view('template/footer');
      }else if($grafikp=="line"){
        $this->load->view('perpustakaan/grafik_perbandingan_pengunjung_tpend_line', $data);
        $this->load->view('template/footer');
      }
      }
 }   
   public function grafik_detail_pengunjung_tpend() {
      $id = $this->uri->segment(3); 
      $data['data']=$this->m_pengunjungperpus_tpend->tampil_grafik($id);
      $this->load->view('template/header');
      $this->load->view('perpustakaan/grafik_detail_pengunjung_tpend', $data);
      $this->load->view('template/footer');
    }







}
?>
