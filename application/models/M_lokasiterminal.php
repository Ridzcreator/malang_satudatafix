<?php
class M_Lokasiterminal extends CI_Model {
var $tabel_kecamatan='master_kecamatan';
var $tabel_kelurahan='master_desa';

	public function simpan_barang($periode,$terminal,$tipe,$tanah,$bangunan,$keterangan,$status,$penginput){
		
		$hsl=$this->db->query("INSERT INTO lokasi_terminal (id_lokasi, lokasi_terminal, type,luas_tanah,bangunan,keterangan, periode, penginput, status) VALUES ('','$terminal','$tipe','$tanah','$bangunan','$keterangan','$periode','$penginput','$status')");
		return $hsl;
	}
	function update_terminal($id,$periode,$terminal,$tipe,$tanah,$bangunan,$keterangan,$status,$penginput){
		$hsl=$this->db->query("UPDATE lokasi_terminal SET lokasi_terminal='$terminal',type='$tipe',luas_tanah='$tanah',bangunan='$bangunan',keterangan='$keterangan',periode='$periode', penginput='$penginput' WHERE id_lokasi='$id'");
		return $hsl;
	}
	public function grafik_perbandingan_alatangkutx(){
		$hsl=$this->db->query("SELECT * from lokasi_terminal where status='0' order by periode");
		return $hsl;
	}
	function delete_terminal($id){
		$status=1;
		$hsl=$this->db->query("UPDATE lokasi_terminal SET status='$status' WHERE id_lokasi='$id'");
		return $hsl;
		// $hsl=$this->db->query("DELETE FROM jumlah_korban where id='$id'");
		// return $hsl;
	}
	public function tampil_terminal(){
		$hsl=$this->db->query("SELECT * from master_terminal");
		return $hsl;
	}
	public function tampil_keterangan_terminal(){
		$hsl=$this->db->query("SELECT * from master_keterangan_terminal");
		return $hsl;
	}
	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT periode FROM lokasi_terminal WHERE status='0' GROUP BY periode desc");
		return $hsl;
	}
	public function tampil_tahunn(){
		$hsl=$this->db->query("SELECT MAX(periode) as periode from lokasi_terminal WHERE status='0' ");
		return $hsl;
	}
	public function tampil_jumlah($tahun){
		$thn=$tahun;
		if($thn=='0000'){
			$hsl=$this->db->query("select a.id_lokasi,a.lokasi_terminal,a.type,a.luas_tanah,a.bangunan,a.keterangan,a.periode,b.id_terminal,b.nama_terminal from lokasi_terminal as a join master_terminal as b on b.id_terminal = a.lokasi_terminal where status = 0 ");
		}else{
			$hsl=$this->db->query("select a.id_lokasi,a.lokasi_terminal,a.type,a.luas_tanah,a.bangunan,a.keterangan,a.periode,b.id_terminal,b.nama_terminal from lokasi_terminal as a join master_terminal as b on b.id_terminal = a.lokasi_terminal where status = 0 and a.periode='$thn'");
		}
		

		
		return $hsl;

	}

	public function tampil_jumlahhome($tahun){
		$thn=$tahun;
		if($thn=='0000'){
			$hsl=$this->db->query("SELECT count(lokasi_terminal) as terminal, periode from lokasi_terminal where status = 0 GROUP BY periode");
		}else{
			$hsl=$this->db->query("SELECT count(lokasi_terminal) as terminal, periode from lokasi_terminal where status = 0 and periode='$thn' GROUP BY periode");
		}
		

		
		return $hsl;

	}

	public function tahun_crosstab(){
		$hsl=$this->db->query("select inputbibit.bibit,lokasi_terminal.jenis_bibit,lokasi_terminal.jumlah,lokasi_terminal.periode,lokasi_terminal.penginput from lokasi_terminal join inputbibit on inputbibit.id_bibit = lokasi_terminal.jenis_bibit where lokasi_terminal.status=0 ORDER BY periode");
		return $hsl;
	}
	public function tampil_bibitc(){
		$hsl=$this->db->query("select distinct inputbibit.bibit from lokasi_terminal join inputbibit on inputbibit.id_bibit = lokasi_terminal.jenis_bibit where lokasi_terminal.status=0 ORDER BY periode");
		return $hsl;
	}
	public function tampil_bibita(){
		$hsl=$this->db->query("select distinct lokasi_terminal.jenis_bibit, inputbibit.bibit as keterangan from lokasi_terminal join inputbibit on inputbibit.id_bibit = lokasi_terminal.jenis_bibit where lokasi_terminal.status=0 ");
		return $hsl;
	}
	public function tampil_periodec($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT periode from lokasi_terminal where status='0' and periode BETWEEN '$tahun1' and '$tahun2'");
		return $hsl;
	}
	public function tampil_jumlahc($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT sum(jumlah) as jumlah, periode from lokasi_terminal where status='0' and periode BETWEEN '$tahun1' and '$tahun2' GROUP BY periode
");
		return $hsl;
	}
	public function grafik_Perbandingan_perumahanx($tahun1, $tahun2){

		$hsl=$this->db->query("select count(lokasi_terminal) as lokasi_terminal, type, periode from lokasi_terminal where status = 0 and periode BETWEEN '$tahun1' and '$tahun2' GROUP BY periode, type


");
		return $hsl;
	}
	public function grafik_perbandingan_jenis($tahun1,$tahun2,$bencana){
		$hsl=$this->db->query("select count(lokasi_terminal) as lokasi_terminal, type, periode from lokasi_terminal where status = 0 and type='$bencana' and periode BETWEEN '$tahun1' and '$tahun2' GROUP BY periode, type");
		return $hsl;
	}
	public function tahun_grafik($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT periode from lokasi_terminal where status='0' and periode BETWEEN '$tahun1' and '$tahun2'");
		return $hsl;
	}
	

	// public function tampil_grafik(){
	// 	$hsl=$this->db->query("SELECT master_kecamatan.nama_kecamatan, jumlah_korban.kecamatan,jumlah_korban.desa,jumlah_korban.bencana_alam, jumlah_korban.banyak_bencana,jumlah_korban.meninggal, jumlah_korban.luka, jumlah_korban.periode, jumlah_korban.penginput,jumlah_korban.id, master_desa.nama_desa FROM master_kecamatan JOIN jumlah_korban ON master_kecamatan.id_kecamatan=jumlah_korban.kecamatan JOIN master_desa ON master_desa.id_desa=jumlah_korban.desa where jumlah_korban.status='1'");
	// 	return $hsl;
	// }
	



}
?>


