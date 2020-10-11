<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DistribusiBibit extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_distribusibibit');
    }

    public function index() {
		$tahun="0000";
        $data['datasx']=$this->m_distribusibibit->tampil_tahun();
    	  $data['data']=$this->m_distribusibibit->tampil_jumlah($tahun);
        $data['bibit']=$this->m_distribusibibit->tampil_bibit();
        // $data['datazx']=$this->m_bencana->tampil_kecamatan();
        // $data['datazz']=$this->m_bencana->tampil_desa();
        // $data['kecamatan']=$this->m_bencana->ambil_kecamatan();
        // $data['kelurahan']=$this->m_bencana->tampil_kelurahan($this->uri->segment(3));
 
        $this->load->view('template/header');
        $this->load->view('distribusibibit/v_distribusibibit', $data);
        $this->load->view('template/footer');
    }
    public function get() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_distribusibibit->tampil_jumlah($tahun);
        $no=0;
        $jumlahsemua=0;
        $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                        $no++;
                        $id = $a['id'];
                        // $name=$a['nama_kecamatan'];
                        $jenis_bibit=$a['bibit'];
                        $jumlah=$a['jumlah'];
                        $periode=$a['periode'];
                       
                        $temp[]=$no;
                        // $temp[]=$name;
                        $temp[]=$jenis_bibit;
                        $temp[]=$jumlah;
                        $temp[]=$periode;
                     
                        
                        $temp[]="<a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a> | 
                                 <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
                        $tabel[]=$temp;
                    }
                    
                    echo json_encode(array('data' => $tabel));
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
    
   	public function proses_input_bibit(){

          $cek = $this->db->query("SELECT * FROM distribusibibit where jenis_bibit='".$this->input->post('jenisbibit')."' and periode='".$this->input->post('periode')."'  and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('DistribusiBibit','refresh');
           }
           else {
        $periode = $this->input->post('periode');
        $jenisbibit=$this->input->post('jenisbibit');
        $jumlah= $this->input->post('jumlah');
        $status = $this->input->post('status');
        $penginput = $this->input->post('penginput');
      $this->m_distribusibibit->simpan_barang($periode,$jenisbibit,$jumlah,$status,$penginput);
         
          redirect('DistribusiBibit');   
           }
             	
    }

  
	public function proses_edit_bibit(){
		$id=$this->input->post('id');
		$periode = $this->input->post('periode');
        $jenisbibit=$this->input->post('jenis_bibit');
        $jumlah= $this->input->post('jumlah');
        $status = $this->input->post('status');
        $penginput = $this->input->post('penginput');
		$this->m_distribusibibit->update_bibit($id,$periode,$jenisbibit,$jumlah,$status,$penginput);
		redirect('DistribusiBibit');	
	}	
	public function proses_delete_bibit(){
		$id=$this->input->post('kodeinput');
		$this->m_distribusibibit->delete_bibit($id);
		redirect('DistribusiBibit');	
	}

   public function tampil_crosstab_bibit(){
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
       if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['data']=$this->m_distribusibibit->tahun_crosstab();
      $data['tahun']=$this->m_distribusibibit->tampil_periodec($tahun1,$tahun2);
      $data['jumlah']=$this->m_distribusibibit->tampil_jumlahc($tahun1,$tahun2);
      $data['jenisbibit']=$this->m_distribusibibit->tampil_bibitc();

        $this->load->view('template/header');
        $this->load->view('distribusibibit/tampil_crosstabdistribusi', $data);
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
      $data['data']=$this->m_distribusibibit->grafik_Perbandingan_perumahanx($tahun1, $tahun2);
      $data['datax']=$this->m_distribusibibit->grafik_Perbandingan_bibit($tahun1,$tahun2,$datap);
      // $data['dataz']=$this->m_distribusibibit->tahun_crosstab();
      // $data['tahun']=$this->m_distribusibibit->tampil_periodec($tahun1,$tahun2);
      // $data['jumlah']=$this->m_distribusibibit->tampil_jumlahc($tahun1,$tahun2);
      // $data['jenis_bibit']=$this->m_distribusibibit->tampil_bibita();

      $this->load->view('template/header');
      if($datap=="all"){
      if($grafikp=="bar"){
      $this->load->view('distribusibibit/grafik_distribusi_bar_all', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('distribusibibit/grafik_distribusi_line_all', $data);
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
