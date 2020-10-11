<?php
class M_jumlah_aset extends CI_Model {




	public function simpan_barang($penginput,$periode,$kecamatan,$value,$value1,$value2,$alamat){
		$hsl2=$this->db->query("select * from kec_jumlah_aset where periode='$periode' and kecamatan='$kecamatan' and aset='$value' and status='0'");
		$count = $hsl2->num_rows();
		if($count == 0)
		{
		$hsl=$this->db->query("INSERT INTO kec_jumlah_aset (id, penginput, periode, kecamatan, aset, jumlah, nominal) VALUES ('','$penginput','$periode','$kecamatan','$value','$value1','$value2')");
		return $hsl;
		}else{
			echo "<script>alert('Double Input Data Sudah Ada Dalam Database!!')</script>";
		}
		redirect('Kec_jumlah_aset_'.$alamat,'refresh');
	}
	public function tampil_jumlah_aset($tahun,$kecamatan){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT id, sum(jumlah) as jumlah, sum(nominal) as nominal, periode from kec_jumlah_aset where status='0' and kecamatan='$kecamatan' group by periode");
		}else{
		$hsl=$this->db->query("SELECT id, sum(jumlah) as jumlah, sum(nominal) as nominal, periode from kec_jumlah_aset where status='0' and periode='$tahun' and kecamatan='$kecamatan'");	
		}
		return $hsl;  
	}

	public function tampil_aset(){
		$hsl=$this->db->query("SELECT * FROM master_aset");
		return $hsl;
	}
	
	public function tampil_aset1(){
		$hsl=$this->db->query("SELECT * FROM master_aset");
		return $hsl;
	}

	public function tampil_tahun($kecamatan){
		$hsl=$this->db->query("SELECT * from kec_jumlah_aset where status='0' and kecamatan='$kecamatan' GROUP BY periode order by periode");
		return $hsl;  
	}
	public function tampil_jumlah_asetx($periode,$kecamatan){
		$thn=$periode;
		$hsl=$this->db->query("SELECT a.*, b.nama_kecamatan , c.keterangan as keterangan from kec_jumlah_aset as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan join master_aset as c on a.aset=c.id where a.kecamatan='$kecamatan' and a.periode='$thn' and a.status='0'");
		return $hsl;
	}
	public function grafik_perbandingan_jumlah_asetx($tahun2, $tahun1, $kecamatan){
		$hsl=$this->db->query("SELECT a.id, a.penginput, a.aset, a.kecamatan, sum(a.jumlah) as jumlah, sum(a.nominal) as nominal, a.periode , b.nama_kecamatan, c.keterangan from kec_jumlah_aset as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan join master_aset as c on a.aset=c.id where a.kecamatan='$kecamatan' and a.status='0' and a.periode between '$tahun1' and '$tahun2' group by a.periode order by a.periode");
		return $hsl;
	}
	function update_jumlah_aset($id,$penginput,$periode,$kecamatan,$value,$value1,$value2,$alamat){
		$hsl=$this->db->query("UPDATE kec_jumlah_aset SET penginput='$penginput', periode='$periode', aset='$value', jumlah='$value1', nominal='$value2' WHERE id='$id'");
		return $hsl;
	}
	function delete_jumlah_aset($id){
		$status=1;
		$hsl=$this->db->query("UPDATE kec_jumlah_aset SET status='$status' WHERE id='$id'");
		return $hsl;
	}
	
}
?>


