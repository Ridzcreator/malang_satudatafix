<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Unjukrasa extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_unjukrasa');
    }

    public function index() {
        $periode=date('y');
        $tahun =0000;
        $data['data']=$this->m_unjukrasa->tampil_unjukrasa($tahun);
        $data['data1']=$this->m_unjukrasa->tampil_editunjukrasa($tahun);
        $data['datax']=$this->m_unjukrasa->tampil_tahun();
        $data['datazx']=$this->m_unjukrasa->tampil_unjuk();
        $this->load->view('template/header');
        $this->load->view('bencana/tampil_unjukrasa', $data);
        $this->load->view('template/footer');
    }
    
    public function get() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_unjukrasa->tampil_unjukrasa($tahun);
        $no=0;
        $jumlah=0;
        $korban=0;
        $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                        $no++;
                        
                       
                        $jumlah=$a['jumlah'];
                        $periode=$a['periode'];
                    
                        $temp[]=$no;
                        $temp[]=$periode;
                        $temp[]=$jumlah;
                        
                         $temp[]="<a class=\"btn btn-xs btn-success\" href=\"Unjukrasa/detail_unjukrasa/$periode\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a> | 
                     <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$periode\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
                        $tabel[]=$temp;
                    }
                    echo json_encode(array('data' => $tabel));
    }

    public function detail_unjukrasa() {
        $id = $this->uri->segment(3); 
        $data['data']=$this->m_unjukrasa->tampil_detail_unjukrasa($id);
        $data['datax']=$this->m_unjukrasa->tampil_tahun();
        $data['datazx']=$this->m_unjukrasa->tampil_unjuk();
        $this->load->view('template/header');
        $this->load->view('bencana/tampil_detail_unjukrasa', $data);
        $this->load->view('template/footer');
             
    }
    public function Tambah_unjukrasa() {
        $data['datax']=$this->m_unjukrasa->tampil_tahun();
   
        $this->load->view('template/header');
        $this->load->view('bencana/tambah_unjukrasa', $data);
        $this->load->view('template/footer');
             
    }
    public function tampil_crosstab_unjukrasa(){
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
       if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['data']=$this->m_unjukrasa->tahun_crosstab();
      $data['tahun']=$this->m_unjukrasa->tampil_periodec($tahun1,$tahun2);
      $data['jumlah']=$this->m_unjukrasa->tampil_jumlahc($tahun1,$tahun2);
      $data['jumlah1']=$this->m_unjukrasa->tampil_jumlahxc($tahun1,$tahun2);
      $data['unjukrasa']=$this->m_unjukrasa->tampil_unjukrasac();

        $this->load->view('template/header');
        $this->load->view('bencana/tampil_crosstabunjukrasa', $data);
        $this->load->view('template/footer');

    }

     public function tampil_laporan(){
      $tahun1 = $this->uri->segment('3');
      $tahun2 = $this->uri->segment('4');
       if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['data']=$this->m_unjukrasa->tahun_crosstab();
      $data['tahun']=$this->m_unjukrasa->tampil_periodec($tahun1,$tahun2);
      $data['jumlah']=$this->m_unjukrasa->tampil_jumlahc($tahun1,$tahun2);
      $data['jumlah1']=$this->m_unjukrasa->tampil_jumlahxc($tahun1,$tahun2);
      $data['unjukrasa']=$this->m_unjukrasa->tampil_unjukrasac();

        
        $this->load->view('bencana/tampil_printunjukrasa', $data);
        

    }

     public function grafik_perbandingan() {
      $datap = $this->input->post('datap');
      $grafikp = $this->input->post('grafikp');
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
       if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['data']=$this->m_unjukrasa->grafik_Perbandingan_perumahanx($tahun1, $tahun2);
      $data['datax']=$this->m_unjukrasa->grafik_Perbandingan_unjukrasa($tahun1,$tahun2,$datap);
       $data['dataz']=$this->m_unjukrasa->tahun_crosstab();
      $data['tahun']=$this->m_unjukrasa->tampil_periodec($tahun1,$tahun2);
      $data['jumlah']=$this->m_unjukrasa->tampil_jumlahc($tahun1,$tahun2);
      $data['jumlah1']=$this->m_unjukrasa->tampil_jumlahxc($tahun1,$tahun2);
      $data['unjukrasa']=$this->m_unjukrasa->tampil_unjukrasac();


      $this->load->view('template/header');
      if($datap=="all"){
      if($grafikp=="bar"){
      $this->load->view('bencana/grafik_unjukrasa_bar', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('bencana/grafik_unjukrasa_line', $data);
      $this->load->view('template/footer');
      }
    } else if($datap=="Bidang Politik"){
      if($grafikp=="bar"){
      $this->load->view('bencana/grafik_perbandingan_politik_bar', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('bencana/grafik_perbandingan_politik_line', $data);
      $this->load->view('template/footer');
      }
    }else if($datap=="Bidang Ekonomi"){
      if($grafikp=="bar"){
      $this->load->view('bencana/grafik_perbandingan_ekonomi_bar', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('bencana/grafik_perbandingan_ekonomi_line', $data);
      $this->load->view('template/footer');
      }
    }else if($datap=="Bidang Agama"){
      if($grafikp=="bar"){
      $this->load->view('bencana/grafik_perbandingan_agama_bar', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('bencana/grafik_perbandingan_agama_line', $data);
      $this->load->view('template/footer');
      }
    }else if($datap=="Bidang Lainnya"){
      if($grafikp=="bar"){
      $this->load->view('bencana/grafik_perbandingan_lain_bar', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('bencana/grafik_perbandingan_lain_line', $data);
      $this->load->view('template/footer');
      }
    }else if($datap=="Korban Meninggal"){
      if($grafikp=="bar"){
      $this->load->view('bencana/grafik_perbandingan_meninggal_bar', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('bencana/grafik_perbandingan_meninggal_line', $data);
      $this->load->view('template/footer');
      }
    }else if($datap=="Korban Luka"){
      if($grafikp=="bar"){
      $this->load->view('bencana/grafik_perbandingan_luka_bar', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('bencana/grafik_perbandingan_luka_line', $data);
      $this->load->view('template/footer');
      }
    }else if($datap=="Jumlah Pengungsi"){
      if($grafikp=="bar"){
      $this->load->view('bencana/grafik_perbandingan_pengungsi_bar', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('bencana/grafik_perbandingan_pengungsi_line', $data);
      $this->load->view('template/footer');
      }
    }else if($datap=="Kerugian Material"){
      if($grafikp=="bar"){
      $this->load->view('bencana/grafik_perbandingan_material_bar', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('bencana/grafik_perbandingan_material_line', $data);
      $this->load->view('template/footer');
      }
    }
    }

    public function input_unjukrasa() {
    $jenis = $this->input->post('jenis_kasus');
    $jumlah = $this->input->post('jumlah');
    $tahun = $this->input->post('tahun');
    $status = $this->input->post('status');
    $penginput = $this->input->post('penginput');
      $i=0;
      foreach ($jenis as $key) {
       $cek = $this->db->query("SELECT * FROM unjukrasa where unjukrasa='".$jenis[$i]."' and periode='".$tahun[$i]."'  and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Unjukrasa','refresh');
           }

           else {

    $jenis = $this->input->post('jenis_kasus');
    $jumlah = $this->input->post('jumlah');
    $tahun = $this->input->post('tahun');
    $status = $this->input->post('status');
    $penginput = $this->input->post('penginput');
    $data = array();
    $index=0;
    foreach($jenis AS $key){
    array_push($data, array(  
      "id"    => '', 
      "unjukrasa"  => $jenis[$index],
      "jumlah"  => $jumlah[$index],
      "periode"  => $tahun[$index],
      "status"  => $status[$index],
      "penginput"  => $penginput[$index]));

    $index++;
    

      }
               
    
    $test= $this->db->insert_batch('unjukrasa', $data); // fungsi  untuk menyimpan multi array ke database
    
    
     
            redirect('Unjukrasa');  
           }
      }
      
           


   }
    
    // public function tampil_grafik() {
    //   $data['data']=$this->m_perumahan->tampil_perumahan();
    //   $this->load->view('template/header');
    //     $this->load->view('perumahan/tampil_grafik', $data);
    //     $this->load->view('template/footer');
    // }

    public function proses_input_unjukrasa(){
        $penginput = $this->input->post('penginput');
        $status = $this->input->post('status');
        $periode = $this->input->post('periode');
        $politik = $this->input->post('politik');
        $ekonomi = $this->input->post('ekonomi');
        $agama = $this->input->post('agama');
        $lain = $this->input->post('lain');
        $meninggal = $this->input->post('meninggal');
        $luka = $this->input->post('luka');
        $pengungsi = $this->input->post('pengungsi');
        $material = $this->input->post('material');

        $alert = $this->m_unjukrasa->simpan_barang($penginput,$status,$periode,$politik,$ekonomi,$agama,$lain,$meninggal,$luka,$pengungsi,$material);
        if (!$alert) {
         echo "<script>alert('data gagal di masukkan')</script>";
        }
       

        redirect('Unjukrasa','refresh');      
    }

    public function proses_edit_unjukrasa(){

        $id=$this->input->post('id');
         $penginput = $this->input->post('penginput');
        $status = $this->input->post('status');
        $periode = $this->input->post('periode');
        $unjukrasa = $this->input->post('unjukrasa');
        $jumlah = $this->input->post('jumlah');
     
        $this->m_unjukrasa->update_unjukrasa($id,$penginput,$status,$periode,$unjukrasa,$jumlah);
        redirect('Unjukrasa/detail_unjukrasa/'.$this->uri->segment(3));  
    }   
    public function proses_delete_unjukrasa(){
        $kodeinput=$this->input->post('kodeinput');
        $this->m_unjukrasa->delete_unjukrasa($kodeinput);
        redirect('Unjukrasa');  
    }   


    

}
