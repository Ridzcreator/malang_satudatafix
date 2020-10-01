<?php

class M_produksiperikanan extends CI_Model {
    
	public function simpan_produksi_perikanan($tahun,$kec,$laut,$umum,$penginput){
		
		$hsl=$this->db->query("INSERT INTO produksi_perikanan (id,tahun,kecamatan, perikanan_laut, perikanan_umum, penginput) VALUES ('','$tahun','$kec','$laut','$umum','$penginput')");
		return $hsl;
	}
	public function tampil_produksi_perikanan($tahun){
		if($tahun=="0000"){
		$hsl=$this->db->query("SELECT * from produksi_perikanan where status='0'");
		}else{
		$hsl=$this->db->query("SELECT * from produksi_perikanan where tahun='$tahun' AND status='0'");
		}
		return $hsl;
	}
	public function tampil_jumlahmax($tahun){
	
		$hsl=$this->db->query("SELECT sum(perikanan_laut+perikanan_umum) as jumlah from produksi_perikanan where tahun='$tahun' AND status='0'");
		
		return $hsl;
	}
	public function tampil_jumlahmin($tahun){
	
		$hsl=$this->db->query("SELECT sum(perikanan_laut+perikanan_umum) as jumlah from produksi_perikanan where tahun='$tahun' AND status='0'");
		
		return $hsl;
	}
	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT * from produksi_perikanan where status='0' group by tahun");
		return $hsl;
	}
	public function tampil_tahunmax(){
		$hsl=$this->db->query("SELECT max(tahun) as tahun from produksi_perikanan where status='0' ");
		return $hsl;
	}
	public function tampil_tahunmin(){
		$hsl=$this->db->query("SELECT max(tahun-1) as tahun from produksi_perikanan where status='0' ");
		return $hsl;
	}
	
	public function tampil_kecamatan(){
		$hsl=$this->db->query("SELECT * from master_kecamatan");
		return $hsl;
	}
    public function delete_produksi_perikanan($id){
		$status=1;
		$hsl=$this->db->query("UPDATE produksi_perikanan set status ='$status' where id='$id'");
		return $hsl;
	}

		public function grafik_perbandingan_produksi_perikanan($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, tahun, sum(perikanan_laut) as perikanan_laut, sum(perikanan_umum) as perikanan_umum FROM produksi_perikanan where status='0' AND tahun between '$tahun1' and '$tahun2' group by tahun");	
		return $hsl;  
	}

	public function tampil_grafik($tahun){
		$hsl=$this->db->query("SELECT * FROM produksi_perikanan WHERE status='0' AND tahun='$tahun'");	
		return $hsl;
	}
	public function edit_produksi_perikanan($id,$tahun,$kec,$laut,$umum,$penginput) {
		$hsl=$this->db->query("UPDATE produksi_perikanan SET tahun='$tahun',kecamatan ='$kec', perikanan_laut='$laut', perikanan_umum='$umum',penginput='$penginput' where id='$id'");
		return $hsl;
	}


		public function data_crosstab(){
		$hsl=$this->db->query("SELECT DISTINCT kecamatan, tahun, perikanan_laut, perikanan_umum FROM produksi_perikanan where status='0' ");
		return $hsl;
	}
	public function tampil_bulanc(){
		$hsl=$this->db->query("SELECT DISTINCT kecamatan FROM produksi_perikanan where status=0");
		return $hsl;
	}
	public function tampil_periodec($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT tahun FROM produksi_perikanan where status='0' AND tahun BETWEEN '$tahun1' and '$tahun2' order by tahun");
		return $hsl;
	}
	public function tampil_jumlahc($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT sum(perikanan_laut) as perikanan_laut, sum(perikanan_umum) as perikanan_umum, kecamatan, tahun FROM produksi_perikanan WHERE status='0' AND tahun BETWEEN '$tahun1' AND '$tahun2' GROUP BY tahun");
		return $hsl;
	}
}