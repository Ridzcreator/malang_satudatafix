<?php 
class m_transmigrasi extends CI_Model
{

	public function tampil_transmigrasi($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hasil=$this->db->query("SELECT * FROM transmigrasi where status='0'");
		}else{
		$hasil=$this->db->query("SELECT * FROM transmigrasi where status='0' and tahun='$thn'");
		}
		return $hasil;
	}

	public function tampil_transmigrasi_grafik_tahun_provinsi($tahunx){
		$hasil=$this->db->query("SELECT id, provinsi, tahun, sum(laki_laki) as laki_laki, sum(perempuan) as perempuan, sum(rumah_tangga) as rumah_tangga, sum(jiwa) as jiwa FROM transmigrasi where status='0' and tahun='$tahunx' group by provinsi, tahun");
		return $hasil;
	}

	public function tampil_transmigrasi_grafik_tahun_bulan($tahunx){
		$hasil=$this->db->query("SELECT id, bulan, tahun, sum(laki_laki) as laki_laki, sum(perempuan) as perempuan, sum(rumah_tangga) as rumah_tangga, sum(jiwa) as jiwa FROM transmigrasi where status='0' and tahun='$tahunx' group by bulan, tahun");
		return $hasil;
	}

	public function tampil_transmigrasi_grafik_tahun_kecamatan($tahunx){
		$hasil=$this->db->query("SELECT id, kecamatan, tahun, sum(laki_laki) as laki_laki, sum(perempuan) as perempuan, sum(rumah_tangga) as rumah_tangga, sum(jiwa) as jiwa FROM transmigrasi where status='0' and tahun='$tahunx' group by kecamatan, tahun");
		return $hasil;
	}


	function hapus_transmigrasi($no){
		$status=1;
		$hasil=$this->db->query("UPDATE transmigrasi SET status='$status' WHERE id='$no'");
		return $hasil;
	}

	public function simpan_transmigrasi($tahun, $kecamatan, $provinsi, $bulan, $laki_laki, $perempuan, $rumah_tangga, $penginput){
		$jiwa=0;
		$jiwa=$laki_laki+$perempuan;
		$hasil=$this->db->query("INSERT INTO transmigrasi 
			(id, kecamatan, provinsi, bulan, tahun, laki_laki, perempuan, rumah_tangga, jiwa, penginput) 
			VALUES 
			('', '$kecamatan','$provinsi','$bulan','$tahun','$laki_laki','$perempuan','$rumah_tangga','$jiwa','$penginput')");
		return $hasil;
	} 

	public function grafik_perbandingan_transmigrasix($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, tahun,sum(laki_laki) as laki_laki,sum(perempuan) as perempuan,sum(rumah_tangga) as rumah_tangga,sum(jiwa) as jiwa from transmigrasi where status='0' and tahun between '$tahun1' and '$tahun2' group by tahun");
		return $hsl;  
	}
	public function tampil_transmigrasix($tahun){
		$hsl=$this->db->query("SELECT sum(laki_laki+perempuan+rumah_tangga+jiwa) as jumlah FROM transmigrasi where status='0' and tahun='$tahun'");
	
		return $hsl;  
	}
	
	

	public function tampil_grafikx($tahunt){
		$hasil=$this->db->query("select sum(laki_laki) as laki, sum(perempuan) as perempuan, tahun from transmigrasi where status = 0 and tahun='$tahunt' GROUP BY tahun ");


		return $hasil;
	}
		
	public function tampil_tahun(){
		$hasil=$this->db->query("SELECT * FROM transmigrasi WHERE status='0' GROUP BY tahun order by tahun");
		return $hasil;
	}
	public function tampil_tahunmax(){
		$hasil=$this->db->query("SELECT max(tahun) as tahun FROM transmigrasi WHERE status='0' GROUP BY tahun order by tahun");
		return $hasil;
	}
	public function tampil_tahunmin(){
		$hasil=$this->db->query("SELECT max(tahun-1) as tahun FROM transmigrasi WHERE status='0' GROUP BY tahun order by tahun");
		return $hasil;
	}

	public function tampil_kecamatan(){
		$hasil=$this->db->query("SELECT * FROM master_kecamatan");
		return $hasil;
	}

	public function tampil_provinsi(){
		$hasil=$this->db->query("SELECT * FROM master_provinsi");
		return $hasil;
	}

	public function tampil_bulan(){
		$hasil=$this->db->query("SELECT * FROM master_bulan");
		return $hasil;
	}


	function ubah_transmigrasi($no, $tahun, $kecamatan, $provinsi, $bulan, $laki_laki, $perempuan, $rumah_tangga, $penginput){
		$jiwa=0;
		$jiwa=$laki_laki+$perempuan;
		$hasil=$this->db->query("UPDATE  transmigrasi SET kecamatan='$kecamatan', provinsi='$provinsi', bulan='$bulan', laki_laki='$laki_laki', perempuan='$perempuan', rumah_tangga='$rumah_tangga', jiwa='$jiwa', tahun='$tahun' , penginput='$penginput' where id='$no'");
		return $hasil;
	}

	public function tahun_crosstab_provinsi(){
		$hsl=$this->db->query("SELECT DISTINCT provinsi, SUM(laki_laki) AS laki_laki, SUM(perempuan) AS perempuan, tahun FROM transmigrasi WHERE STATUS='0' GROUP BY provinsi, tahun");
		return $hsl;
	}
	public function tampil_provinsic(){
		$hsl=$this->db->query("SELECT DISTINCT provinsi from transmigrasi where status='0'");
		return $hsl;
	}
	public function tampil_periode_provinsi($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT tahun from transmigrasi where status='0' and tahun BETWEEN '$tahun1' and '$tahun2'");
		return $hsl;
	}
	public function tampil_jumlah_provinsi($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT sum(laki_laki) as laki_laki, sum(perempuan) as perempuan, tahun FROM transmigrasi where status='0' and tahun BETWEEN '$tahun1' and '$tahun2' GROUP BY tahun");
		return $hsl;
	}

	public function tahun_crosstab_bulan(){
		$hsl=$this->db->query("SELECT DISTINCT transmigrasi.bulan, SUM(transmigrasi.rumah_tangga) AS rumah_tangga, SUM(transmigrasi.jiwa) AS jiwa, transmigrasi.tahun, master_bulan.keterangan FROM master_bulan INNER JOIN transmigrasi ON master_bulan.keterangan=transmigrasi.bulan WHERE transmigrasi.status=0 GROUP BY transmigrasi.bulan, transmigrasi.tahun ORDER BY master_bulan.kode");
		return $hsl;
	}
	public function tampil_bulanc(){
		$hsl=$this->db->query("SELECT DISTINCT master_bulan.keterangan FROM master_bulan INNER JOIN transmigrasi ON master_bulan.keterangan=transmigrasi.bulan 
			WHERE transmigrasi.status=0 ORDER BY master_bulan.kode");
		return $hsl;
	}
	public function tampil_periode_bulan($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT tahun from transmigrasi where status='0' and tahun BETWEEN '$tahun1' and '$tahun2'");
		return $hsl;
	}
	public function tampil_jumlah_bulan($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT sum(rumah_tangga) as rumah_tangga, sum(jiwa) as jiwa, tahun FROM transmigrasi where status='0' and tahun BETWEEN '$tahun1' and '$tahun2' GROUP BY tahun");
		return $hsl;
	}	

	public function tahun_crosstab_kecamatan(){
		$hsl=$this->db->query("SELECT DISTINCT kecamatan, SUM(rumah_tangga) AS rumah_tangga, SUM(jiwa) AS jiwa, tahun FROM transmigrasi WHERE STATUS='0' GROUP BY bulan, tahun");
		return $hsl;
	}
	public function tampil_kecamatanc(){
		$hsl=$this->db->query("SELECT DISTINCT kecamatan from transmigrasi where status='0'");
		return $hsl;
	}
	public function tampil_periode_kecamatan($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT tahun from transmigrasi where status='0' and tahun BETWEEN '$tahun1' and '$tahun2'");
		return $hsl;
	}
	public function tampil_jumlah_kecamatan($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT sum(rumah_tangga) as rumah_tangga, sum(jiwa) as jiwa, tahun FROM transmigrasi where status='0' and tahun BETWEEN '$tahun1' and '$tahun2' GROUP BY tahun");
		return $hsl;
	}	

}
?>