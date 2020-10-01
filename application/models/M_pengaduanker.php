<?php
class M_pengaduanker extends CI_Model {




	public function simpan_barang($penginput,$periode,$bulan,$lfisik,$fisik,$lpsikis,$psikis,$lseksual,$seksual,$leksploitasi,$eksploitasi,$lpenelantaran,$penelantaran,$llainnya,$lainnya){
		$hsl2=$this->db->query("select * from jumlah_laporan_kekerasan where bulan='$bulan' and periode='$periode' and status='0'");
		$count = $hsl2->num_rows();
		if($count == 0)
		{
		$hsl=$this->db->query("INSERT INTO jumlah_laporan_kekerasan (id, penginput, periode, bulan, lfisik, pfisik, lpsikis, ppsikis, lseksual, pseksual, leksploitasi, peksploitasi, lpenelantaran, ppenelantaran, llainnya, plainnya) VALUES ('','$penginput','$periode','$bulan','$lfisik','$fisik','$lpsikis','$psikis','$lseksual','$seksual','$leksploitasi','$eksploitasi','$lpenelantaran','$penelantaran','$llainnya','$lainnya')");
		return $hsl;
		}else{
			echo "<script>alert('Data Sudah Diinput')</script>";
		}
		redirect('Pengaduanker','refresh');
	}
	public function tampil_pengaduanker($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT a.id, a.bulan, a.periode, sum(a.lfisik) as lfisik, sum(a.pfisik) as pfisik, sum(a.lpsikis) as lpsikis, sum(a.ppsikis) as ppsikis, sum(a.lseksual) as lseksual, sum(a.pseksual) as pseksual, sum(a.leksploitasi) as leksploitasi, sum(a.peksploitasi) as peksploitasi, sum(a.lpenelantaran) as lpenelantaran, sum(a.ppenelantaran) as ppenelantaran, sum(a.llainnya) as llainnya, sum(a.plainnya) as plainnya, a.status, b.kode, b.keterangan from jumlah_laporan_kekerasan as a join master_bulan as b on a.bulan=b.kode where a.status='0' group by a.periode order by a.periode desc");
		}else{
		$hsl=$this->db->query("SELECT a.id, a.bulan, a.periode, sum(a.lfisik) as lfisik, sum(a.pfisik) as pfisik, sum(a.lpsikis) as lpsikis, sum(a.ppsikis) as ppsikis, sum(a.lseksual) as lseksual, sum(a.pseksual) as pseksual, sum(a.leksploitasi) as leksploitasi, sum(a.peksploitasi) as peksploitasi, sum(a.lpenelantaran) as lpenelantaran, sum(a.ppenelantaran) as ppenelantaran, sum(a.llainnya) as llainnya, sum(a.plainnya) as plainnya, a.status, b.kode, b.keterangan from jumlah_laporan_kekerasan as a join master_bulan as b on a.bulan=b.kode where a.status='0' and a.periode='$tahun' group by a.periode order by a.periode desc");	
		}
		return $hsl;  
	}
	public function tampil_detailpengaduanker($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT a.id, a.bulan, a.periode, a.lfisik, a.pfisik, a.lpsikis, a.ppsikis, a.lseksual, a.pseksual, a.leksploitasi, a.peksploitasi, a.lpenelantaran, a.ppenelantaran, a.llainnya, a.plainnya, a.status, b.kode, b.keterangan from jumlah_laporan_kekerasan as a join master_bulan as b on a.bulan=b.kode where a.status='0' order by a.bulan");
		}else{
		$hsl=$this->db->query("SELECT a.id, a.bulan, a.periode, a.lfisik, a.pfisik, a.lpsikis, a.ppsikis, a.lseksual, a.pseksual, a.leksploitasi, a.peksploitasi, a.lpenelantaran, a.ppenelantaran, a.llainnya, a.plainnya, a.status, b.kode, b.keterangan from jumlah_laporan_kekerasan as a join master_bulan as b on a.bulan=b.kode where a.status='0' and a.periode='$tahun' order by a.bulan");	
		}
		return $hsl;  
	}
	public function tampil_grafik($tahun){
		$hsl=$this->db->query("SELECT a.id, a.bulan, a.periode, a.lfisik, a.pfisik, a.lpsikis, a.ppsikis, a.lseksual, a.pseksual, a.leksploitasi, a.peksploitasi, a.lpenelantaran, a.ppenelantaran, a.llainnya, a.plainnya, a.status, b.kode, b.keterangan from jumlah_laporan_kekerasan as a join master_bulan as b on a.bulan=b.kode where a.status='0' and a.periode='$tahun' order by a.bulan");	
		return $hsl;  
	}
	public function grafik_perbandingan_pengaduankerx($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT a.id, a.bulan, a.periode, sum(a.lfisik) as lfisik, sum(a.pfisik) as pfisik, sum(a.lpsikis) as lpsikis, sum(a.ppsikis) as ppsikis, sum(a.lseksual) as lseksual, sum(a.pseksual) as pseksual, sum(a.leksploitasi) as leksploitasi, sum(a.peksploitasi) as peksploitasi, sum(a.lpenelantaran) as lpenelantaran, sum(a.ppenelantaran) as ppenelantaran, sum(a.llainnya) as llainnya, sum(a.plainnya) as plainnya, a.status, b.kode, b.keterangan from jumlah_laporan_kekerasan as a join master_bulan as b on a.bulan=b.kode where a.status='0' and a.periode between '$tahun1' and '$tahun2' group by a.periode order by a.periode desc");	
		return $hsl;  
	}
	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT * from jumlah_laporan_kekerasan where status='0' group by periode order by periode desc");
		return $hsl;  
	}
	public function tampil_bulan(){
		$hsl=$this->db->query("SELECT * from master_bulan");
		return $hsl;  
	}
	function update_pengaduanker($id,$penginput,$periode,$bulan,$lfisik,$fisik,$lpsikis,$psikis,$lseksual,$seksual,$leksploitasi,$eksploitasi,$lpenelantaran,$penelantaran,$llainnya,$lainnya){
		$hsl=$this->db->query("UPDATE jumlah_laporan_kekerasan set penginput='$penginput', periode='$periode', bulan='$bulan', lfisik='$lfisik', lpsikis='$lpsikis', lseksual='$lseksual', leksploitasi='$leksploitasi', lpenelantaran='$lpenelantaran', llainnya='$llainnya', pfisik='$fisik', ppsikis='$psikis', pseksual='$seksual', peksploitasi='$eksploitasi', ppenelantaran='$penelantaran', plainnya='$lainnya' WHERE id='$id'");
		return $hsl;
	}
	function delete_pengaduanker($id){
		$status=1;
		$hsl=$this->db->query("UPDATE jumlah_laporan_kekerasan set status='$status' WHERE id='$id'");
		return $hsl;
	}
}
?>


