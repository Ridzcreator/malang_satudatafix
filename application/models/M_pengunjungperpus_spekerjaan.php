<?php

class M_pengunjungperpus_spekerjaan extends CI_Model {
    
	public function simpan_pengunjung_perpus_spekerjaan($tahun,$bln,$tb,$pr,$kr,$jml,$penginput){
		$jml=0;
		$jml=$tb+$pr+$kr;
		$hsl=$this->db->query("INSERT INTO pengunjungperpus_status_pekerjaan  
			(id, tahun,bulan,tidak_bekerja,pelajar,karyawan,jumlah,penginput) 
			VALUES 
			('','$tahun','$bln','$tb','$pr','$kr','$jml','$penginput')");
		return $hsl;
	}
public function simpan_detail_pengunjung_perpus_spekerjaan($tahun,$bln,$tb,$pr,$kr,$jml,$penginput){
		$jml=0;
		$jml=$tb+$pr+$kr;
		$hsl=$this->db->query("INSERT INTO pengunjungperpus_status_pekerjaan  
			(id, tahun,bulan,tidak_bekerja,pelajar,karyawan,jumlah,penginput) 
			VALUES 
			('','$tahun','$bln','$tb','$pr','$kr','$jml','$penginput')");
		return $hsl;
	}

	public function  tampil_detail_pengunjung_perpus_spekerjaan($id){
		$hasil=$this->db->query("SELECT * FROM pengunjungperpus_status_pekerjaan WHERE status='0' AND tahun='$id'");
		return $hasil;
	}
	public function tampil_pengunjung_perpus_spekerjaan($tahun){
		$thn=$tahun;
		if($thn=='0000'){
			$hasil=$this->db->query("SELECT id, tahun,bulan, sum(tidak_bekerja) as tidak_bekerja, sum(pelajar) as pelajar, sum(karyawan) as karyawan, sum(jumlah) as jumlah FROM pengunjungperpus_status_pekerjaan WHERE status='0' GROUP BY tahun");
		}else{
			$hasil=$this->db->query("SELECT id, tahun,bulan, sum(tidak_bekerja) as tidak_bekerja, sum(pelajar) as pelajar, sum(karyawan) as karyawan, sum(jumlah) as jumlah FROM pengunjungperpus_status_pekerjaan WHERE status='0' and tahun='$tahun'");
		}
				return $hasil;
	}
	public function tampil_tahun(){
	$hsl=$this->db->query("SELECT * from pengunjungperpus_status_pekerjaan where status='0' GROUP BY tahun");
		return $hsl;
	}
	public function tampil_bulan(){
		$hsl=$this->db->query("SELECT * from master_bulan");
		return $hsl;
	}
	
    public function delete_pengunjung_perpus_spekerjaan($id){
    	$status=1;
		$hsl=$this->db->query("UPDATE pengunjungperpus_status_pekerjaan set status ='$status' where id='$id'");
		return $hsl;

	}
	public function edit_pengunjung_perpus_spekerjaan($id,$tahun,$bln,$tb,$pr,$kr,$jml,$penginput) {
		$jml=0;
		$jml=$tb+$pr+$kr;
		$hsl=$this->db->query("UPDATE pengunjungperpus_status_pekerjaan SET tahun = '$tahun',  bulan='$bln', tidak_bekerja ='$tb', pelajar = '$pr',karyawan='$kr', jumlah = '$jml',penginput='$penginput' where id='$id'");
		return $hsl;
	}
public function grafik_perbandingan_perpus_spekerjaan($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, tahun, bulan, sum(tidak_bekerja) as tidak_bekerja, sum(pelajar) as pelajar, sum(karyawan) as karyawan, sum(jumlah) as jumlah FROM pengunjungperpus_status_pekerjaan WHERE status='0' and tahun BETWEEN '$tahun1' AND '$tahun2'  GROUP BY tahun");	
		return $hsl;  
	}
		public function tampil_grafik($tahun){
		$hsl=$this->db->query("SELECT * FROM pengunjungperpus_status_pekerjaan where status='0' and tahun='$tahun' GROUP BY bulan ");	
		return $hsl;  
	}
}