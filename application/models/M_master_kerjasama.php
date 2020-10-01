<?php
class M_master_kerjasama extends CI_Model {
	
	public function simpan_barang($keterangan){
		
		$hsl=$this->db->query("INSERT INTO master_kerjasama (id, nama_media) VALUES ('','$keterangan')");
		return $hsl;
	}
	public function tampil_kerjasama(){
		$hsl=$this->db->query("SELECT * from master_kerjasama");
		return $hsl;
	}

	function update_master_kerjasama($id,$keterangan){
		$hsl=$this->db->query("UPDATE master_kerjasama SET nama_media='$keterangan' WHERE id='$id'");
		return $hsl;
	}
	function delete_master_kerjasama($id){
		$hsl=$this->db->query("DELETE FROM master_kerjasama where id='$id'");
		return $hsl;
	}


}
?>


