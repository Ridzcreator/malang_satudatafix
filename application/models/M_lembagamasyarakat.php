<?php
class M_lembagamasyarakat extends CI_Model {
var $tabel_kecamatan='master_kecamatan';
var $tabel_kelurahan='master_desa';

	public function simpan_barang($jumlah,$periode,$penginput,$status,$kecamatann,$desaa){
		
		$hsl=$this->db->query("INSERT INTO lembaga_masyarakat(id_lembaga, kecamatan, desa, jumlah, periode, penginput, status) VALUES ('','$kecamatann','$desaa','$jumlah','$periode','$penginput','$status')");
		return $hsl;
	}
	public function simpan_detail_barang($bencana,$banyak_bencana,$meninggal,$luka,$date,$penginput,$status,$kecamatann,$desaa){
		
		$hsl=$this->db->query("INSERT INTO jumlah_korban(id, bencana_alam, banyak_bencana, meninggal, luka, periode, penginput, status, kecamatan, desa) VALUES ('','$bencana','$banyak_bencana','$meninggal','$luka','$date','$penginput','$status','$kecamatann', '$desaa')");
		return $hsl;
	}
	public function update_lembaga($id,$jumlah,$periode,$penginput,$status,$kecamatann,$desaa){
		$hsl=$this->db->query("UPDATE lembaga_masyarakat SET jumlah='$jumlah',periode='$periode', penginput='$penginput' WHERE id_lembaga='$id'");
		return $hsl;
	}
	public function delete_lembaga($id){
		$status=1;
		$hsl=$this->db->query("UPDATE lembaga_masyarakat SET status='$status' WHERE id_lembaga='$id'");
		return $hsl;
		// $hsl=$this->db->query("DELETE FROM jumlah_korban where id='$id'");
		// return $hsl;
	}

