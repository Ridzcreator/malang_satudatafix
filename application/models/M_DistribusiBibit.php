<?php
class M_DistribusiBibit extends CI_Model {
var $tabel_kecamatan='master_kecamatan';
var $tabel_kelurahan='master_desa';

	public function simpan_barang($periode,$jenisbibit,$jumlah,$status,$penginput){
		
		$hsl=$this->db->query("INSERT INTO distribusibibit (id, jenis_bibit, jumlah, periode, penginput, status) VALUES ('','$jenisbibit','$jumlah','$periode','$penginput','$status')");
		return $hsl;
	}
	function update_bibit($id,$periode,$jenisbibit,$jumlah,$status,$penginput){
		$hsl=$this->db->query("UPDATE distribusibibit SET jenis_bibit='$jenisbibit',jumlah='$jumlah',periode='$periode' WHERE id='$id'");
		return $hsl;
	}
	public function grafik_perbandingan_alatangkutx(){
		$hsl=$this->db->query("SELECT * from distribusibibit where status='0' order by periode");
		return $hsl;
	}
function delete_bibit($id){
		$status=1;
		$hsl=$this->db->query("UPDATE distribusibibit SET status='$status' WHERE id='$id'");
		return $hsl;
		// $hsl=$this->db->query("DELETE FROM jumlah_korban where id='$id'");
		// return $hsl;
	}
	public function tampil_bibit(){
		$hsl=$this->db->query("SELECT * from inputbibit");
		return $hsl;
	}
	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT periode FROM distribusibibit WHERE status='0' GROUP BY periode desc");
		return $hsl;
	}
	public function tampil_tahunn(){
		$hsl=$this->db->query("SELECT MAX(periode) as periode from distribusibibit WHERE status='0' ");
		return $hsl;
	}
	public function tampil_jumlah($tahun){
		$thn=$tahun;
		if($thn=='0000'){
			$hsl=$this->db->query("select inputbibit.bibit,distribusibibit.id,distribusibibit.jenis_bibit,distribusibibit.jumlah,distribusibibit.periode,distribusibibit.penginput from distribusibibit join inputbibit on inputbibit.id_bibit = distribusibibit.jenis_bibit where distribusibibit.status=0 ORDER BY periode desc");
		}else{
			$hsl=$this->db->query("select inputbibit.bibit,distribusibibit.id,distribusibibit.jenis_bibit,distribusibibit.jumlah,distribusibibit.periode,distribusibibit.penginput from distribusibibit join inputbibit on inputbibit.id_bibit = distribusibibit.jenis_bibit where distribusibibit.status=0 and distribusibibit.periode='$thn' ORDER BY periode");
		}
		

		
		return $hsl;

	}
	public function tahun_crosstab(){
		$hsl=$this->db->query("select inputbibit.bibit,distribusibibit.jenis_bibit,distribusibibit.jumlah,distribusibibit.periode,distribusibibit.penginput from distribusibibit join inputbibit on inputbibit.id_bibit = distribusibibit.jenis_bibit where distribusibibit.status=0 ORDER BY periode");
		return $hsl;
	}
	public function tampil_bibitc(){
		$hsl=$this->db->query("select distinct inputbibit.bibit from distribusibibit join inputbibit on inputbibit.id_bibit = distribusibibit.jenis_bibit where distribusibibit.status=0 ORDER BY periode");
		return $hsl;
	}
	public function tampil_bibita(){
		$hsl=$this->db->query("select distinct distribusibibit.jenis_bibit, inputbibit.bibit as keterangan from distribusibibit join inputbibit on inputbibit.id_bibit = distribusibibit.jenis_bibit where distribusibibit.status=0 ");
		return $hsl;
	}
	public function tampil_periodec($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT periode from distribusibibit where status='0' and periode BETWEEN '$tahun1' and '$tahun2'");
		return $hsl;
	}
	public function tampil_jumlahc($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT sum(jumlah) as jumlah, periode from distribusibibit where status='0' and periode BETWEEN '$tahun1' and '$tahun2' GROUP BY periode
");
		return $hsl;
	}
	public function grafik_Perbandingan_perumahanx($tahun1, $tahun2){

		$hsl=$this->db->query("select inputbibit.bibit,distribusibibit.jenis_bibit,sum(distribusibibit.jumlah) as jumlah,distribusibibit.periode,distribusibibit.penginput from distribusibibit join inputbibit on inputbibit.id_bibit = distribusibibit.jenis_bibit where distribusibibit.status=0 and distribusibibit.periode between '$tahun1' and '$tahun2' group by distribusibibit.periode,inputbibit.bibit
");
		return $hsl;
	}
	public function grafik_perbandingan_bibit($tahun1,$tahun2,$bencana){
		$hsl=$this->db->query("SELECT DISTINCT jeniskelamin, sum(jumlah) as jumlah, periode from distribusibibit where status='0' and jeniskelamin='$bencana' and periode BETWEEN '$tahun1' and '$tahun2' GROUP BY jeniskelamin,periode");
		return $hsl;
	}
	public function tahun_grafik($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT periode from distribusibibit where status='0' and periode BETWEEN '$tahun1' and '$tahun2'");
		return $hsl;
	}
	

	// public function tampil_grafik(){
	// 	$hsl=$this->db->query("SELECT master_kecamatan.nama_kecamatan, jumlah_korban.kecamatan,jumlah_korban.desa,jumlah_korban.bencana_alam, jumlah_korban.banyak_bencana,jumlah_korban.meninggal, jumlah_korban.luka, jumlah_korban.periode, jumlah_korban.penginput,jumlah_korban.id, master_desa.nama_desa FROM master_kecamatan JOIN jumlah_korban ON master_kecamatan.id_kecamatan=jumlah_korban.kecamatan JOIN master_desa ON master_desa.id_desa=jumlah_korban.desa where jumlah_korban.status='1'");
	// 	return $hsl;
	// }
	



}
?>


