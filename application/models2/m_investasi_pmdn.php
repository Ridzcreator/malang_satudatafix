<?php 
class m_investasi_pmdn extends CI_Model
{

	public function tampil_investasi_pmdn($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hasil=$this->db->query("SELECT * FROM investasi_pmdn where status='0'");
		}else{
		$hasil=$this->db->query("SELECT * FROM investasi_pmdn where status='0' and tahun='$thn'");
		}
		return $hasil;
	}


	function hapus_investasi_pmdn($no){
		$status=1;
		$hasil=$this->db->query("UPDATE investasi_pmdn SET status='$status' WHERE id='$no'");
		return $hasil;
	}

	public function grafik_perbandingan_investasi_pmdnx($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, tahun,sum(unit_usaha) as unit_usaha,sum(realisasi_investasi) as realisasi_investasi, sum(tenaga_kerja_indonesia) as tenaga_kerja_indonesia from investasi_pmdn where status='0' and tahun between '$tahun1' and '$tahun2' group by tahun");
		return $hsl;  
	}

	public function simpan_investasi_pmdn($nama_bidang, $unit_usaha, $realisasi_investasi, $tenaga_kerja_indonesia, $sumber_data , $tahun , $penginput){

		$hasil=$this->db->query("INSERT INTO investasi_pmdn 
			(id, nama_bidang, unit_usaha, realisasi_investasi, tenaga_kerja_indonesia, sumber_data,tahun, penginput) 
			VALUES 
			('', '$nama_bidang', '$unit_usaha','$realisasi_investasi', '$tenaga_kerja_indonesia','$sumber_data','$tahun','$penginput')");
		return $hasil;
	} 

		public function tampil_tahun(){
		$hasil=$this->db->query("SELECT * FROM investasi_pmdn GROUP BY tahun order by tahun");
		return $hasil;
	}

	public function tampil_bidang_usaha(){
		$hasil=$this->db->query("SELECT * FROM master_bidang_usaha");
		return $hasil;
	}


	function ubah_investasi_pmdn($no,$nama_bidang, $unit_usaha, $realisasi_investasi, $tenaga_kerja_indonesia, $sumber_data , $tahun , $penginput){

		$hasil=$this->db->query("UPDATE  investasi_pmdn SET nama_bidang='$nama_bidang', unit_usaha='$unit_usaha', realisasi_investasi='$realisasi_investasi', tenaga_kerja_indonesia='$tenaga_kerja_indonesia', sumber_data='$sumber_data', tahun='$tahun' , penginput='$penginput' where id='$no'");
		return $hasil;
	}

}
?>