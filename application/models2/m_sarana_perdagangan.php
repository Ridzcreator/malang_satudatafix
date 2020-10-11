<?php 
class m_sarana_perdagangan extends CI_Model
{

	public function tampil_sarana_perdagangan($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hasil=$this->db->query("SELECT * FROM sarana_perdagangan where status='0'");
		}else{
		$hasil=$this->db->query("SELECT * FROM sarana_perdagangan where status='0' and tahun='$thn'");
		}
		return $hasil;
	}
	public function simpan_barang($kecamatan, $pasar_umum, $toko, $rumah_makan, $tahun, $penginput){
		$hasil=$this->db->query("INSERT INTO sarana_perdagangan 
			(id, kecamatan, pasar_umum, toko, rumah_makan, tahun, penginput) 
			VALUES 
			('', '$kecamatan', '$pasar_umum','$toko', '$rumah_makan', '$tahun', '$penginput')");
		return $hasil;
	} 
	public function tampil_kecamatan(){
		$hasil=$this->db->query("SELECT * FROM master_kecamatan");
		return $hasil;
	}

	public function grafik_perbandingan_sarana_perdaganganx($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, tahun,sum(pasar_umum) as pasar_umum, sum(toko) as toko, sum(rumah_makan) as rumah_makan from sarana_perdagangan where status='0' and tahun between '$tahun1' and '$tahun2' group by tahun");
		return $hsl;  
	}

	public function tampil_tahun(){
		$hasil=$this->db->query("SELECT * FROM sarana_perdagangan WHERE status='0' GROUP BY tahun order by tahun");
		return $hasil;
	}

	function ubah_sarana_perdagangan($no, $kecamatan, $pasar_umum, $toko, $rumah_makan, $tahun, $penginput){
		$hasil=$this->db->query("UPDATE sarana_perdagangan SET kecamatan='$kecamatan', pasar_umum='$pasar_umum', toko='$toko', rumah_makan='$rumah_makan', tahun='$tahun', penginput='$penginput' where id='$no'");
		return $hasil;
	}

		function hapus_sarana_perdagangan($no){
		$status=1;
		$hasil=$this->db->query("UPDATE sarana_perdagangan SET status='$status' WHERE id='$no'");
		return $hasil;
	}
}
?>