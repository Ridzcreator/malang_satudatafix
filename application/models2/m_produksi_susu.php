<?php 
class m_produksi_susu extends CI_Model
{

	public function tampil_produksi_susu($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hasil=$this->db->query("SELECT * FROM produksi_susu where status='0'");
		}else{
		$hasil=$this->db->query("SELECT * FROM produksi_susu where status='0' and tahun='$thn'");
		}
		return $hasil;
	}


	function hapus_produksi_susu($no){
		$status=1;
		$hasil=$this->db->query("UPDATE produksi_susu SET status='$status' WHERE id='$no'");
		return $hasil;
	}

	public function simpan_produksi_susu($jenis_susu_hewan, $satuan, $total_produksi, $tahun, $penginput){

		$hasil=$this->db->query("INSERT INTO produksi_susu 
			(id, jenis_susu_hewan, satuan, total_produksi,tahun, penginput) 
			VALUES 
			('', '$jenis_susu_hewan', '$satuan','$total_produksi','$tahun','$penginput')");
		return $hasil;
	} 

	public function grafik_perbandingan_industri_kecilx($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, tahun,sum(jumlah_unit_produksi) as jumlah_unit_produksi, sum(jumlah_tenaga_kerja) as jumlah_tenaga_kerja from produksi_susu where status='0' and tahun between '$tahun1' and '$tahun2' group by tahun");
		return $hsl;  
	}


	public function tampil_tahun(){
		$hasil=$this->db->query("SELECT * FROM produksi_susu WHERE status='0' GROUP BY tahun");
		return $hasil;
	}

	public function tampil_susu(){
		$hasil=$this->db->query("SELECT * FROM master_susu");
		return $hasil;
	}


	function ubah_produksi_susu($no, $jenis_susu_hewan, $satuan, $total_produksi, $tahun, $penginput){

		$hasil=$this->db->query("UPDATE  produksi_susu SET jenis_susu_hewan='$jenis_susu_hewan', satuan='$satuan', total_produksi='$total_produksi', tahun='$tahun', penginput='$penginput' where id='$no'");
		return $hasil;
	}

	public function tahun_crosstab(){
		$hsl=$this->db->query("SELECT DISTINCT jenis_susu_hewan, total_produksi, tahun FROM produksi_susu where status='0'");
		return $hsl;
	}
	public function tampil_susuc(){
		$hsl=$this->db->query("SELECT DISTINCT jenis_susu_hewan from produksi_susu where status='0'");
		return $hsl;
	}
	public function tampil_periodec($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT tahun from produksi_susu where status='0' and tahun BETWEEN '$tahun1' and '$tahun2'");
		return $hsl;
	}
	public function tampil_jumlahc($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT sum(total_produksi) as total_produksi, tahun FROM produksi_susu where status='0' and tahun BETWEEN '$tahun1' and '$tahun2' GROUP BY tahun");
		return $hsl;
	}

}
?>