<?php

class M_apl extends CI_Model {
    
	public function simpan_apl($nama,$stts,$tahun,$penginput){
		$hsl=$this->db->query("INSERT INTO apl_terselesaikan (id, nama_apl, stts, tahun, penginput) VALUES ('','$nama','$stts', '$tahun', '$penginput')");
		return $hsl;
	}

	public function tampil_apl($tahun){
		$thn=$tahun;
		if($thn=='0000'){
			$hsl=$this->db->query("SELECT * from apl_terselesaikan where status='0'");
		} else {
			$hsl=$this->db->query("SELECT * from apl_terselesaikan where tahun='$thn' and status='0'");
		}
		return $hsl;
	}

	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT * from apl_terselesaikan where status='0' group by tahun");
		return $hsl;
	}

    public function delete_apl($id){
    	$status = 1;
		$hsl=$this->db->query("UPDATE apl_terselesaikan set status= '$status' where id='$id'");
		return $hsl;
	}

	public function edit_apl($id,$nama,$stts,$tahun,$penginput) {
		$hsl=$this->db->query("UPDATE apl_terselesaikan SET nama_apl ='$nama', stts='$stts', tahun='$tahun', penginput='$penginput' where id='$id'");
		return $hsl;
	}

	public function semua_data_crosstab(){
		$hsl=$this->db->query("SELECT DISTINCT nama_apl, stts, tahun FROM apl_terselesaikan where status=0");
		return $hsl;
	}

	public function tampil_aplc(){
		$hsl=$this->db->query("SELECT DISTINCT nama_apl FROM apl_terselesaikan where status=0");
		return $hsl;
	}

	public function tampil_periodec($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT tahun FROM apl_terselesaikan where status=0 and tahun BETWEEN '$tahun1' and '$tahun2' order by tahun");
		return $hsl;
	}

}
	
	