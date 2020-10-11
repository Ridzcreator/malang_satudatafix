<?php

class M_jumlahkoleksi_buku extends CI_Model {
    
	public function simpan_jumlah_koleksi_buku($tahun,$tb,$jl,$er,$penginput){
		$hsl=$this->db->query("INSERT INTO jumlah_koleksi_buku (id, tahun,tajuk_buku,judul,exemplar,penginput) 
			VALUES 
			('','$tahun','$tb','$jl','$er','$penginput')");
		return $hsl;
	}
		public function simpan_detail_jumlah_koleksi_buku($tahun,$tb,$jl,$er,$penginput){
		$hsl=$this->db->query("INSERT INTO jumlah_koleksi_buku (id, tahun,tajuk_buku, judul,exemplar,penginput) 
			VALUES 
			('','$tahun','$tb','$jl','$er','$penginput')");
		return $hsl;
	}
	public function grafik_perbandingan_jumlah_koleksi_buku($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, tahun,tajuk_buku, sum(judul) as judul, sum(exemplar) as exemplar FROM jumlah_koleksi_buku WHERE status='0' and tahun BETWEEN '$tahun1' AND '$tahun2'  GROUP BY tahun");	
		return $hsl;  
	}

	public function tampil_grafik($tahun){
		$hsl=$this->db->query("SELECT id, tahun,tajuk_buku, judul, exemplar, (judul + exemplar) as jumlah FROM jumlah_koleksi_buku WHERE status='0'  AND tahun='$tahun'");	
		return $hsl;  
	}
	public function tampil_jumlah_koleksi_buku($tahun){
		$thn=$tahun;
		if($thn=='0000'){
			$hasil=$this->db->query("SELECT id, tahun,tajuk_buku, sum(judul) as judul, sum(exemplar) as exemplar FROM jumlah_koleksi_buku WHERE status='0'  GROUP BY tahun");
		}else{
			$hasil=$this->db->query("SELECT id, tahun,tajuk_buku, sum(judul) as judul, sum(exemplar) as exemplar FROM jumlah_koleksi_buku WHERE status='0'  AND tahun='$tahun' GROUP BY tahun");
		}
		return $hasil;
	}
	public function tampil_jumlahmax($tahun){
		$thn=$tahun;
		
			$hasil=$this->db->query("SELECT (judul+exemplar) as jumlah FROM jumlah_koleksi_buku WHERE status='0'  AND tahun='$tahun' GROUP BY tahun");
		
		return $hasil;
	}
	public function tampil_jumlahmaximum(){
		
		
			$hasil=$this->db->query("SELECT (judul+exemplar) as jumlah FROM jumlah_koleksi_buku WHERE status='0'");
		
		return $hasil;
	}
	public function tampil_tahun(){
	$hsl=$this->db->query("SELECT * from jumlah_koleksi_buku where status='0' group by tahun");
		return $hsl;
	}
	public function tampil_tahunmax(){
	$hsl=$this->db->query("SELECT max(tahun) as tahun from jumlah_koleksi_buku where status='0'");
		return $hsl;
	}
	public function tampil_tajuk_buku(){
		$hsl=$this->db->query("SELECT * from master_tajuk_buku");
		return $hsl;
	}
	public function tampil_detail_jumlah_koleksi_buku($id){
		$hasil=$this->db->query("SELECT * FROM jumlah_koleksi_buku WHERE status='0' And tahun='$id'");
		return $hasil;
	}
	
    public function delete_jumlah_koleksi_buku($id){
    	$status=1;
		$hsl=$this->db->query("UPDATE jumlah_koleksi_buku set status ='$status' where id='$id'");
		return $hsl;

	}
	public function edit_jumlah_koleksi_buku($id,$tahun,$tb,$jl,$er,$penginput) {
		$hsl=$this->db->query("UPDATE jumlah_koleksi_buku SET tahun = '$tahun',tajuk_buku ='$tb', judul = '$jl',exemplar = '$er',penginput='$penginput' where id='$id'");
		return $hsl;
	}

	public function crosstab_wisatawan_jumlah_koleksi_buku($id){
		$hasil=$this->db->query("SELECT * FROM jumlah_koleksi_buku WHERE status='0' ");
		return $hasil;
	}



	public function data_crosstab(){
		$hsl=$this->db->query("SELECT DISTINCT tajuk_buku, tahun, judul, exemplar FROM jumlah_koleksi_buku where status='0' ");
		return $hsl;
	}
	public function tampil_bulanc(){
		$hsl=$this->db->query("SELECT DISTINCT tajuk_buku FROM jumlah_koleksi_buku where status=0");
		return $hsl;
	}
	public function tampil_periodec($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT tahun FROM jumlah_koleksi_buku where status='0' AND tahun BETWEEN '$tahun1' and '$tahun2' order by tahun");
		return $hsl;
	}
	public function tampil_jumlahc($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT sum(judul) as judul, sum(exemplar) as exemplar, tajuk_buku, tahun FROM jumlah_koleksi_buku WHERE status='0' AND tahun BETWEEN '$tahun1' AND '$tahun2' GROUP BY tahun");
		return $hsl;
	}
}