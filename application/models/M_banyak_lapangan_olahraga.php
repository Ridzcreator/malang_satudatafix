<?php
class M_banyak_lapangan_olahraga extends CI_Model {




	public function simpan_barang($penginput,$kecamatan,$periode,$ket,$unit,$alamat){
		$hsl2=$this->db->query("select * from kec_banyak_lapangan_olahraga where periode='$periode' and jenis_olahraga='$ket' and kecamatan='$kecamatan' and status='0'");
		$count = $hsl2->num_rows();
		if($count == 0)
		{
		$hsl=$this->db->query("INSERT INTO kec_banyak_lapangan_olahraga (id, penginput, kecamatan, periode, jenis_olahraga, jumlah) VALUES ('','$penginput','$kecamatan','$periode','$ket','$unit')");
		return $hsl;
		}else{
			echo "<script>alert('Double Input Data Sudah Ada Dalam Database!!')</script>";
		}
		redirect('Kec_banyak_lapangan_olahraga_'.$alamat,'refresh');
	}
		
	public function tampil_kec_banyak_lapangan_olahraga($tahun,$kecamatan){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT id, sum(jumlah) as jumlah, periode from kec_banyak_lapangan_olahraga where status='0' and kecamatan='$kecamatan' group by periode");
		}else{
		$hsl=$this->db->query("SELECT id, sum(jumlah) as jumlah, periode from kec_banyak_lapangan_olahraga where status='0' and periode='$tahun' and kecamatan='$kecamatan' group by periode");	
		}
		return $hsl;  
	}
	public function tampil_detailkec_banyak_lapangan_olahraga($tahun,$kecamatan){
		$thn=$tahun;
		$hsl=$this->db->query("SELECT a.id, a.penginput, a.kecamatan, a.jenis_olahraga, a.jumlah, a.periode , b.nama_kecamatan, c.keterangan from kec_banyak_lapangan_olahraga as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan join master_lapangan_olahraga as c on a.jenis_olahraga=c.id where a.status='0' and a.periode='$tahun' and a.kecamatan='$kecamatan' order by a.jenis_olahraga");
		return $hsl;  
	}
	public function tampil_grafik($tahun,$kecamatan){
		$hsl=$this->db->query("SELECT a.id, a.penginput, a.kecamatan, a.jenis_olahraga, a.jumlah, a.periode , b.nama_kecamatan, c.keterangan from kec_banyak_lapangan_olahraga as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan join master_lapangan_olahraga as c on a.jenis_olahraga=c.id where a.status='0' and a.periode='$tahun' and a.kecamatan='$kecamatan' order by a.jenis_olahraga");	
		return $hsl;  
	}
	public function grafik_perbandingan_kec_banyak_lapangan_olahragax($tahun2, $tahun1, $kecamatan){
		$hsl=$this->db->query("SELECT a.id, a.penginput, a.jenis_olahraga, a.kecamatan, sum(a.jumlah) as jumlah, a.periode , b.nama_kecamatan, c.keterangan from kec_banyak_lapangan_olahraga as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan join master_lapangan_olahraga as c on a.jenis_olahraga=c.id where a.kecamatan='$kecamatan' and a.status='0' and a.periode between '$tahun1' and '$tahun2' group by a.periode order by a.periode");	
		return $hsl;  
	}
	public function tampil_tahun($kecamatan){
		$hsl=$this->db->query("SELECT * from kec_banyak_lapangan_olahraga where status='0' and kecamatan='$kecamatan' group by periode order by periode desc");
		return $hsl;  
	}
	public function tampil_ket(){
		$hsl=$this->db->query("SELECT * from master_lapangan_olahraga");
		return $hsl;  
	}
	function update_kec_banyak_lapangan_olahraga($id,$penginput,$periode,$ket,$unit){
		$hsl=$this->db->query("UPDATE kec_banyak_lapangan_olahraga set penginput='$penginput', periode='$periode', jenis_olahraga='$ket', jumlah='$unit' WHERE id='$id'");
		return $hsl;
	}
	function delete_kec_banyak_lapangan_olahraga($id){
		$status=1;
		$hsl=$this->db->query("UPDATE kec_banyak_lapangan_olahraga set status='$status' WHERE id='$id'");
		return $hsl;
	}public function tahun_crosstab($kecamatan){
		$hsl=$this->db->query("SELECT DISTINCT a.kecamatan, a.periode, a.jumlah, b.keterangan as keterangan1, c.nama_kecamatan as keterangan3 from kec_banyak_lapangan_olahraga as a join master_lapangan_olahraga as b on a.jenis_olahraga=b.id join master_kecamatan as c on a.kecamatan=c.id_kecamatan where status='0' and a.kecamatan='$kecamatan'");
		return $hsl;
	}
	public function tampil_keteranganc(){
		$hsl=$this->db->query("SELECT DISTINCT a.jenis_olahraga, b.keterangan as keterangan1 from kec_banyak_lapangan_olahraga as a join master_lapangan_olahraga as b on a.jenis_olahraga=b.id where status='0'");
		return $hsl;
	}
	public function tampil_periodec($tahun1,$tahun2,$kecamatan){
		$hsl=$this->db->query("SELECT DISTINCT periode from kec_banyak_lapangan_olahraga where status='0' and kecamatan='$kecamatan' and periode BETWEEN '$tahun1' and '$tahun2' order by periode");
		return $hsl;
	}
	public function tampil_jumlahc($tahun1,$tahun2,$kecamatan){
		$hsl=$this->db->query("SELECT DISTINCT sum(jumlah) as jumlah, periode from kec_banyak_lapangan_olahraga where status='0' and kecamatan='$kecamatan' and periode BETWEEN '$tahun1' and '$tahun2' GROUP BY periode");
		return $hsl;
	}
		public function tampil_jumlahxc($tahun1,$tahun2,$kecamatan){
		$hsl=$this->db->query("SELECT DISTINCT sum(jumlah) as jumlah from kec_banyak_lapangan_olahraga where status='0' and kecamatan='$kecamatan' and periode BETWEEN '$tahun1' and '$tahun2'");
		return $hsl;
	}
}
?>


