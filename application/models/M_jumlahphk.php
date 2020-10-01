<?php
class M_jumlahphk extends CI_Model {




	public function simpan_barang($penginput,$periode,$kasus,$pekerja){
		$hsl2=$this->db->query("select * from jumlah_phk where periode='$periode' and status='0'");
		$count = $hsl2->num_rows();
		if($count == 0)
		{	
		$hsl=$this->db->query("INSERT INTO jumlah_phk (id, penginput, periode, kasus, pekerja) VALUES ('','$penginput','$periode','$kasus','$pekerja')");
		return $hsl;
		}else{
			echo "<script>alert('Data Sudah Diinput')</script>";
		}
		redirect('Jumlahphk','refresh');
	}
	public function tampil_jumlahphk($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT * from jumlah_phk where status='0' order by periode desc");
		}else{
		$hsl=$this->db->query("SELECT * from jumlah_phk where status='0' and periode='$tahun' order by periode desc");	
		}
		return $hsl;  
	}

	
public function tampil_jumlahphkx($tahun){
		$thn=$tahun;
		$hsl=$this->db->query("select (kasus+pekerja) as jumlah from jumlah_phk where status=0 and periode = '$thn'");	
		return $hsl;  
	}

	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT * from jumlah_phk where status='0' group by periode order by periode desc");
		return $hsl;  
	}

	public function tampil_tahunmax(){
		$hsl=$this->db->query("SELECT max(periode) as periode from jumlah_phk where status='0' order by periode desc");
		return $hsl;  
	}
	function update_jumlahphk($id,$penginput,$periode,$kasus,$pekerja){
		$hsl=$this->db->query("UPDATE jumlah_phk set penginput='$penginput', periode='$periode', kasus='$kasus', pekerja='$pekerja' WHERE id='$id'");
		return $hsl;
	}
	function delete_jumlahphk($id){
		$status=1;
		$hsl=$this->db->query("UPDATE jumlah_phk set status='$status' WHERE id='$id'");
		return $hsl;
	}
	function grafik_perbandingan_jumlahphk($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT * from jumlah_phk where status='0' and periode between '$tahun1' and '$tahun2' order by periode");
		return $hsl;
	}
}
?>


