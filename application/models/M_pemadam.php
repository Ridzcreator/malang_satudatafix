<?php
class M_pemadam extends CI_Model {


	public function simpan_barang($lokasi,$layak,$tidak,$periode,$penginput,$status){
		
		$hsl=$this->db->query("INSERT INTO pemadam (id, lokasi, layak, tidak, periode, penginput,status) VALUES ('','$lokasi','$layak','$tidak','$periode','$penginput','$status')");
		return $hsl;
	}
	public function tampil_pemadam($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT * from pemadam where status='0' order by lokasi asc");
		}else{
		$hsl=$this->db->query("SELECT * from pemadam where status='0' and periode='$thn' order by lokasi asc ");
		}
		return $hsl;
	}

	public function tahun_crosstab(){
		$hsl=$this->db->query("SELECT DISTINCT * from pemadam where status='0'");
		return $hsl;
	}
	public function tampil_kecamatanc(){
		$hsl=$this->db->query("SELECT DISTINCT lokasi from pemadam where status='0'");
		return $hsl;
	}
	public function tampil_periodec($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT periode from pemadam where status='0' and periode BETWEEN '$tahun1' and '$tahun2'");
		return $hsl;
	}
	public function tampil_jumlahc($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT sum(layak) as layak, sum(tidak) as tidak, periode from pemadam where status='0' and periode BETWEEN '$tahun1' and '$tahun2' GROUP BY periode
");
		return $hsl;
	}
	public function grafik_Perbandingan_perumahanx($tahun1, $tahun2){
		$hsl=$this->db->query("SELECT DISTINCT sum(layak) as layak, sum(tidak) as tidak, periode from pemadam where status='0' and periode BETWEEN '$tahun1' and '$tahun2' GROUP BY periode");
		return $hsl;
	}
	public function grafik_Perbandingan_pemadam($tahun1,$tahun2,$bencana){
		$hsl=$this->db->query("SELECT DISTINCT lokasi, sum(layak) as layak, sum(tidak) as tidak, periode from pemadam where status='0' and lokasi='$bencana' and periode BETWEEN '$tahun1' and '$tahun2' GROUP BY lokasi,periode");
		return $hsl;
	}
	public function tahun_grafik($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT periode from pemadam where status='0' and periode BETWEEN '$tahun1' and '$tahun2'");
		return $hsl;
	}

	public function tampil_tahunn(){
		$hsl=$this->db->query("SELECT MAX(periode) as periode FROM pemadam WHERE status='0' ");
		return $hsl;
	}
	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT DISTINCT periode from pemadam where status='0' order by periode desc");
		return $hsl;
	}
	public function tampil_lokasi(){

		$hsl=$this->db->query("SELECT * from lokasipemadam");

		return $hsl;
	}

	public function update_pemadam($id,$lokasi,$layak,$tidak,$periode,$penginput,$status){
		$hsl=$this->db->query("UPDATE pemadam SET lokasi='$lokasi', layak='$layak', tidak='$tidak',periode='$periode',penginput='$penginput' WHERE id='$id'");
		return $hsl;
	}
	function delete_pemadam($id){
		$hsl=$this->db->query("DELETE FROM pemadam where id='$id'");
		return $hsl;
	}


}
?>
