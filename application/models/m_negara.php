<?php
class m_negara extends CI_Model {

	public function simpan_barang($keterangan){
		
		$hsl=$this->db->query("INSERT INTO master_negara (id, nama_negara) VALUES ('','$keterangan')");
		return $hsl;
	}
	public function tampil_negara(){
		$hsl=$this->db->query("SELECT * from master_negara");
		return $hsl;
	}

	function update_negara($id,$keterangan){
		$hsl=$this->db->query("UPDATE master_negara SET nama_negara='$keterangan' WHERE id='$id'");
		return $hsl;
	}
	function delete_negara($id){
		$hsl=$this->db->query("DELETE FROM master_negara where id='$id'");
		return $hsl;
	}


}
?>


