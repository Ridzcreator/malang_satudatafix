<?php
class M_unjukrasa extends CI_Model {

	public function simpan_barang($penginput,$status,$periode,$politik,$ekonomi,$agama,$lain,$meninggal,$luka,$pengungsi,$material){
		
		$hsl=$this->db->query("INSERT INTO unjukrasa (id,politik,ekonomi,agama,lain, meninggal,luka,pengungsi,material,periode,status,penginput) VALUES ('','$politik','$ekonomi','$agama','$lain','$meninggal','$luka','$pengungsi','$material','$periode','$status','$penginput')");
		return $hsl;
	}
		function update_unjukrasa($id,$penginput,$status,$periode,$unjukrasa,$jumlah){
		$hsl=$this->db->query("UPDATE unjukrasa SET unjukrasa='$unjukrasa',jumlah='$jumlah',periode='$periode',penginput='$penginput' WHERE id='$id'");
		return $hsl;
	
	}

	public function tahun_crosstab(){
		$hsl=$this->db->query("SELECT DISTINCT * from unjukrasa where status='0'");
		return $hsl;
	}
	public function tampil_unjukrasac(){
		$hsl=$this->db->query("SELECT DISTINCT unjukrasa from unjukrasa where status='0'");
		return $hsl;
	}
	public function tampil_periodec($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT periode from unjukrasa where status='0' and periode BETWEEN '$tahun1' and '$tahun2'");
		return $hsl;
	}
	public function tampil_jumlahc($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT sum(jumlah) as jumlah, periode from unjukrasa where status='0' and periode BETWEEN '$tahun1' and '$tahun2' GROUP BY periode
");
		return $hsl;
	}
		public function tampil_jumlahxc($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT sum(jumlah) as jumlah from unjukrasa where status='0' and periode BETWEEN '$tahun1' and '$tahun2'
");
		return $hsl;
	}

	public function grafik_Perbandingan_perumahanx($tahun1, $tahun2){
		$hsl=$this->db->query("SELECT DISTINCT unjukrasa, sum(jumlah) as jumlah, periode from unjukrasa where status='0' and periode BETWEEN '$tahun1' and '$tahun2' GROUP BY periode, unjukrasa");
		return $hsl;
	}
	public function grafik_perbandingan_unjukrasa($tahun1,$tahun2,$bencana){
		$hsl=$this->db->query("SELECT DISTINCT unjukrasa, sum(jumlah) as jumlah, periode from unjukrasa where status='0' and unjukrasa='$bencana' and periode BETWEEN '$tahun1' and '$tahun2' GROUP BY unjukrasa,periode");
		return $hsl;
	}
	
	public function tampil_unjukrasa($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT periode, sum(jumlah) as jumlah from unjukrasa where status='0' GROUP BY periode order by periode asc");
		}else{
		$hsl=$this->db->query("SELECT periode, sum(jumlah) as jumlah from unjukrasa where status='0' and periode='$thn' GROUP BY periode order by periode asc");
		}
		return $hsl;
	}

	public function tampil_detail_unjukrasa($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT * from unjukrasa where status='0' order by periode desc");
		}else{
		$hsl=$this->db->query("SELECT * from unjukrasa where status='0' and periode='$thn'");
		}
		return $hsl;
	}

		public function tampil_editunjukrasa($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT * from unjukrasa where status='0'");
		}else{
		$hsl=$this->db->query("SELECT * from unjukrasa where status='0' and periode = '$thn'");
		}
		return $hsl;
	}
	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT distinct periode from unjukrasa where status='0' order by periode desc");
		return $hsl;
	}
	public function tampil_tahunmax(){
		$hsl=$this->db->query("SELECT  max(periode) as periode from unjukrasa where status='0'");
		return $hsl;
	}

	public function tampil_perumahanx($id){
		$hsl=$this->db->query("SELECT * from unjukrasa  where id='$id'");
		return $hsl;
	}
	public function tampil_unjuk(){
		$hsl=$this->db->query("SELECT * from master_unjukrasa");
		return $hsl;
	}
	function delete_unjukrasa($kodeinput){
		$status=1;
		$hsl=$this->db->query("UPDATE unjukrasa SET status='$status' WHERE periode='$kodeinput'");
		return $hsl;
	}


}
?>


