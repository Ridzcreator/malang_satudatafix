<?php 
class M_lokasi_pencemaran extends CI_Model
{

	public function tampil_lokasi_pencemaran($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hasil=$this->db->query("SELECT * FROM lokasi_pencemaran where status='0' order by tahun desc");
		}else{
		$hasil=$this->db->query("SELECT * FROM lokasi_pencemaran where status='0' and tahun='$thn'");
		}
		return $hasil;
	}

	function hapus_lokasi_pencemaran($no){
		$status=1;
		$hasil=$this->db->query("UPDATE lokasi_pencemaran SET status='$status' WHERE id='$no'");
		return $hasil;
	}

	public function grafik_perbandingan_lokasi_pencemaranx($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, tahun,sum(jumlah_pencemaran_tanah) as jumlah_pencemaran_tanah, sum(jumlah_pencemaran_air) as jumlah_pencemaran_air, sum(jumlah_pencemaran_udara) as jumlah_pencemaran_udara from lokasi_pencemaran where status='0' and tahun between '$tahun1' and '$tahun2' group by tahun");
		return $hsl;  
	}


	public function simpan_barang($tingkat_pencemaran, $jumlah_pencemaran_tanah, $jumlah_pencemaran_air, $jumlah_pencemaran_udara, $tahun, $penginput){
		$jumlah=0;
		$jumlah=$jumlah_pencemaran_tanah+$jumlah_pencemaran_air+$jumlah_pencemaran_udara;
		$hasil=$this->db->query("INSERT INTO lokasi_pencemaran 
			(id, tingkat_pencemaran, jumlah_pencemaran_tanah, jumlah_pencemaran_air, jumlah_pencemaran_udara, jumlah, tahun, penginput) 
			VALUES 
			('', '$tingkat_pencemaran', '$jumlah_pencemaran_tanah','$jumlah_pencemaran_air',
			'$jumlah_pencemaran_udara', '$jumlah', '$tahun','$penginput')");
		return $hasil;
	} 

	public function tampil_tahun(){
		$hasil=$this->db->query("SELECT * FROM lokasi_pencemaran WHERE status='0' GROUP BY tahun order by tahun desc");
		return $hasil;
	}

		public function grafik_perbandingan_pasar_modern(){
			$hasil=$this->db->query("SELECT SUM(indomart) as indomart, SUM(alfamart) as alfamart from lokasi_pencemaran where status='0' group by tahun desc");
		return $hasil;
	}

	function ubah_lokasi_pencemaran($no, $tingkat_pencemaran, $jumlah_pencemaran_tanah, $jumlah_pencemaran_air, $jumlah_pencemaran_udara, $tahun, $penginput){
		$jumlah=0;
		$jumlah=$jumlah_pencemaran_tanah+$jumlah_pencemaran_air+$jumlah_pencemaran_udara;
		$hasil=$this->db->query("UPDATE lokasi_pencemaran SET tingkat_pencemaran='$tingkat_pencemaran', 
		jumlah_pencemaran_tanah='$jumlah_pencemaran_tanah', jumlah_pencemaran_air='$jumlah_pencemaran_air', jumlah_pencemaran_udara='$jumlah_pencemaran_udara', jumlah='$jumlah',
		tahun='$tahun', penginput='$penginput' where id='$no'");
		return $hasil;
	}

}
?>