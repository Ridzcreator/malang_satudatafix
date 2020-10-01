<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_penanaman extends CI_Controller {

   function __construct() {
        parent::__construct();
        $this->load->model('m_penanaman');
    }

    public function index() {
    	$periode=date('y');
      $tahun =0000;
      $data['data']=$this->m_penanaman->tampil_penanaman($tahun);
       $data['datas']=$this->m_penanaman->tampil_sektor();
       $data['dataz']=$this->m_penanaman->tampil_jenis_sektor();
       $data['datax']=$this->m_penanaman->tampil_tahun();
        $this->load->view('template/header');
        $this->load->view('Penanaman/v_penanaman',$data);
        $this->load->view('template/footer');

    }
  public function perkembangan() {
      $periode=date('y');
      $tahun =0000;
      $data['data']=$this->m_penanaman->tampil_penanaman($tahun);
       $data['datas']=$this->m_penanaman->tampil_sektor();
       $data['dataz']=$this->m_penanaman->tampil_jenis_sektor();
       $data['datax']=$this->m_penanaman->tampil_tahun();
        $this->load->view('template/header');
        $this->load->view('Penanaman/v_perkembangan',$data);
    }
    public function get() {
    $thn = $this->input->get('tahun');
    $tahun=intval($thn);
    $data['data']=$this->m_penanaman->tampil_penanaman($tahun);
        $no=0;
    $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
          $temp = array();
            $no++;
            $id=$a['id'];
            $sektor=$a['sektor'];
            $jns=$a['jenis_sektor'];
            $nilaipma=$a['nilai_pma'];
            $unitpma=$a['unit_pma'];
            $nilaipmdn=$a['nilai_pmdn'];
            $unitpmdn=$a['unit_pmdn'];
            $nilai=$a['nilai_non'];
            $unit=$a['unit_non'];
            $tng=$a['tenaga_kerja'];
            $tahun=$a['tahun']; 
            $temp[]=$no;
            $temp[]=$sektor;
            $temp[]=$jns;
            $temp[]=number_format($a['nilai_pma'],0,",",",");
            $temp[]=$unitpma;
            $temp[]=number_format($a['nilai_pmdn'],0,",",",");
            $temp[]=$unitpmdn;
            $temp[]=number_format($a['nilai_non'],0,",",",");
            $temp[]=$unit;
            $temp[]=number_format($a['tenaga_kerja'],0,",",",");
            $temp[]=$tahun;
            $temp[]="
                     <a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a> | 
                     <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
            $tabel[]=$temp;
          }
          echo json_encode(array('data' => $tabel));
  }
  public function get2() {
    $thn = $this->input->get('tahun');
    $tahun=intval($thn);
    $data['data']=$this->m_penanaman->tampil_penanaman2($tahun);
    $no=0;
    $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
          $temp = array();
            $no++;
            $id=$a['id'];
            $sektor=$a['sektor'];
            $jns=$a['jenis_sektor'];
            $nilaipma=$a['nilai_pma'];
            $unitpma=$a['unit_pma'];
            $nilaipmdn=$a['nilai_pmdn'];
            $unitpmdn=$a['unit_pmdn'];
            $nilai=$a['nilai_non'];
            $unit=$a['unit_non'];
            $tng=$a['tenaga_kerja'];
            $tahun=$a['tahun']; 
            $temp[]=$no;
            $temp[]=$sektor;
            $temp[]=$unit;
            $temp[]=number_format($a['nilai_non'],0,",",",");
            $temp[]=number_format($a['tenaga_kerja'],0,",",",");
            $temp[]=$tahun;
            $temp[]="";
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
      $data['data']=$this->m_penanaman->grafik_perbandingan_penanaman($tahun2, $tahun1);
      $this->load->view('template/header');
    if($datap=="all"){
    if($grafikp=="bar"){
    $this->load->view('penanaman/grafik_perbandingan_penanaman_bar_all', $data);
    $this->load->view('template/footer');
    }else if($grafikp=="line"){
    $this->load->view('penanaman/grafik_perbandingan_penanaman_line_all', $data);
    $this->load->view('template/footer');
    }
    }else{
    if($grafikp=="bar"){
    $this->load->view('penanaman/grafik_perbandingan_penanaman_bar', $data);
    $this->load->view('template/footer');
    }else if($grafikp=="line"){
    $this->load->view('penanaman/grafik_perbandingan_penanaman_line', $data);
    $this->load->view('template/footer');
    }
    }
    
  }

    public function proses_input_penanaman(){
      $sektor=$this->input->post('sektor');
      $jns=$this->input->post('jenis_sektor');
      $nilaipma= $this->input->post('nilai_pma');
      $unitpma= $this->input->post('unit_pma');
      $nilaipmdn= $this->input->post('nilai_pmdn');
      $unitpmdn= $this->input->post('unit_pmdn');
      $nilai= $this->input->post('nilai_non');
      $unit= $this->input->post('unit_non');
      $tng= $this->input->post('tenaga_kerja');
      $tahun= $this->input->post('tahun');
      $penginput= $this->input->post('penginput');
      $this->m_penanaman->simpan_penanaman($sektor,$jns,$nilaipma,$unitpma,$nilaipmdn,$unitpmdn,$nilai,$unit,$tng,$tahun,$penginput);


    redirect('C_penanaman');     
  }
  public function proses_edit_penanaman(){
      $id=$this->input->post('id');
      $sektor=$this->input->post('sektor');
      $jns=$this->input->post('jenis_sektor');
      $nilaipma= $this->input->post('nilai_pma');
      $unitpma= $this->input->post('unit_pma');
      $nilaipmdn= $this->input->post('nilai_pmdn');
      $unitpmdn= $this->input->post('unit_pmdn');
      $nilai= $this->input->post('nilai_non');
      $unit= $this->input->post('unit_non');
      $tng= $this->input->post('tenaga_kerja');
      $tahun= $this->input->post('tahun');
      $penginput= $this->input->post('penginput');
      $this->m_penanaman->edit_penanaman($id,$sektor,$jns,$nilaipma,$unitpma,$nilaipmdn,$unitpmdn,$nilai,$unit,$tng,$tahun,$penginput);


    redirect('C_penanaman');     
  }

  public function tampil_jenis_sektor(){
     $sktr=$this->input->get('sktr');
    $data['dataz']=$this->m_penanaman->tampil_jenissektor($sktr);
    $option ='';
     foreach ($data['dataz']->result() as $row){
        $jns = $row->keterangan;
        $option = "<option value=\"$jns\">$jns</option>";
     }
     echo $option;
  }

 public function proses_hapus_penanaman(){
    $id=$this->input->post('id');
    
    
    $this->m_penanaman->delete_penanaman($id);
    $id=$this->input->post('id');
    $this->m_penanaman->delete_penanaman($id);
    redirect('C_penanaman');  
  }    
}
