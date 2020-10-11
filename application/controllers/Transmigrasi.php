<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transmigrasi extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_transmigrasi');
    }

    public function index() {
        $periode=date('y');
        $tahun =0000;
    	$data['data']=$this->m_transmigrasi->tampil_transmigrasi($tahun);
        $data['datax']=$this->m_transmigrasi->tampil_tahun();
        $data['datas']=$this->m_transmigrasi->tampil_kecamatan();
        $data['datal']=$this->m_transmigrasi->tampil_provinsi();
        $data['datak']=$this->m_transmigrasi->tampil_bulan();
        $this->load->view('template/header');
        $this->load->view('transmigrasi/transmigrasi',$data);
        $this->load->view('template/footer');
    }

    public function get() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_transmigrasi->tampil_transmigrasi($tahun);
        $no=0;
        $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                    $no++;
                    $id=$a['id'];
                    $kecamatan=$a['kecamatan'];
                    $provinsi=$a['provinsi'];
                    $bulan=$a['bulan'];
                    $tahun=$a['tahun'];
                    $laki_laki=$a['laki_laki'];
                    $perempuan=$a['perempuan'];
                    $rumah_tangga=$a['rumah_tangga'];
                    $jiwa=$a['jiwa'];
                    $penginput=$a['penginput'];
                    $timestamp=$a['timestamp'];
                    $status=$a['status'];
                    $temp[]=$kecamatan;
                    $temp[]=$provinsi;
                    $temp[]=$bulan;
                    $temp[]=$laki_laki;
                    $temp[]=$perempuan;
                    $temp[]=$rumah_tangga;
                    $temp[]=$jiwa;
                    $temp[]=$tahun;
                       
                        $temp[]="<a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a>   
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
      $data['data']=$this->m_transmigrasi->grafik_perbandingan_transmigrasix($tahun2, $tahun1);
      $this->load->view('template/header');
     if($datap=="all"){
        if($grafikp=="bar"){
        $this->load->view('transmigrasi/grafik_perbandingan_transmigrasi_bar_all', $data);
        $this->load->view('template/footer');
        }else if($grafikp=="line"){
        $this->load->view('transmigrasi/grafik_perbandingan_transmigrasi_line_all', $data);
        $this->load->view('template/footer');
        }
      }else{
      if($grafikp=="bar"){
        $this->load->view('transmigrasi/grafik_perbandingan_transmigrasi_bar', $data);
        $this->load->view('template/footer');
        }else if($grafikp=="line"){
        $this->load->view('transmigrasi/grafik_perbandingan_transmigrasi_line', $data);
        $this->load->view('template/footer');
      }
      }
      
    }


   public function tampil_crosstab_transmigrasi(){
      $dataq = $this->input->post('dataq');
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
       if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['dataq']=$dataq;
      $data['data']=$this->m_transmigrasi->tahun_crosstab_provinsi();
      $data['tahun']=$this->m_transmigrasi->tampil_periode_provinsi($tahun1,$tahun2);
      $data['jumlah']=$this->m_transmigrasi->tampil_jumlah_provinsi($tahun1,$tahun2);
      $data['provinsi']=$this->m_transmigrasi->tampil_provinsic();
      $data1['data']=$this->m_transmigrasi->tahun_crosstab_bulan();
      $data1['tahun']=$this->m_transmigrasi->tampil_periode_bulan($tahun1,$tahun2);
      $data1['jumlah']=$this->m_transmigrasi->tampil_jumlah_bulan($tahun1,$tahun2);
      $data1['bulan']=$this->m_transmigrasi->tampil_bulanc();
      $data2['data']=$this->m_transmigrasi->tahun_crosstab_kecamatan();
      $data2['tahun']=$this->m_transmigrasi->tampil_periode_kecamatan($tahun1,$tahun2);
      $data2['jumlah']=$this->m_transmigrasi->tampil_jumlah_kecamatan($tahun1,$tahun2);
      $data2['kecamatan']=$this->m_transmigrasi->tampil_kecamatanc();

        $this->load->view('template/header');
        if($dataq=="1"){
        $this->load->view('transmigrasi/tampil_crosstab_transmigran_provinsi', $data);
        $this->load->view('template/footer');
        }else if($dataq=="2"){
        $this->load->view('transmigrasi/tampil_crosstab_transmigran_bulan', $data1);
        $this->load->view('template/footer');
        }else if($dataq=="3"){
        $this->load->view('transmigrasi/tampil_crosstab_transmigran_kecamatan', $data2);
        $this->load->view('template/footer');
      }
      
    }

    public function tampil_grafik_transmigrasi(){
        $dataw = $this->input->post('dataw');
        $tahunx=$this->input->post('tahunx');
        $data['dataw']=$dataw;
        $data['data']=$this->m_transmigrasi->tampil_transmigrasi_grafik_tahun_provinsi($tahunx);
        $data1['data']=$this->m_transmigrasi->tampil_transmigrasi_grafik_tahun_bulan($tahunx);
        $data2['data']=$this->m_transmigrasi->tampil_transmigrasi_grafik_tahun_kecamatan($tahunx);

        $this->load->view('template/header');
        if($dataw=="1"){
        $this->load->view('transmigrasi/grafik_perusahaan_klasifikasi_provinsi',$data);
        $this->load->view('template/footer');
        }else if($dataw=="2"){
        $this->load->view('transmigrasi/grafik_perusahaan_klasifikasi_bulan',$data1);
        $this->load->view('template/footer');
        }else if($dataw=="3"){
        $this->load->view('transmigrasi/grafik_perusahaan_klasifikasi_kecamatan',$data2);
        $this->load->view('template/footer');
      }

    }

    public function tampil_grafik_industri_rumah_tangga_2(){
        $tahuny=$this->input->post('tahuny');
        $data['data']=$this->m_transmigrasi->tampil_industri_rumah_tangga($tahuny);
        $this->load->view('template/header');
        $this->load->view('transmigrasi/grafik_industri_rumah_tangga_2',$data);
        $this->load->view('template/footer');
    }

     public function tampil_klasifikasi(){
        $this->load->view('template/header');
        $this->load->view('transmigrasi/perusahaan_klasifikasi',$dataklasifikasi);
        $this->load->view('template/footer');
    }


    public function proses_tambah_transmigrasi(){
        $tahun=$this->input->post('tahun');
        $kecamatan=$this->input->post('kecamatan');
        $provinsi=$this->input->post('provinsi');
        $bulan=$this->input->post('bulan');
        $laki_laki=$this->input->post('laki_laki');
        $perempuan=$this->input->post('perempuan');
        $rumah_tangga=$this->input->post('rumah_tangga');;
        $penginput=$this->input->post('penginput');

              $cek = $this->db->query("SELECT * FROM transmigrasi where kecamatan='$kecamatan' and provinsi='$provinsi' and bulan='$bulan' and tahun='$tahun' and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Transmigrasi','refresh');
           }
           else {

        $this->m_transmigrasi->simpan_transmigrasi($tahun, $kecamatan, $provinsi, $bulan, $laki_laki, $perempuan, $rumah_tangga, $penginput);

        redirect('Transmigrasi');

    }
      }


    public function proses_hapus_transmigrasi(){
        $no=$this->input->post('no');

        $this->m_transmigrasi->hapus_transmigrasi($no);
        redirect('Transmigrasi');
    }

    public function proses_edit_transmigrasi(){
        $no=$this->input->post('no');
        $tahun=$this->input->post('tahun');
        $kecamatan=$this->input->post('kecamatan');
        $provinsi=$this->input->post('provinsi');
        $bulan=$this->input->post('bulan');
        $laki_laki=$this->input->post('laki_laki');
        $perempuan=$this->input->post('perempuan');
        $rumah_tangga=$this->input->post('rumah_tangga');
        $penginput=$this->input->post('penginput');

       $this->m_transmigrasi->ubah_transmigrasi($no, $tahun, $kecamatan, $provinsi, $bulan, $laki_laki, $perempuan, $rumah_tangga, $penginput);

        redirect('Transmigrasi');
    }
}