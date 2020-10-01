<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sarana extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_sarana');
    }

    public function index() {
        $periode=date('y');
        $tahun =0000;
        $data['data']=$this->m_sarana->tampil_perumahan($tahun);
        $data['datax']=$this->m_sarana->tampil_tahun();
        $this->load->view('template/header');
        $this->load->view('bencana/tampil_sarana', $data);
        $this->load->view('template/footer');
    }
    
    public function get() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_sarana->tampil_perumahan($tahun);
        $no=0;
        $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                        $no++;
                        $id = $a['id'];
                        $penginput=$a['penginput'];
                        $periode=$a['periode'];
                        
                        $aparatpp=$a['aparatpp'];
                        $aparatlinmas=$a['aparat_linmas'];
                        $petugas_satpol=$a['petugas_satpol'];
                        $petugaspp=$a['petugas_pp'];
                        $poskeamanan=$a['pos_keamanan'];
                        $poskamling=$a['pos_kamling'];
                        $roda2=$a['roda2'];
                        $roda4=$a['roda4'];  
                        $temp[]=$no;
                        $temp[]=$aparatpp;
                        $temp[]=$aparatlinmas;
                        $temp[]=$petugas_satpol;
                        $temp[]=$petugaspp;
                        $temp[]=$poskeamanan;
                        $temp[]=$poskamling;
                        $temp[]=$roda2;
                        $temp[]=$roda4;
                        $temp[]=$periode;
                        $temp[]="<a class=\"btn btn-xs btn-success\" href=\"sarana/detail_sarana/$id\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a> |
                                 <a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a> | 
                                 <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
                        $tabel[]=$temp;
                    }
                    echo json_encode(array('data' => $tabel));
    }

    public function detail_sarana() {
        $id = $this->uri->segment(3); 
        $data['data']=$this->m_sarana->tampil_perumahanx($id);
        $this->load->view('template/header');
        $this->load->view('bencana/detail_sarana', $data);
        $this->load->view('template/footer');     
    }
    
    // public function tampil_grafik() {
    //   $data['data']=$this->m_perumahan->tampil_perumahan();
    //   $this->load->view('template/header');
    //     $this->load->view('perumahan/tampil_grafik', $data);
    //     $this->load->view('template/footer');
    // }

      public function grafik_perbandingan() {
      $datap = $this->input->post('datap');
      $grafikp = $this->input->post('grafikp');
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
      if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['data']=$this->m_sarana->grafik_Perbandingan_perumahanx($tahun1,$tahun2);
      $data['datap']=$datap;
      $this->load->view('template/header');
      if($datap=="all"){
      if($grafikp=="bar"){
      $this->load->view('bencana/grafik_sarana_bar', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('bencana/grafik_sarana_line', $data);
      $this->load->view('template/footer');
      }
    } else{
      if($grafikp=="bar"){
      $this->load->view('bencana/grafik_perbandingan_sarana_bar', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('bencana/grafik_perbandingan_sarana_line', $data);
      $this->load->view('template/footer');
      }
      }
}


    public function proses_input_sarana(){
       $cek = $this->db->query("SELECT * FROM sarana where periode='".$this->input->post('periode')."'  and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Sarana','refresh');
           }
           else {
        $penginput = $this->input->post('penginput');
        $periode = $this->input->post('periode');
        $aparatpp = $this->input->post('aparatpp');
        $aparatlinmas = $this->input->post('aparatlinmas');
        $ppspp = $this->input->post('ppspp');
        $ppm = $this->input->post('ppm');
        $pk = $this->input->post('pk');
        $pkml = $this->input->post('pkml');
        $roda2 = $this->input->post('roda2');
        $roda4 = $this->input->post('roda4');
        $status= $this->input->post('status');
        $penginput = $this->input->post('penginput');
        $this->m_sarana->simpan_barang($penginput,$periode,$aparatpp,$aparatlinmas,$ppspp,$ppm,$pk,$pkml,$roda2,$roda4, $status);
        redirect('Sarana');      
    }
  }

    public function proses_edit_sarana(){
        $id=$this->input->post('id'); 
        $penginput = $this->input->post('penginput');
        $periode = $this->input->post('periode');
        $aparatpp = $this->input->post('aparatpp');
        $aparatlinmas = $this->input->post('aparatlinmas');
        $ppspp = $this->input->post('ppspp');
        $ppm = $this->input->post('ppm');
        $pk = $this->input->post('pk');
        $pkml = $this->input->post('pkml');
        $roda2 = $this->input->post('roda2');
        $roda4 = $this->input->post('roda4');
        $this->m_sarana->update_perumahan($id,$penginput,$periode,$aparatpp,$aparatlinmas,$ppspp,$ppm,$pk,$pkml,$roda2,$roda4);
        redirect('Sarana');  
    }   
    public function proses_delete_sarana(){
        $kodeinput=$this->input->post('kodeinput');
        $this->m_sarana->delete_perumahan($kodeinput);
        redirect('Sarana');  
    }   

    

}
