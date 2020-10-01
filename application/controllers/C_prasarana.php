<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_prasarana extends CI_Controller {

   
    function __construct() {
        parent::__construct();
        $this->load->model('m_prasarana');
    }

    public function index() {
      $periode=date('y');
      $tahun =0000;
      $data['data']=$this->m_prasarana->tampil_prasarana($tahun);
      $data['datas']=$this->m_prasarana->tampil_kecamatan();
      $data['datax']=$this->m_prasarana->tampil_tahun();
        $this->load->view('template/header');
        $this->load->view('cabangolahraga/v_prasarana',$data);
        $this->load->view('template/footer');

    }

    public function get() {
    $thn = $this->input->get('tahun');
    $tahun=intval($thn);
    $data['data']=$this->m_prasarana->tampil_prasarana($tahun);
        $no=0;
    $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
          $temp = array();
            $no++;
            $id = $a['id'];
           $tahun=$a['tahun'];
            $stadion=$a['stadion'];
            $spkbola=$a['sb'];
            $voly=$a['bv'];
            $basket=$a['bb'];
            $tenis=$a['tenis'];
            $badminton=$a['bt']; 
            $futsal=$a['futsal']; 
            $gor=$a['gor']; 
            $aula=$a['aula']; 
            $kolam=$a['kr'];
            $jumlah=$a['jumlah'];
            $temp[]=$no;
            $temp[]=$tahun;
            $temp[]=$stadion;
            $temp[]=$spkbola;
            $temp[]=$voly;
            $temp[]=$basket;
            $temp[]=$tenis;
            $temp[]=$badminton;
            $temp[]=$futsal;
            $temp[]=$gor;
            $temp[]=$aula;
            $temp[]=$kolam;
            $temp[]=$jumlah;
            
            $temp[]="<a class=\"btn btn-xs btn-success\" href=\"C_prasarana/tampil_detail_prasarana/$tahun\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span>Detail</a>";
            $tabel[]=$temp;
          }
          echo json_encode(array('data' => $tabel));
  }

  public function get2() {
    $thn = $this->input->get('tahun');
    $tahun=intval($thn);
    $data['data']=$this->m_prasarana->tampil_prasarana($tahun);
        $no=0;
    $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
          $temp = array();
            $no++;
            $id = $a['id'];
           $tahun=$a['tahun'];
           $kec=$a['kcmtn'];
            $stadion=$a['stadion'];
            $spkbola=$a['sb'];
            $voly=$a['bv'];
            $basket=$a['bb'];
            $tenis=$a['tenis'];
            $badminton=$a['bt']; 
            $futsal=$a['futsal']; 
            $gor=$a['gor']; 
            $aula=$a['aula']; 
            $kolam=$a['kr'];
            $jumlah=$a['jumlah'];
            $temp[]=$no;
            $temp[]=$kec;
            $temp[]=$tahun;
            $temp[]=$stadion;
            $temp[]=$spkbola;
            $temp[]=$voly;
            $temp[]=$basket;
            $temp[]=$tenis;
            $temp[]=$badminton;
            $temp[]=$futsal;
            $temp[]=$gor;
            $temp[]=$aula;
            $temp[]=$kolam;
            $temp[]=$jumlah;
            
            $temp[]="<a class=\"btn btn-xs btn-warning\" href=\"C_prasarana/tampil_detail_prasarana/$tahun\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span>Detail</a>";;
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
      $data['data']=$this->m_prasarana->grafik_perbandingan_prasarana($tahun2, $tahun1);
      $this->load->view('template/header');
    if($datap=="all"){
    if($grafikp=="bar"){
    $this->load->view('cabangolahraga/grafik_perbandingan_prasarana_bar_all', $data);
    $this->load->view('template/footer');
    }else if($grafikp=="line"){
    $this->load->view('cabangolahraga/grafik_perbandingan_prasarana_line_all', $data);
    $this->load->view('template/footer');
    }
    }else{
    if($grafikp=="bar"){
    $this->load->view('cabangolahraga/grafik_perbandingan_prasarana_bar', $data);
    $this->load->view('template/footer');
    }else if($grafikp=="line"){
    $this->load->view('cabangolahraga/grafik_perbandingan_prasarana_line', $data);
    $this->load->view('template/footer');
    }
    }
    
  }

  public function grafikdetailprasarana() {
    $id = $this->uri->segment(3); 
      $data['data']=$this->m_prasarana->tampil_grafik($id);
      $this->load->view('template/header');
      $this->load->view('cabangolahraga/grafik_detail_prasaranaolahraga', $data);
      $this->load->view('template/footer');
    }

   	public function proses_input_semua_prasarana(){
      $kec=$this->input->post('kecamatan');
      $stadion=$this->input->post('stadion');
      $spkbola=$this->input->post('sb');
      $voly= $this->input->post('bv');
      $basket= $this->input->post('bb');
      $tenis= $this->input->post('tenis');
      $bt= $this->input->post('bt');
      $futsal= $this->input->post('futsal');
      $gor= $this->input->post('gor');
      $aula= $this->input->post('aula');
      $kolam= $this->input->post('kr'); 
      $tahun= $this->input->post('tahun');
      $penginput = $this->input->post('penginput');
      $jumlah=$stadion+$spkbola+$voly+$basket+$tenis+$bt+$futsal+$gor+$aula+$kolam;
      $this->m_prasarana->simpan_prasarana($kec,$stadion,$spkbola,$voly,$basket,$tenis,$bt,$futsal,$gor,$aula,$kolam,$jumlah,$tahun,$penginput);


		redirect('C_prasarana');   	
  }
  public function proses_input_detail_prasarana(){
    $page = $this->uri->segment(3); 
      $kec=$this->input->post('kecamatan');
      $stadion=$this->input->post('stadion');
      $spkbola=$this->input->post('sb');
      $voly= $this->input->post('bv');
      $basket= $this->input->post('bb');
      $tenis= $this->input->post('tenis');
      $bt= $this->input->post('bt');
      $futsal= $this->input->post('futsal');
      $gor= $this->input->post('gor');
      $aula= $this->input->post('aula');
      $kolam= $this->input->post('kr'); 
      $tahun= $this->input->post('tahun');
      $penginput = $this->input->post('penginput');
      $jumlah=$stadion+$spkbola+$voly+$basket+$tenis+$bt+$futsal+$gor+$aula+$kolam;
      $this->m_prasarana->simpan_prasarana($kec,$stadion,$spkbola,$voly,$basket,$tenis,$bt,$futsal,$gor,$aula,$kolam,$jumlah,$tahun,$penginput);


    redirect('C_prasarana/tampil_detail_prasarana/'.$page);    
  }

  public function tampil_detail_prasarana(){
        $id = $this->uri->segment(3); 
        $data['data']=$this->m_prasarana->tampil_detail_prasarana($id);
        $data['datas']=$this->m_prasarana->tampil_kecamatan();

        $this->load->view('template/header');
        $this->load->view('cabangolahraga/v_detail_prasarana', $data);
        $this->load->view('template/footer');
    }

     public function tampil_grafik_semua_prasarana(){
        $tahun =0000;
        $data['data']=$this->m_prasarana->tampil_data_prasarana($tahun);
        $this->load->view('template/header');
        $this->load->view('cabangolahraga/grafik_semua_prasarana',$data);
        $this->load->view('template/footer');
    }

    public function tampil_grafik_detail_prasarana(){
        $page = $this->uri->segment(3);
        $data['data']=$this->m_prasarana->tampil_detail_prasarana($page);
        $this->load->view('template/header');
        $this->load->view('cabangolahraga/grafik_detail_prasarana',$data);
        $this->load->view('template/footer');
    }

    public function tampil_prasarana(){

      $this->load->view('template/header');
        $this->load->view('cabangolahraga/v_prasarana');
        $this->load->view('template/footer');
    }
    public function tampil_data_prasarana(){
      $periode=date('y');
      $tahun =0000;
        $id = $this->uri->segment(3); 
        $data['data']=$this->m_prasarana->tampil_data_prasarana($id);
         $data['datax']=$this->m_prasarana->tampil_tahun();
        $data['datas']=$this->m_prasarana->tampil_kecamatan();
        $this->load->view('template/header');
        $this->load->view('cabangolahraga/v_semua_prasarana', $data);
        $this->load->view('template/footer');
    }

