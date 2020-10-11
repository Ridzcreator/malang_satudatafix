<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Perumahan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_perumahan');
    }

    public function index() {
		$tahun ='0000';
    	$data['data']=$this->m_perumahan->tampil_perumahan($tahun);
		$data['datax']=$this->m_perumahan->tampil_tahun();
        $this->load->view('template/header');
        $this->load->view('perumahan/perumahan', $data);
		$this->load->view('template/footer');
    }
	
	public function get() {
		$thn = $this->input->get('tahun');
		$tahun=intval($thn);
		$data['data']=$this->m_perumahan->tampil_perumahan($tahun);
        $no=0;
		$tabel=array();
                    foreach ($data['data']->result_array() as $a) {
					$temp = array();
                        $no++;
                        $id = $a['id'];
						$penginput=$a['penginput'];
						$periode=$a['periode'];
						$waktu=$a['waktu'];
						$hasilsrt=$a['hasilsrt'];
						$sejenissrt=$a['sejenissrt'];
						$tertangani=$a['tertangani'];
						$beracun=$a['beracun'];
						$beracunterolah=$a['beracunterolah'];
						$limbah=$a['limbah'];
						$limbahterolah=$a['limbahterolah']; 
						$temp[]=number_format($no,0,",",".");
						$temp[]=number_format($hasilsrt,0,",",".");
						$temp[]=number_format($sejenissrt,0,",",".");
						$temp[]=number_format($tertangani,0,",",".");
						$temp[]=number_format($beracun,0,",",".");
						$temp[]=number_format($beracunterolah,0,",",".");
						$temp[]=number_format($limbah,0,",",".");
						$temp[]=number_format($limbahterolah,0,",",".");
						$temp[]=$periode;
						$temp[]="<a class=\"btn btn-xs btn-success\" href=\"Perumahan/detail_perumahan/$id\" title=\"Detail\"><span class=\"fa fa-edit\"></span> Detail</a> |
								 <a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a> | 
                                 <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Hapus\"><span class=\"fa fa-close\"></span> Hapus</a>";
						$tabel[]=$temp;
					}
					echo json_encode(array('data' => $tabel));
	}

	public function detail_perumahan() {
		$id = $this->uri->segment(3); 
		$data['data']=$this->m_perumahan->tampil_perumahanx($id);
    	$this->load->view('template/header');
        $this->load->view('perumahan/detail_perumahan', $data);
        $this->load->view('template/footer');		
    }
	
    public function grafik_perumahan() {
	  $id = $this->uri->segment(3); 
      $data['data']=$this->m_perumahan->tampil_perumahanx($id);
      $this->load->view('template/header');
      $this->load->view('perumahan/grafik_perumahan', $data);
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
      $data['data']=$this->m_perumahan->grafik_Perbandingan_perumahanx($tahun1,$tahun2);
      $this->load->view('template/header');
	  if($datap=="all"){
	  if($grafikp=="bar"){
      $this->load->view('perumahan/grafik_perbandingan_sampah_bar_all', $data);
      $this->load->view('template/footer');
	  }else if($grafikp=="line"){
      $this->load->view('perumahan/grafik_perbandingan_sampah_line_all', $data);
      $this->load->view('template/footer');
	  }
	  }else{
	  if($grafikp=="bar"){
      $this->load->view('perumahan/grafik_perbandingan_sampah_bar', $data);
      $this->load->view('template/footer');
	  }else if($grafikp=="pie"){
      $this->load->view('perumahan/grafik_perbandingan_sampah_pie', $data);
      $this->load->view('template/footer');
	  }else if($grafikp=="line"){
      $this->load->view('perumahan/grafik_perbandingan_sampah_line', $data);
      $this->load->view('template/footer');
	  }}
    }

   	public function proses_input_sampah(){
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$srt = $this->input->post('srt');
		$ssrt = $this->input->post('ssrt');
		$ssrtt = $this->input->post('ssrtt');
		$racun = $this->input->post('racun');
		$racunt = $this->input->post('racunt');
		$limbah = $this->input->post('limbah');
		$limbaht = $this->input->post('limbaht');
   		$this->m_perumahan->simpan_barang($penginput,$periode,$srt,$ssrt,$ssrtt,$racun,$racunt,$limbah,$limbaht);
		redirect('Perumahan');   	
	}

	public function proses_edit_sampah(){
		$id=$this->input->post('id');
		$penginput = $this->input->post('penginput');
		$periode = $this->input->post('periode');
		$srt = $this->input->post('srt');
		$ssrt = $this->input->post('ssrt');
		$ssrtt = $this->input->post('ssrtt');
		$racun = $this->input->post('racun');
		$racunt = $this->input->post('racunt');
		$limbah = $this->input->post('limbah');
		$limbaht = $this->input->post('limbaht');
		$this->m_perumahan->update_perumahan($id,$penginput,$periode,$srt,$ssrt,$ssrtt,$racun,$racunt,$limbah,$limbaht);
		redirect('Perumahan');	
	}	
	public function proses_delete_sampah(){
		$id=$this->input->post('id');
		$this->m_perumahan->delete_perumahan($id);
		redirect('Perumahan');	
	}	

	

}
