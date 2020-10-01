<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan_limbah extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_perusahaan_limbah');
    }

    public function index() {
        $periode=date('y');
        $tahun =0000;
    	$data['data']=$this->m_perusahaan_limbah->tampil_perusahaan_limbah($tahun);
        $data['datax']=$this->m_perusahaan_limbah->tampil_tahun();
        $data['datas']=$this->m_perusahaan_limbah->tampil_kecamatan();
        // $data['desa']=$this->m_perusahaan_limbah->getDesa()->result();

        $this->load->view('template/header');
        $this->load->view('lingkunganhidup/perusahaan_limbah',$data);
        $this->load->view('template/footer');
    }

    public function getDesa() {
      $kecamatan_id = $this->input->post('id', true);
      $data = $this->m_perusahaan_limbah->tampil_desa($kecamatan_id)->result();

      echo json_encode($data);
  }

      public function detail_perusahaan_limbah(){
        $tahun = $this->uri->segment(3);
        $data['data']=$this->m_perusahaan_limbah->tampil_perusahaan_limbah($tahun);
        $data['datax']=$this->m_perusahaan_limbah->tampil_tahun();
        $data['datas']=$this->m_perusahaan_limbah->tampil_kecamatan();
        // $data['dataz']=$this->m_kelompokekonomi->tampil_tampil($tahun);
        // $data['datas']=$this->m_kelompokekonomi->tampil_bencana();
        // $data['datazx']=$this->m_kelompokekonomi->tampil_kecamatan();
      
        // $data['periode']=$this->m_kelompokekonomi->tampil_tahunn();
        // $data['kelurahan']=$this->m_kelompokekonomi->tampil_kelurahan($this->uri->segment(3));
 
        $this->load->view('template/header');
        $this->load->view('lingkunganhidup/detail_perusahaan_limbah', $data);
        $this->load->view('template/footer');
  }

    public function get() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['datax']=$this->m_perusahaan_limbah->tampil_perusahaan_limbahx($tahun);
        $no=0;
        $tabel=array();
                    foreach ($data['datax']->result_array() as $a) {
                    $temp = array();
                        $no++;
                        $memiliki_limbah=$a['memiliki_limbah'];
                        $tidak_memiliki_limbah=$a['tidak_memiliki_limbah'];
                        $jumlah=$a['jumlah'];
                        $tahun=$a['tahun'];
                     

                        $temp[]=$no;
                        $temp[]=$tahun;
                        $temp[]=$memiliki_limbah;
                        $temp[]=$tidak_memiliki_limbah;
                        $temp[]=$jumlah;
                     
                        $temp[]="<a class=\"btn btn-xs btn-success\" href=\"Perusahaan_limbah/detail_perusahaan_limbah/$tahun\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>";
                        $tabel[]=$temp;
                    }
                    echo json_encode(array('data' => $tabel));
    }

    public function grafik_limbah(){
        $tahun = $this->uri->segment(3); 
      $data['data']=$this->m_perusahaan_limbah->tampil_grafik($tahun);
   
      $this->load->view('template/header');
      $this->load->view('lingkunganhidup/grafik_perusahaan_limbahx', $data);
      $this->load->view('template/footer');
    }

    public function tampil_perusahaan_limbah(){
        $tahunx=$this->input->post('tahunx');
        $data['data']=$this->m_perusahaan_limbah->tampil_perusahaan_limbah($tahunx);
        $this->load->view('template/header');
        $this->load->view('lingkunganhidup/grafik_perusahaan_limbah',$data);
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
      $data['data']=$this->m_perusahaan_limbah->grafik_perbandingan_perusahaan_limbahx($tahun2, $tahun1);
      $this->load->view('template/header');
      if($datap=="all"){
        if($grafikp=="bar"){
        $this->load->view('lingkunganhidup/grafik_perbandingan_perusahaan_limbah_bar_all', $data);
        $this->load->view('template/footer');
        }else if($grafikp=="line"){
        $this->load->view('lingkunganhidup/grafik_perbandingan_perusahaan_limbah_line_all', $data);
        $this->load->view('template/footer');
        }
      }else{
      if($grafikp=="bar"){
        $this->load->view('lingkunganhidup/grafik_perbandingan_perusahaan_limbah_bar', $data);
        $this->load->view('template/footer');
        }else if($grafikp=="line"){
        $this->load->view('lingkunganhidup/grafik_perbandingan_perusahaan_limbah_line', $data);
        $this->load->view('template/footer');
      }
      }
      
    }


    public function proses_tambah_perusahaan_limbah(){
        $kecamatan=$this->input->post('kecamatan');
        $memiliki_limbah=$this->input->post('memiliki_limbah');
        $tidak_memiliki_limbah=$this->input->post('tidak_memiliki_limbah');
        $tahun=$this->input->post('tahun');
        $penginput = $this->input->post('penginput');
        $cek = $this->db->query("SELECT * FROM perusahaan_limbah where kecamatan='$kecamatan' and tahun='$periode' and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Perusahaan_limbah','refresh');
           }
           else {
        $this->m_perusahaan_limbah->simpan_barang($kecamatan, $memiliki_limbah, $tidak_memiliki_limbah, $tahun, $penginput);

        redirect('Perusahaan_limbah');
}
    }

        public function proses_tambah_detail_perusahaan_limbah(){
        $tahunx=$this->uri->segment(3);    
        $kecamatan=$this->input->post('kecamatan');
        $memiliki_limbah=$this->input->post('memiliki_limbah');
        $tidak_memiliki_limbah=$this->input->post('tidak_memiliki_limbah');
        $tahun=$this->input->post('tahun');
        $penginput = $this->input->post('penginput');
        $cek = $this->db->query("SELECT * FROM perusahaan_limbah where kecamatan='$kecamatan' and tahun='$periode' and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Perusahaan_limbah','refresh');
           }
           else {
        $this->m_perusahaan_limbah->simpan_barang($kecamatan, $memiliki_limbah, $tidak_memiliki_limbah, $tahun, $penginput);

        redirect('Perusahaan_limbah/detail_perusahaan_limbah/'.$tahunx);
}
    }


    public function proses_hapus_perusahaan_limbah(){
        $no=$this->input->post('no');

        $this->m_perusahaan_limbah->hapus_perusahaan_limbah($no);
        redirect('Perusahaan_limbah');
    }

    public function proses_hapus_detail_perusahaan_limbah(){
        $tahun=$this->uri->segment(3);    
        $no=$this->input->post('no');

        $this->m_perusahaan_limbah->hapus_perusahaan_limbah($no);
        redirect('Perusahaan_limbah/detail_perusahaan_limbah/'.$tahun);
    }


    public function proses_edit_perusahaan_limbah(){
        $no=$this->input->post('no');
        $kecamatan=$this->input->post('kecamatan');
        $memiliki_limbah=$this->input->post('memiliki_limbah');
        $tidak_memiliki_limbah=$this->input->post('tidak_memiliki_limbah');
        $tahun=$this->input->post('tahun');
        $penginput = $this->input->post('penginput');
       $this->m_perusahaan_limbah->ubah_perusahaan_limbah($no, $kecamatan, $memiliki_limbah, $tidak_memiliki_limbah, $tahun, $penginput);

        redirect('Perusahaan_limbah');
    }


    public function proses_edit_detail_perusahaan_limbah(){
        $tahunx=$this->uri->segment(3);    
        $no=$this->input->post('no');
        $kecamatan=$this->input->post('kecamatan');
        $memiliki_limbah=$this->input->post('memiliki_limbah');
        $tidak_memiliki_limbah=$this->input->post('tidak_memiliki_limbah');
        $tahun=$this->input->post('tahun');
        $penginput = $this->input->post('penginput');

       $this->m_perusahaan_limbah->ubah_perusahaan_limbah($no, $kecamatan, $memiliki_limbah, $tidak_memiliki_limbah, $tahun, $penginput);

        redirect('Perusahaan_limbah/detail_perusahaan_limbah/'.$tahunx);
    }

    public function pilih_kelurahan(){
      $data['kelurahan']=$this->m_perusahaan_limbah->tampil_desa($this->uri->segment(3));
      $this->load->view('pariwisata/v_drop_down_kelurahan',$data);
  }
}