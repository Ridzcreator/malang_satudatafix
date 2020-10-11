<?php
class M_sarana extends CI_Model {

	public function simpan_barang($penginput,$periode,$aparatpp,$aparatlinmas,$ppspp,$ppm,$pk,$pkml,$roda2,$roda4, $status){
		
		$hsl=$this->db->query("INSERT INTO sarana (id, aparatpp, aparat_linmas, petugas_satpol, petugas_pp, pos_keamanan, pos_kamling, roda2, roda4, periode,status,penginput) VALUES ('','$aparatpp','$aparatlinmas','$ppspp','$ppm','$pk','$pkml','$roda2','$roda4','$periode','$status','$penginput')");
		return $hsl;
	}
	public function update_perumahan($id,$penginput,$periode,$aparatpp,$aparatlinmas,$ppspp,$ppm,$pk,$pkml,$roda2,$roda4){
		$hsl=$this->db->query("UPDATE sarana SET aparatpp='$aparatpp', aparat_linmas='$aparatlinmas', petugas_satpol='$ppspp', petugas_pp='$ppm', pos_keamanan='$pk', pos_kamling='$pkml', roda2='$roda2', roda4='$roda4', periode='$periode', penginput='$penginput' WHERE id='$id'");
		return $hsl;
	
	}
	public function tampil_perumahan($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("select * from sarana where status = 0");
		}else{
		$hsl=$this->db->query("select * from sarana where status = 0 and periode='$tahun'");
		}
		return $hsl;
	}
	public function tampil_tahun(){
		$hsl=$this->db->query("select DISTINCT periode from sarana where status = 0 order by periode desc");
		return $hsl;
	}
	public function tampil_perumahanx($id){
		$hsl=$this->db->query("select * from sarana where id = '$id'");
		return $hsl;
	}
	public function grafik_Perbandingan_perumahanx($tahun1, $tahun2){
		$hsl=$this->db->query("select * from sarana where status = 0 and periode between '$tahun1' and '$tahun2' order by periode");
		return $hsl;
	}
	
	public function delete_perumahan($kodeinput){
		$status=1;
		$hsl=$this->db->query("UPDATE sarana SET status='$status' WHERE id='$kodeinput'");
		return $hsl;
	}


}
?>


