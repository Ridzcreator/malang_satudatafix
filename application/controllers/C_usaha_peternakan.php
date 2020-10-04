<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_usaha_peternakan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_usaha_peternakan');
    }

    public function index() {
        $periode=date('y');
        $tahun =0000;
        $data['data']=$this->m_usaha_peternakan->tampil_usaha($tahun);
        $data['datax']=$this->m_usaha_peternakan->tampil_tahun();
        $data['datas']=$this->m_usaha_peternakan->tampil_kecamatan();
        $data['datad']=$this->m_usaha_peternakan->tampil_desaku();
        $this->load->view('template/header');
        $this->load->view('pertanian/v_usaha_peternakan',$data);
        $this->load->view('template/footer');
    }

    public function get() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_usaha_peternakan->tampil_usaha($tahun);
        $tabel=array();
                foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                        $id=$a['id'];
                        $tahun=$a['tahun'];
                        $kecamatan=$a['kecamatan'];
                        // $desa_id=$a['desa'];
                        // $where = array('id_desa' => $desa_id);
                        // $desa = $this->m_usaha_peternakan->getNamaDesaWhere($where)->row()->nama_desa;
                        $hewan_besar=$a['hewan_besar'];
                        $hewan_kecil=$a['hewan_kecil'];
                        $unggas=$a['unggas'];
                        $temp[]=$tahun;
                        $temp[]=$kecamatan;
                        // $temp[]=$desa;
                        $temp[]=number_format($a['hewan_besar'],0,",",".");
                        $temp[]=number_format($a['hewan_kecil'],0,",",".");
                        $temp[]=number_format($a['unggas'],0,",",".");
                        $temp[]="<a class=\"btn btn-xs btn-warning\" href=\"C_usaha_peternakan/tampil_detail_peternakan/$tahun\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span>Detail</a>";
                        $tabel[]=$temp;
                    }
                    echo json_encode(array('data' => $tabel));
    }

    public function proses_tambah_peternakan(){
        $kecamatan=$this->input->post('kecamatan');
        $where = array('id_kecamatan' => $kecamatan);
        $kecamatan_arr = $this->m_usaha_peternakan->getNamaKecamatanWhere($where)->row();
        $kecamatan = $kecamatan_arr->nama_kecamatan;
        $desa=$this->input->post('desa');
        $tahun=$this->input->post('tahun');
        $hewan_kecil=$this->input->post('hewan_kecil');
        $hewan_besar=$this->input->post('hewan_besar');
        $penginput=$this->input->post('penginput');
        $unggas=$this->input->post('unggas');
        
        $this->m_usaha_peternakan->simpan_peternakan($kecamatan, $desa, $tahun, $hewan_besar, $hewan_kecil, $penginput, $unggas);

        redirect('C_usaha_peternakan');

    }

        public function tampil_detail_peternakan(){
        $id = $this->uri->segment(3); 
        $data['data']=$this->m_usaha_peternakan->tampil_detail_usaha($id);
        $data['datax']=$this->m_usaha_peternakan->tampil_tahun();
        $data['datas']=$this->m_usaha_peternakan->tampil_kecamatan();

        $this->load->view('template/header');
        $this->load->view('pertanian/v_detail_usaha_peternakan', $data);
        $this->load->view('template/footer');
    }

    public function proses_tambah_detail_peternakan(){
        $page = $this->uri->segment(3); 
        $kecamatan=$this->input->post('kecamatan');
        $tahun=$this->input->post('tahun');
        $hewan_kecil=$this->input->post('hewan_kecil');
        $hewan_besar=$this->input->post('hewan_besar');
        $penginput=$this->input->post('penginput');
        $unggas=$this->input->post('unggas');
        
        $this->m_usaha_peternakan->simpan_peternakan($kecamatan, $tahun, $hewan_besar, $hewan_kecil, $penginput, $unggas);

        redirect('C_usaha_peternakan/tampil_detail_peternakan/'.$page);

    }

    public function proses_hapus_peternakan(){
        $page = $this->uri->segment(3); 
        $id=$this->input->post('id');

        $this->m_usaha_peternakan->proses_hapus_peternakan($id);
        redirect('C_usaha_peternakan/tampil_detail_peternakan/'.$page);
    }

    public function proses_ubah_peternakan(){
        $page = $this->uri->segment(3); 
        $id=$this->input->post('id');
        $kecamatan=$this->input->post('kecamatan');
        $desa=$this->input->post('desa');
        $tahun=$this->input->post('tahun');
        $hewan_kecil=$this->input->post('hewan_kecil');
        $hewan_besar=$this->input->post('hewan_besar');
        $penginput=$this->input->post('penginput');
        $unggas=$this->input->post('unggas');
        $jumlah=$this->input->post('jumlah');

        $this->m_usaha_peternakan->proses_ubah_peternakan($id, $desa, $kecamatan, $tahun, $hewan_besar, $hewan_kecil, $penginput, $unggas, $jumlah);

        redirect('C_usaha_peternakan/tampil_detail_peternakan/'.$page);
    }

    public function tampil_crosstab_peternakan(){
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
        if($tahun1>$tahun2){
            list($tahun1, $tahun2) = array($tahun2, $tahun1);
        }
      $data['data']=$this->m_usaha_peternakan->data_crosstab();
      $data['tahun']=$this->m_usaha_peternakan->tampil_periodec($tahun1,$tahun2);
      $data['jumlah']=$this->m_usaha_peternakan->tampil_jumlahc($tahun1,$tahun2);
      $data['kecamatan']=$this->m_usaha_peternakan->tampil_kecamatanc();

        $this->load->view('template/header');
        $this->load->view('pertanian/v_crosstab_usaha_peternakan', $data);
        $this->load->view('template/footer');
    }    

    // public function tampil_grafik_wisatawan_peternakan(){
    //     $page = $this->uri->segment(3);
    //     $data['data']=$this->m_usaha_peternakan->tampil_detail_wisatawan_peternakan($page);
    //     $this->load->view('template/header');
    //     $this->load->view('pertanian/v_grafik_wisatawan_peternakan',$data);
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
      $data['datap']=$datap;
      $data['data']=$this->m_usaha_peternakan->grafik_perbandingan_peternakan($tahun2, $tahun1);
      $this->load->view('template/header');
      if($datap=="all"){
        if($grafikp=="bar"){
            $this->load->view('pertanian/grafik_perbandingan_peternakan_bar_all', $data);
            $this->load->view('template/footer');
        }else if($grafikp=="line"){
            $this->load->view('pertanian/grafik_perbandingan_peternakan_line_all', $data);
            $this->load->view('template/footer');
        }else if($grafikp=="area"){
          $this->load->view('pertanian/grafik_perbandingan_peternakan_area_all', $data);
          $this->load->view('template/footer');
      }
      }else{
      if($grafikp=="bar"){
        $this->load->view('pertanian/grafik_perbandingan_peternakan_bar', $data);
        $this->load->view('template/footer');
      }else if($grafikp=="line"){
        $this->load->view('pertanian/grafik_perbandingan_peternakan_line', $data);
        $this->load->view('template/footer');
      }else if($grafikp=="area"){
        $this->load->view('pertanian/grafik_perbandingan_peternakan_area', $data);
        $this->load->view('template/footer');
      }
      }
    }

    public function grafik_peternakan() {
      $tahun = $this->uri->segment(3); 
      $data['data']=$this->m_usaha_peternakan->tampil_grafik($tahun);
      $this->load->view('template/header');
      $this->load->view('pertanian/grafik_peternakan', $data);
      $this->load->view('template/footer');
    }

    public function pilih_desa(){
      $data['kelurahan']=$this->m_usaha_peternakan->tampil_desa($this->uri->segment(3));
      $this->load->view('pariwisata/v_drop_down_kelurahan',$data);
  }






}
?>