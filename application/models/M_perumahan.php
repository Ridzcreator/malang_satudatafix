<?php
class M_perumahan extends CI_Model {

	public function simpan_barang($penginput,$periode,$srt,$ssrt,$ssrtt,$racun,$racunt,$limbah,$limbaht){
		$hsl2=$this->db->query("select * from jenis_sampah where periode='$periode' and status='0'");
		$count = $hsl2->num_rows();
		if($count == 0)
		{
		$hsl=$this->db->query("INSERT INTO jenis_sampah (id, penginput, periode, hasilsrt, sejenissrt, tertangani, beracun, beracunterolah, limbah, limbahterolah) VALUES ('','$kodeinput','$penginput','$periode','$srt','$ssrt','$ssrtt','$racun','$racunt','$limbah','$limbaht')");
		return $hsl;
		}else{
			echo "<script>alert('Data Sudah Ada Database')</script>";
		}
		redirect('Perumahan','refresh');
	}
	public function tampil_perumahan($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT * from jenis_sampah where status='0'");
		}else{
		$hsl=$this->db->query("SELECT * from jenis_sampah where status='0' and periode='$thn'");
		}
		return $hsl;
	}
	public function tampil_jumlahmax($tahun){
	
		$hsl=$this->db->query("SELECT sum(hasilsrt+sejenissrt+tertangani+beracun+beracunterolah+limbah+limbahterolah) as jumlah from jenis_sampah where periode='$tahun' AND status='0'");
		
		return $hsl;
	}
	public function tampil_jumlahmin($tahun){
	
		$hsl=$this->db->query("SELECT sum(hasilsrt+sejenissrt+tertangani+beracun+beracunterolah+limbah+limbahterolah) as jumlah from jenis_sampah where periode='$tahun' AND status='0'");
		
		return $hsl;
	}
	public function tampil_tahunmax(){
		$hsl=$this->db->query("SELECT max(periode) as tahun from jenis_sampah where status='0'");
		return $hsl;
	}
	public function tampil_tahunmin(){
		$hsl=$this->db->query("SELECT max(periode-1) as tahun from jenis_sampah where status='0'");
		return $hsl;
	}
	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT * from jenis_sampah where status='0' group by periode order by periode desc");
		return $hsl;
	}
	public function tampil_perumahanx($id){
		$hsl=$this->db->query("SELECT * from jenis_sampah where id='$id'");
		return $hsl;
	}
	public function grafik_perbandingan_perumahanx($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT * from jenis_sampah where status='0' and periode between '$tahun1' and '$tahun2' order by periode");
		return $hsl;
	}
	function update_perumahan($id,$penginput,$periode,$srt,$ssrt,$ssrtt,$racun,$racunt,$limbah,$limbaht){
		$hsl=$this->db->query("UPDATE jenis_sampah SET penginput='$penginput', periode='$periode', hasilsrt='$srt', sejenissrt='$ssrt', tertangani='$ssrtt', beracun='$racun', beracunterolah='$racunt', limbah='$limbah', limbahterolah='$limbaht' WHERE id='$id'");
		return $hsl;
	}
	function delete_perumahan($id){
		$status=1;
		$hsl=$this->db->query("UPDATE jenis_sampah SET status='$status' WHERE id='$id'");
		return $hsl;
	}

}
?>


