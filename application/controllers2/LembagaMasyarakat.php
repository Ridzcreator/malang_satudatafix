<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LembagaMasyarakat extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_lembagamasyarakat');
       
    }
    public function index() {
		$tahun="0000";
        $data['datasx']=$this->m_lembagamasyarakat->tampil_tahun();
    	$data['data']=$this->m_lembagamasyarakat->tampil_jumlah($tahun);
    	$data['datad']=$this->m_lembagamasyarakat->tampil_jumlahd($tahun);
    	$data['kecamatan']=$this->m_lembagamasyarakat->tampil_kecamatan();
        // $data['dataz']=$this->m_lembagamasyarakat->tampil_tampil($tahun);
        // $data['datas']=$this->m_lembagamasyarakat->tampil_bencana();
        // $data['datazx']=$this->m_lembagamasyarakat->tampil_kecamatan();
        // $data['datazz']=$this->m_lembagamasyarakat->tampil_desa();
      
        // $data['periode']=$this->m_lembagamasyarakat->tampil_tahunn();
        // $data['kelurahan']=$this->m_lembagamasyarakat->tampil_kelurahan($this->uri->segment(3));
 
        $this->load->view('template/header');
        $this->load->view('lembagamasyarakat/v_lembagamasyarakatt', $data);
        $this->load->view('template/footer');
    }
      public function get() {
        $thn = $this->input->get('tahun');
        $tahun=intval($thn);
        $data['data']=$this->m_lembagamasyarakat->tampil_jumlahd($tahun);
        $no=0;
        $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                        $no++;
                        $id = $a['id_lembaga'];
                        $periode=$a['periode'];
                        $jumlah=$a['jumlah'];
                       
                       
          
                        $temp[]=$no;
                        $temp[]=$periode;
                        $temp[]=$jumlah;  
                        
                        $temp[]="<a class=\"btn btn-xs btn-success\" href=\"LembagaMasyarakat/detail_lembaga/$periode\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a>";
                        $tabel[]=$temp;
                    }
                    
                    echo json_encode(array('data' => $tabel));
    }

     public function pilih_kelurahan(){
        $data['kelurahan']=$this->m_lembagamasyarakat->tampil_kelurahan($this->uri->segment(3));
        $this->load->view('lembagamasyarakat/v_drop_down_kelurahan',$data);
    }
    public function pilih_edit_kelurahan(){
        $data['kelurahan']=$this->m_lembagamasyarakat->tampil_kelurahan($this->uri->segment(3));
        $this->load->view('lembagamasyarakat/v_drop_down_kelurahan_edit',$data);
    }

    public function proses_input_lembaga(){
     
        $periode = $this->input->post('periode');
        $penginput = $this->input->post('penginput');
        $status = $this->input->post('status');
        $kecamatann = $this->input->post('kecamatan_id');
        $desaa = $this->input->post('kelurahan_id');
        $jumlah = $this->input->post('jumlah');
        $cek = $this->db->query("SELECT * FROM lembaga_masyarakat where kecamatan='$kecamatann' and desa='$desaa' and periode='$periode' and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('LembagaMasyarakat','refresh');
           }
           else {
       
   		$this->m_lembagamasyarakat->simpan_barang($jumlah,$periode,$penginput,$status,$kecamatann,$desaa);

		redirect('LembagaMasyarakat');   	
    }
  }

    public function proses_input_detail_lembaga(){
     	$page = $this->uri->segment(3);
        $periode = $this->input->post('periode');
        $penginput = $this->input->post('penginput');
        $status = $this->input->post('status');
        $kecamatann = $this->input->post('kecamatan_id');
        $desaa = $this->input->post('kelurahan_id');
        $jumlah = $this->input->post('jumlah');
        $cek = $this->db->query("SELECT * FROM lembaga_masyarakat where kecamatan='$kecamatann' and desa='$desaa' and periode='$periode' and status = 0");
           if ($cek->num_rows()>=1)
           {
            echo "<script>alert('Maaf data sudah di inputkan.');</script>";
            redirect('LembagaMasyarakat','refresh');
           }
           else {
       
   		$this->m_lembagamasyarakat->simpan_barang($jumlah,$periode,$penginput,$status,$kecamatann,$desaa);

		redirect('LembagaMasyarakat/detail_lembaga/'.$page);   	
    }
  }
  public function detail_lembaga(){
  		$tahun = $this->uri->segment(3);
        $data['datasx']=$this->m_lembagamasyarakat->tampil_tahun();
    	$data['data']=$this->m_lembagamasyarakat->tampil_jumlah($tahun);
    	$data['kecamatan']=$this->m_lembagamasyarakat->tampil_kecamatan();
        // $data['dataz']=$this->m_lembagamasyarakat->tampil_tampil($tahun);
        // $data['datas']=$this->m_lembagamasyarakat->tampil_bencana();
        // $data['datazx']=$this->m_lembagamasyarakat->tampil_kecamatan();
        // $data['datazz']=$this->m_lembagamasyarakat->tampil_desa();
      
        // $data['periode']=$this->m_lembagamasyarakat->tampil_tahunn();
        // $data['kelurahan']=$this->m_lembagamasyarakat->tampil_kelurahan($this->uri->segment(3));
 
        $this->load->view('template/header');
        $this->load->view('lembagamasyarakat/v_lembagamasyarakat', $data);
        $this->load->view('template/footer');
  }
  public function proses_edit_lembaga(){
		$id=$this->input->post('id');
		$penginput = $this->input->post('penginput');
        $status = $this->input->post('status');
        $kecamatann = $this->input->post('kecamatan');
        $periode = $this->input->post('periode');
        $desaa = $this->input->post('kelurahan');
        $jumlah = $this->input->post('jumlah');
		$this->m_lembagamasyarakat->update_lembaga($id,$jumlah,$periode,$penginput,$status,$kecamatann,$desaa);
		redirect('LembagaMasyarakat');	
	}	
	  public function proses_edit_detail_lembaga(){
	  	$page = $this->uri->segment(3);
		$id=$this->input->post('id');
		$penginput = $this->input->post('penginput');
        $status = $this->input->post('status');
        $kecamatann = $this->input->post('kecamatan');
        $periode = $this->input->post('periode');
        $desaa = $this->input->post('kelurahan');
        $jumlah = $this->input->post('jumlah');
		$this->m_lembagamasyarakat->update_lembaga($id,$jumlah,$periode,$penginput,$status,$kecamatann,$desaa);
		redirect('LembagaMasyarakat/detail_lembaga/'.$page);	
	}
	public function proses_delete_lembaga(){

		$id=$this->input->post('id');
		$this->m_lembagamasyarakat->delete_lembaga($id);
		redirect('LembagaMasyarakat');	
	}
	public function proses_delete_detail_lembaga(){
			$page = $this->uri->segment(3);
		$id=$this->input->post('id');
		$this->m_lembagamasyarakat->delete_lembaga($id);
		redirect('LembagaMasyarakat/detail_lembaga/'.$page);	
	}

	  public function tampil_crosstab_masyarakat(){
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
       if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['data']=$this->m_lembagamasyarakat->tahun_crosstab();
      $data['tahun']=$this->m_lembagamasyarakat->tampil_periodec($tahun1,$tahun2);
      $data['jumlah']=$this->m_lembagamasyarakat->tampil_jumlahc($tahun1,$tahun2);
      $data['jumlah1']=$this->m_lembagamasyarakat->tampil_jumlahx($tahun1,$tahun2);
      $data['kecamatan']=$this->m_lembagamasyarakat->tampil_kecamatanc();
      $data['desa']=$this->m_lembagamasyarakat->tampil_desac();

        $this->load->view('template/header');
        $this->load->view('lembagamasyarakat/tampil_crosstablembaga', $data);
        $this->load->view('template/footer');

    }

    public function grafiklembaga() {
      $tahun = $this->uri->segment(3); 
      $data['data']=$this->m_lembagamasyarakat->tampil_grafik($tahun);
      $data['datax']=$this->m_lembagamasyarakat->grafik_perbandingan_lembaga_desa($tahun);
       $data['desa']=$this->m_lembagamasyarakat->tampil_desac();
      $this->load->view('template/header');
      $this->load->view('lembagamasyarakat/grafik_lembaga', $data);
      $this->load->view('template/footer');
    }


     public function grafik_perbandingan() {
  
      $grafikp = $this->input->post('grafikp');
      $tahun1 = $this->input->post('tahun1');
      $tahun2 = $this->input->post('tahun2');
      if($tahun1>$tahun2){
        list($tahun1, $tahun2) = array($tahun2, $tahun1);
      }
      $data['data']=$this->m_lembagamasyarakat->grafik_Perbandingan_lembaga($tahun1,$tahun2);

      $this->load->view('template/header');
     
      if($grafikp=="bar"){
      $this->load->view('lembagamasyarakat/grafik_lembaga_bar_all', $data);
      $this->load->view('template/footer');
      }else if($grafikp=="line"){
      $this->load->view('lembagamasyarakat/grafik_lembaga_line_all', $data);
      $this->load->view('template/footer');
      }
    }




}