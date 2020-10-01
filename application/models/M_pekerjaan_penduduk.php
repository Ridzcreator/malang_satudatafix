<?php
class m_pekerjaan_penduduk extends CI_Model {




	public function simpan_barang($nama_pekerjaan,$jumlah,$tahun,$penginput){
		
		$hsl=$this->db->query("INSERT INTO pekerjaan_penduduk (id, nama_pekerjaan, jumlah, tahun, penginput) VALUES ('','$nama_pekerjaan','$jumlah','$tahun','$penginput')");
		return $hsl;
	}
	public function tampil_pekerjaan_penduduk($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT id, tahun, sum(jumlah) as jumlah from pekerjaan_penduduk where status='0' group by tahun");
		}else{
		$hsl=$this->db->query("SELECT id, tahun,sum(jumlah) as jumlah from pekerjaan_penduduk where status='0' and tahun='$thn'");
		}
		return $hsl;  
	}
	public function tampil_detail_pekerjaan_penduduk($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT * from pekerjaan_penduduk where status='0'");
		}else{
		$hsl=$this->db->query("SELECT * from pekerjaan_penduduk WHERE status='0' and tahun='$thn'");
		}
		return $hsl;  
	}

	public function grafik_perbandingan_pekerjaan_pendudukx($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, tahun,sum(jumlah) as jumlah from pekerjaan_penduduk where status='0' and tahun between '$tahun1' and '$tahun2' group by tahun");
		return $hsl;  
	}

	public function tampil_grafik($tahun){
		$hsl=$this->db->query("SELECT * from pekerjaan_penduduk WHERE status='0' and tahun='$tahun'");	
		return $hsl;  
	}
	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT * from pekerjaan_penduduk where status='0' group by tahun order by tahun");
		return $hsl;  
	}

	public function tampil_pekerjaan(){
		$hasil=$this->db->query("SELECT * FROM master_pekerjaan");
		return $hasil;
	}

	function update_detail_pekerjaan_penduduk($id,$nama_pekerjaan,$jumlah,$tahun,$penginput){
		$hsl=$this->db->query("UPDATE pekerjaan_penduduk set penginput='$penginput', tahun='$tahun', nama_pekerjaan='$nama_pekerjaan', jumlah='$jumlah' WHERE id='$id'");
		return $hsl;
	}
	function delete_pekerjaan_penduduk($id){
		$status=1;
		$hsl=$this->db->query("UPDATE pekerjaan_penduduk set status='$status' WHERE id='$id'");
		return $hsl;
	}
}
?>