	public function tampil_bencana(){
		$hsl=$this->db->query("SELECT * from bencana");
		return $hsl;
	}
	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT periode FROM lembaga_masyarakat WHERE STATUS = '0' GROUP BY periode desc");
		return $hsl;
	}
	public function tampil_tahunn(){
		$hsl=$this->db->query("SELECT MAX(periode) as periode FROM jumlah_korban WHERE STATUS='0' ");
		return $hsl;
	}
	public function tampil_jumlah($tahun){
		$thn=$tahun;
		if($thn=='0000'){
			$hsl=$this->db->query("select a.id_kecamatan, a.nama_kecamatan, b.id_desa,b.nama_desa,c.id_lembaga, c.kecamatan,c.desa,c.jumlah,c.periode from master_kecamatan as a join lembaga_masyarakat as c on a.id_kecamatan = c.kecamatan join master_desa as b on b.id_desa = c.desa where c.status=0 order by c.periode desc");
		}else{
			$hsl=$this->db->query("select a.id_kecamatan, a.nama_kecamatan, b.id_desa,b.nama_desa,c.id_lembaga, c.kecamatan,c.desa,c.jumlah,c.periode from master_kecamatan as a join lembaga_masyarakat as c on a.id_kecamatan = c.kecamatan join master_desa as b on b.id_desa = c.desa where c.status=0 and c.periode='$thn' ");
		}
		

		return $hsl;

	}
	public function tampil_jumlahd($tahun){
		$thn=$tahun;
		if($thn=='0000'){
			$hsl=$this->db->query("select a.id_kecamatan, a.nama_kecamatan, b.id_desa,b.nama_desa,c.id_lembaga, c.kecamatan,c.desa,sum(c.jumlah) as jumlah,c.periode from master_kecamatan as a join lembaga_masyarakat as c on a.id_kecamatan = c.kecamatan join master_desa as b on b.id_desa = c.desa where c.status=0 GROUP BY c.periode");
		}else{
			$hsl=$this->db->query("select a.id_kecamatan, a.nama_kecamatan, b.id_desa,b.nama_desa,c.id_lembaga, c.kecamatan,c.desa,sum(c.jumlah) as jumlah,c.periode from master_kecamatan as a join lembaga_masyarakat as c on a.id_kecamatan = c.kecamatan join master_desa as b on b.id_desa = c.desa where c.status=0 and c.periode='$thn' GROUP BY c.periode ");
		}
		

		return $hsl;

	}

	public function tahun_crosstab(){
		$hsl=$this->db->query("select a.id_kecamatan, a.nama_kecamatan, b.id_desa,b.nama_desa,c.id_lembaga, c.kecamatan,c.desa,c.jumlah,c.periode from master_kecamatan as a join lembaga_masyarakat as c on a.id_kecamatan = c.kecamatan join master_desa as b on b.id_desa = c.desa where c.status=0  ORDER BY c.kecamatan");
		return $hsl;
	}
	public function tampil_kecamatanc(){
		$hsl=$this->db->query("select  a.nama_kecamatan from master_kecamatan as a join lembaga_masyarakat as c on a.id_kecamatan = c.kecamatan join master_desa as b on b.id_desa = c.desa where c.status=0 ORDER BY c.kecamatan");
		return $hsl;
	}
	public function tampil_desac(){
		$hsl=$this->db->query("select DISTINCT a.nama_kecamatan,b.nama_desa from master_kecamatan as a join lembaga_masyarakat as c on a.id_kecamatan = c.kecamatan join master_desa as b on b.id_desa = c.desa where c.status=0 ORDER BY c.kecamatan");
		return $hsl;
	}
	public function tampil_periodec($tahun1,$tahun2){
		$hsl=$this->db->query("select DISTINCT c.periode from master_kecamatan as a join lembaga_masyarakat as c on a.id_kecamatan = c.kecamatan join master_desa as b on b.id_desa = c.desa where c.status=0 and c.periode BETWEEN '$tahun1' and '$tahun2' order by c.periode");
		return $hsl;
	}
	public function tampil_jumlahc($tahun1,$tahun2){
		$hsl=$this->db->query("select a.id_kecamatan, a.nama_kecamatan, b.id_desa,b.nama_desa,c.id_lembaga, c.kecamatan,c.desa,sum(c.jumlah) as jumlah,c.periode from master_kecamatan as a join lembaga_masyarakat as c on a.id_kecamatan = c.kecamatan join master_desa as b on b.id_desa = c.desa where c.status=0 and c.periode BETWEEN '$tahun1' and '$tahun2'  GROUP BY c.periode");
		return $hsl;
	}
	public function tampil_jumlahx($tahun1,$tahun2){
		$hsl=$this->db->query("select a.id_kecamatan, a.nama_kecamatan, b.id_desa,b.nama_desa,c.id_lembaga, c.kecamatan,c.desa,sum(c.jumlah) as jumlah,c.periode from master_kecamatan as a join lembaga_masyarakat as c on a.id_kecamatan = c.kecamatan join master_desa as b on b.id_desa = c.desa where c.status=0 and c.periode BETWEEN '$tahun1' and '$tahun2' ");
		return $hsl;
	}

	public function tampil_detail_bencana($tahun,$bencana){
		$thn=$tahun;
		$bcn=$bencana;
		if($thn=='0000'){
			$hsl=$this->db->query("SELECT bencana.id, bencana.bencana,master_kecamatan.nama_kecamatan, jumlah_korban.kecamatan,jumlah_korban.bencana_alam, jumlah_korban.banyak_bencana,jumlah_korban.meninggal, jumlah_korban.luka, jumlah_korban.periode,jumlah_korban.desa, jumlah_korban.penginput,jumlah_korban.id, master_desa.nama_desa FROM master_kecamatan JOIN jumlah_korban ON master_kecamatan.id_kecamatan=jumlah_korban.kecamatan JOIN master_desa ON master_desa.id_desa=jumlah_korban.desa JOIN bencana ON bencana.id=jumlah_korban.bencana_alam WHERE jumlah_korban.status='0' and jumlah_korban.periode='$thn' and jumlah_korban.bencana_alam='$bcn'");
		}else{
			$hsl=$this->db->query("SELECT bencana.id, bencana.bencana,master_kecamatan.nama_kecamatan, jumlah_korban.kecamatan,jumlah_korban.bencana_alam, jumlah_korban.banyak_bencana,jumlah_korban.meninggal, jumlah_korban.luka, jumlah_korban.periode,jumlah_korban.desa, jumlah_korban.penginput,jumlah_korban.id, master_desa.nama_desa FROM master_kecamatan JOIN jumlah_korban ON master_kecamatan.id_kecamatan=jumlah_korban.kecamatan JOIN master_desa ON master_desa.id_desa=jumlah_korban.desa JOIN bencana ON bencana.id=jumlah_korban.bencana_alam WHERE jumlah_korban.status='0' and jumlah_korban.periode='$thn' and jumlah_korban.bencana_alam='$bcn'");
		}
		

		
		return $hsl;

	}
	public function tahun_grafik($tahun1){
		$hsl=$this->db->query("select periode from jumlah_korban where periode='$tahun1' limit 1");
		return $hsl;
	}

	public function grafik_perbandingan_lembaga($tahun1,$tahun2){
		$hsl=$this->db->query("select a.id_kecamatan, a.nama_kecamatan, b.id_desa,b.nama_desa,c.id_lembaga, c.kecamatan,c.desa,sum(c.jumlah) as jumlah,c.periode from master_kecamatan as a join lembaga_masyarakat as c on a.id_kecamatan = c.kecamatan join master_desa as b on b.id_desa = c.desa where c.status=0 and c.periode BETWEEN '$tahun1' and '$tahun2' GROUP BY c.periode");
		return $hsl;
	}
	public function grafik_perbandingan_lembaga_desa($tahun){
		$hsl=$this->db->query("select a.id_kecamatan, a.nama_kecamatan, b.id_desa,b.nama_desa,c.id_lembaga, c.kecamatan,c.desa,c.jumlah,c.periode from master_kecamatan as a join lembaga_masyarakat as c on a.id_kecamatan = c.kecamatan join master_desa as b on b.id_desa = c.desa where c.status=0 and c.periode = '$tahun' ORDER BY c.kecamatan");
		return $hsl;
	}
	

	public function tampil_tampil($tahun){
		$thn = $tahun;
		if($thn=='0000'){
			$hsl=$this->db->query("SELECT bencana.id, bencana.bencana,master_kecamatan.nama_kecamatan, jumlah_korban.kecamatan,jumlah_korban.bencana_alam, jumlah_korban.banyak_bencana,jumlah_korban.meninggal, jumlah_korban.luka, jumlah_korban.periode,jumlah_korban.desa, jumlah_korban.penginput,jumlah_korban.id, master_desa.nama_desa FROM master_kecamatan JOIN jumlah_korban ON master_kecamatan.id_kecamatan=jumlah_korban.kecamatan JOIN master_desa ON master_desa.id_desa=jumlah_korban.desa JOIN bencana ON bencana.id=jumlah_korban.bencana_alam WHERE jumlah_korban.status='0'");
		}else{
			$hsl=$this->db->query("SELECT bencana.id, bencana.bencana,master_kecamatan.nama_kecamatan, jumlah_korban.kecamatan,jumlah_korban.bencana_alam, jumlah_korban.banyak_bencana,jumlah_korban.meninggal, jumlah_korban.luka, jumlah_korban.periode,jumlah_korban.desa, jumlah_korban.penginput,jumlah_korban.id, master_desa.nama_desa FROM master_kecamatan JOIN jumlah_korban ON master_kecamatan.id_kecamatan=jumlah_korban.kecamatan JOIN master_desa ON master_desa.id_desa=jumlah_korban.desa JOIN bencana ON bencana.id=jumlah_korban.bencana_alam WHERE jumlah_korban.status='0' and jumlah_korban.periode='$thn'");
		}
		
		return $hsl;
	}

	public function tampil_grafik($tahun){
		$thn = $tahun;
		if($thn=='0000'){
			$hsl=$this->db->query("select a.id_kecamatan, a.nama_kecamatan, b.id_desa,b.nama_desa,c.id_lembaga, c.kecamatan,c.desa,sum(c.jumlah) as jumlah,c.periode from master_kecamatan as a join lembaga_masyarakat as c on a.id_kecamatan = c.kecamatan join master_desa as b on b.id_desa = c.desa where c.status=0 and c.periode = '$tahun' GROUP BY c.kecamatan");
		}else{
			$hsl=$this->db->query("select a.id_kecamatan, a.nama_kecamatan, b.id_desa,b.nama_desa,c.id_lembaga, c.kecamatan,c.desa,sum(c.jumlah) as jumlah,c.periode from master_kecamatan as a join lembaga_masyarakat as c on a.id_kecamatan = c.kecamatan join master_desa as b on b.id_desa = c.desa where c.status=0 and c.periode = '$tahun' GROUP BY c.kecamatan");
		}
		

		
		return $hsl;

	}
	

	// public function tampil_grafik(){
	// 	$hsl=$this->db->query("SELECT master_kecamatan.nama_kecamatan, jumlah_korban.kecamatan,jumlah_korban.desa,jumlah_korban.bencana_alam, jumlah_korban.banyak_bencana,jumlah_korban.meninggal, jumlah_korban.luka, jumlah_korban.periode, jumlah_korban.penginput,jumlah_korban.id, master_desa.nama_desa FROM master_kecamatan JOIN jumlah_korban ON master_kecamatan.id_kecamatan=jumlah_korban.kecamatan JOIN master_desa ON master_desa.id_desa=jumlah_korban.desa where jumlah_korban.status='1'");
	// 	return $hsl;
	// }
	

	public function tampil_jumlaha(){
		$cnt = $this->db->query("SELECT COUNT(bencana_alam) AS cnt FROM jumlah_korban");
		return $cnt;
	}
	public function tampil_bencanax($id){
		$hsl=$this->db->query("SELECT master_kecamatan.nama_kecamatan, jumlah_korban.kecamatan,jumlah_korban.bencana_alam, jumlah_korban.banyak_bencana,jumlah_korban.meninggal, jumlah_korban.luka, jumlah_korban.periode, jumlah_korban.penginput,jumlah_korban.id, master_desa.nama_desa FROM master_kecamatan JOIN jumlah_korban ON master_kecamatan.id_kecamatan=jumlah_korban.kecamatan JOIN master_desa ON master_desa.id_desa=jumlah_korban.desa where jumlah_korban.id='$id'");
		return $hsl;
	}
	
	
	public function simpan_bencana($bencana){
		
		$hsl=$this->db->query("INSERT INTO bencana(id, bencana) VALUES ('','$bencana')");
		return $hsl;
	}

	
	function update_bencana_alam($id,$bencana){
		$hsl=$this->db->query("UPDATE bencana SET bencana='$bencana' WHERE id='$id'");
		return $hsl;
	}
	
	function delete_bencana_alam($id){
		$hsl=$this->db->query("DELETE FROM bencana where id='$id'");
		return $hsl;
	}
		public function tampil_kecamatan(){
		$hsl=$this->db->query("SELECT * from master_kecamatan");
		return $hsl;
	}
	public function tampil_desa(){
		$hsl=$this->db->query("SELECT * FROM master_desa ORDER BY id_kecamatan ASC limit 10 ");
		return $hsl;
	}

		public function tampil_kelurahan($kdkec){
		$hsl=$this->db->query("SELECT * from master_desa where id_kecamatan='$kdkec' order by nama_desa asc");
		return $hsl;
	}
	

	


}
?>


