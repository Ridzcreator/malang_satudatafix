<?php
class M_prestasi_yang_diraih extends CI_Model {


	public function simpan_barang($penginput,$kecamatan,$periode,$ket,$unit,$alamat){
		$hsl2=$this->db->query("select * from kec_penduduk_berdasarkan_prestasi where periode='$periode' and prestasi='$ket' and kecamatan='$kecamatan' and status='0'");
		$count = $hsl2->num_rows();
		if($count == 0)
		{
		$hsl=$this->db->query("INSERT INTO kec_penduduk_berdasarkan_prestasi (id, penginput, kecamatan, periode, prestasi, jumlah) VALUES ('','$penginput','$kecamatan','$periode','$ket','$unit')");
		return $hsl;
		}else{
			echo "<script>alert('Double Input Data Sudah Ada Dalam Database!!')</script>";
		}
		redirect('kec_penduduk_berdasarkan_prestasi_'.$alamat,'refresh');
	}
		
	public function tampil_kec_prestasi_yang_diraih($tahun,$kecamatan){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT id, sum(jumlah) as jumlah, periode from kec_penduduk_berdasarkan_prestasi where status='0' and kecamatan='$kecamatan' group by periode");
		}else{
		$hsl=$this->db->query("SELECT id, sum(jumlah) as jumlah, periode from kec_penduduk_berdasarkan_prestasi where status='0' and periode='$tahun' and kecamatan='$kecamatan' group by periode");	
		}
		return $hsl;  
	}
	public function tampil_detailkec_penduduk_berdasarkan_prestasi($tahun,$kecamatan){
		$thn=$tahun;
		$hsl=$this->db->query("SELECT a.id, a.penginput, a.kecamatan, a.prestasi, a.jumlah, a.periode , b.nama_kecamatan from kec_penduduk_berdasarkan_prestasi as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan  where a.status='0' and a.periode='$thn' and a.kecamatan='20' order by a.prestasi
");
		return $hsl;  
	}
	public function tampil_grafik($tahun,$kecamatan){
		$hsl=$this->db->query("SELECT a.id, a.penginput, a.kecamatan, a.prestasi, a.jumlah, a.periode , b.nama_kecamatan from kec_penduduk_berdasarkan_prestasi as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan where a.status='0' and a.periode='$tahun' and a.kecamatan='$kecamatan' order by a.prestasi");	
		return $hsl;  
	}
	public function grafik_perbandingan_kec_banyak_prestasix($tahun2, $tahun1, $kecamatan){
		$hsl=$this->db->query("SELECT a.id, a.penginput, a.prestasi, a.kecamatan, sum(a.jumlah) as jumlah, a.periode , b.nama_kecamatan from kec_penduduk_berdasarkan_prestasi as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan where a.kecamatan='$kecamatan' and a.status='0' and a.periode between '$tahun1' and '$tahun2' group by a.periode order by a.periode");	
		return $hsl;  
	}
	public function tampil_tahun($kecamatan){
		$hsl=$this->db->query("SELECT * from kec_penduduk_berdasarkan_prestasi where status='0' and kecamatan='$kecamatan' group by periode order by periode desc");
		return $hsl;  
	}
	public function tampil_ket(){
		$hsl=$this->db->query("SELECT * from master_lapangan_olahraga");
		return $hsl;  
	}
	function update_kec_banyak_prestasi($id,$penginput,$periode,$prestasi,$jumlah){
		$hsl=$this->db->query("UPDATE kec_penduduk_berdasarkan_prestasi set periode='$periode', jumlah='$jumlah',penginput='$penginput' WHERE id='$id'");

		return $hsl;
	}
	function delete_kec_banyak_prestasi($id){
		$status=1;
		$hsl=$this->db->query("UPDATE kec_penduduk_berdasarkan_prestasi set status='$status' WHERE periode='$id'");
		return $hsl;
	}public function tahun_crosstab($kecamatan){
		$hsl=$this->db->query("SELECT DISTINCT a.kecamatan,a.prestasi, a.periode, a.jumlah, c.nama_kecamatan as keterangan3 from kec_penduduk_berdasarkan_prestasi as a join master_kecamatan as c on a.kecamatan=c.id_kecamatan where status='0' and a.kecamatan='$kecamatan'
");
		return $hsl;
	}
	public function tampil_keteranganc(){
		$hsl=$this->db->query("SELECT DISTINCT prestasi from kec_penduduk_berdasarkan_prestasi where status='0'");
		return $hsl;
	}
	public function tampil_periodec($tahun1,$tahun2,$kecamatan){
		$hsl=$this->db->query("SELECT DISTINCT periode from kec_penduduk_berdasarkan_prestasi where status='0' and kecamatan='$kecamatan' and periode BETWEEN '$tahun1' and '$tahun2' order by periode");
		return $hsl;
	}
	public function tampil_jumlahc($tahun1,$tahun2,$kecamatan){
		$hsl=$this->db->query("SELECT DISTINCT sum(jumlah) as jumlah, periode from kec_penduduk_berdasarkan_prestasi where status='0' and kecamatan='$kecamatan' and periode BETWEEN '$tahun1' and '$tahun2' GROUP BY periode");
		return $hsl;
	}
		public function tampil_jumlahxc($tahun1,$tahun2,$kecamatan){
		$hsl=$this->db->query("SELECT DISTINCT sum(jumlah) as jumlah from kec_penduduk_berdasarkan_prestasi where status='0' and kecamatan='$kecamatan' and periode BETWEEN '$tahun1' and '$tahun2'");
		return $hsl;
	}
}
?>


