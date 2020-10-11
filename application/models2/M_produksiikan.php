<?php

class M_produksiikan extends CI_Model {
    
	public function simpan_produksi_ikan($tahun,$ji,$ja,$prod,$nprod,$penginput){
		
		$hsl=$this->db->query("INSERT INTO produksi_ikan  (id,tahun, jenis_ikan, jenis_air,produksi,nilai_produksi,penginput) VALUES ('','$tahun','$ji','$ja','$prod','$nprod','$penginput')");
		return $hsl;
	}
	public function tampil_produksi_ikan($tahun){
		$thn=$tahun;
		if($thn=="0000"){
		$hsl=$this->db->query("SELECT * from produksi_ikan where status='0'");
		}else{
		$hsl=$this->db->query("SELECT * from produksi_ikan where tahun='$thn' AND status='0'");
		}
		return $hsl;
	}
	public function tampil_jenis_ikan(){
		$hsl=$this->db->query("SELECT * from master_semua_ikan");
		return $hsl;
	}	
		public function tampil_tahun(){
	$hsl=$this->db->query("SELECT * from produksi_ikan where status='0' group by tahun");
		return $hsl;
	}

	public function tampil_tahunmax(){
	$hsl=$this->db->query("SELECT max(tahun) as tahun from produksi_ikan where status='0' group by tahun");
		return $hsl;
	}

	public function tampil_tahunmin(){
	$hsl=$this->db->query("SELECT max(tahun)-1 as tahun from produksi_ikan where status='0' group by tahun");
		return $hsl;
	}

	public function tampil_jenisair($jns_ikan){
		$hsl=$this->db->query("SELECT keterangan as keterangan from master_semua_ikan where jenis_ikan='$jns_ikan' group by keterangan");
		return $hsl;
	}
	public function tampil_jenis_air(){
		$hsl=$this->db->query("SELECT * from master_jenis_air");
		return $hsl;
	}

		public function grafik_perbandingan_produksi_ikan($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, tahun,jenis_ikan,jenis_air, sum(produksi) as produksi, sum(nilai_produksi) as nilai_produksi FROM produksi_ikan where status='0' AND tahun between '$tahun1' and '$tahun2' group by tahun");	
		return $hsl;  
	}

	public function tampil_grafik($tahun){
		$hsl=$this->db->query("SELECT * FROM produksi_ikan WHERE status='0' AND tahun='$tahun'");	
		return $hsl;
	
	}

	public function tampil_grafikx($tahunm,$tahunt){
		$hsl=$this->db->query("select jenis_air,sum(produksi) as produksi, tahun from produksi_ikan where status = 0 and tahun between '$tahunm' and '$tahunt' GROUP BY tahun,jenis_air");	
		return $hsl;
	
	}
    public function delete_produksi_ikan($id){
		$status=1;
		$hsl=$this->db->query("UPDATE produksi_ikan set status ='$status' where id='$id'");
		return $hsl;
	}
	public function edit_produksi_ikan($id,$tahun,$ji,$ja,$prod,$nprod,$penginput) {
		$hsl=$this->db->query("UPDATE produksi_ikan SET tahun='$tahun', jenis_ikan ='$ji', jenis_air = '$ja',produksi = '$prod',nilai_produksi='$nprod', penginput='$penginput' where id='$id'");
		return $hsl;
	}
	public function data_crosstab($air){
		$hsl=$this->db->query("SELECT DISTINCT jenis_ikan, jenis_air,produksi,nilai_produksi, tahun FROM produksi_ikan WHERE status='0' and jenis_air='$air'");
		return $hsl;
	}
	public function tampil_ikan($air){
		$hsl=$this->db->query("SELECT DISTINCT jenis_ikan FROM produksi_ikan WHERE status='0' AND jenis_air='$air'");
		return $hsl;
	}
	public function tampil_periodec($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT tahun FROM produksi_ikan WHERE status=0  AND tahun BETWEEN '$tahun1' and '$tahun2' order by tahun");
		return $hsl;
	}
	public function tampil_jumlahc($tahun1,$tahun2,$air){
		$hsl=$this->db->query("SELECT DISTINCT id,jenis_ikan, jenis_air, sum(produksi) as produksi, tahun FROM produksi_ikan WHERE status='0' AND tahun BETWEEN '$tahun1' AND '$tahun2' and jenis_air='$air' GROUP BY tahun");
		return $hsl;
	}
	public function tampil_jumlahp($tahun1,$tahun2,$air){
		$hsl=$this->db->query("SELECT DISTINCT id,jenis_ikan, jenis_air, sum(nilai_produksi) as nilai_produksi, tahun FROM produksi_ikan WHERE status='0' AND tahun BETWEEN '$tahun1' AND '$tahun2' and jenis_air='$air' GROUP BY tahun");
		return $hsl;
	}

}