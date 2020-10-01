<?php 
class m_produksi_daging extends CI_Model
{

	public function tampil_produksi_daging($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hasil=$this->db->query("SELECT * FROM produksi_daging where status='0'");
		}else{
		$hasil=$this->db->query("SELECT * FROM produksi_daging where status='0' and tahun='$thn'");
		}
		return $hasil;
	}


	function hapus_produksi_daging($no){
		$status=1;
		$hasil=$this->db->query("UPDATE produksi_daging SET status='$status' WHERE id='$no'");
		return $hasil;
	}

	public function simpan_produksi_daging($jenis_daging, $satuan, $total_produksi, $tahun, $penginput){

		$hasil=$this->db->query("INSERT INTO produksi_daging 
			(id, jenis_daging, satuan, total_produksi,tahun, penginput) 
			VALUES 
			('', '$jenis_daging', '$satuan','$total_produksi','$tahun','$penginput')");
		return $hasil;
	} 

	public function grafik_perbandingan_industri_kecilx($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, tahun,sum(jumlah_unit_produksi) as jumlah_unit_produksi, sum(jumlah_tenaga_kerja) as jumlah_tenaga_kerja from produksi_daging where status='0' and tahun between '$tahun1' and '$tahun2' group by tahun");
		return $hsl;  
	}


	public function tampil_tahun(){
		$hasil=$this->db->query("SELECT * FROM produksi_daging WHERE status='0' GROUP BY tahun");
		return $hasil;
	}

	public function tampil_daging(){
		$hasil=$this->db->query("SELECT * FROM master_daging");
		return $hasil;
	}


	function ubah_produksi_daging($no, $jenis_daging, $satuan, $total_produksi, $tahun, $penginput){

		$hasil=$this->db->query("UPDATE  produksi_daging SET jenis_daging='$jenis_daging', satuan='$satuan', total_produksi='$total_produksi', tahun='$tahun', penginput='$penginput' where id='$no'");
		return $hasil;
	}

	public function tahun_crosstab(){
		$hsl=$this->db->query("SELECT DISTINCT jenis_daging, total_produksi, tahun FROM produksi_daging where status='0'");
		return $hsl;
	}
	public function tampil_dagingc(){
		$hsl=$this->db->query("SELECT DISTINCT jenis_daging from produksi_daging where status='0'");
		return $hsl;
	}
	public function tampil_periodec($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT tahun from produksi_daging where status='0' and tahun BETWEEN '$tahun1' and '$tahun2'");
		return $hsl;
	}
	public function tampil_jumlahc($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT sum(total_produksi) as total_produksi, tahun FROM produksi_daging where status='0' and tahun BETWEEN '$tahun1' and '$tahun2' GROUP BY tahun");
		return $hsl;
	}

}
?>