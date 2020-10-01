<?php 
class m_pasar_modern extends CI_Model
{

	public function tampil_pasar_modern($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hasil=$this->db->query("SELECT * FROM pasar_modern where status='0'");
		}else{
		$hasil=$this->db->query("SELECT * FROM pasar_modern where status='0' and tahun='$thn'");
		}
		return $hasil;
	}

	public function tampil_pasar_modernx($tahun){
		$thn=$tahun;
		$hasil=$this->db->query("SELECT sum(indomart+alfamart) as jumlah FROM pasar_modern where status='0' and tahun='$thn'");
		
		return $hasil;
	}

	function hapus_pasar_modern($no){
		$status=1;
		$hasil=$this->db->query("UPDATE pasar_modern SET status='$status' WHERE id='$no'");
		return $hasil;
	}

	public function grafik_perbandingan_pasar_modernx($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, tahun,sum(indomart) as indomart, sum(alfamart) as alfamart from pasar_modern where status='0' and tahun between '$tahun1' and '$tahun2' group by tahun");
		return $hsl;  
	}


	public function simpan_barang($kecamatan, $indomart, $alfamart, $tahun, $penginput){
		$jumlah=0;
		$jumlah=$indomart+$alfamart;
		$hasil=$this->db->query("INSERT INTO pasar_modern 
			(id, kecamatan, indomart, alfamart, jumlah, tahun, penginput) 
			VALUES 
			('', '$kecamatan', '$indomart','$alfamart', '$jumlah', '$tahun','$penginput')");
		return $hasil;
	} 
	public function tampil_kecamatan(){
		$hasil=$this->db->query("SELECT * FROM master_kecamatan");
		return $hasil;
	}

	public function tampil_tahun(){
		$hasil=$this->db->query("SELECT * FROM pasar_modern WHERE status='0' GROUP BY tahun order by tahun");
		return $hasil;
	}

	public function tampil_tahunmax(){
		$hasil=$this->db->query("SELECT max(tahun) as tahun FROM pasar_modern WHERE status='0' order by tahun");
		return $hasil;
	}

		public function grafik_perbandingan_pasar_modern(){
			$hasil=$this->db->query("SELECT SUM(indomart) as indomart, SUM(alfamart) as alfamart from pasar_modern where status='0' group by tahun desc");
		return $hasil;
	}

	function ubah_pasar_modern($no, $kecamatan, $indomart, $alfamart, $tahun, $penginput){
		$jumlah=0;
		$jumlah=$indomart+$alfamart;
		$hasil=$this->db->query("UPDATE pasar_modern SET kecamatan='$kecamatan', 
		indomart='$indomart', alfamart='$alfamart', jumlah='$jumlah',
		tahun='$tahun', penginput='$penginput' where id='$no'");
		return $hasil;
	}

}
?>