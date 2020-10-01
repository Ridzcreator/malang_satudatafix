<?php
class M_master_cabang extends CI_Model {

	public function simpan_barang($keterangan){
		
		$hsl=$this->db->query("INSERT INTO master_cabangolahraga (id, cabang_olahraga) VALUES ('','$keterangan')");
		return $hsl;
	}

	public function tampil_cabang(){
		$hsl=$this->db->query("SELECT * from master_cabangolahraga");
		return $hsl;
	}

	function update_master_cabang($id,$keterangan){
		$hsl=$this->db->query("UPDATE master_cabangolahraga SET cabang_olahraga='$keterangan' WHERE id='$id'");
		return $hsl;
	}
	function delete_master_cabang($id){
		$hsl=$this->db->query("DELETE FROM master_cabangolahraga where id='$id'");
		return $hsl;
	}


}
?>


