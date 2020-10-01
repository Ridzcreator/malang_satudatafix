<?php
class M_pencariantapend extends CI_Model {
	public function simpan_barang($penginput,$periode,$pendidikan,$jl,$jp,$jumlah){
		$hsl2=$this->db->query("select * from jumlah_pencari_menurut_pendidikan_ditamatkan where pendidikan='$pendidikan' and periode='$periode' and status='0'");
		$count = $hsl2->num_rows();
		if($count == 0)
		{	
		$hsl=$this->db->query("INSERT INTO jumlah_pencari_menurut_pendidikan_ditamatkan (id, penginput, periode, pendidikan, l, p, jumlah) VALUES ('','$penginput','$periode','$pendidikan','$jl','$jp','$jumlah')");
		return $hsl;
		}else{
			echo "<script>alert('Data Sudah Diinput')</script>";
		}
		redirect('Pencariantapend','refresh');
	}
	public function tampil_pencariantapend($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT a.id, a.pendidikan, sum(a.l) as l, sum(a.p) as p, sum(a.jumlah) as jumlah, a.periode, b.keterangan from jumlah_pencari_menurut_pendidikan_ditamatkan as a join master_pendidikan as b on a.pendidikan=b.id where a.status='0' group by periode");
		}else{
		$hsl=$this->db->query("SELECT a.id, a.pendidikan, sum(a.l) as l, sum(a.p) as p, sum(a.jumlah) as jumlah, a.periode, b.keterangan from jumlah_pencari_menurut_pendidikan_ditamatkan as a join master_pendidikan as b on a.pendidikan=b.id where a.status='0' and a.periode='$tahun' group by periode");	
		}
		return $hsl;  
	}
	public function tampil_detailpencariantapend($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT a.id, a.pendidikan, a.l, a.p, a.jumlah, a.periode, b.keterangan, b.id from jumlah_pencari_menurut_pendidikan_ditamatkan as a join master_pendidikan as b on a.pendidikan=b.id where a.status='0' order by b.id");
		}else{
		$hsl=$this->db->query("SELECT a.id, a.pendidikan, a.l, a.p, a.jumlah, a.periode, b.keterangan from jumlah_pencari_menurut_pendidikan_ditamatkan as a join master_pendidikan as b on a.pendidikan=b.id where a.status='0' and a.periode='$tahun' order by b.id");	
		}
		return $hsl;  
	}
	public function tampil_grafik($tahun){
		$hsl=$this->db->query("SELECT a.id, a.pendidikan, a.l, a.p, a.jumlah, a.periode, b.keterangan from jumlah_pencari_menurut_pendidikan_ditamatkan as a join master_pendidikan as b on a.pendidikan=b.id where a.status='0' and a.periode='$tahun'");	
		return $hsl;  
	}
	public function grafik_perbandingan_pencariantapendx($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT a.id, a.pendidikan, a.l, a.p, a.jumlah, sum(a.l) as xl, sum(a.p) as xp, sum(a.jumlah) as xjumlah, a.periode, b.keterangan from jumlah_pencari_menurut_pendidikan_ditamatkan as a join master_pendidikan as b on a.pendidikan=b.id where a.status='0' and a.periode between '$tahun1' and '$tahun2' group by periode");	
		return $hsl;  
	}
	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT * from jumlah_pencari_menurut_pendidikan_ditamatkan where status='0' group by periode order by periode desc");
		return $hsl;  
	}
	public function tampil_pendidikan(){
		$hsl=$this->db->query("SELECT * from master_pendidikan");
		return $hsl;  
	}
	function update_pencariantapend($id,$penginput,$periode,$pendidikan,$jl,$jp,$jumlah){
		$hsl=$this->db->query("UPDATE jumlah_pencari_menurut_pendidikan_ditamatkan set penginput='$penginput', periode='$periode', pendidikan='$pendidikan', l='$jl', p='$jp', jumlah='$jumlah' WHERE id='$id'");
		return $hsl;
	}
	function delete_pencariantapend($id){
		$status=1;
		$hsl=$this->db->query("UPDATE jumlah_pencari_menurut_pendidikan_ditamatkan set status='$status' WHERE id='$id'");
		return $hsl;
	}
}
?>


