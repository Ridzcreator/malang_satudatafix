<?php
class M_master_perda extends CI_Model {
	
	public function simpan_barang($keterangan){
		
		$hsl=$this->db->query("INSERT INTO master_perda (id, nm_perda) VALUES ('','$keterangan')");
		return $hsl;
	}
	public function tampil_perda(){
		$hsl=$this->db->query("SELECT * from master_perda");
		return $hsl;
	}

	function update_master_perda($id,$keterangan){
		$hsl=$this->db->query("UPDATE master_perda SET nm_perda='$keterangan' WHERE id='$id'");
		return $hsl;
	}
	function delete_master_perda($id){
		$hsl=$this->db->query("DELETE FROM master_perda where id_kecamatan='$id'");
		return $hsl;
	}


}
?>


