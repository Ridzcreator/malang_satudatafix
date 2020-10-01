<?php
class M_level extends CI_Model {

	public function simpan_barang($keterangan,$m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8,$m9,$m10,$m11,$m12,$m13,$m14,$m15,$m16,$m17,$m18,$m19,$m20,$m21,$k1,$k2,$k3,$k4,$k5,$k6,$k7,$k8,$k9,$k10,$k11,$k12,$k13,$k14,$k15,$k16,$k17,$k18,$k19,$k20,$k21,$k22,$k23,$k24,$k25,$k26,$k27,$k28,$k29,$k30,$k31,$k32,$k33){
		$hsl2=$this->db->query("select * from master_level where keterangan='$keterangan'");
		$count = $hsl2->num_rows();
		if($count == 0)
		{	
		$hsl=$this->db->query("INSERT INTO master_level (id,keterangan,m1,m2,m3,m4,m5,m6,m7,m8,m9,m10,m11,m12,m13,m14,m15,m16,m17,m18,m19,m20,m21,k1,k2,k3,k4,k5,k6,k7,k8,k9,k10,k11,k12,k13,k14,k15,k16,k17,k18,k19,k20,k21,k22,k23,k24,k25,k26,k27,k28,k29,k30,k31,k32,k33) VALUES ('','$keterangan','$m1','$m2','$m3','$m4','$m5','$m6','$m7','$m8','$m9','$m10','$m11','$m12','$m13','$m14','$m15','$m16','$m17','$m18','$m19','$m20','$m21','$k1','$k2','$k3','$k4','$k5','$k6','$k7','$k8','$k9','$k10','$k11','$k12','$k13','$k14','$k15','$k16','$k17','$k18','$k19','$k20','$k21','$k22','$k23','$k24','$k25','$k26','$k27','$k28','$k29','$k30','$k31','$k32','$k33')");
		return $hsl;
		}else{
			echo "<script>alert('Data Sudah Diinput')</script>";
		}
		redirect('Level','refresh');
	}
	public function tampil_level(){
		$hsl=$this->db->query("SELECT * from master_level");
		return $hsl;
	}

	function update_level($id,$keterangan,$m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8,$m9,$m10,$m11,$m12,$m13,$m14,$m15,$m16,$m17,$m18,$m19,$m20,$m21,$k1,$k2,$k3,$k4,$k5,$k6,$k7,$k8,$k9,$k10,$k11,$k12,$k13,$k14,$k15,$k16,$k17,$k18,$k19,$k20,$k21,$k22,$k23,$k24,$k25,$k26,$k27,$k28,$k29,$k30,$k31,$k32,$k33){
		$hsl=$this->db->query("UPDATE master_level SET keterangan='$keterangan',m1='$m1',m2='$m2',m3='$m3',m4='$m4',m5='$m5',m6='$m6',m7='$m7',m8='$m8',m9='$m9',m10='$m10',m11='$m11',m12='$m12',m13='$m13',m14='$m14',m15='$m15',m16='$m16',m17='$m17',m18='$m18',m19='$m19',m20='$m20',m21='$m21',k1='$k1',k2='$k2',k3='$k3',k4='$k4',k5='$k5',k6='$k6',k7='$k7',k8='$k8',k9='$k9',k10='$k10',k11='$k11',k12='$k12',k13='$k13',k14='$k14',k15='$k15',k16='$k16',k17='$k17',k18='$k18',k19='$k19',k20='$k20',k21='$k21',k22='$k22',k23='$k23',k24='$k4',k25='$k25',k26='$k26',k27='$k27',k28='$k28',k29='$k29',k30='$k30',k31='$k31',k32='$k32',k33='$k33' WHERE id='$id'");
		return $hsl;
	}
	function delete_level($id){
		$hsl=$this->db->query("DELETE FROM master_level where id='$id'");
		return $hsl;
	}


}
?>


