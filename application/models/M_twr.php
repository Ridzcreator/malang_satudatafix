<?php

class M_twr extends CI_Model {
    
	public function simpan_tower($kec,$jml,$tahun,$penginput){
		$hsl=$this->db->query("INSERT INTO tower (id, kecamatan, jml_tower, tahun, penginput) VALUES ('','$kec','$jml', '$tahun', '$penginput')");
		return $hsl;
	}

	public function tampil_tower($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT id, tahun, sum(jml_tower) as jml_tower FROM tower where status='0' GROUP BY tahun");
		} else {
			$hsl=$this->db->query("SELECT id, tahun, sum(jml_tower) as jml_tower FROM tower where status='0' AND tahun='$thn'");
		}
		return $hsl;
	}

	public function tampil_detail_tower($id){
		$hasil=$this->db->query("SELECT * FROM tower WHERE status='0' AND tahun='$id'");
		return $hasil;
	}

	public function tampil_grafik($tahun){
		$hsl=$this->db->query("SELECT * FROM tower WHERE status='0' AND tahun='$tahun'");	
		return $hsl;  
	}

	public function grafik_perbandingan_tower($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, tahun, sum(jml_tower) as jml_tower FROM tower where status='0' AND tahun between '$tahun1' and '$tahun2' group by tahun");	
		return $hsl;  
	}

	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT * from tower where status='0' group by tahun");
		return $hsl;
	}

	public function tampil_kecamatan(){
		$hsl=$this->db->query("SELECT * from master_kecamatan");
		return $hsl;
	}

	public function semua_data_crosstab(){
		$hsl=$this->db->query("SELECT DISTINCT kecamatan, jml_tower, tahun FROM tower where status=0");
		return $hsl;
	}

	public function tampil_kecamatanc(){
		$hsl=$this->db->query("SELECT DISTINCT kecamatan FROM tower where status=0");
		return $hsl;
	}

	public function tampil_periodec($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT tahun FROM tower where status=0 and tahun BETWEEN '$tahun1' and '$tahun2' order by tahun");
		return $hsl;
	}
	public function tampil_jumlahc($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT sum(jml_tower) as jml_tower, tahun FROM tower  where status=0 and tahun BETWEEN '$tahun1' and '$tahun2' GROUP BY tahun");
		return $hsl;
	}


    public function delete_tower($id){
    	$status = 1;
		$hsl=$this->db->query("UPDATE tower set status= '$status' where id='$id'");
		return $hsl;
	}

	public function edit_tower($id,$kec,$jml,$tahun,$penginput) {
		$hsl=$this->db->query("UPDATE tower SET kecamatan ='$kec', jml_tower='$jml', tahun='$tahun', penginput='$penginput' where id='$id'");
		return $hsl;
	}

}