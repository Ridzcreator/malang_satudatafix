<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('m_level');
    }

    public function index() {
    	$data['data']=$this->m_level->tampil_level();
        $this->load->view('template/header');
        $this->load->view('user/level', $data);
        $this->load->view('template/footer');
    }

   	public function proses_input_level(){
   		$keterangan = $this->input->post('keterangan');
		$m1=$this->input->post('m1');
		$m2=$this->input->post('m2');
		$m3=$this->input->post('m3');
		$m4=$this->input->post('m4');
		$m5=$this->input->post('m5');
		$m6=$this->input->post('m6');
		$m7=$this->input->post('m7');
		$m8=$this->input->post('m8');
		$m9=$this->input->post('m9');
		$m10=$this->input->post('m10');
		$m11=$this->input->post('m11');
		$m12=$this->input->post('m12');
		$m13=$this->input->post('m13');
		$m14=$this->input->post('m14');
		$m15=$this->input->post('m15');
		$m16=$this->input->post('m16');
		$m17=$this->input->post('m17');
		$m18=$this->input->post('m18');
		$m19=$this->input->post('m19');
		$m20=$this->input->post('m20');
		$m21=$this->input->post('m21');
		$k1=$this->input->post('k1');
		$k2=$this->input->post('k2');
		$k3=$this->input->post('k3');
		$k4=$this->input->post('k4');
		$k5=$this->input->post('k5');
		$k6=$this->input->post('k6');
		$k7=$this->input->post('k7');
		$k8=$this->input->post('k8');
		$k9=$this->input->post('k9');
		$k10=$this->input->post('k10');
		$k11=$this->input->post('k11');
		$k12=$this->input->post('k12');
		$k13=$this->input->post('k13');
		$k14=$this->input->post('k14');
		$k15=$this->input->post('k15');
		$k16=$this->input->post('k16');
		$k17=$this->input->post('k17');
		$k18=$this->input->post('k18');
		$k19=$this->input->post('k19');
		$k20=$this->input->post('k20');
		$k21=$this->input->post('k21');
		$k22=$this->input->post('k22');
		$k23=$this->input->post('k23');
		$k24=$this->input->post('k24');
		$k25=$this->input->post('k25');
		$k26=$this->input->post('k26');
		$k27=$this->input->post('k27');
		$k28=$this->input->post('k28');
		$k29=$this->input->post('k29');
		$k30=$this->input->post('k30');
		$k31=$this->input->post('k31');
		$k32=$this->input->post('k32');
		$k33=$this->input->post('k33');
		
		
		
   		$this->m_level->simpan_barang($keterangan,$m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8,$m9,$m10,$m11,$m12,$m13,$m14,$m15,$m16,$m17,$m18,$m19,$m20,$m21,$k1,$k2,$k3,$k4,$k5,$k6,$k7,$k8,$k9,$k10,$k11,$k12,$k13,$k14,$k15,$k16,$k17,$k18,$k19,$k20,$k21,$k22,$k23,$k24,$k25,$k26,$k27,$k28,$k29,$k30,$k31,$k32,$k33);


		redirect('Level');   	}

	public function proses_edit_level(){
		$id=$this->input->post('id');
		$keterangan=$this->input->post('keterangan');
		$m1=$this->input->post('m1');
		$m2=$this->input->post('m2');
		$m3=$this->input->post('m3');
		$m4=$this->input->post('m4');
		$m5=$this->input->post('m5');
		$m6=$this->input->post('m6');
		$m7=$this->input->post('m7');
		$m8=$this->input->post('m8');
		$m9=$this->input->post('m9');
		$m10=$this->input->post('m10');
		$m11=$this->input->post('m11');
		$m12=$this->input->post('m12');
		$m13=$this->input->post('m13');
		$m14=$this->input->post('m14');
		$m15=$this->input->post('m15');
		$m16=$this->input->post('m16');
		$m17=$this->input->post('m17');
		$m18=$this->input->post('m18');
		$m19=$this->input->post('m19');
		$m20=$this->input->post('m20');
		$m21=$this->input->post('m21');
		$k1=$this->input->post('k1');
		$k2=$this->input->post('k2');
		$k3=$this->input->post('k3');
		$k4=$this->input->post('k4');
		$k5=$this->input->post('k5');
		$k6=$this->input->post('k6');
		$k7=$this->input->post('k7');
		$k8=$this->input->post('k8');
		$k9=$this->input->post('k9');
		$k10=$this->input->post('k10');
		$k11=$this->input->post('k11');
		$k12=$this->input->post('k12');
		$k13=$this->input->post('k13');
		$k14=$this->input->post('k14');
		$k15=$this->input->post('k15');
		$k16=$this->input->post('k16');
		$k17=$this->input->post('k17');
		$k18=$this->input->post('k18');
		$k19=$this->input->post('k19');
		$k20=$this->input->post('k20');
		$k21=$this->input->post('k21');
		$k22=$this->input->post('k22');
		$k23=$this->input->post('k23');
		$k24=$this->input->post('k24');
		$k25=$this->input->post('k25');
		$k26=$this->input->post('k26');
		$k27=$this->input->post('k27');
		$k28=$this->input->post('k28');
		$k29=$this->input->post('k29');
		$k30=$this->input->post('k30');
		$k31=$this->input->post('k31');
		$k32=$this->input->post('k32');
		$k33=$this->input->post('k33');
		$this->m_level->update_level($id,$keterangan,$m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8,$m9,$m10,$m11,$m12,$m13,$m14,$m15,$m16,$m17,$m18,$m19,$m20,$m21,$k1,$k2,$k3,$k4,$k5,$k6,$k7,$k8,$k9,$k10,$k11,$k12,$k13,$k14,$k15,$k16,$k17,$k18,$k19,$k20,$k21,$k22,$k23,$k24,$k25,$k26,$k27,$k28,$k29,$k30,$k31,$k32,$k33);
		redirect('Level');	
	}	
	public function proses_delete_level(){
		$id=$this->input->post('id');
		
		
		$this->m_level->delete_level($id);
		redirect('Level');	
	}	

	

}
