<?php

class M_internetrumahsakit extends CI_Model {
    
	public function simpan_internet_rumahsakit($tahun,$rm,$tf,$kai,$op){
		
		$hsl=$this->db->query("INSERT INTO akses_internet_rumah_sakit  (id,  tahun, rumah_sakit, terhubung_fixed,kecepatan_akses_internet,operator_penyedia) VALUES ('','$tahun','$rm','$tf','$kai','$op')");
		return $hsl;
	}
	public function tampil_internet_rumahsakit($tahun){
		if($tahun=="0000"){
		$hsl=$this->db->query("SELECT * from akses_internet_rumah_sakit where status='0'");
		}else{
		$hsl=$this->db->query("SELECT * from akses_internet_rumah_sakit where tahun='$tahun' AND status='0'");
		}
		return $hsl;
	}	
		public function tampil_tahun(){
	$hsl=$this->db->query("SELECT * from akses_internet_rumah_sakit where status='0' group by tahun");
		return $hsl;
	}
	
	public function tampil_rumah_sakit(){
		$hsl=$this->db->query("SELECT * from master_rumah_sakit");
		return $hsl;
	}
	public function tampil_provider(){
		$hsl=$this->db->query("SELECT * from master_provider");
		return $hsl;
	}
    public function delete_internet_rumahsakit($id){
		$status=1;
		$hsl=$this->db->query("UPDATE akses_internet_rumah_sakit set status ='$status' where id='$id'");
		return $hsl;
	}
	public function edit_internet_rumahsakit($id,$tahun,$rm,$tf,$kai,$op) {
		$hsl=$this->db->query("UPDATE akses_internet_rumah_sakit SET tahun='$tahun', rumah_sakit ='$rm', terhubung_fixed = '$tf',kecepatan_akses_internet = '$kai',operator_penyedia='$op' where id='$id'");
		return $hsl;
	}

}