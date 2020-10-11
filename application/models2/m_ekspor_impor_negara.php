<?php 
class m_ekspor_impor_negara extends CI_Model
{

	public function tampil_ekspor_negara($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hasil=$this->db->query("SELECT * FROM ekspor_impor_negara_tujuan_asal where status='0' and kategori='Ekspor Menurut Negara Tujuan'");
		}else{
		$hasil=$this->db->query("SELECT * FROM ekspor_impor_negara_tujuan_asal where status='0' and tahun='$thn' and kategori='Ekspor Menurut Negara Tujuan'");
		}
		return $hasil;
	}

	public function tampil_impor_negara($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hasil=$this->db->query("SELECT * FROM ekspor_impor_negara_tujuan_asal where status='0' and kategori='Impor Menurut Negara Asal'");
		}else{
		$hasil=$this->db->query("SELECT * FROM ekspor_impor_negara_tujuan_asal where status='0' and tahun='$thn' and kategori='Impor Menurut Negara Asal'");
		}
		return $hasil;
	}

	public function grafik_perbandingan_ekspor_tujuanx(){
			$hasil=$this->db->query("SELECT id, tahun, SUM(volume_ekspor_impor) as volume_ekspor_impor, SUM(nilai_ekspor_impor) as nilai_ekspor_impor from ekspor_impor_negara_tujuan_asal where status='0' and kategori='Ekspor Menurut Negara Tujuan' group by tahun desc");
		return $hasil;
	}

	public function grafik_perbandingan_impor_asalx(){
			$hasil=$this->db->query("SELECT id, tahun, SUM(volume_ekspor_impor) as volume_ekspor_impor, SUM(nilai_ekspor_impor) as nilai_ekspor_impor from ekspor_impor_negara_tujuan_asal where status='0' and kategori='Impor Menurut Negara Asal' group by tahun desc");
		return $hasil;
	}

	function hapus_ekspor_impor_negara($no){
		$status=1;
		$hasil=$this->db->query("UPDATE ekspor_impor_negara_tujuan_asal SET status='$status' WHERE id='$no'");
		return $hasil;
	}

	public function simpan_ekspor_impor_negara($negara, $volum, $nilai, $tahun, $penginput, $kategori){

		$hasil=$this->db->query("INSERT INTO ekspor_impor_negara_tujuan_asal 
			(id, nama_negara_ekspor_impor, volume_ekspor_impor, nilai_ekspor_impor, tahun, penginput, kategori) 
			VALUES 
			('', '$negara', '$volum','$nilai', '$tahun','$penginput','$kategori')");
		return $hasil;
	} 

		public function tampil_tahun_impor(){
		$hasil=$this->db->query("SELECT * FROM ekspor_impor_negara_tujuan_asal WHERE kategori='Impor Menurut Negara Asal' GROUP BY tahun order by tahun");
		return $hasil;
	}

	public function tampil_tahun_ekspor(){
		$hasil=$this->db->query("SELECT * FROM ekspor_impor_negara_tujuan_asal GROUP BY tahun order by tahun");
		return $hasil;
	}

	public function tampil_negara(){
		$hasil=$this->db->query("SELECT * FROM master_negara LIMIT 10");
		return $hasil;
	}

	function ubah_ekspor_impor_negara($no, $negara, $volum, $nilai, $tahun, $penginput, $kategori){

		$hasil=$this->db->query("UPDATE ekspor_impor_negara_tujuan_asal SET nama_negara_ekspor_impor='$negara', volume_ekspor_impor='$volum', nilai_ekspor_impor='$nilai', tahun='$tahun', penginput='$penginput', kategori='$kategori' where id='$no'");
		return $hasil;
	}

}
?>