<?php 
class m_pelanggan_pdam extends CI_Model
{

	public function tampil_pelanggan_pdam($tahun){
		$thn=$tahun;

		if($thn=='0000'){
			$hasil=$this->db->query("SELECT id, kecamatan, sum(jumlah) as jumlah, tahun FROM pelanggan_pdam WHERE status='0' GROUP BY tahun ORDER BY tahun ASC");
		}else{
			$hasil=$this->db->query("SELECT id, kecamatan, sum(jumlah) as jumlah, tahun FROM pelanggan_pdam WHERE status='0' and tahun = '$thn' GROUP BY tahun");
		}
		return $hasil;
	}


	public function grafik_perbandingan_pdam($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, tahun, kecamatan, penginput, sum(jumlah) as jumlah FROM pelanggan_pdam WHERE status='0' and tahun BETWEEN '$tahun1' AND '$tahun2' GROUP BY tahun");	
		return $hsl;  
	}



	public function tampil_tahun(){
		$hasil=$this->db->query("SELECT * FROM pelanggan_pdam GROUP BY tahun");
		return $hasil;
	}


	public function tampil_detail_pelanggan_pdam($page){
		$hasil=$this->db->query("SELECT * FROM pelanggan_pdam WHERE status='0' AND tahun='$page'");
		return $hasil;
	}

	public function tampil_kecamatan(){
		$hasil=$this->db->query("SELECT * FROM master_kecamatan ");
		return $hasil;
	}

	public function simpan_pelanggan_pdam($kecamatan, $jumlah, $tahun, $penginput){
		$hasil=$this->db->query("INSERT INTO pelanggan_pdam
			(id, kecamatan, jumlah, tahun, penginput) 
			VALUES 
			('', '$kecamatan', '$jumlah', '$tahun', '$penginput')");
		return $hasil;
	}

	public function ubah_pelanggan_pdam($id, $kecamatan, $jumlah, $tahun, $penginput){
		$hasil=$this->db->query("UPDATE pelanggan_pdam 
			SET kecamatan='$kecamatan', jumlah='$jumlah', tahun='$tahun', penginput='$penginput' where id='$id' ");
		return $hasil;
	}

	public function proses_hapus_pdam($id){
		$status=1;
		$hasil=$this->db->query("UPDATE pelanggan_pdam SET status='$status' where id='$id'");
		return $hasil;
	}


	public function data_crosstab(){
		$hsl=$this->db->query("SELECT DISTINCT kecamatan, tahun, jumlah FROM pelanggan_pdam WHERE status='0' ");
		return $hsl;
	}
	public function tampil_bulanc(){
		$hsl=$this->db->query("SELECT DISTINCT kecamatan FROM pelanggan_pdam WHERE status='0'");
		return $hsl;
	}
	public function tampil_periodec($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT tahun FROM pelanggan_pdam WHERE status=0  AND tahun BETWEEN '$tahun1' and '$tahun2' order by tahun");
		return $hsl;
	}
	public function tampil_jumlahc($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT id, tahun, kecamatan, sum(jumlah) as jumlah FROM pelanggan_pdam WHERE status='0' AND tahun BETWEEN '$tahun1' AND '$tahun2' GROUP BY tahun");
		return $hsl;
	}

}
?>