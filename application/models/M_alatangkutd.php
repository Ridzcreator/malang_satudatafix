<?php
class M_alatangkutd extends CI_Model {




	public function simpan_barang($penginput,$periode,$alat,$unit){
		$hsl2=$this->db->query("select * from alatangkutd where periode='$periode' and alatangkut='$alat' and status='0'");
		$count = $hsl2->num_rows();
		if($count == 0)
		{
		$hsl=$this->db->query("INSERT INTO alatangkutd (id, penginput, periode, alatangkut, jumlah) VALUES ('','$penginput','$periode','$alat','$unit')");
		return $hsl;
		}else{
			echo "<script>alert('Data Sudah Diinput')</script>";
		}
		redirect('Alatangkutd','refresh');
	}
		
	public function tampil_alatangkutd($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT id, sum(jumlah) as jumlah, periode from alatangkutd where status='0' group by periode");
		}else{
		$hsl=$this->db->query("SELECT id, sum(jumlah) as jumlah, periode from alatangkutd where status='0' and periode='$tahun' group by periode");	
		}
		return $hsl;  
	}
	public function tampil_detailalatangkutd($tahun){
		$thn=$tahun;
		$hsl=$this->db->query("SELECT a.id, a.penginput, a.alatangkut, a.jumlah, a.periode , b.keterangan from alatangkutd as a join master_alatangkut as b on a.alatangkut=b.id where a.status='0' and a.periode='$tahun' order by b.id");
		return $hsl;  
	}
	public function tampil_truk($tahun){
		$thn=$tahun;
		$hsl=$this->db->query("SELECT a.id, a.penginput, a.alatangkut, a.jumlah, a.periode , b.keterangan from alatangkutd as a join master_alatangkut as b on a.alatangkut=b.id where a.status='0' and a.periode='$thn' and b.keterangan='Truk' order by b.id");
		return $hsl;  
	}
	
	public function tampil_grafik($tahun){
		$hsl=$this->db->query("SELECT a.id, a.penginput, a.alatangkut, a.jumlah, a.periode , b.keterangan from alatangkutd as a join master_alatangkut as b on a.alatangkut=b.id where a.status='0' and a.periode='$tahun' order by b.id");	
		return $hsl;  
	}
	public function grafik_perbandingan_alatangkutdx($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT a.id, a.penginput, a.alatangkut, sum(a.jumlah) as jumlah, a.periode , b.keterangan from alatangkutd as a join master_alatangkut as b on a.alatangkut=b.id where a.status='0' and a.periode between '$tahun1' and '$tahun2' group by a.periode order by a.periode");	
		return $hsl;  
	}
	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT * from alatangkutd where status='0' group by periode order by periode desc");
		return $hsl;  
	}
	public function tampil_tahunmax(){
		$hsl=$this->db->query("SELECT max(periode) as tahun from alatangkutd where status='0' order by periode desc");
		return $hsl;  
	}
	public function tampil_alat(){
		$hsl=$this->db->query("SELECT * from master_alatangkut");
		return $hsl;  
	}
	function update_alatangkutd($id,$penginput,$periode,$alat,$unit){
		$hsl=$this->db->query("UPDATE alatangkutd set penginput='$penginput', periode='$periode', alatangkut='$alat', jumlah='$unit' WHERE id='$id'");
		return $hsl;
	}
	function delete_alatangkutd($id){
		$status=1;
		$hsl=$this->db->query("UPDATE alatangkutd set status='$status' WHERE id='$id'");
		return $hsl;
	}public function tahun_crosstab(){
		$hsl=$this->db->query("SELECT DISTINCT a.alatangkut, a.periode, a.jumlah, b.keterangan as keterangan1 from alatangkutd as a join master_alatangkut as b on a.alatangkut=b.id where status='0'");
		return $hsl;
	}
	public function tampil_keteranganc(){
		$hsl=$this->db->query("SELECT DISTINCT a.alatangkut, b.keterangan as keterangan1 from alatangkutd as a join master_alatangkut as b on a.alatangkut=b.id where status='0'");
		return $hsl;
	}
	public function tampil_periodec($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT periode from alatangkutd where status='0' and periode BETWEEN '$tahun1' and '$tahun2' order by periode");
		return $hsl;
	}
	public function tampil_jumlahc($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT sum(jumlah) as jumlah, periode from alatangkutd where status='0' and periode BETWEEN '$tahun1' and '$tahun2' GROUP BY periode");
		return $hsl;
	}
		public function tampil_jumlahxc($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT sum(jumlah) as jumlah from alatangkutd where status='0' and periode BETWEEN '$tahun1' and '$tahun2'");
		return $hsl;
	}
}
?>


