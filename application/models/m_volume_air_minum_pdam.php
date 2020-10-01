<?php 
class m_volume_air_minum_pdam extends CI_Model
{

	public function tampil_air_pdam($tahun){
		$thn=$tahun;

		if($thn=='0000'){
			$hasil=$this->db->query("SELECT id, bulan, sum(jumlah) as jumlah, tahun FROM volume_air_minum_pdam WHERE status='0' GROUP BY tahun ORDER BY tahun ASC");
		}else{
			$hasil=$this->db->query("SELECT id, bulan, sum(jumlah) as jumlah, tahun FROM volume_air_minum_pdam WHERE status='0' and tahun = '$thn' GROUP BY tahun");
		}
		return $hasil;
	}


	public function grafik_perbandingan_pdam($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, tahun, bulan, penginput, sum(jumlah) as jumlah FROM volume_air_minum_pdam WHERE status='0' and tahun BETWEEN '$tahun1' AND '$tahun2' GROUP BY tahun");	
		return $hsl;  
	}



	public function tampil_tahun(){
		$hasil=$this->db->query("SELECT * FROM volume_air_minum_pdam GROUP BY tahun");
		return $hasil;
	}


	public function tampil_detail_air_pdam($page){
		$hasil=$this->db->query("SELECT * FROM volume_air_minum_pdam WHERE status='0' AND tahun='$page'");
		return $hasil;
	}

	public function tampil_bulan(){
		$hasil=$this->db->query("SELECT * FROM master_bulan ");
		return $hasil;
	}

	public function simpan_data($bulan, $jumlah, $tahun, $penginput){
		$hasil=$this->db->query("INSERT INTO volume_air_minum_pdam
			(id, bulan, jumlah, tahun, penginput) 
			VALUES 
			('', '$bulan', '$jumlah', '$tahun', '$penginput')");
		return $hasil;
	}

	public function ubah_volume_air_minum_pdam($id, $bulan, $jumlah, $tahun, $penginput){
		$hasil=$this->db->query("UPDATE volume_air_minum_pdam 
			SET bulan='$bulan', jumlah='$jumlah', tahun='$tahun', penginput='$penginput' where id='$id' ");
		return $hasil;
	}

	public function proses_hapus_pdam($id){
		$status=1;
		$hasil=$this->db->query("UPDATE volume_air_minum_pdam SET status='$status' where id='$id'");
		return $hasil;
	}


	public function data_crosstab(){
		$hsl=$this->db->query("SELECT DISTINCT bulan, tahun, jumlah FROM volume_air_minum_pdam WHERE status='0' ");
		return $hsl;
	}
	public function tampil_bulanc(){
		$hsl=$this->db->query("SELECT DISTINCT bulan FROM volume_air_minum_pdam WHERE status='0'");
		return $hsl;
	}
	public function tampil_periodec($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT tahun FROM volume_air_minum_pdam WHERE status=0  AND tahun BETWEEN '$tahun1' and '$tahun2' order by tahun");
		return $hsl;
	}
	public function tampil_jumlahc($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT id, tahun, bulan, sum(jumlah) as jumlah FROM volume_air_minum_pdam WHERE status='0' AND tahun BETWEEN '$tahun1' AND '$tahun2' GROUP BY tahun");
		return $hsl;
	}

}
?>