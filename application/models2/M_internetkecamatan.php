<?php

class M_internetkecamatan extends CI_Model {
    
	public function simpan_internet_kecamatan($tahun,$kec,$tf,$kai,$op,$penginput){
		
		$hsl=$this->db->query("INSERT INTO akses_internet_kecamatan  (id,  tahun, kecamatan, terhubung_fixed,kecepatan_akses_internet,operator_penyedia,penginput) VALUES ('','$tahun','$kec','$tf','$kai','$op','$penginput')");
		return $hsl;
	}
	public function tampil_internet_kecamatan($tahun){
		if($tahun=="0000"){
		$hsl=$this->db->query("SELECT * from akses_internet_kecamatan where status='0'");
		}else{
		$hsl=$this->db->query("SELECT * from akses_internet_kecamatan where tahun='$tahun' AND status='0'");
		}
		return $hsl;
	}	
		public function tampil_tahun(){
	$hsl=$this->db->query("SELECT * from akses_internet_kecamatan where status='0' group by tahun");
		return $hsl;
	}
	
	public function tampil_kecamatan(){
		$hsl=$this->db->query("SELECT * from master_kecamatan");
		return $hsl;
	}
	public function tampil_provider(){
		$hsl=$this->db->query("SELECT * from master_provider");
		return $hsl;
	}
    public function delete_internet_kecamatan($id){
		$status=1;
		$hsl=$this->db->query("UPDATE akses_internet_kecamatan set status ='$status' where id='$id'");
		return $hsl;
	}
	public function edit_internet_kecamatan($id,$tahun,$kec,$tf,$kai,$op) {
		$hsl=$this->db->query("UPDATE akses_internet_kecamatan SET tahun='$tahun', kecamatan ='$kec', terhubung_fixed = '$tf',kecepatan_akses_internet = '$kai',operator_penyedia='$op' where id='$id'");
		return $hsl;
	}

}