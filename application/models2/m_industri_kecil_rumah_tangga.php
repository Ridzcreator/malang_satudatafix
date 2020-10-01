<?php 
class m_industri_kecil_rumah_tangga extends CI_Model
{

	public function tampil_industri_kecil($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hasil=$this->db->query("SELECT * FROM industri_kecil_rumah_tangga where status='0' and kategori='Industri Kecil'");
		}else{
		$hasil=$this->db->query("SELECT * FROM industri_kecil_rumah_tangga where status='0' and tahun='$thn' and kategori='Industri Kecil'");
		}
		return $hasil;
	}

	public function tampil_industri_rumah_tangga($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hasil=$this->db->query("SELECT * FROM industri_kecil_rumah_tangga where status='0' and kategori='Industri Rumah Tangga'");
		}else{
		$hasil=$this->db->query("SELECT * FROM industri_kecil_rumah_tangga where status='0' and tahun='$thn' and kategori='Industri Rumah Tangga'");
		}
		return $hasil;
	}

	function hapus_industri_kecil_rumah_tangga($no){
		$status=1;
		$hasil=$this->db->query("UPDATE industri_kecil_rumah_tangga SET status='$status' WHERE id='$no'");
		return $hasil;
	}

	public function simpan_industri_kecil($jenis, $j_unit, $j_tenaga, $j_produksi, $nilai_produksi, $tahun, $penginput, $kategori){

		$hasil=$this->db->query("INSERT INTO industri_kecil_rumah_tangga 
			(id, jenis_industri, jumlah_unit_produksi, jumlah_tenaga_kerja, jumlah_produksi, nilai_produksi,tahun, penginput, kategori) 
			VALUES 
			('', '$jenis', '$j_unit','$j_tenaga', '$j_produksi','$nilai_produksi','$tahun','$penginput','$kategori')");
		return $hasil;
	} 

	public function grafik_perbandingan_industri_kecilx($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, tahun,sum(jumlah_unit_produksi) as jumlah_unit_produksi, sum(jumlah_tenaga_kerja) as jumlah_tenaga_kerja from industri_kecil_rumah_tangga where status='0' and kategori='Industri Kecil' and tahun between '$tahun1' and '$tahun2' group by tahun");
		return $hsl;  
	}

	public function grafik_perbandingan_industri_rumah_tanggax($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, tahun,sum(jumlah_unit_produksi) as jumlah_unit_produksi, sum(jumlah_tenaga_kerja) as jumlah_tenaga_kerja from industri_kecil_rumah_tangga where status='0' and kategori='Industri Rumah Tangga' and tahun between '$tahun1' and '$tahun2' group by tahun");
		return $hsl;  
	}

		public function tampil_tahun_kecil(){
		$hasil=$this->db->query("SELECT * FROM industri_kecil_rumah_tangga WHERE kategori='Industri Kecil' and status='0' GROUP BY tahun order by tahun");
		return $hasil;
	}

	public function tampil_tahun_rumah(){
		$hasil=$this->db->query("SELECT * FROM industri_kecil_rumah_tangga WHERE kategori='Industri Rumah Tangga' and status='0' GROUP BY tahun order by tahun");
		return $hasil;
	}

	public function tampil_industri(){
		$hasil=$this->db->query("SELECT * FROM master_jenis_industri");
		return $hasil;
	}


	function ubah_industri_kecil($no, $jenis, $j_unit, $j_tenaga, $j_produksi, $nilai_produksi , $tahun , $penginput, $kategori){

		$hasil=$this->db->query("UPDATE  industri_kecil_rumah_tangga SET jenis_industri='$jenis', jumlah_unit_produksi='$j_unit', jumlah_tenaga_kerja='$j_tenaga', jumlah_produksi='$j_produksi', nilai_produksi='$nilai_produksi', tahun='$tahun' , penginput='$penginput', kategori='$kategori' where id='$no'");
		return $hasil;
	}

}
?>