<?php
class m_jenis_industri extends CI_Model {

	public function simpan_barang($keterangan){
		
		$hsl=$this->db->query("INSERT INTO master_jenis_industri (id, nama_industri) VALUES ('','$keterangan')");
		return $hsl;
	}
	public function tampil_jenis_industri(){
		$hsl=$this->db->query("SELECT * from master_jenis_industri");
		return $hsl;
	}

	function update_jenis_industri($id,$keterangan){
		$hsl=$this->db->query("UPDATE master_jenis_industri SET nama_industri='$keterangan' WHERE id='$id'");
		return $hsl;
	}
	function delete_jenis_industri($id){
		$hsl=$this->db->query("DELETE FROM master_jenis_industri where id='$id'");
		return $hsl;
	}


}
?>


