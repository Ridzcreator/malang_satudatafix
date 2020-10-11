<?php 
class m_wisatawan extends CI_Model
{

	public function tampil_wisatawan_datang($tahun){
		$thn=$tahun;
		if($thn=='0000'){
			$hasil=$this->db->query("SELECT id, tahun, penginput, sum(domestik) as domestik, sum(mancanegara) as mancanegara, sum(jumlah) as jumlah FROM detail_wisatawan WHERE status='0' AND jenis_wisatawan='wisatawan_datang' GROUP BY tahun");
		}else{
			$hasil=$this->db->query("SELECT id, tahun, penginput, sum(domestik) as domestik, sum(mancanegara) as mancanegara, sum(jumlah) as jumlah FROM detail_wisatawan WHERE status='0' and tahun='$thn' AND jenis_wisatawan='wisatawan_datang'");
		}
		return $hasil;
	}

	public function grafik_perbandingan_datang($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, tahun, penginput, sum(domestik) as domestik, sum(mancanegara) as mancanegara, sum(jumlah) as jumlah FROM detail_wisatawan WHERE status='0' and tahun BETWEEN '$tahun1' AND '$tahun2' AND jenis_wisatawan='wisatawan_datang' GROUP BY tahun");	
		return $hsl;  
	}

	public function tampil_grafik($tahun){
		$hsl=$this->db->query("SELECT * FROM detail_wisatawan where status='0' and tahun='$tahun' AND jenis_wisatawan='wisatawan_datang'");	
		return $hsl;  
	}


	public function tampil_detail_wisatawan_datang($id){
		$hasil=$this->db->query("SELECT * FROM detail_wisatawan WHERE status='0' AND tahun='$id' AND jenis_wisatawan='wisatawan_datang'");
		return $hasil;
	}

	public function tampil_wisatawan_menginap(){
		$hasil=$this->db->query("SELECT * FROM detail_wisatawan");
		return $hasil;
	}

	public function tampil_bulan(){
		$hasil=$this->db->query("SELECT * FROM master_bulan");
		return $hasil;
	}

	public function tampil_tahunmax(){
		$hasil=$this->db->query("SELECT max(tahun) as tahun FROM detail_wisatawan WHERE jenis_wisatawan='wisatawan_datang' AND status=0 GROUP BY tahun");
		return $hasil;
	}
	public function tampil_tahun(){
		$hasil=$this->db->query("SELECT * FROM detail_wisatawan WHERE jenis_wisatawan='wisatawan_datang' AND status=0 GROUP BY tahun");
		return $hasil;
	}




	function proses_ubah_wisatawan_datang($id, $bulan, $tahun, $domestik, $mancanegara, $penginput, $jenis_wisatawan){
		$jumlah=0;
		$jumlah=$domestik+$mancanegara;
		$hasil=$this->db->query("UPDATE detail_wisatawan 
			SET bulan='$bulan', tahun='$tahun', domestik='$domestik', mancanegara='$mancanegara', jumlah='$jumlah', penginput='$penginput', jenis_wisatawan='$jenis_wisatawan' where id='$id'");
		return $hasil;
	}

	function proses_hapus_wisatawan_datang($id){
		$status=1;
		$hasil=$this->db->query("UPDATE detail_wisatawan SET status='$status' where id='$id'");
		return $hasil;
	}

	public function simpan_wisatawan_datang($bulan, $tahun, $domestik, $mancanegara, $penginput, $jenis_wisatawan){
		$jumlah=0;
		$jumlah=$domestik+$mancanegara;
		$hasil=$this->db->query("INSERT INTO detail_wisatawan
			(id, bulan, tahun, domestik, mancanegara, jumlah, penginput, jenis_wisatawan) 
			VALUES 
			('', '$bulan', '$tahun', '$domestik', '$mancanegara', '$jumlah', '$penginput', '$jenis_wisatawan')");
		return $hasil;
	}

	public function simpan_wisatawan($bulan, $tahun, $domestik, $mancanegara, $penginput, $jenis_wisatawan){
		$jumlah=0;
		$jumlah=$domestik+$mancanegara;
		$hasil=$this->db->query("INSERT INTO detail_wisatawan
			(id, bulan, tahun, domestik, mancanegara, jumlah, penginput, jenis_wisatawan) 
			VALUES 
			('', '$bulan', '$tahun', '$domestik', '$mancanegara', '$jumlah', '$penginput', '$jenis_wisatawan')");
		return $hasil;
	}

	public function tampil_data_wisatawan_datang($id){
		$hasil=$this->db->query("SELECT * FROM detail_wisatawan WHERE status='0' AND jenis_wisatawan='wisatawan_datang'");
		return $hasil;
	}


	public function data_crosstab(){
		$hsl=$this->db->query("SELECT DISTINCT bulan, tahun, domestik, mancanegara, jumlah FROM detail_wisatawan WHERE status='0' AND jenis_wisatawan='wisatawan_datang'");
		return $hsl;
	}
	public function tampil_bulanc(){
		$hsl=$this->db->query("SELECT DISTINCT bulan FROM detail_wisatawan WHERE status='0' AND jenis_wisatawan='wisatawan_datang'");
		return $hsl;
	}
	public function tampil_periodec($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT tahun FROM detail_wisatawan WHERE status='0' AND jenis_wisatawan='wisatawan_datang' AND tahun BETWEEN '$tahun1' and '$tahun2' order by tahun");
		return $hsl;
	}
	public function tampil_jumlahc($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT sum(domestik) as domestik, sum(mancanegara) as mancanegara, sum(jumlah) as jumlah, bulan, tahun FROM detail_wisatawan WHERE status='0' and jenis_wisatawan='wisatawan_datang' AND tahun BETWEEN '$tahun1' AND '$tahun2' GROUP BY tahun");
		return $hsl;
	}

	
	
}
?>