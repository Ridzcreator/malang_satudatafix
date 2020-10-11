<?php

class M_kebudayaan extends CI_Model {
    
	public function simpan_kebudayaan($nama,$jns,$lokasi,$jumlah,$tahun,$penginput){

		$hsl=$this->db->query("INSERT INTO warisan_budaya (id, nama_warisan, jns_warisan, lokasi, jml_warisan, tahun, penginput) VALUES ('','$nama','$jns','$lokasi','$jumlah','$tahun','$penginput')");
		return $hsl;
	}
	public function tampil_kebudayaan($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT id, tahun, jns_warisan, sum(jml_warisan) as jml_warisan FROM warisan_budaya where status='0' GROUP BY jns_warisan");
		} else {
			$hsl=$this->db->query("SELECT id, tahun, jns_warisan, sum(jml_warisan) as jml_warisan FROM warisan_budaya where status='0' AND tahun='$thn'");
		}
		return $hsl;
	}
	public function tampil_detail_kebudayaan($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT a.id, a.nama_warisan, a.jns_warisan, a.lokasi, a.jumlah, a.tahun, b.warisan_budaya, b.id from warisan_budaya as a join master_warisan_budaya as b on a.jns_warisan=b.id where a.status='0' order by b.id");
		}else{
		$hsl=$this->db->query("SELECT a.id, a.nama_warisan, a.jns_warisan, a.lokasi, a.jumlah, a.tahun, b.warisan_budaya from warisan_budaya as a join master_warisan_budaya as b on a.jns_warisan=b.id where a.status='0' order by b.id");	
		}
		return $hsl;  
	}
	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT * from warisan_budaya group by tahun");
		return $hsl;
	}
	public function tampil_warisan(){
		$hsl=$this->db->query("SELECT * from master_warisan_budaya");
		return $hsl;
	}
	public function tampil_grafik($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT * from cabang_olahraga where status='0' and tahun='2018'");
		} else {
			$hsl=$this->db->query("SELECT * from cabang_olahraga where tahun='$tahun' and status='0'");
		}
		return $hsl;
	}
	
    public function delete_kebudayaan($id){
    	$status = 1;
		$hsl=$this->db->query("UPDATE warisan_budaya set status= '$status' where id='$id'");
		return $hsl;
	}
	public function edit_kebudayaan($id,$warisan,$jumlah,$tahun,$penginput) {
		$hsl=$this->db->query("UPDATE warisan_budaya SET jns_warisan ='$warisan', jml_warisan='$jumlah', tahun='$tahun', penginput='$penginput'  where id='$id'");
		return $hsl;
	}

}