public function tambah_detail_prasarana(){
        $page = $this->uri->segment(3); 
        $kec=$this->input->post('kecamatan');
      $stadion=$this->input->post('stadion');
      $spkbola=$this->input->post('sb');
      $voly= $this->input->post('bv');
      $basket= $this->input->post('bb');
      $tenis= $this->input->post('tenis');
      $bt= $this->input->post('bt');
      $futsal= $this->input->post('futsal');
      $gor= $this->input->post('gor');
      $aula= $this->input->post('aula');
      $kolam= $this->input->post('kr'); 
      $tahun= $this->input->post('tahun');
      $penginput = $this->input->post('penginput');
        
        $this->m_prasarana->simpan_prasarana($kec,$stadion,$spkbola,$voly,$basket,$tenis,$bt,$futsal,$gor,$aula,$kolam,$jumlah,$tahun,$penginput);

        redirect('C_prasarana/tampil_detail_prasarana'.$page);

    }
    public function proses_edit_prasarana(){
      $page = $this->uri->segment(3);
      $id=$this->input->post('id');
      $kec=$this->input->post('kecamatan');
      $stadion=$this->input->post('stadion');
      $spkbola=$this->input->post('sb');
      $voly= $this->input->post('bv');
      $basket= $this->input->post('bb');
      $tenis= $this->input->post('tenis');
      $bt= $this->input->post('bt');
      $futsal= $this->input->post('futsal');
      $gor= $this->input->post('gor');
      $aula= $this->input->post('aula');
      $kolam= $this->input->post('kr');
      $tahun= $this->input->post('tahun');
      $penginput = $this->input->post('penginput');
      $jumlah=$stadion+$spkbola+$voly+$basket+$tenis+$bt+$futsal+$gor+$aula+$kolam;
      $this->m_prasarana->edit_prasarana($id,$kec,$stadion,$spkbola,$voly,$basket,$tenis,$bt,$futsal,$gor,$aula,$kolam,$jumlah,$tahun,$penginput);


    redirect('C_prasarana/tampil_detail_prasarana/'.$page);     
  }
 
 public function proses_hapus_prasarana(){
  $page = $this->uri->segment(3); 
    $id=$this->input->post('id');
    $this->m_prasarana->delete_prasarana($id);
    redirect('C_prasarana/tampil_detail_prasarana/'.$page);  
  }  

  public function proses_hapus_semua_prasarana(){
  $page = $this->uri->segment(3); 
    $id=$this->input->post('id');
    $this->m_prasarana->delete_prasarana($id);
    redirect('C_prasarana/tampil_data_prasarana');  
  }    

}
