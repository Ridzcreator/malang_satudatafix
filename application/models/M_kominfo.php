<?php

class M_kominfo extends CI_Model {
    
	public function simpan_kominfo($nama,$hbg,$akses,$oprtr,$tahun,$penginput){
		$hsl=$this->db->query("INSERT INTO perangkat_daerah (id, nama_perda, terhubung, akses, operator, tahun, penginput) VALUES ('','$nama','$hbg','$akses', '$oprtr', '$tahun', '$penginput')");
		return $hsl;
	}
	public function tampil_perda($tahun){
		$thn=$tahun;
		if($thn=='0000'){
			$hsl=$this->db->query("SELECT * from perangkat_daerah where status='0'");
		} else {
			$hsl=$this->db->query("SELECT * from perangkat_daerah where tahun='$thn' and status='0'");
		}
		return $hsl;
	}

	public function tampil_grafik($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT * from perangkat_daerah where status='0' and tahun='2018'");
		} else {
			$hsl=$this->db->query("SELECT * from perangkat_daerah where tahun='$tahun' and status='0'");
		}
		return $hsl;
	}

	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT * from perangkat_daerah where status='0' group by tahun");
		return $hsl;
	}
	public function tampil_nmperda(){
		$hsl=$this->db->query("SELECT * from master_perda");
		return $hsl;
	}
	public function tampil_provider(){
		$hsl=$this->db->query("SELECT * from master_provider");
		return $hsl;
	}
	// public function tampil_cabang(){
	// 	$hsl=$this->db->query("SELECT * from master_cabangolahraga");
	// 	return $hsl;
	// }
    public function delete_perda($id){
    	$status = 1;
		$hsl=$this->db->query("UPDATE perangkat_daerah set status= '$status' where id='$id'");
		return $hsl;
	}
	public function edit_kominfo($id,$nama,$hbg,$akses,$oprtr,$tahun,$penginput) {
		$hsl=$this->db->query("UPDATE perangkat_daerah SET nama_perda ='$nama', terhubung='$hbg', akses='$akses', operator='$oprtr', tahun='$tahun', penginput='$penginput' where id='$id'");
		return $hsl;
	}

}