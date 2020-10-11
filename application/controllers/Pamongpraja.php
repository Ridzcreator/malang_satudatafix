<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pamongpraja extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_pamong');
    }

    public function index() {
		$tahun="0000";
        $data['datasx']=$this->m_pamong->tampil_tahun();
    	$data['data']=$this->m_pamong->tampil_jumlah($tahun);
        
        $data['datas']=$this->m_pamong->tampil_bencana();
        // $data['datazx']=$this->m_bencana->tampil_kecamatan();
        // $data['datazz']=$this->m_bencana->tampil_desa();
        // $data['kecamatan']=$this->m_bencana->ambil_kecamatan();
        $data['periode']=$this->m_pamong->tampil_tahunn();
        // $data['kelurahan']=$this->m_bencana->tampil_kelurahan($this->uri->segment(3));
 
        $this->load->view('template/header');
        $this->load->view('bencana/tampil_pamongpraja', $data);
        $this->load->view('template/footer');
    }
    public function get() {
        $thn = $this->input->get('tahun');
		if($thn=="00"){
			$data['periode']=$this->m_pamong->tampil_tahunn();
			foreach ($data['periode']->result_array() as $a) {
			$tahun=$a['periode'];
			}
			$thn=$tahun;
		}else
		{}
        $tahun=intval($thn);
        $data['data']=$this->m_pamong->tampil_jumlah($tahun);
        $no=0;
        $jumlahsemua=0;
        $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                        $no++;
                        $id = $a['id'];
                        // $name=$a['nama_kecamatan'];
                        $jenis_kelamin=$a['jeniskelamin'];
                        $jumlah=$a['jumlah'];
                        $periode=$a['periode'];
                       
                        $temp[]=$no;
                        // $temp[]=$name;
                        $temp[]=$jenis_kelamin;
                        $temp[]=$jumlah;
                        $temp[]=$periode;
                     
                        
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
      $data['data']=$this->m_pamong->grafik_Perbandingan_perumahanx($tahun1, $tahun2);
      $data['datax']=$this->m_pamong->grafik_Perbandingan_pamong($tahun1,$tahun2,$datap);
      $data['dataz']=$this->m_pamong->tahun_crosstab();
      $data['tahun']=$this->m_pamong->tampil_periodec($tahun1,$tahun2);
      $data['jumlah']=$this->m_pamong->tampil_jumlahc($tahun1,$tahun2);
      $data['jeniskelamin']=$this->m_pamong->tampil_kelaminc();
      

      $this->load->view('template/header');
      if($datap=="all"){
      if($grafikp=="bar"){
      $this->load->view('bencana/grafik_pamongpraja_bar', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('bencana/grafik_pamongpraja_line', $data);
      $this->load->view('template/footer');
      }
    }else if($datap=="Laki-laki"){
      if($grafikp=="bar"){
      $this->load->view('bencana/grafik_perbandingan_laki_bar', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('bencana/grafik_perbandingan_laki_line', $data);
      $this->load->view('template/footer');
      }
    }else if($datap=="Perempuan"){
      if($grafikp=="bar"){
      $this->load->view('bencana/grafik_perbandingan_perempuan_bar', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('bencana/grafik_perbandingan_perempuan_line', $data);
      $this->load->view('template/footer');
      }
    }
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
    
   	public function proses_input_pamong(){

          $cek = $this->db->query("SELECT * FROM pamongpraja where jeniskelamin='".$this->input->post('kelamin')."' and periode='".$this->input->post('periode')."'  and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Pamongpraja','refresh');
           }
           else {
        $periode = $this->input->post('periode');
        $kelamin=$this->input->post('kelamin');
        $jumlah= $this->input->post('jumlah');
        $status = $this->input->post('status');
        $penginput = $this->input->post('penginput');
      $this->m_pamong->simpan_barang($periode,$kelamin,$jumlah,$status,$penginput);
         
          redirect('Pamongpraja');   
           }
             	
    }

   public function tampil_crosstab_pamong(){
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
       if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['data']=$this->m_pamong->tahun_crosstab();
      $data['tahun']=$this->m_pamong->tampil_periodec($tahun1,$tahun2);
      $data['jumlah']=$this->m_pamong->tampil_jumlahc($tahun1,$tahun2);
      $data['jeniskelamin']=$this->m_pamong->tampil_kelaminc();

        $this->load->view('template/header');
        $this->load->view('bencana/tampil_crosstabpamong', $data);
        $this->load->view('template/footer');

    }
	public function proses_edit_pamong(){
		$id=$this->input->post('id');
		$periode = $this->input->post('periode');
        $kelamin=$this->input->post('kelamin');
        $jumlah= $this->input->post('jumlah');
        $status = $this->input->post('status');
        $penginput = $this->input->post('penginput');
		$this->m_pamong->update_pamong($id,$periode,$kelamin,$jumlah,$status,$penginput);
		redirect('Pamongpraja');	
	}	
	public function proses_delete_pamong(){
		$id=$this->input->post('kodeinput');
		$this->m_pamong->delete_pamong($id);
		redirect('Pamongpraja');	
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
