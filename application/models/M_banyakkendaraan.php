<?php
class M_Banyakkendaraan extends CI_Model {
var $tabel_kecamatan='master_kecamatan';
var $tabel_kelurahan='master_desa';

	public function simpan_barang($periode,$bulan,$tipe,$mpu,$bus,$barang,$gandeng,$tempel,$khusus,$jumlah,$status,$penginput){
		
		$hsl=$this->db->query("INSERT INTO banyak_kendaraan (id_kendaraan, bulan, jenis,mpu,bus,mobil,gandeng,tempel,khusus,jumlah, periode, penginput, status) VALUES ('','$bulan','$tipe','$mpu','$bus','$barang','$gandeng','$tempel','$khusus','$jumlah','$periode','$penginput','$status')");
		return $hsl;
	}
	public function update_kendaraan($id,$periode,$bulan,$tipe,$mpu,$bus,$barang,$gandeng,$tempel,$khusus,$jumlah){
		$hsl=$this->db->query("UPDATE banyak_kendaraan SET bulan='$bulan',jenis='$tipe',mpu='$mpu',bus='$bus',mobil='$barang',gandeng='$gandeng',tempel='$tempel',khusus='$khusus',jumlah='$jumlah',periode='$periode',penginput='$penginput' WHERE id_kendaraan='$id'");
		

		return $hsl;

	}
	public function grafik_perbandingan_alatangkutx(){
		$hsl=$this->db->query("SELECT * from lokasi_terminal where status='0' order by periode");
		return $hsl;
	}
	function delete_terminal($id){
		$status=1;
		$hsl=$this->db->query("UPDATE banyak_kendaraan SET status='$status' WHERE id_kendaraan='$id'");
		return $hsl;
		// $hsl=$this->db->query("DELETE FROM jumlah_korban where id='$id'");
		// return $hsl;
	}
	public function tampil_bulan(){
		$hsl=$this->db->query("SELECT * from master_bulan");
		return $hsl;
	}
	public function tampil_keterangan_terminal(){
		$hsl=$this->db->query("SELECT * from master_keterangan_terminal");
		return $hsl;
	}
	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT periode FROM banyak_kendaraan WHERE status='0' GROUP BY periode desc");
		return $hsl;
	}
	public function tampil_tahunn(){
		$hsl=$this->db->query("SELECT MAX(periode) as periode from lokasi_terminal WHERE status='0' ");
		return $hsl;
	}
	public function tampil_jumlah($tahun){
		$thn=$tahun;
		if($thn=='0000'){
			$hsl=$this->db->query("select banyak_kendaraan.*, master_bulan.kode,master_bulan.keterangan from master_bulan join banyak_kendaraan  on banyak_kendaraan.bulan = master_bulan.kode where banyak_kendaraan.status = 0 order by master_bulan.kode
 ");
		}else{
			$hsl=$this->db->query("select banyak_kendaraan.*, master_bulan.kode,master_bulan.keterangan from master_bulan join banyak_kendaraan  on banyak_kendaraan.bulan = master_bulan.kode where banyak_kendaraan.status = 0
 and banyak_kendaraan.periode='$thn' order by master_bulan.kode");
		}
return $hsl;

}
		public function tampil_jumlahx($tahun){
		$thn=$tahun;
		if($thn=='0000'){
			$hsl=$this->db->query("select periode, sum(mpu) as mpu,sum(bus) as bus, sum(mobil) as mobil, sum(gandeng) as gandeng, sum(tempel) as tempel, sum(khusus) as khusus, sum(jumlah) as jumlah from banyak_kendaraan where status = 0 GROUP BY periode order by periode asc

 ");
		}else{
			$hsl=$this->db->query("select periode, sum(mpu) as mpu,sum(bus) as bus, sum(mobil) as mobil, sum(gandeng) as gandeng, sum(tempel) as tempel, sum(khusus) as khusus, sum(jumlah) as jumlah from banyak_kendaraan where status = 0 and periode='$thn' GROUP BY periode order by periode asc
");
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

		$hsl=$this->db->query("select periode, sum(mpu) as mpu,sum(bus) as bus, sum(mobil) as mobil, sum(gandeng) as gandeng, sum(tempel) as tempel, sum(khusus) as khusus, sum(jumlah) as jumlah from banyak_kendaraan where status = 0 and periode BETWEEN '$tahun1' and '$tahun2' GROUP BY periode order by periode asc
");
		return $hsl;
	}
	public function grafik_perbandingan_bibit($tahun1,$tahun2,$bencana){
		$hsl=$this->db->query("SELECT DISTINCT jeniskelamin, sum(jumlah) as jumlah, periode from lokasi_terminal where status='0' and jeniskelamin='$bencana' and periode BETWEEN '$tahun1' and '$tahun2' GROUP BY jeniskelamin,periode");
		return $hsl;
	}
	public function tahun_grafik($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT periode from lokasi_terminal where status='0' and periode BETWEEN '$tahun1' and '$tahun2'");
		return $hsl;
	}

	public function tampil_grafik($tahun){
		$hsl=$this->db->query("select banyak_kendaraan.*, master_bulan.kode,master_bulan.keterangan from master_bulan join banyak_kendaraan  on banyak_kendaraan.bulan = master_bulan.kode where banyak_kendaraan.status = 0 and banyak_kendaraan.periode = '$tahun' order by master_bulan.kode");
		return $hsl;
	}

	public function tampil_umum($tahun){
		$hsl=$this->db->query("select periode,jenis, sum(mpu) as mpu,sum(bus) as bus, sum(mobil) as mobil, sum(gandeng) as gandeng, sum(tempel) as tempel, sum(khusus) as khusus, sum(jumlah) as jumlah from banyak_kendaraan where status = 0 and jenis='Umum' and periode='$tahun' GROUP BY periode order by periode asc");
		return $hsl;
	}
	public function tampil_bukan($tahun){
		$hsl=$this->db->query("select periode,jenis, sum(mpu) as mpu,sum(bus) as bus, sum(mobil) as mobil, sum(gandeng) as gandeng, sum(tempel) as tempel, sum(khusus) as khusus, sum(jumlah) as jumlah from banyak_kendaraan where status = 0 and jenis='Bukan' and periode='$tahun' GROUP BY periode order by periode asc
");


		return $hsl;
	}
	public function tampil_semua($tahun){
		$hsl=$this->db->query("select periode, sum(mpu) as mpu,sum(bus) as bus, sum(mobil) as mobil, sum(gandeng) as gandeng, sum(tempel) as tempel, sum(khusus) as khusus, sum(jumlah) as jumlah from banyak_kendaraan where status = 0  and periode='$tahun' GROUP BY periode order by periode asc
");
		return $hsl;
	}


	

	// public function tampil_grafik(){
	// 	$hsl=$this->db->query("SELECT master_kecamatan.nama_kecamatan, jumlah_korban.kecamatan,jumlah_korban.desa,jumlah_korban.bencana_alam, jumlah_korban.banyak_bencana,jumlah_korban.meninggal, jumlah_korban.luka, jumlah_korban.periode, jumlah_korban.penginput,jumlah_korban.id, master_desa.nama_desa FROM master_kecamatan JOIN jumlah_korban ON master_kecamatan.id_kecamatan=jumlah_korban.kecamatan JOIN master_desa ON master_desa.id_desa=jumlah_korban.desa where jumlah_korban.status='1'");
	// 	return $hsl;
	// }
	



}
?>


