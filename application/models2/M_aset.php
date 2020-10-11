<?php
class M_aset extends CI_Model {




	public function simpan_barang($keterangan){
		$hsl2=$this->db->query("select * from master_aset where keterangan='$keterangan'");
		$count = $hsl2->num_rows();
		if($count == 0)
		{	
		$hsl=$this->db->query("INSERT INTO master_aset (id, keterangan) VALUES ('','$keterangan')");
		return $hsl;
		}else{
			echo "<script>alert('Data Sudah Diinput')</script>";
		}
		redirect('Master_aset','refresh');
	}
	public function tampil_aset(){
		$hsl=$this->db->query("SELECT * from master_aset");
		return $hsl;
	}

	function update_aset($id,$keterangan){
		$hsl=$this->db->query("UPDATE master_aset SET keterangan='$keterangan' WHERE id='$id'");
		return $hsl;
	}
	function delete_aset($id){
		$hsl=$this->db->query("DELETE FROM master_aset where id='$id'");
		return $hsl;
	}


}
?>


