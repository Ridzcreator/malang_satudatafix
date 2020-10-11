<?php
class M_master_provider extends CI_Model {
	
	public function simpan_barang($keterangan){
		
		$hsl=$this->db->query("INSERT INTO master_provider (id, operator_penyedia) VALUES ('','$keterangan')");
		return $hsl;
	}
	public function tampil_provider(){
		$hsl=$this->db->query("SELECT * from master_provider");
		return $hsl;
	}

	function update_master_provider($id,$keterangan){
		$hsl=$this->db->query("UPDATE master_provider SET operator_penyedia='$keterangan' WHERE id='$id'");
		return $hsl;
	}
	function delete_master_provider($id){
		$hsl=$this->db->query("DELETE FROM master_provider where id='$id'");
		return $hsl;
	}


}
?>


