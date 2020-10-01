<?php 
class m_ekspor_komoditi extends CI_Model
{

	public function tampil_ekspor_komoditi($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hasil=$this->db->query("SELECT * FROM ekspor_komoditi where status='0'");
		}else{
		$hasil=$this->db->query("SELECT * FROM ekspor_komoditi where status='0' and tahun='$thn'");
		}
		return $hasil;
	}

	public function grafik_perbandingan_ekspor_komoditix($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, tahun,sum(volume_ekspor) as volume_ekspor, sum(nilai_ekspor) as nilai_ekspor from ekspor_komoditi where status='0' and tahun between '$tahun1' and '$tahun2' group by tahun");
		return $hsl;  
	}

	function hapus_ekspor_komoditi($no){
		$status=1;
		$hasil=$this->db->query("UPDATE ekspor_komoditi SET status='$status' WHERE id='$no'");
		return $hasil;
	}

	public function simpan_ekspor_komoditi($jenis, $volum, $nilai, $tahun, $penginput){

		$hasil=$this->db->query("INSERT INTO ekspor_komoditi 
			(id, jenis_komoditi, volume_ekspor, nilai_ekspor, tahun, penginput) 
			VALUES 
			('', '$jenis', '$volum','$nilai', '$tahun','$penginput')");
		return $hasil;
	} 

		public function tampil_tahun(){
		$hasil=$this->db->query("SELECT * FROM ekspor_komoditi WHERE status='0' GROUP BY tahun order by tahun");
		return $hasil;
	}
		public function tampil_tahunmax(){
		$hasil=$this->db->query("SELECT max(tahun) as tahun FROM ekspor_komoditi WHERE status='0' GROUP BY tahun order by tahun");
		return $hasil;
	}
	public function tampil_tahunmin(){
		$hasil=$this->db->query("SELECT max(tahun-1) as tahun FROM ekspor_komoditi WHERE status='0' GROUP BY tahun order by tahun");
		return $hasil;
	}

	public function tampil_jumlahmax($tahun){
		$hasil=$this->db->query("SELECT sum(volume_ekspor+nilai_ekspor) as jumlah from ekspor_komoditi where tahun='$tahun' AND status='0'");
		return $hasil;
	}
	public function tampil_jumlahmin($tahun){
		$hasil=$this->db->query("SELECT sum(volume_ekspor+nilai_ekspor) as jumlah from ekspor_komoditi where tahun='$tahun' AND status='0'");
		return $hasil;
	}

	function ubah_ekspor_komoditi($no, $jenis, $volum, $nilai, $tahun, $penginput){

		$hasil=$this->db->query("UPDATE ekspor_komoditi SET jenis_komoditi='$jenis', volume_ekspor='$volum', nilai_ekspor='$nilai', tahun='$tahun', penginput='$penginput' where id='$no'");
		return $hasil;
	}

}
?>