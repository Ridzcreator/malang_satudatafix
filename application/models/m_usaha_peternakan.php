<?php 
class m_usaha_peternakan extends CI_Model
{

	public function tampil_usaha($tahun){
		$thn=$tahun;
		if($thn=='0000'){
			$hasil=$this->db->query("SELECT id, tahun, kecamatan, sum(hewan_besar) as hewan_besar, sum(hewan_kecil) as hewan_kecil, sum(unggas) as unggas FROM usaha_peternakan WHERE status='0' GROUP BY tahun");
		}else{
			$hasil=$this->db->query("SELECT id, tahun, kecamatan, sum(hewan_besar) as hewan_besar, sum(hewan_kecil) as hewan_kecil, sum(unggas) as unggas FROM usaha_peternakan WHERE status='0' and tahun='$thn' ");
		}
		return $hasil;
	}

	public function tampil_tahun(){
		$hasil=$this->db->query("SELECT tahun FROM usaha_peternakan WHERE status=0 GROUP BY tahun");
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

	public function grafik_perbandingan_peternakan($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, tahun, penginput, sum(hewan_kecil) as hewan_kecil, sum(hewan_besar) as hewan_besar, sum(unggas) as unggas FROM usaha_peternakan WHERE status='0' and tahun BETWEEN '$tahun1' AND '$tahun2' GROUP BY tahun");	
		return $hsl;  
	}

	public function tampil_grafik($tahun){
		$hsl=$this->db->query("SELECT id, kecamatan, tahun, hewan_kecil, hewan_besar, unggas, jumlah FROM usaha_peternakan where status='0' and tahun='$tahun'");	
		return $hsl;  
	}

	public function simpan_peternakan($kecamatan, $desa, $tahun, $hewan_besar, $hewan_kecil, $penginput, $unggas){
		$jumlah=0;
		$jumlah=$hewan_kecil+$hewan_besar+$unggas;
		$hasil=$this->db->query("INSERT INTO usaha_peternakan
			(kecamatan, desa, hewan_besar, hewan_kecil, unggas, jumlah, tahun, penginput) 
			VALUES 
			('$kecamatan', '$desa',  '$hewan_besar', '$hewan_kecil', '$unggas', '$jumlah', '$tahun', '$penginput')");
		return $hasil;
	}

	public function tampil_detail_usaha($id){
		$hasil=$this->db->query("SELECT * FROM usaha_peternakan WHERE status='0' AND tahun='$id'");
		return $hasil;
	}

	public function proses_ubah_peternakan($id, $kecamatan, $desa, $tahun, $hewan_besar, $hewan_kecil, $penginput, $unggas, $jumlah){
		$jumlah=0;
		$jumlah=$hewan_kecil+$hewan_besar+$unggas;
		$hasil=$this->db->query("UPDATE usaha_peternakan 
			SET kecamatan='$kecamatan', desa='$desa', hewan_besar='$hewan_besar', hewan_kecil='$hewan_kecil', unggas='$unggas', jumlah='$jumlah', tahun='$tahun', penginput='$penginput' where id='$id'");
		return $hasil;
	}

	public function proses_hapus_peternakan($id){
		$status=1;
		$hasil=$this->db->query("UPDATE usaha_peternakan SET status='$status' where id='$id'");
		return $hasil;
	}


	public function data_crosstab(){
		$hsl=$this->db->query("SELECT DISTINCT kecamatan, tahun, hewan_besar, hewan_kecil, unggas FROM usaha_peternakan WHERE status='0'");
		return $hsl;
	}
	public function tampil_kecamatanc(){
		$hsl=$this->db->query("SELECT DISTINCT kecamatan FROM usaha_peternakan WHERE status='0'");
		return $hsl;
	}
	public function tampil_periodec($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT tahun FROM usaha_peternakan WHERE status=0 AND tahun BETWEEN '$tahun1' AND '$tahun2' order by tahun");
		return $hsl;
	}
	public function tampil_jumlahc($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT sum(hewan_kecil) as hewan_kecil, sum(hewan_besar) as hewan_besar, sum(unggas) as unggas, kecamatan, tahun FROM usaha_peternakan WHERE status='0' AND tahun BETWEEN '$tahun1' AND '$tahun2' GROUP BY tahun");
		return $hsl;
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


}
?>