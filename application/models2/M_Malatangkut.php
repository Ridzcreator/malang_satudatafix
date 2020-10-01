<?php
class M_Malatangkut extends CI_Model {
	public function simpan_barang($keterangan){
		$hsl2=$this->db->query("select * from master_alatangkut where keterangan='$keterangan'");
		$count = $hsl2->num_rows();
		if($count == 0)
		{	
		$hsl=$this->db->query("INSERT INTO master_alatangkut (id, keterangan) VALUES ('','$keterangan')");
		return $hsl;
		}else{
			echo "<script>alert('Data Sudah Diinput')</script>";
		}
		redirect('Malatangkut','refresh');
	}
	public function tampil_malatangkut(){
		$hsl=$this->db->query("SELECT * from master_alatangkut");
		return $hsl;
	}

	function update_malatangkut($id,$keterangan){
		$hsl=$this->db->query("UPDATE master_alatangkut SET keterangan='$keterangan' WHERE id='$id'");
		return $hsl;
	}
	function delete_malatangkut($id){
		$hsl=$this->db->query("DELETE FROM master_alatangkut where id='$id'");
		return $hsl;
	}


}
?>


