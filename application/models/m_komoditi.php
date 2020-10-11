<?php
class m_komoditi extends CI_Model {

	public function simpan_barang($keterangan){
		
		$hsl=$this->db->query("INSERT INTO master_komoditi (id, nama_komoditi) VALUES ('','$keterangan')");
		return $hsl;
	}
	public function tampil_komoditi(){
		$hsl=$this->db->query("SELECT * from master_komoditi");
		return $hsl;
	}

	function update_komoditi($id,$keterangan){
		$hsl=$this->db->query("UPDATE master_komoditi SET nama_komoditi='$keterangan' WHERE id='$id'");
		return $hsl;
	}
	function delete_komoditi($id){
		$hsl=$this->db->query("DELETE FROM master_komoditi where id='$id'");
		return $hsl;
	}


}
?>


