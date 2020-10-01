<?php
class M_jumlah_pembinaan extends CI_Model {


	public function simpan_barang($penginput,$kecamatan,$periode,$ket,$unit,$alamat){
		$hsl2=$this->db->query("select * from kec_jumlah_pembinaan where periode='$periode' and prestasi='$ket' and kecamatan='$kecamatan' and status='0'");
		$count = $hsl2->num_rows();
		if($count == 0)
		{
		$hsl=$this->db->query("INSERT INTO kec_jumlah_pembinaan (id, penginput, kecamatan, periode, prestasi, jumlah) VALUES ('','$penginput','$kecamatan','$periode','$ket','$unit')");
		return $hsl;
		}else{
			echo "<script>alert('Double Input Data Sudah Ada Dalam Database!!')</script>";
		}
		redirect('kec_penduduk_berdasarkan_prestasi_'.$alamat,'refresh');
	}
		
	public function tampil_jumlah_pembinaan($tahun,$kecamatan){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT id, sum(jumlah) as jumlah, periode from kec_jumlah_pembinaan where status='0' and kecamatan='$kecamatan' group by periode");
		}else{
		$hsl=$this->db->query("SELECT id, sum(jumlah) as jumlah, periode from kec_jumlah_pembinaan where status='0' and periode='$tahun' and kecamatan='$kecamatan' group by periode");	
		}
		return $hsl;  
	}
	public function tampil_detailkec_jumlah_pembinaan($tahun,$kecamatan){
		$thn=$tahun;
		$hsl=$this->db->query("SELECT a.id, a.penginput, a.kecamatan, a.jenis_pembinaan, a.jumlah, a.periode , b.nama_kecamatan from kec_jumlah_pembinaan as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan  where a.status='0' and a.periode='$thn' and a.kecamatan='$kecamatan' order by a.jenis_pembinaan");
		return $hsl;  
	}
	public function tampil_jumlah_pembinaanx($periode,$kecamatan){
		$thn=$periode;
		$hsl=$this->db->query("SELECT a.*, b.nama_kecamatan as keterangan from kec_jumlah_pembinaan as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan where a.kecamatan='$kecamatan' and a.periode='$thn' and a.status='0'");
		return $hsl;
	}
	public function grafik_perbandingan_kec_jumlah_pembinaanx($tahun2, $tahun1, $kecamatan){
		$hsl=$this->db->query("SELECT a.id, a.penginput, a.kecamatan, sum(a.jumlah) as jumlah, a.periode , b.nama_kecamatan as keterangan from kec_jumlah_pembinaan as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan where a.kecamatan='$kecamatan' and a.status='0' and a.periode between '$tahun1' and '$tahun2' group by a.periode order by a.periode");	
		return $hsl;  
	}
	public function tampil_tahun($kecamatan){
		$hsl=$this->db->query("SELECT * from kec_jumlah_pembinaan where status='0' and kecamatan='$kecamatan' group by periode order by periode desc");
		return $hsl;  
	}

	function update_kec_jumlah_pembinaan($id,$penginput,$periode,$jenis,$jumlah){
		$hsl=$this->db->query("UPDATE kec_jumlah_pembinaan set periode='$periode', jumlah='$jumlah',penginput='$penginput', jenis_pembinaan='$jenis' WHERE id='$id'");

		return $hsl;
	}
	function delete_kec_jumlah_pembinaan($id){
		$status=1;
		$hsl=$this->db->query("UPDATE kec_jumlah_pembinaan set status='$status' WHERE periode='$id'");
		return $hsl;
	}

	public function tahun_crosstab($kecamatan){
		$hsl=$this->db->query("SELECT DISTINCT a.kecamatan,a.jenis_pembinaan, a.periode, a.jumlah, c.nama_kecamatan as keterangan3 from kec_jumlah_pembinaan as a join master_kecamatan as c on a.kecamatan=c.id_kecamatan where status='0' and a.kecamatan='$kecamatan'");
		return $hsl;
	}
	public function tampil_keteranganc(){
		$hsl=$this->db->query("SELECT DISTINCT jenis_pembinaan from kec_jumlah_pembinaan where status='0'");
		return $hsl;
	}
	public function tampil_periodec($tahun1,$tahun2,$kecamatan){
		$hsl=$this->db->query("SELECT DISTINCT periode from kec_jumlah_pembinaan where status='0' and kecamatan='$kecamatan' and periode BETWEEN '$tahun1' and '$tahun2' order by periode");
		return $hsl;
	}
	public function tampil_jumlahc($tahun1,$tahun2,$kecamatan){
		$hsl=$this->db->query("SELECT DISTINCT sum(jumlah) as jumlah, periode from kec_jumlah_pembinaan where status='0' and kecamatan='$kecamatan' and periode BETWEEN '$tahun1' and '$tahun2' GROUP BY periode");
		return $hsl;
	}

}
?>


