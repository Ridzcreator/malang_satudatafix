<?php
class M_agama extends CI_Model {




	public function simpan_barang($keterangan){
		$hsl2=$this->db->query("select * from master_agama where keterangan='$keterangan'");
		$count = $hsl2->num_rows();
		if($count == 0)
		{	
		$hsl=$this->db->query("INSERT INTO master_agama (id, keterangan) VALUES ('','$keterangan')");
		return $hsl;
		}else{
			echo "<script>alert('Data Sudah Diinput')</script>";
		}
		redirect('Master_agama','refresh');
	}
	public function tampil_agama(){
		$hsl=$this->db->query("SELECT * from master_agama");
		return $hsl;
	}

	function update_agama($id,$keterangan){
		$hsl=$this->db->query("UPDATE master_agama SET keterangan='$keterangan' WHERE id='$id'");
		return $hsl;
	}
	function delete_agama($id){
		$hsl=$this->db->query("DELETE FROM master_agama where id='$id'");
		return $hsl;
	}


}
?>


