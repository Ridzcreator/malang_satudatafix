<?php
class M_penduduk_berdasarkan_agama extends CI_Model {




	public function simpan_barang($penginput,$periode,$kecamatan,$value,$value1,$alamat){
		$hsl2=$this->db->query("select * from kec_penduduk_berdasarkan_agama where periode='$periode' and kecamatan='$kecamatan' and agama='$value' and status='0'");
		$count = $hsl2->num_rows();
		if($count == 0)
		{
		$hsl=$this->db->query("INSERT INTO kec_penduduk_berdasarkan_agama (id, penginput, periode, kecamatan, agama, jumlah) VALUES ('','$penginput','$periode','$kecamatan','$value','$value1')");
		return $hsl;
		}else{
			echo "<script>alert('Double Input Data Sudah Ada Dalam Database!!')</script>";
		}
		redirect('Kec_penduduk_berdasarkan_agama_'.$alamat,'refresh');
	}
	public function tampil_jumlah_penduduk_agama($tahun,$kecamatan){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT id, sum(jumlah) as jumlah, periode from kec_penduduk_berdasarkan_agama where status='0' and kecamatan='$kecamatan' group by periode");
		}else{
		$hsl=$this->db->query("SELECT id, sum(jumlah) as jumlah, periode from kec_penduduk_berdasarkan_agama where status='0' and periode='$tahun' and kecamatan='$kecamatan'");	
		}
		return $hsl;  
	}

	public function tampil_agama(){
		$hsl=$this->db->query("SELECT * FROM master_agama");
		return $hsl;
	}
	
	public function tampil_agama1(){
		$hsl=$this->db->query("SELECT * FROM master_agama");
		return $hsl;
	}

	public function tampil_tahun($kecamatan){
		$hsl=$this->db->query("SELECT * from kec_penduduk_berdasarkan_agama where status='0' and kecamatan='$kecamatan' GROUP BY periode order by periode");
		return $hsl;  
	}
	public function tampil_jumlah_penduduk_agamax($periode,$kecamatan){
		$thn=$periode;
		$hsl=$this->db->query("SELECT a.*, b.nama_kecamatan , c.keterangan as keterangan from kec_penduduk_berdasarkan_agama as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan join master_agama as c on a.agama=c.id where a.kecamatan='$kecamatan' and a.periode='$thn' and a.status='0'");
		return $hsl;
	}
	public function grafik_perbandingan_penduduk_berdasarkan_agamax($tahun2, $tahun1, $kecamatan){
		$hsl=$this->db->query("SELECT a.id, a.penginput, a.agama, a.kecamatan, sum(a.jumlah) as jumlah, a.periode , b.nama_kecamatan, c.keterangan from kec_penduduk_berdasarkan_agama as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan join master_agama as c on a.agama=c.id where a.kecamatan='$kecamatan' and a.status='0' and a.periode between '$tahun1' and '$tahun2' group by a.periode order by a.periode");
		return $hsl;
	}
	function update_jumlah_penduduk_agama($id,$penginput,$periode,$kecamatan,$value,$value1){
		$hsl=$this->db->query("UPDATE kec_penduduk_berdasarkan_agama SET penginput='$penginput', periode='$periode', agama='$value', jumlah='$value1' WHERE id='$id'");
		return $hsl;
	}
	function delete_jumlah_penduduk_agama($id){
		$status=1;
		$hsl=$this->db->query("UPDATE kec_penduduk_berdasarkan_agama SET status='$status' WHERE id='$id'");
		return $hsl;
	}

	public function tahun_crosstab($kecamatan){
		$hsl=$this->db->query("SELECT DISTINCT a.kecamatan, a.periode, a.jumlah, b.keterangan as keterangan1, c.nama_kecamatan as keterangan3 from kec_penduduk_berdasarkan_agama as a join master_agama as b on a.agama=b.id join master_kecamatan as c on a.kecamatan=c.id_kecamatan where status='0' and a.kecamatan='$kecamatan'");
		return $hsl;
	}
	public function tampil_keteranganc(){
		$hsl=$this->db->query("SELECT DISTINCT a.agama, b.keterangan as keterangan1 from kec_penduduk_berdasarkan_agama as a join master_agama as b on a.agama=b.id where status='0'");
		return $hsl;
	}
	public function tampil_periodec($tahun1,$tahun2,$kecamatan){
		$hsl=$this->db->query("SELECT DISTINCT periode from kec_penduduk_berdasarkan_agama where status='0' and kecamatan='$kecamatan' and periode BETWEEN '$tahun1' and '$tahun2' order by periode");
		return $hsl;
	}
	public function tampil_jumlahc($tahun1,$tahun2,$kecamatan){
		$hsl=$this->db->query("SELECT DISTINCT sum(jumlah) as jumlah, periode from kec_penduduk_berdasarkan_agama where status='0' and kecamatan='$kecamatan' and periode BETWEEN '$tahun1' and '$tahun2' GROUP BY periode");
		return $hsl;
	}
		public function tampil_jumlahxc($tahun1,$tahun2,$kecamatan){
		$hsl=$this->db->query("SELECT DISTINCT sum(jumlah) as jumlah from kec_penduduk_berdasarkan_agama where status='0' and kecamatan='$kecamatan' and periode BETWEEN '$tahun1' and '$tahun2'");
		return $hsl;
	}
}
?>


