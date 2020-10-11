<?php 
class m_ternak_dipotong extends CI_Model
{

	public function tampil_ternak_dipotong($tahun){
		$thn=$tahun;

		if($thn=='0000'){
			$hasil=$this->db->query("SELECT id, kecamatan, sum(jumlah) as jumlah, tahun FROM ternak_dipotong WHERE status='0' GROUP BY tahun,kecamatan ORDER BY tahun ASC");
		}else{
			$hasil=$this->db->query("SELECT id, kecamatan, sum(jumlah) as jumlah, tahun FROM ternak_dipotong WHERE status='0' and tahun = '$thn' GROUP BY tahun,kecamatan");
		}
		return $hasil;
	}		

	public function tampil_tahun(){
		$hasil=$this->db->query("SELECT * FROM ternak_dipotong GROUP BY tahun");
		return $hasil;
	}

	public function tampil_detail_ternak_dipotong($page, $kcmtn){
		$hasil=$this->db->query("SELECT * FROM ternak_dipotong WHERE status='0' AND tahun='$page' AND kecamatan='$kcmtn'");
		return $hasil;
	}

	public function tampil_kecamatan(){
		$hasil=$this->db->query("SELECT * FROM master_kecamatan ");
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

	public function master_hewan_ternak(){
		$hasil=$this->db->query("SELECT * FROM master_hewan_ternak ");
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

	public function simpan_ternak_dipotong($kecamatan, $desa, $nama_ternak, $jumlah, $tahun, $penginput){
		$hasil=$this->db->query("INSERT INTO ternak_dipotong
			(kecamatan, desa, nama_ternak, jumlah, tahun, status, penginput) 
			VALUES 
			('$kecamatan', '$desa', '$nama_ternak', $jumlah, '$tahun', 0, '$penginput')");
		return $hasil;
	}

	public function ubah_ternak_dipotong($id, $kecamatan, $desa, $nama_ternak, $jumlah, $tahun, $penginput){
		$hasil=$this->db->query("UPDATE ternak_dipotong 
			SET kecamatan='$kecamatan', desa='$desa', nama_ternak='$nama_ternak', jumlah='$jumlah', tahun='$tahun', penginput='$penginput' where id='$id' ");
		return $hasil;
	}

	public function proses_hapus_ternak_dipotong($id){
		$status=1;
		$hasil=$this->db->query("UPDATE ternak_dipotong SET status='$status' where id='$id'");
		return $hasil;
	}

	// public function tampil_data_wisatawan_menginap($id){
	// 	$hasil=$this->db->query("SELECT * FROM ternak_dipotong WHERE status='0' AND jenis_wisatawan='wisatawan_menginap'");
	// 	return $hasil;
	// }

	// public function crosstab_wisatawan_menginap($id){
	// 	$hasil=$this->db->query("SELECT * FROM ternak_dipotong WHERE status='0' AND jenis_wisatawan='wisatawan_menginap'");
	// 	return $hasil;
	// }

	public function data_crosstab($kecam){
		$hsl=$this->db->query("SELECT DISTINCT nama_ternak, kecamatan, tahun, jumlah FROM ternak_dipotong WHERE status='0' AND kecamatan='$kecam'");
		return $hsl;
	}
	public function tampil_bulanc($kecam){
		$hsl=$this->db->query("SELECT DISTINCT nama_ternak FROM ternak_dipotong WHERE status='0' AND kecamatan='$kecam'");
		return $hsl;
	}
	public function tampil_periodec($tahun1,$tahun2,$kecam){
		$hsl=$this->db->query("SELECT DISTINCT tahun, kecamatan FROM ternak_dipotong WHERE status=0 AND kecamatan='$kecam' AND tahun BETWEEN '$tahun1' and '$tahun2' order by tahun");
		return $hsl;
	}
	public function tampil_jumlahc($tahun1,$tahun2,$kecam){
		$hsl=$this->db->query("SELECT DISTINCT id, tahun, kecamatan, sum(jumlah) as jumlah, nama_ternak FROM ternak_dipotong WHERE status='0' AND kecamatan='$kecam' AND tahun BETWEEN '$tahun1' AND '$tahun2' GROUP BY tahun");
		return $hsl;
	}
	public function tampil_kecam(){
		$hsl=$this->db->query("SELECT DISTINCT kecamatan FROM ternak_dipotong WHERE status='0' ");
		return $hsl;
	}

	public function tampil_grafik($tahunx, $kecam){
		$hasil=$this->db->query("SELECT id, kecamatan, jumlah, nama_ternak, tahun FROM ternak_dipotong WHERE status='0' AND tahun='$tahunx' AND kecamatan='$kecam' ");
		return $hasil;
	}


}
?>