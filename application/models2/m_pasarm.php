<?php
class m_pasarm extends CI_Model {

	public function simpan_barang($keterangan){
		
		$hsl=$this->db->query("INSERT INTO master_pasar_modern (id_pasar, nama_pasar_modern) VALUES ('','$keterangan')");
		return $hsl;
	}
	public function tampil_pasarm(){
		$hsl=$this->db->query("SELECT * from master_pasar_modern");
		return $hsl;
	}

	function update_pasarm($id,$keterangan){
		$hsl=$this->db->query("UPDATE master_pasar_modern SET nama_pasar_modern='$keterangan' WHERE id_pasar='$id'");
		return $hsl;
	}
	function delete_pasarm($id){
		$hsl=$this->db->query("DELETE FROM master_pasar_modern where id_pasar='$id'");
		return $hsl;
	}


}
?>


