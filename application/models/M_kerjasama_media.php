<?php

class M_kerjasama_media extends CI_Model {
    
	public function simpan_kerjasama_media($nama,$jml,$kategori,$tahun,$penginput){
		$hsl=$this->db->query("INSERT INTO kerjasama_media (id, nm_media, jumlah_krjsm, kategori, tahun, penginput) VALUES ('','$nama','$jml', '$kategori','$tahun', '$penginput')");
		return $hsl;
	}

	public function tampil_kerjasama_media($tahun){
		$thn=$tahun;
		if($thn=='0000'){
			$hsl=$this->db->query("SELECT * from kerjasama_media where status='0'");
		} else {
			$hsl=$this->db->query("SELECT * from kerjasama_media where tahun='$thn' and status='0'");
		}
		return $hsl;
	}

	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT * from kerjasama_media where status='0' group by tahun");
		return $hsl;
	}

	public function tampil_media(){
		$hsl=$this->db->query("SELECT * from master_kerjasama");
		return $hsl;
	}

	public function grafik_perbandingan_kerjasama($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, tahun, sum(jumlah_krjsm) as jumlah_krjsm FROM kerjasama_media where status='0' AND tahun between '$tahun1' and '$tahun2' group by tahun");	
		return $hsl;  
	}

    public function delete_kerjasama_media($id){
    	$status = 1;
		$hsl=$this->db->query("UPDATE kerjasama_media set status= '$status' where id='$id'");
		return $hsl;
	}

	public function edit_kerjasama_media($id,$nama,$jml,$tahun,$penginput) {
		$hsl=$this->db->query("UPDATE kerjasama_media SET nm_media ='$nama', jumlah_krjsm='$jml', tahun='$tahun', penginput='$penginput' where id='$id'");
		return $hsl;
	}

}