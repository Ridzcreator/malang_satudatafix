<?php
class M_pengaduanank extends CI_Model {




	public function simpan_barang($penginput,$periode,$bulan,$usia6l,$usia6p,$usia12l,$usia12p,$usia15p,$usia15l,$usia18l,$usia18p,$jumlahl,$jumlahp,$jumlaht){
		$hsl2=$this->db->query("select * from jumlah_laporan_pengaduan_anak where bulan='$bulan' and periode='$periode' and status='0'");
		$count = $hsl2->num_rows();
		if($count == 0)
		{
		$hsl=$this->db->query("INSERT INTO jumlah_laporan_pengaduan_anak (id, penginput, periode, bulan, jumlah_kasus, l,p,l06,p06,l712,p712,l1315,p1315,l1618,p1618) VALUES ('','$penginput','$periode','$bulan','$jumlaht','$jumlahl','$jumlahp','$usia6l','$usia6p','$usia12l','$usia12p','$usia15l','$usia15p','$usia18l','$usia18p')");
		return $hsl;
		}else{
			echo "<script>alert('Data Sudah Diinput')</script>";
		}
		redirect('Pengaduanank','refresh');
	}
	public function tampil_pengaduanank($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT a.id, a.bulan, a.periode, sum(a.jumlah_kasus) as jumlah_kasus, sum(a.l) as l, sum(a.p) as p, sum(a.l06) as l06, sum(a.p06) as p06, sum(a.l712) as l712, sum(a.p712) as p712, sum(a.l1315) as l1315, sum(a.p1315) as p1315, sum(a.l1618) as l1618, sum(a.p1618) as p1618, a.penginput, a.status, b.kode, b.keterangan from jumlah_laporan_pengaduan_anak as a join master_bulan as b on a.bulan=b.kode where a.status='0' group by a.periode order by a.periode desc");
		}else{
		$hsl=$this->db->query("SELECT a.id, a.bulan, a.periode, sum(a.jumlah_kasus) as jumlah_kasus, sum(a.l) as l, sum(a.p) as p, sum(a.l06) as l06, sum(a.p06) as p06, sum(a.l712) as l712, sum(a.p712) as p712, sum(a.l1315) as l1315, sum(a.p1315) as p1315, sum(a.l1618) as l1618, sum(a.p1618) as p1618, a.penginput, a.status, b.kode, b.keterangan from jumlah_laporan_pengaduan_anak as a join master_bulan as b on a.bulan=b.kode where a.status='0' and a.periode='$thn' group by a.periode order by a.periode desc");	
		}
		return $hsl;  
	}
	public function tampil_detailpengaduanank($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT a.id, a.bulan, a.periode, a.jumlah_kasus, a.l, a.p, a.l06, a.p06, a.l712, a.p712, a.l1315, a.p1315, a.l1618, a.p1618, a.penginput, a.status, b.kode, b.keterangan from jumlah_laporan_pengaduan_anak as a join master_bulan as b on a.bulan=b.kode where a.status='0 order by a.periode desc");
		}else{
		$hsl=$this->db->query("SELECT a.id, a.bulan, a.periode, a.jumlah_kasus, a.l, a.p, a.l06, a.p06, a.l712, a.p712, a.l1315, a.p1315, a.l1618, a.p1618, a.penginput, a.status, b.kode, b.keterangan from jumlah_laporan_pengaduan_anak as a join master_bulan as b on a.bulan=b.kode where a.status='0' and a.periode='$thn' order by a.periode desc");	
		}
		return $hsl;  
	}
	public function tampil_grafik($tahun){
		$hsl=$this->db->query("SELECT a.id, a.bulan, a.periode, a.jumlah_kasus, a.l, a.p, a.l06, a.p06, a.l712, a.p712, a.l1315, a.p1315, a.l1618, a.p1618, a.penginput, a.status, b.kode, b.keterangan from jumlah_laporan_pengaduan_anak as a join master_bulan as b on a.bulan=b.kode where a.status='0' and a.periode='$tahun' order by a.bulan");	
		return $hsl;  
	}
	public function grafik_perbandingan_pengaduanankx($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT a.id, a.bulan, a.periode, sum(a.jumlah_kasus) as jumlah_kasus, sum(a.l) as l, sum(a.p) as p, sum(a.l06) as l06, sum(a.p06) as p06, sum(a.l712) as l712, sum(a.p712) as p712, sum(a.l1315) as l1315, sum(a.p1315) as p1315, sum(a.l1618) as l1618, sum(a.p1618) as p1618, a.penginput, a.status, b.kode, b.keterangan from jumlah_laporan_pengaduan_anak as a join master_bulan as b on a.bulan=b.kode where a.status='0' and a.periode between '$tahun1' and '$tahun2' group by a.periode order by a.periode desc");	
		return $hsl;  
	}
	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT * from jumlah_laporan_pengaduan_anak where status='0' group by periode order by periode desc");
		return $hsl;  
	}
	public function tampil_bulan(){
		$hsl=$this->db->query("SELECT * from master_bulan");
		return $hsl;  
	}
	function update_pengaduanank($id,$penginput,$periode,$bulan,$usia6l,$usia6p,$usia12l,$usia12p,$usia15p,$usia15l,$usia18l,$usia18p,$jumlahl,$jumlahp,$jumlaht){
		$hsl=$this->db->query("UPDATE jumlah_laporan_pengaduan_anak set penginput='$penginput', periode='$periode', bulan='$bulan',  jumlah_kasus='$jumlaht', l='$jumlahl', p='$jumlahp', l06='$usia6l', p06='$usia6p', l712='$usia12l', p712='$usia12p', l1315='$usia15l', p1315='$usia15p', l1618='$usia18l', p1618='$usia18p' WHERE id='$id'");
		return $hsl;
	}
	function delete_pengaduanank($id){
		$status=1;
		$hsl=$this->db->query("UPDATE jumlah_laporan_pengaduan_anak set status='$status' WHERE id='$id'");
		return $hsl;
	}
}
?>


