<?php 
class m_perusahaan_klasifikasi extends CI_Model
{

	public function tampil_perusahaan_klasifikasi($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hasil=$this->db->query("SELECT * FROM perusahaan_klasifikasi where status='0'");
		}else{
		$hasil=$this->db->query("SELECT * FROM perusahaan_klasifikasi where status='0' and tahun='$thn'");
		}
		return $hasil;
	}


	function hapus_perusahaan_klasifikasi($no){
		$status=1;
		$hasil=$this->db->query("UPDATE perusahaan_klasifikasi SET status='$status' WHERE id='$no'");
		return $hasil;
	}

	public function simpan_perusahaan_klasifikasi($nama_klasifikasi, $jumlah_perusahaan, $tahun, $penginput){

		$hasil=$this->db->query("INSERT INTO perusahaan_klasifikasi 
			(id, nama_klasifikasi, jumlah_perusahaan, tahun, penginput) 
			VALUES 
			('', '$nama_klasifikasi', '$jumlah_perusahaan','$tahun','$penginput')");
		return $hasil;
	} 

	public function grafik_perbandingan_perusahaan_klasifikasix($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, tahun,sum(jumlah_perusahaan) as jumlah_perusahaan from perusahaan_klasifikasi where status='0' and tahun between '$tahun1' and '$tahun2' group by tahun");
		return $hsl;  
	}


	public function tampil_tahun(){
		$hasil=$this->db->query("SELECT * FROM perusahaan_klasifikasi WHERE status='0' GROUP BY tahun order by tahun");
		return $hasil;
	}

	public function tampil_klasifikasi(){
		$hasil=$this->db->query("SELECT * FROM master_klasifikasi");
		return $hasil;
	}


	function ubah_perusahaan_klasifikasi($no, $nama_klasifikasi, $jumlah_perusahaan, $tahun, $penginput){

		$hasil=$this->db->query("UPDATE  perusahaan_klasifikasi SET nama_klasifikasi='$nama_klasifikasi', jumlah_perusahaan='$jumlah_perusahaan', tahun='$tahun' , penginput='$penginput' where id='$no'");
		return $hasil;
	}

	public function tahun_crosstab(){
		$hsl=$this->db->query("SELECT DISTINCT nama_klasifikasi, jumlah_perusahaan, tahun FROM perusahaan_klasifikasi where status='0'");
		return $hsl;
	}
	public function tampil_klasifikasic(){
		$hsl=$this->db->query("SELECT DISTINCT nama_klasifikasi from perusahaan_klasifikasi where status='0'");
		return $hsl;
	}
	public function tampil_periodec($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT tahun from perusahaan_klasifikasi where status='0' and tahun BETWEEN '$tahun1' and '$tahun2'");
		return $hsl;
	}
	public function tampil_jumlahc($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT sum(jumlah_perusahaan) as jumlah_perusahaan, tahun FROM perusahaan_klasifikasi where status='0' and tahun BETWEEN '$tahun1' and '$tahun2' GROUP BY tahun");
		return $hsl;
	}

}
?>