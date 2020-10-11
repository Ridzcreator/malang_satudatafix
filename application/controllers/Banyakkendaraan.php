<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Banyakkendaraan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_banyakkendaraan');
    }

    public function index() {
		$tahun="0000";
        $data['datasx']=$this->m_banyakkendaraan->tampil_tahun();
    	  $data['data']=$this->m_banyakkendaraan->tampil_jumlah($tahun);
        $data['bulan']=$this->m_banyakkendaraan->tampil_bulan();
        $data['datax']=$this->m_banyakkendaraan->tampil_bulan();
    
        // $data['datazx']=$this->m_bencana->tampil_kecamatan();
        // $data['datazz']=$this->m_bencana->tampil_desa();
        // $data['kecamatan']=$this->m_bencana->ambil_kecamatan();
        // $data['kelurahan']=$this->m_bencana->tampil_kelurahan($this->uri->segment(3));
 
        $this->load->view('template/header');
        $this->load->view('perhubungan/v_banyak_kendaraan', $data);
        $this->load->view('template/footer');
    }
    public function get() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_banyakkendaraan->tampil_jumlahx($tahun);
        $no=0;
        $jumlahsemua=0;
        $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                        $no++;
             
                        // $name=$a['nama_kecamatan'];
                        $mpu=$a['mpu'];
                        $bus=$a['bus'];
                        $mobil=$a['mobil'];
                        $gandeng=$a['gandeng'];
                        $tempel=$a['tempel'];
                        $khusus=$a['khusus'];
                        $jumlah=$a['jumlah'];
                        $periode=$a['periode'];
                       
                        $temp[]=$no;
                        // $temp[]=$name;
                        $temp[]=$periode;
                        $temp[]=$mpu;
                        $temp[]=$bus;
                        $temp[]=$mobil;
                        $temp[]=$gandeng;
                        $temp[]=$tempel;
                        $temp[]=$khusus;
                        $temp[]=$jumlah;
                     
                        
                        $temp[]="<a class=\"btn btn-xs btn-success\" href=\"Banyakkendaraan/detail_kendaraan/$periode\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>";
                        $tabel[]=$temp;
                    }
                    
                    echo json_encode(array('data' => $tabel));
    }
   

    public function detail_kendaraan(){
        $tahun = $this->uri->segment(3);
        $data['datasx']=$this->m_banyakkendaraan->tampil_tahun();
        $data['data']=$this->m_banyakkendaraan->tampil_jumlah($tahun);
        $data['bulan']=$this->m_banyakkendaraan->tampil_bulan();
        $data['datax']=$this->m_banyakkendaraan->tampil_bulan();
        $data['umum']=$this->m_banyakkendaraan->tampil_umum($tahun);
        $data['bukan']=$this->m_banyakkendaraan->tampil_bukan($tahun);
        $data['semua']=$this->m_banyakkendaraan->tampil_semua($tahun);
        
        
    
        // $data['datazx']=$this->m_bencana->tampil_kecamatan();
        // $data['datazz']=$this->m_bencana->tampil_desa();
        // $data['kecamatan']=$this->m_bencana->ambil_kecamatan();
        // $data['kelurahan']=$this->m_bencana->tampil_kelurahan($this->uri->segment(3));
 
        $this->load->view('template/header');
        $this->load->view('perhubungan/v_detailbanyakkendaraan', $data);
        $this->load->view('template/footer');
    }


 //    public function detail_bencana() {
 //        $id = $this->uri->segment(3); 
 //        $sebelum = $this->uri->segment(4);
 //        $bencana = str_replace(' ', '', $sebelum);
 //        $tahun = $this->uri->segment(5);
 //        $data['datasx']=$this->m_bencana->tampil_tahun();
 //        $data['dataa']=$this->m_bencana->tampil_detail_bencana($tahun,$bencana);
 //        $data['dataz']=$this->m_bencana->tampil_tampil($tahun);
 //        $data['datas']=$this->m_bencana->tampil_bencana();
 //        $data['datazx']=$this->m_bencana->tampil_kecamatan();
 //        $data['datazz']=$this->m_bencana->tampil_desa();
 //        $data['kecamatan']=$this->m_bencana->ambil_kecamatan();
 //        $data['periode']=$this->m_bencana->tampil_tahunn();
 //        $data['kelurahan']=$this->m_bencana->tampil_kelurahan($this->uri->segment(3));
 //        // $data['data']=$this->m_bencana->tampil_bencanax($id);
 //        // $data['datas']=$this->m_bencana->tampil_bencana();
 //        $this->load->view('template/header');
 //        $this->load->view('bencana/detail_bencana', $data);
      
 //    }

 //  //   public function tampil_desa(){
 //  //   $kecamatan=$this->input->get('kecamatan');
 //  //   $data['dataz']=$this->m_sarana->tampil_desa($kecamatan);
 //  //   $option ='';
 //  //    foreach ($data['dataz']->result() as $row){
 //  //       $option = "<option value=\"$row->nama_desa\">$row->nama_desa</option>";
 //  //    }
 //  //    echo $option;
 //  // }
 //    public function pilih_kelurahan(){
 //        $data['kelurahan']=$this->m_bencana->tampil_kelurahan($this->uri->segment(3));
 //        $this->load->view('bencana/v_drop_down_kelurahan',$data);
 //    }

 //    public function pilih_edit_kelurahan(){
 //        $data['kelurahan']=$this->m_bencana->tampil_kelurahan($this->uri->segment(3));
 //        $this->load->view('bencana/v_drop_down_kelurahan',$data);
 //    }



 //    public function tampil_edit_coba() {

 //    	$this->load->view('template/header');
 //        $this->load->view('coba/edit');
 //        $this->load->view('template/footer');
 //    }

 //    public function tampil_input_bencana() {
 //     $data['data']=$this->m_bencana->tampil_bencana();
 //        $this->load->view('template/header');
 //        $this->load->view('bencana/input',$data);
 //        $this->load->view('template/footer');
 //    }
    
   	public function proses_input_kendaraan(){

          $cek = $this->db->query("SELECT * FROM banyak_kendaraan where bulan='".$this->input->post('bulan')."' and jenis='".$this->input->post('tipe')."' and periode='".$this->input->post('periode')."'  and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Banyakkendaraan','refresh');
           }
           else {
        $periode = $this->input->post('periode');
        $bulan=$this->input->post('bulan');
        $tipe = $this->input->post('tipe');
        $mpu = $this->input->post('mpu');
        $bus = $this->input->post('bus');
        $barang= $this->input->post('barang');
        $gandeng= $this->input->post('gandeng');
        $tempel= $this->input->post('tempel');
        $khusus= $this->input->post('khusus');
        $jumlah=$mpu+$bus+$barang+$gandeng+$tempel+$khusus;
        $status = $this->input->post('status');
        $penginput = $this->input->post('penginput');
      $this->m_banyakkendaraan->simpan_barang($periode,$bulan,$tipe,$mpu,$bus,$barang,$gandeng,$tempel,$khusus,$jumlah,$status,$penginput);
         
          redirect('Banyakkendaraan');   
           }
             	
    }

    public function proses_input_detail_kendaraan(){

          $cek = $this->db->query("SELECT * FROM banyak_kendaraan where bulan='".$this->input->post('bulan')."' and jenis='".$this->input->post('tipe')."' and periode='".$this->input->post('periode')."'  and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Banyakkendaraan','refresh');
           }
           else {
        $periode = $this->input->post('periode');
        $bulan=$this->input->post('bulan');
        $tipe = $this->input->post('tipe');
        $mpu = $this->input->post('mpu');
        $bus = $this->input->post('bus');
        $barang= $this->input->post('barang');
        $gandeng= $this->input->post('gandeng');
        $tempel= $this->input->post('tempel');
        $khusus= $this->input->post('khusus');
        $jumlah=$mpu+$bus+$barang+$gandeng+$tempel+$khusus;
        $status = $this->input->post('status');
        $penginput = $this->input->post('penginput');
      $this->m_banyakkendaraan->simpan_barang($periode,$bulan,$tipe,$mpu,$bus,$barang,$gandeng,$tempel,$khusus,$jumlah,$status,$penginput);
         
          redirect('Banyakkendaraan/detail_kendaraan/'.$this->uri->segment(3));   
           }
              
    }
  
	public function proses_edit_kendaraan(){
		    $id=$this->input->post('id');
		    $periode = $this->input->post('periode');
        $bulan=$this->input->post('bulan');
        $tipe = $this->input->post('tipe');
        $mpu = $this->input->post('mpu');
        $bus = $this->input->post('bus');
        $barang= $this->input->post('barang');
        $gandeng= $this->input->post('gandeng');
        $tempel= $this->input->post('tempel');
        $khusus= $this->input->post('khusus');
        $jumlah=$mpu+$bus+$barang+$gandeng+$tempel+$khusus;
        $status = $this->input->post('status');
        $penginput = $this->input->post('penginput');

		$this->m_banyakkendaraan->update_kendaraan($id,$periode,$bulan,$tipe,$mpu,$bus,$barang,$gandeng,$tempel,$khusus,$jumlah,$status,$penginput);
		redirect('Banyakkendaraan');	
}
    public function proses_edit_detail_kendaraan(){
        $id=$this->input->post('id');
        $periode = $this->input->post('periode');
        $bulan=$this->input->post('bulan');
        $tipe = $this->input->post('tipe');
        $mpu = $this->input->post('mpu');
        $bus = $this->input->post('bus');
        $barang= $this->input->post('barang');
        $gandeng= $this->input->post('gandeng');
        $tempel= $this->input->post('tempel');
        $khusus= $this->input->post('khusus');
        $jumlah=$mpu+$bus+$barang+$gandeng+$tempel+$khusus;
        $status = $this->input->post('status');
        $penginput = $this->input->post('penginput');

    $this->m_banyakkendaraan->update_kendaraan($id,$periode,$bulan,$tipe,$mpu,$bus,$barang,$gandeng,$tempel,$khusus,$jumlah,$status,$penginput);
    redirect('Banyakkendaraan/detail_kendaraan/'.$this->uri->segment(3));   
	}	
	public function proses_delete_kendaraan(){
		$id=$this->input->post('kodeinput');
		$this->m_banyakkendaraan->delete_terminal($id);
		redirect('Banyakkendaraan');	
	}
  public function proses_delete_detail_kendaraan(){
    $id=$this->input->post('kodeinput');
    $this->m_banyakkendaraan->delete_terminal($id);
    redirect('Banyakkendaraan/detail_kendaraan/'.$this->uri->segment(3));   
  }

  public function grafikbanyakkendaraan() {
      $tahun = $this->uri->segment(3); 
      $data['data']=$this->m_banyakkendaraan->tampil_grafik($tahun);
      $this->load->view('template/header');
      $this->load->view('perhubungan/grafikbanyakkendaraan', $data);
      $this->load->view('template/footer');
    }

 
     public function grafik_perbandinganx() {
      $datap = $this->input->post('datap');
      $grafikp = $this->input->post('grafikp');
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
       if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['data']=$this->m_banyakkendaraan->grafik_Perbandingan_perumahanx($tahun1, $tahun2);
      $data['datax']=$this->m_banyakkendaraan->grafik_Perbandingan_bibit($tahun1,$tahun2,$datap);
      // $data['dataz']=$this->m_banyakkendaraan->tahun_crosstab();
      // $data['tahun']=$this->m_banyakkendaraan->tampil_periodec($tahun1,$tahun2);
      // $data['jumlah']=$this->m_banyakkendaraan->tampil_jumlahc($tahun1,$tahun2);
      // $data['jenis_bibit']=$this->m_banyakkendaraan->tampil_bibita();
      $data['datap']=$datap;

      $this->load->view('template/header');
      if($datap=="all"){
      if($grafikp=="bar"){
      $this->load->view('perhubungan/grafik_kendaraan_bar_all', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('perhubungan/grafik_kendaraan_line_all', $data);
      $this->load->view('template/footer');
      }
    } else{
    if($grafikp=="bar"){
    $this->load->view('perhubungan/grafik_perbandingan_kendaraan_bar', $data);
    $this->load->view('template/footer');
    }else if($grafikp=="line"){
    $this->load->view('perhubungan/grafik_perbandingan_kendaraan_line', $data);
    $this->load->view('template/footer');
    }
    }
    }

 //    public function tampil_grafik(){
 //        $tahun =  $this->uri->segment(3);
 //        $data['datasx']=$this->m_bencana->tampil_tahun();
 //        $data['data']=$this->m_bencana->tampil_jumlah($tahun);
 //        $data['datas']=$this->m_bencana->tampil_bencana();
 //        $this->load->view('template/header');
 //        $this->load->view('bencana/grafik', $data);
      
      
 //    }

 //    public function tampil_grafika(){
 //        $tahun =  $this->uri->segment(3);
 //        $data['grafik']=$this->m_bencana->tampil_grafik($tahun);
 //        $this->load->view('template/header');
 //        $this->load->view('bencana/v_tampil_grafik',$data);
      
 //    }
 //    public function tampil_bencana(){
 //        $data['data']=$this->m_bencana->tampil_bencana();
 //        $this->load->view('template/header');
 //        $this->load->view('bencana/bencana', $data);
 //        $this->load->view('template/footer');
 //    }	
 //    public function proses_input_master_bencana(){
        
 //        $bencana = $this->input->post('bencana');

 //        $this->m_bencana->simpan_bencana($bencana);

 //        redirect('Bencana/tampil_bencana');    
 //    }
 //    public function proses_edit_bencana_alam(){
 //        $id=$this->input->post('id');
 //        $bencana = $this->input->post('bencana');
 //        $this->m_bencana->update_bencana_alam($id,$bencana);
 //        redirect('Bencana/tampil_bencana');    
 //    } 
 //    public function proses_delete_bencana_alam(){
 //        $id=$this->input->post('id');   
 //        $this->m_bencana->delete_bencana_alam($id);
 //        redirect('bencana/tampil_bencana');    
 //    }  

	

}
