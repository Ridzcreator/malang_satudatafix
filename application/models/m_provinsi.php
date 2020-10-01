<?php
class m_provinsi extends CI_Model {

	public function simpan_barang($keterangan){
		
		$hsl=$this->db->query("INSERT INTO master_provinsi (id, nama_provinsi) VALUES ('','$keterangan')");
		return $hsl;
	}
	public function tampil_provinsi(){
		$hsl=$this->db->query("SELECT * from master_provinsi");
		return $hsl;
	}

	function update_provinsi($id,$keterangan){
		$hsl=$this->db->query("UPDATE master_provinsi SET nama_provinsi='$keterangan' WHERE id='$id'");
		return $hsl;
	}
	function delete_provinsi($id){
		$hsl=$this->db->query("DELETE FROM master_provinsi where id='$id'");
		return $hsl;
	}


}
?>


