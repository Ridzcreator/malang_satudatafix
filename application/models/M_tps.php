<?php
class M_tps extends CI_Model {




	public function simpan_barang($penginput,$periode,$tps,$tpst,$tpal,$tpar){
		$hsl2=$this->db->query("select * from tps where periode='$periode' and status='0'");
		$count = $hsl2->num_rows();
		if($count == 0)
		{
		$hsl=$this->db->query("INSERT INTO tps (id, penginput, periode, TPS, TPST, TPAlokal, TPAregional) VALUES ('','$penginput','$periode','$tps','$tpst','$tpal','$tpar')");
		return $hsl;
		}else{
			echo "<script>alert('Data Sudah Diinput')</script>";
		}
		redirect('Tps','refresh');
	}
	public function tampil_tps($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT * from tps where status='0'");
		}else{
		$hsl=$this->db->query("SELECT * from tps where status='0' and periode='$tahun'");	
		}
		return $hsl;  
	}
	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT * from tps where status='0' order by periode desc");
		return $hsl;  
	}
	public function tampil_tpsx($id){
		$hsl=$this->db->query("SELECT * from tps where id='$id'");
		return $hsl;
	}
	public function grafik_perbandingan_tpsx($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT * from tps where status='0' and periode between '$tahun1' and '$tahun2' order by periode");
		return $hsl;
	}
	function update_tps($id,$penginput,$periode,$tps,$tpst,$tpal,$tpar){
		$hsl=$this->db->query("UPDATE tps SET penginput='$penginput', periode='$periode', TPS='$tps', TPST='$tpst', TPAlokal='$tpal', TPAregional='$tpar' WHERE id='$id'");
		return $hsl;
	}
	function delete_tps($id){
		$status=1;
		$hsl=$this->db->query("UPDATE tps SET status='$status' WHERE id='$id'");
		return $hsl;
	}
}
?>


