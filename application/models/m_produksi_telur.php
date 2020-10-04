<?php 
class m_produksi_telur extends CI_Model
{

	public function tampil_produksi_telur($tahun){
		$thn=$tahun;
		if($thn=='0000'){
			$hasil=$this->db->query("SELECT id, tahun, kecamatan,  sum(per_kg) as per_kg, sum(per_butir) as per_butir FROM produksi_telur WHERE status='0' GROUP BY tahun,kecamatan, desa ORDER BY tahun ASC");
		}else{
			$hasil=$this->db->query("SELECT id, tahun, kecamatan, sum(per_kg) as per_kg, sum(per_butir) as per_butir FROM produksi_telur WHERE status='0' and tahun='$thn' GROUP BY tahun,kecamatan, desa ");
		}
		return $hasil;
	}

	// public function grafik_perbandingan_perempuankkx($tahun2, $tahun1){
	// 	$hsl=$this->db->query("SELECT id, tahun, penginput, sum(per_butir) as per_butir, sum(per_kg) as per_kg, sum(jumlah) as jumlah FROM produksi_telur WHERE status='0' and tahun BETWEEN '$tahun1' AND '$tahun2' AND jenis_wisatawan='produksi_telur' GROUP BY tahun");	
	// 	return $hsl;  
	// }

	// public function tampil_grafik($tahun){
	// 	$hsl=$this->db->query("SELECT * FROM produksi_telur where status='0' and tahun='$tahun' AND jenis_wisatawan='produksi_telur'");	
	// 	return $hsl;  
	// }


	public function tampil_nama_unggas(){
		$hasil=$this->db->query("SELECT * FROM master_unggas");
		return $hasil;
	}

	public function tampil_kecamatan(){
		$hasil=$this->db->query("SELECT * FROM master_kecamatan");
		return $hasil;
	}
	public function tampil_desaku(){
		$hasil=$this->db->query("SELECT * FROM master_desa inner join master_kecamatan on master_desa.id_kecamatan = master_kecamatan.id_kecamatan");
		return $hasil;
	}

	public function tampil_desa($kecamatan){
		$hasil=$this->db->query("SELECT * FROM master_desa where id_kecamatan='$kecamatan'");
		return $hasil;
	}

	public function getNamaKecamatanWhere($where){
		$this->db->select('*');
		$this->db->from('master_kecamatan');
		$this->db->where($where);
		$query = $this->db->get();
		return $query;
	}
	public function getNamaDesaWhere($where){
		$this->db->select('*');
		$this->db->from('master_desa');
		$this->db->where($where);
		$query = $this->db->get();
		return $query;
	}

	public function tampil_tahun(){
		$hasil=$this->db->query("SELECT * FROM produksi_telur WHERE status=0 GROUP BY tahun");
		return $hasil;
	}

	public function tampil_detail_produksi_telur($page, $kcmtn){
		$hasil=$this->db->query("SELECT * FROM produksi_telur WHERE status='0' AND tahun='$page' AND kecamatan='$kcmtn'");
		return $hasil;
	}

	// public function simpan_wisatawan($bulan, $tahun, $per_butir, $per_kg, $penginput, $jenis_wisatawan){
	// 	$jumlah=0;
	// 	$jumlah=$per_butir+$per_kg;
	// 	$hasil=$this->db->query("INSERT INTO produksi_telur
	// 		(id, bulan, tahun, per_butir, per_kg, jumlah, penginput, jenis_wisatawan) 
	// 		VALUES 
	// 		('', '$bulan', '$tahun', '$per_butir', '$per_kg', '$jumlah', '$penginput', '$jenis_wisatawan')");
	// 	return $hasil;
	// }

	public function simpan_produksi_telur($kecamatan, $desa,  $nama_unggas, $tahun, $per_butir, $per_kg, $penginput){
		$jumlah=0;
		$jumlah=$per_butir+$per_kg;
		$hasil=$this->db->query("INSERT INTO produksi_telur
			(id, kecamatan, desa, hewan, tahun, per_butir, per_kg, jumlah, penginput) 
			VALUES
			('', '$kecamatan', '$desa', '$nama_unggas', '$tahun', '$per_butir', '$per_kg', '$jumlah', '$penginput')");
		return $hasil;
	}

	public function proses_ubah_produksi_telur($id, $kecamatan, $desa, $nama_unggas, $tahun, $per_butir, $per_kg, $penginput){
		$jumlah=0;
		$jumlah=$per_butir+$per_kg;
		$hasil=$this->db->query("UPDATE produksi_telur 
			SET kecamatan='$kecamatan', desa='$desa', hewan='$nama_unggas', tahun='$tahun', per_butir='$per_butir', per_kg='$per_kg', jumlah='$jumlah', penginput='$penginput' where id='$id'");
		return $hasil;
	}

	public function proses_hapus_produksi_telur($id){
		$status=1;
		$hasil=$this->db->query("UPDATE produksi_telur SET status='$status' where id='$id'");
		return $hasil;
	}

	public function grafik_perbandingan_produksi_telur($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, tahun, penginput, sum(per_butir) as per_butir, sum(per_kg) as per_kg, sum(jumlah) as jumlah FROM produksi_telur WHERE status='0' and tahun BETWEEN '$tahun1' AND '$tahun2' GROUP BY tahun");	
		return $hsl;  
	}

	// public function crosstab_produksi_telur($id){
	// 	$hasil=$this->db->query("SELECT * FROM produksi_telur WHERE status='0' AND jenis_wisatawan='produksi_telur'");
	// 	return $hasil;
	// }



	public function data_crosstab($kecam){
		$hsl=$this->db->query("SELECT DISTINCT hewan, kecamatan, tahun, per_butir, per_kg, jumlah FROM produksi_telur WHERE status='0' AND kecamatan='$kecam'");
		return $hsl;
	}
	public function tampil_bulanc($kecam){
		$hsl=$this->db->query("SELECT DISTINCT hewan FROM produksi_telur WHERE status='0' AND kecamatan='$kecam'");
		return $hsl;
	}
	public function tampil_periodec($tahun1,$tahun2,$kecam){
		$hsl=$this->db->query("SELECT DISTINCT tahun, kecamatan FROM produksi_telur WHERE status=0 AND kecamatan='$kecam' AND tahun BETWEEN '$tahun1' and '$tahun2' order by tahun");
		return $hsl;
	}
	public function tampil_jumlahc($tahun1,$tahun2,$kecam){
		$hsl=$this->db->query("SELECT DISTINCT id, tahun, kecamatan, sum(per_kg) as per_kg, sum(per_butir) as per_butir FROM produksi_telur WHERE status='0' AND kecamatan='$kecam' AND tahun BETWEEN '$tahun1' AND '$tahun2' GROUP BY tahun");
		return $hsl;
	}
	public function tampil_kecam(){
		$hsl=$this->db->query("SELECT DISTINCT kecamatan FROM produksi_telur WHERE status='0' ");
		return $hsl;
	}


}
?>
