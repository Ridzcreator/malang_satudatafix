<?php 
class m_vaksinasi_avian extends CI_Model
{

	public function tampil_vaksinasi($tahun){
		$thn=$tahun;

		if($thn=='0000'){
			$hasil=$this->db->query("SELECT id, kecamatan, sum(jumlah) as jumlah, tahun FROM vaksinasi_avian WHERE status='0' GROUP BY tahun,kecamatan ORDER BY tahun ASC");
		}else{
			$hasil=$this->db->query("SELECT id, kecamatan, sum(jumlah) as jumlah, tahun FROM vaksinasi_avian WHERE status='0' and tahun = '$thn' GROUP BY tahun,kecamatan");
		}
		return $hasil;
	}

	public function tampil_tahun(){
		$hasil=$this->db->query("SELECT * FROM vaksinasi_avian GROUP BY tahun");
		return $hasil;
	}

	public function tampil_detail_vaksinasi($page, $kcmtn){
		$hasil=$this->db->query("SELECT * FROM vaksinasi_avian WHERE status='0' AND tahun='$page' AND kecamatan='$kcmtn'");
		return $hasil;
	}

	public function tampil_kecamatan(){
		$hasil=$this->db->query("SELECT * FROM master_kecamatan ");
		return $hasil;
	}

	public function master_hewan_ternak(){
		$hasil=$this->db->query("SELECT * FROM master_hewan_ternak ");
		return $hasil;
	}

	public function simpan_vaksinasi($kecamatan, $nama_ternak, $jumlah, $tahun, $penginput){
		$hasil=$this->db->query("INSERT INTO vaksinasi_avian
			(id, kecamatan, nama_ternak, jumlah, tahun, penginput) 
			VALUES 
			('', '$kecamatan', '$nama_ternak', '$jumlah', '$tahun', '$penginput')");
		return $hasil;
	}

	public function ubah_vaksinasi($id, $kecamatan, $nama_ternak, $jumlah, $tahun, $penginput){
		$hasil=$this->db->query("UPDATE vaksinasi_avian 
			SET kecamatan='$kecamatan', nama_ternak='$nama_ternak', jumlah='$jumlah', tahun='$tahun', penginput='$penginput' where id='$id' ");
		return $hasil;
	}

	public function proses_hapus_vaksinasi($id){
		$status=1;
		$hasil=$this->db->query("UPDATE vaksinasi_avian SET status='$status' where id='$id'");
		return $hasil;
	}

	// public function tampil_data_wisatawan_menginap($id){
	// 	$hasil=$this->db->query("SELECT * FROM vaksinasi_avian WHERE status='0' AND jenis_wisatawan='wisatawan_menginap'");
	// 	return $hasil;
	// }

	// public function crosstab_wisatawan_menginap($id){
	// 	$hasil=$this->db->query("SELECT * FROM vaksinasi_avian WHERE status='0' AND jenis_wisatawan='wisatawan_menginap'");
	// 	return $hasil;
	// }

	public function data_crosstab($kecam){
		$hsl=$this->db->query("SELECT DISTINCT nama_ternak, kecamatan, tahun, jumlah FROM vaksinasi_avian WHERE status='0' AND kecamatan='$kecam'");
		return $hsl;
	}
	public function tampil_bulanc($kecam){
		$hsl=$this->db->query("SELECT DISTINCT nama_ternak FROM vaksinasi_avian WHERE status='0' AND kecamatan='$kecam'");
		return $hsl;
	}
	public function tampil_periodec($tahun1,$tahun2,$kecam){
		$hsl=$this->db->query("SELECT DISTINCT tahun, kecamatan FROM vaksinasi_avian WHERE status=0 AND kecamatan='$kecam' AND tahun BETWEEN '$tahun1' and '$tahun2' order by tahun");
		return $hsl;
	}
	public function tampil_jumlahc($tahun1,$tahun2,$kecam){
		$hsl=$this->db->query("SELECT DISTINCT id, tahun, kecamatan, sum(jumlah) as jumlah, nama_ternak FROM vaksinasi_avian WHERE status='0' AND kecamatan='$kecam' AND tahun BETWEEN '$tahun1' AND '$tahun2' GROUP BY tahun");
		return $hsl;
	}
	public function tampil_kecam(){
		$hsl=$this->db->query("SELECT DISTINCT kecamatan FROM vaksinasi_avian WHERE status='0' ");
		return $hsl;
	}


}
?>