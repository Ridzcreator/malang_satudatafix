<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_wisata_budaya extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_wisata_budaya');
    }

    public function index() {
        $kecamatan ='0000';
    	$data['data']=$this->m_wisata_budaya->tampil_wisata_budaya($kecamatan);
        $data['datazx']=$this->m_wisata_budaya->tampil_kecamatan();
        $data['datax']=$this->m_wisata_budaya->tampil_kec();
        $data['datam']=$this->m_wisata_budaya->tampil_master_warisan();
        $this->load->view('template/header');
        $this->load->view('pariwisata/v_wisata_budaya',$data);
        $this->load->view('template/footer');
    }

    public function get() {
        $kecamatan = $this->input->get('opt_kecamatan');
        // $kecamatan=intval($kecamatan);
        $data['data']=$this->m_wisata_budaya->tampil_wisata_budaya($kecamatan);
        $tabel=array();
                    foreach ($data['data']->result_array() as $a) {
                    $temp = array();
                        $id=$a['id'];
                        $nama=$a['nama'];
                        $kecamatan=$a['nama_kecamatan'];
                        $desa=$a['nama_desa'];
                        $fasilitas=$a['fasilitas'];
                        $deskripsi=$a['deskripsi'];
                        $pengelola=$a['pengelola'];
                        $publikasi=$a['publikasi'];
                        $aksesibilitas=$a['aksesibilitas'];
                        $temp[]=$nama;
                        $temp[]=$kecamatan;
                        $temp[]=$desa;
                        $temp[]=$fasilitas;
                        $temp[]=$deskripsi;
                        $temp[]=$pengelola;
                        $temp[]=$publikasi;
                        $temp[]=$aksesibilitas;
                        $temp[]="<a class=\"btn btn-xs btn-warning\" href=\"#modalEdit$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-edit\"></span> Edit</a> 
                                <a class=\"btn btn-xs btn-danger\" href=\"#modalHapus$id\" data-toggle=\"modal\" title=\"Edit\"><span class=\"fa fa-close\"></span>Hapus</a>";
                        $tabel[]=$temp;
                    }
                    echo json_encode(array('data' => $tabel));
    }

    public function tambah_wibu(){
        $nama=$this->input->post('nama');
        $kecamatan=$this->input->post('kecamatan_id');
        $desa=$this->input->post('kelurahan_id');
        $fasilitas=$this->input->post('fasilitas');
        $deskripsi=$this->input->post('deskripsi');
        $pengelola=$this->input->post('pengelola');
        $pub=$this->input->post('publikasi');
        $publikasi = implode(", ",$pub);
        $aksesibilitas=$this->input->post('aksesibilitas');
        $penginput=$this->input->post('penginput');
        $jenis_warisan=$this->input->post('jenis_warisan');
        
        $this->m_wisata_budaya->simpan_wibu($nama, $kecamatan, $desa, $fasilitas, $deskripsi, $pengelola, $publikasi, $aksesibilitas, $penginput, $jenis_warisan);

        redirect('C_wisata_budaya');
    }

    public function ubah_wisata_budaya(){
        $id=$this->input->post('id');
        $nama=$this->input->post('nama');
        $fasilitas=$this->input->post('fasilitas');
        $deskripsi=$this->input->post('deskripsi');
        $pengelola=$this->input->post('pengelola');
        $pub=$this->input->post('publikasi');
        $publikasi = implode(", ",$pub);
        $aksesibilitas=$this->input->post('aksesibilitas');
        $penginput=$this->input->post('penginput');
        $jenis_warisan=$this->input->post('jenis_warisan');

        $this->m_wisata_budaya->ubah_wibu($id, $nama, $fasilitas, $deskripsi, $pengelola, $publikasi, $aksesibilitas, $penginput, $jenis_warisan);

        redirect('C_wisata_budaya');
    }

    public function hapus_wisata_budaya(){
        $id=$this->input->post('id');

        $this->m_wisata_budaya->hapus_wibu($id);
        redirect('C_wisata_budaya');
    }

    public function pilih_kelurahan(){
        $data['kelurahan']=$this->m_wisata_budaya->tampil_desa($this->uri->segment(3));
        $this->load->view('pariwisata/v_drop_down_kelurahan',$data);
    }




    

}
?>