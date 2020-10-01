<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class produksiikan extends CI_Controller {

   
    function __construct() {
        parent::__construct();
        $this->load->model('m_produksiikan');
    }
    

    public function index() {
        $periode=date('y');
      $tahun =0000;
      $data['data']=$this->m_produksiikan->tampil_produksi_ikan($tahun);
      $data['datas']=$this->m_produksiikan->tampil_jenis_ikan();
      $data['datax']=$this->m_produksiikan->tampil_jenis_air();
       $data['dataz']=$this->m_produksiikan->tampil_tahun();
        $this->load->view('template/header');
        $this->load->view('Perikanan/produksi_ikan',$data);
        $this->load->view('template/footer');
    }

 public function get() {
    $thn=$this->input->get('tahun');
    $tahun=intval($thn);
    $data['data']=$this->m_produksiikan->tampil_produksi_ikan($tahun);
        $no=0;
    $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
          $temp = array();
                         $no++;
                        $id = $a['id'];
                        $tahun=$a['tahun'];
                        $ji=$a['jenis_ikan'];
                        $ja=$a['jenis_air'];
                        $prod=$a['produksi'];
                        $nprod=$a['nilai_produksi'];
                        $penginput=$a['penginput']; 
            $temp[]=$no;
            $temp[]=$tahun;
            $temp[]=$ji;
            $temp[]=$ja;
            $temp[]=number_format($prod,2,",","");
            $temp[]=number_format($nprod,2,",","");
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
      $data['data']=$this->m_produksiikan->grafik_perbandingan_produksi_ikan($tahun2, $tahun1);
      $this->load->view('template/header');
    if($datap=="all"){
    if($grafikp=="bar"){
    $this->load->view('Perikanan/grafik_perbandingan_produksi_ikan_bar_all', $data);
    $this->load->view('template/footer');
    }else if($grafikp=="line"){
    $this->load->view('Perikanan/grafik_perbandingan_produksi_ikan_line_all', $data);
    $this->load->view('template/footer');
    }
    }else{
    if($grafikp=="bar"){
    $this->load->view('Perikanan/grafik_perbandingan_produksi_ikan_bar', $data);
    $this->load->view('template/footer');
    }else if($grafikp=="line"){
    $this->load->view('Perikanan/grafik_perbandingan_produksi_ikan_line', $data);
    $this->load->view('template/footer');
    }
    }
    
  }
    public function tampil_grafik_produksi_ikan(){
        $tahunx=$this->input->post('tahunx');
        $data['data']=$this->m_produksiikan->tampil_produksi_ikan($tahunx);
        $this->load->view('template/header');
        $this->load->view('Perikanan/grafik_produksi_ikan_tahun',$data);
        $this->load->view('template/footer');
    }

   	public function proses_input_produksi_ikan(){
      $tahun= $this->input->post('tahun');
      $ji=$this->input->post('jenis_ikan');
      $ja=$this->input->post('jenis_air');
      $prod=$this->input->post('produksi');
      $nprod= $this->input->post('nilai_produksi');
      $penginput=$this->input->post('penginput');
   		$this->m_produksiikan->simpan_produksi_ikan($tahun,$ji,$ja,$prod,$nprod,$penginput);


		redirect('produksiikan');   	
  }
  public function proses_edit_produksi_ikan(){
      $id=$this->input->post('id');
      $tahun= $this->input->post('tahun');
      $ji=$this->input->post('jenis_ikan');
      $ja=$this->input->post('jenis_air');
      $prod=$this->input->post('produksi');
      $nprod= $this->input->post('nilai_produksi');
      $penginput=$this->input->post('penginput');
     $this->m_produksiikan->edit_produksi_ikan($id,$tahun,$ji,$ja,$prod,$nprod,$penginput);


    redirect('produksiikan');     
  }
 public function proses_hapus_produksi_ikan(){
    $id=$this->input->post('id');
    
    
    $this->m_produksiikan->delete_produksi_ikan($id);
    redirect('produksiikan');  


  }



    public function tampil_crosstab_ikan(){
      $datap = $this->input->post('datap');
      $air = $this->input->post('air');
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
        if($tahun1>$tahun2){
            list($tahun1, $tahun2) = array($tahun2, $tahun1);
        }
        $data['datap']=$datap;
      $data['data']=$this->m_produksiikan->data_crosstab($air);
      $data['tahun']=$this->m_produksiikan->tampil_periodec($tahun1,$tahun2);
      $data['jumlah']=$this->m_produksiikan->tampil_jumlahc($tahun1,$tahun2,$air);
      $data['jumlahp']=$this->m_produksiikan->tampil_jumlahp($tahun1,$tahun2,$air);
      $data['ikan']=$this->m_produksiikan->tampil_ikan($air);
      $this->load->view('template/header');
    if($datap=="1"){
    if($air=="Air Tawar"){
    $this->load->view('Perikanan/v_crosstab_produksi_ikan_tawar', $data);
    $this->load->view('template/footer');
    }else if($air=="Air Laut"){
    $this->load->view('Perikanan/v_crosstab_produksi_ikan_laut', $data);
    $this->load->view('template/footer');
    }
    }else{
    if($air=="Air Tawar"){
    $this->load->view('Perikanan/v_crosstab_nilai_produksi_ikan_tawar', $data);
    $this->load->view('template/footer');
    }else if($datap=="2"){
    $this->load->view('Perikanan/v_crosstab_nilai_produksi_ikan_laut', $data);
    $this->load->view('template/footer');
    }
    }
  }

     
   public function tampil_jenis_air(){
     $ikan=$this->input->get('ikan');
    $data['datax']=$this->m_produksiikan->tampil_jenisair($ikan);
    $option ='';
     foreach ($data['datax']->result() as $row){
        $air = $row->keterangan;
        $option = "<option value=\"$air\">$air</option>";
     }
     echo $option;
  }

}
