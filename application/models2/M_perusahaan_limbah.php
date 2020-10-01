<?php 
class M_perusahaan_limbah extends CI_Model
{

	public function tampil_perusahaan_limbah($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hasil=$this->db->query("SELECT * FROM perusahaan_limbah where status='0'");
		}else{
		$hasil=$this->db->query("SELECT * FROM perusahaan_limbah where status='0' and tahun='$thn'");
		}
		return $hasil;
	}
	public function tampil_perusahaan_limbahx($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hasil=$this->db->query("SELECT sum(memiliki_limbah) as memiliki_limbah, sum(tidak_memiliki_limbah) as tidak_memiliki_limbah,sum(jumlah) as jumlah, tahun FROM perusahaan_limbah where status='0' GROUP BY tahun");
		}else{
		$hasil=$this->db->query("SELECT sum(memiliki_limbah) as memiliki_limbah, sum(tidak_memiliki_limbah) as tidak_memiliki_limbah,sum(jumlah) as jumlah, tahun FROM perusahaan_limbah where status='0' and tahun='$thn' GROUP BY tahun ");
		}
		return $hasil;
	}
	public function tampil_grafik($tahun){
	
		$hasil=$this->db->query("SELECT kecamatan, sum(memiliki_limbah) as memiliki_limbah, sum(tidak_memiliki_limbah) as tidak_memiliki_limbah,sum(jumlah) as jumlah, tahun FROM perusahaan_limbah where status='0' and tahun='$tahun' GROUP BY tahun, kecamatan
 ");
		
		return $hasil;
	}
	
	function hapus_perusahaan_limbah($no){
		$status=1;
		$hasil=$this->db->query("UPDATE perusahaan_limbah SET status='$status' WHERE id='$no'");
		return $hasil;
	}

	public function grafik_perbandingan_perusahaan_limbahx($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, kecamatan, tahun,sum(memiliki_limbah) as memiliki_limbah, sum(tidak_memiliki_limbah) as tidak_memiliki_limbah from perusahaan_limbah where status='0' and tahun between '$tahun1' and '$tahun2' group by tahun");
		return $hsl;  
	}


	public function simpan_barang($kecamatan, $memiliki_limbah, $tidak_memiliki_limbah, $tahun, $penginput){
		$jumlah=0;
		$jumlah=$memiliki_limbah+$tidak_memiliki_limbah;
		$hasil=$this->db->query("INSERT INTO perusahaan_limbah 
			(id, kecamatan, memiliki_limbah, tidak_memiliki_limbah, jumlah, tahun, penginput) 
			VALUES 
			('', '$kecamatan', '$memiliki_limbah','$tidak_memiliki_limbah','$jumlah', '$tahun','$penginput')");
		return $hasil;
	} 

	public function tampil_tahun(){
		$hasil=$this->db->query("SELECT * FROM perusahaan_limbah WHERE status='0' GROUP BY tahun");
		return $hasil;
	}

	public function tampil_kecamatan(){
		$hasil=$this->db->query("SELECT * FROM master_kecamatan");
		return $hasil;
	}

		public function grafik_perbandingan_pasar_modern(){
			$hasil=$this->db->query("SELECT SUM(indomart) as indomart, SUM(alfamart) as alfamart from perusahaan_limbah where status='0' group by tahun desc");
		return $hasil;
	}

	function ubah_perusahaan_limbah($no, $kecamatan, $memiliki_limbah, $tidak_memiliki_limbah, $tahun, $penginput){
		$jumlah=0;
		$jumlah=$memiliki_limbah+$tidak_memiliki_limbah;
		$hasil=$this->db->query("UPDATE perusahaan_limbah SET kecamatan='$kecamatan', 
		memiliki_limbah='$memiliki_limbah', tidak_memiliki_limbah='$tidak_memiliki_limbah', jumlah='$jumlah',
		tahun='$tahun', penginput='$penginput' where id='$no'");
		return $hasil;
	}

}
?>