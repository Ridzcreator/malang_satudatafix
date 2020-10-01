<?php
class M_pengaduanper extends CI_Model {




	public function simpan_barang($penginput,$periode,$bulan,$jumlahk,$usia19,$usia25,$usia45,$fisik,$psikis,$seksual,$eksploitasi,$penelantaran,$lainnya){
		$hsl2=$this->db->query("select * from jumlah_laporan_pengaduan_perempuan where bulan='$bulan' and periode='$periode' and status='0'");
		$count = $hsl2->num_rows();
		if($count == 0)
		{
		$hsl=$this->db->query("INSERT INTO jumlah_laporan_pengaduan_perempuan (id, penginput, periode, bulan, jumlah_kasus, muda, sedang, tua, kdrt, psikis, seksual, eksploitasi, penelantaran, lainnya) VALUES ('','$penginput','$periode','$bulan','$jumlahk','$usia19','$usia25','$usia45','$fisik','$psikis','$seksual','$eksploitasi','$penelantaran','$lainnya')");
		return $hsl;
		}else{
			echo "<script>alert('Data Sudah Diinput')</script>";
		}
		redirect('Pengaduanper','refresh');
	}
	public function tampil_pengaduanper($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT a.id, a.bulan, a.periode, sum(a.jumlah_kasus) as jumlah_kasus, sum(a.muda) as 19an, sum(a.sedang) as 25an, sum(a.tua) as 45an, sum(a.kdrt) as kdrt, sum(a.psikis) as psikis, sum(a.seksual) as seksual, sum(a.eksploitasi) as eksploitasi, sum(a.penelantaran) as penelantaran, sum(a.lainnya) as lainnya, a.status, b.kode, b.keterangan from jumlah_laporan_pengaduan_perempuan as a join master_bulan as b on a.bulan=b.kode where a.status='0' group by a.periode order by a.periode desc");
		}else{
		$hsl=$this->db->query("SELECT a.id, a.bulan, a.periode, sum(a.jumlah_kasus) as jumlah_kasus, sum(a.muda) as 19an, sum(a.sedang) as 25an, sum(a.tua) as 45an, sum(a.kdrt) as kdrt, sum(a.psikis) as psikis, sum(a.seksual) as seksual, sum(a.eksploitasi) as eksploitasi, sum(a.penelantaran) as penelantaran, sum(a.lainnya) as lainnya, a.status, b.kode, b.keterangan from jumlah_laporan_pengaduan_perempuan as a join master_bulan as b on a.bulan=b.kode where a.status='0' and a.periode='$tahun' group by a.periode order by a.periode desc");	
		}
		return $hsl;  
	}
	public function tampil_detailpengaduanper($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT a.id, a.bulan, a.periode, a.jumlah_kasus as jumlah_kasus, a.muda as 19an, a.sedang as 25an, a.tua as 45an, a.kdrt as kdrt, a.psikis as psikis, a.seksual as seksual, a.eksploitasi as eksploitasi, a.penelantaran as penelantaran, a.lainnya as lainnya, a.status, b.kode, b.keterangan from jumlah_laporan_pengaduan_perempuan as a join master_bulan as b on a.bulan=b.kode where a.status='0' order by a.bulan");
		}else{
		$hsl=$this->db->query("SELECT a.id, a.bulan, a.periode, a.jumlah_kasus as jumlah_kasus, a.muda as 19an, a.sedang as 25an, a.tua as 45an, a.kdrt as kdrt, a.psikis as psikis, a.seksual as seksual, a.eksploitasi as eksploitasi, a.penelantaran as penelantaran, a.lainnya as lainnya, a.status, b.kode, b.keterangan from jumlah_laporan_pengaduan_perempuan as a join master_bulan as b on a.bulan=b.kode where a.status='0' and a.periode='$tahun' order by a.bulan");	
		}
		return $hsl;  
	}
	public function tampil_grafik($tahun){
		$hsl=$this->db->query("SELECT a.id, a.bulan, a.periode, a.jumlah_kasus as jumlah_kasus, a.muda as 19an, a.sedang as 25an, a.tua as 45an, a.kdrt as kdrt, a.psikis as psikis, a.seksual as seksual, a.eksploitasi as eksploitasi, a.penelantaran as penelantaran, a.lainnya as lainnya, a.status, b.kode, b.keterangan from jumlah_laporan_pengaduan_perempuan as a join master_bulan as b on a.bulan=b.kode where a.status='0' and a.periode='$tahun' order by a.bulan");	
		return $hsl;  
	}
	public function grafik_perbandingan_pengaduanperx($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT a.id, a.bulan, a.periode, sum(a.jumlah_kasus) as jumlah_kasus, sum(a.muda) as 19an, sum(a.sedang) as 25an, sum(a.tua) as 45an, sum(a.kdrt) as kdrt, sum(a.psikis) as psikis, sum(a.seksual) as seksual, sum(a.eksploitasi) as eksploitasi, sum(a.penelantaran) as penelantaran, sum(a.lainnya) as lainnya, a.status, b.kode, b.keterangan from jumlah_laporan_pengaduan_perempuan as a join master_bulan as b on a.bulan=b.kode where a.status='0' and a.periode between '$tahun1' and '$tahun2' group by a.periode order by a.periode desc");	
		return $hsl;  
	}
	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT * from jumlah_laporan_pengaduan_perempuan where status='0' group by periode order by periode desc");
		return $hsl;  
	}
	public function tampil_bulan(){
		$hsl=$this->db->query("SELECT * from master_bulan");
		return $hsl;  
	}
	function update_pengaduanper($id,$penginput,$periode,$bulan,$jumlahk,$usia19,$usia25,$usia45,$fisik,$psikis,$seksual,$eksploitasi,$penelantaran,$lainnya){
		$hsl=$this->db->query("UPDATE jumlah_laporan_pengaduan_perempuan set penginput='$penginput', periode='$periode', bulan='$bulan',  jumlah_kasus='$jumlahk', muda='$usia19', sedang='$usia25', tua='$usia45', kdrt='$fisik', psikis='$psikis', seksual='$seksual', eksploitasi='$eksploitasi', penelantaran='$penelantaran', lainnya='$lainnya' WHERE id='$id'");
		return $hsl;
	}
	function delete_pengaduanper($id){
		$status=1;
		$hsl=$this->db->query("UPDATE jumlah_laporan_pengaduan_perempuan set status='$status' WHERE id='$id'");
		return $hsl;
	}
}
?>


