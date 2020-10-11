<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pemadam extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_pemadam');
    }

    public function index() {
        $tahun=0000;
        $data['datasx']=$this->m_pemadam->tampil_tahun();
    	$data['data']=$this->m_pemadam->tampil_pemadam($tahun);
        $data['datas']=$this->m_pemadam->tampil_lokasi();
         $data['periode']=$this->m_pemadam->tampil_tahunn();
   
        $this->load->view('template/header');
        $this->load->view('bencana/tampil_pemadam', $data);
        $this->load->view('template/footer');
    }
    public function get() {
        $thn = $this->input->get('tahun');
        if($thn=="00"){
            $data['periode']=$this->m_pemadam->tampil_tahunn();
            foreach ($data['periode']->result_array() as $a) {
            $tahun=$a['periode'];
            }
            $thn=$tahun;
        }else
        {}
        $tahun=intval($thn);
        $data['data']=$this->m_pemadam->tampil_pemadam($tahun);
        $no=0;
        $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                        $no++;
                        $id = $a['id'];
                        // $name=$a['nama_kecamatan'];
                        $bencana=$a['lokasi'];
                        $banyak=$a['layak'];
                        $meninggal=$a['tidak'];
                   
                        $tahun=$a['periode'];
                        $temp[]=$no;
                        // $temp[]=$name;
                        $temp[]=$bencana;
                        $temp[]=$banyak;
                        $temp[]=$meninggal;
              
                        $temp[]=$tahun;
                        
                        $temp[]="
                                 <a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a> | 
                                 <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
                        $tabel[]=$temp;
                    }
                    
                    echo json_encode(array('data' => $tabel));
    }
    public function detail_bencana() {
        $id = $this->uri->segment(3); 
        $data['data']=$this->m_bencana->tampil_bencanax($id);
         $data['datas']=$this->m_bencana->tampil_bencana();
        $this->load->view('template/header');
        $this->load->view('bencana/detail_bencana', $data);
        $this->load->view('template/footer');       
    }

  //   public function tampil_desa(){
  //   $kecamatan=$this->input->get('kecamatan');
  //   $data['dataz']=$this->m_sarana->tampil_desa($kecamatan);
  //   $option ='';
  //    foreach ($data['dataz']->result() as $row){
  //       $option = "<option value=\"$row->nama_desa\">$row->nama_desa</option>";
  //    }
  //    echo $option;
  // }
    public function pilih_kelurahan(){
        $data['kelurahan']=$this->m_bencana->tampil_kelurahan($this->uri->segment(3));
        $this->load->view('bencana/v_drop_down_kelurahan',$data);
    }

    public function pilih_edit_kelurahan(){
        $data['kelurahan']=$this->m_bencana->tampil_kelurahan($this->uri->segment(3));
        $this->load->view('bencana/v_drop_down_kelurahan',$data);
    }

    public function tampil_crosstab_pemadam(){
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
       if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['data']=$this->m_pemadam->tahun_crosstab();
      $data['tahun']=$this->m_pemadam->tampil_periodec($tahun1,$tahun2);
      $data['jumlah']=$this->m_pemadam->tampil_jumlahc($tahun1,$tahun2);
      $data['lokasi']=$this->m_pemadam->tampil_kecamatanc();

        $this->load->view('template/header');
        $this->load->view('bencana/tampil_crosstabpemadam', $data);
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
      $data['data']=$this->m_pemadam->grafik_Perbandingan_perumahanx($tahun1,$tahun2);
      $data['datax']=$this->m_pemadam->grafik_Perbandingan_pemadam($tahun1,$tahun2,$datap);
      $data['tahun']=$this->m_pemadam->tahun_grafik($tahun1,$tahun2);
      $this->load->view('template/header');
      if($datap=="all"){
      if($grafikp=="bar"){
      $this->load->view('bencana/grafik_pemadam_bar_all', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('bencana/grafik_pemadam_line_all', $data);
      $this->load->view('template/footer');
      }
    }else if($datap=="Kepanjen"){
      if($grafikp=="bar"){
      $this->load->view('bencana/grafik_perbandingan_kepanjen_bar', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('bencana/grafik_perbandingan_kepanjen_line', $data);
      $this->load->view('template/footer');
      }
    }else if($datap=="Pendopo Malang"){
      if($grafikp=="bar"){
      $this->load->view('bencana/grafik_perbandingan_pendopo_bar', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('bencana/grafik_perbandingan_pendopo_line', $data);
      $this->load->view('template/footer');
      }
    }
    }

    public function tampil_edit_coba() {

    	$this->load->view('template/header');
        $this->load->view('coba/edit');
        $this->load->view('template/footer');
    }

    public function tampil_input_bencana() {
     $data['data']=$this->m_bencana->tampil_bencana();
        $this->load->view('template/header');
        $this->load->view('bencana/input',$data);
        $this->load->view('template/footer');
    }
    
   	public function proses_input_pemadam(){
        $cek = $this->db->query("SELECT * FROM pemadam where lokasi='".$this->input->post('lokasi')."' and periode='".$this->input->post('periode')."'  and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('Pemadam','refresh');
           }
           else {
        $lokasi= $this->input->post('lokasi');
   		$layak=$this->input->post('layak');
        $tidak = $this->input->post('tidak');
        $periode = $this->input->post('periode');
        $penginput = $this->input->post('penginput');
        $status = $this->input->post('status');
   		$this->m_pemadam->simpan_barang($lokasi,$layak,$tidak,$periode,$penginput,$status);

		redirect('Pemadam');   	
    }
  }


	public function proses_edit_pemadam(){
		$id=$this->input->post('id');
		$lokasi= $this->input->post('lokasi');
   		$layak=$this->input->post('layak');
        $tidak = $this->input->post('tidak');
        $periode = $this->input->post('periode');
        $penginput = $this->input->post('penginput');
        $status = $this->input->post('status');
   		$this->m_pemadam->update_pemadam($id,$lokasi,$layak,$tidak,$periode,$penginput,$status);

		redirect('Pemadam');   	
		
	}	
	public function proses_delete_pemadam(){
		$id=$this->input->post('kodeinput');
		
		
		$this->m_pemadam->delete_pemadam($id);
		redirect('Pemadam');	
	}
    public function tampil_grafik(){
         $tahun=0000;
        $data['datasx']=$this->m_bencana->tampil_tahun();
        $data['data']=$this->m_bencana->tampil_jumlah($tahun);
        $data['datas']=$this->m_bencana->tampil_bencana();
        $this->load->view('template/header');
        $this->load->view('bencana/grafik', $data);
      
      
    }

    public function tampil_grafika(){
        $tahun =  $this->uri->segment(3);
        $data['grafik']=$this->m_bencana->tampil_grafik($tahun);
        $this->load->view('template/header');
        $this->load->view('bencana/v_tampil_grafik',$data);
      
    }
    public function tampil_bencana(){
        $data['data']=$this->m_bencana->tampil_bencana();
        $this->load->view('template/header');
        $this->load->view('bencana/bencana', $data);
        $this->load->view('template/footer');
    }	
    public function proses_input_master_bencana(){
        
        $bencana = $this->input->post('bencana');

        $this->m_bencana->simpan_bencana($bencana);

        redirect('Bencana/tampil_bencana');    
    }
    public function proses_edit_bencana_alam(){
        $id=$this->input->post('id');
        $bencana = $this->input->post('bencana');
        $this->m_bencana->update_bencana_alam($id,$bencana);
        redirect('Bencana/tampil_bencana');    
    } 
    public function proses_delete_bencana_alam(){
        $id=$this->input->post('id');   
        $this->m_bencana->delete_bencana_alam($id);
        redirect('bencana/tampil_bencana');    
    }  

	

}
