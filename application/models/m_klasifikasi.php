<?php
class m_klasifikasi extends CI_Model {

	public function simpan_barang($keterangan){
		
		$hsl=$this->db->query("INSERT INTO master_klasifikasi (id, nama_klasifikasi) VALUES ('','$keterangan')");
		
		return $hsl;
	}
	public function tampil_klasifikasi(){
		$hsl=$this->db->query("SELECT * from master_klasifikasi");
		return $hsl;
	}

	function update_klasifikasi($id,$keterangan){
		$hsl=$this->db->query("UPDATE master_klasifikasi SET nama_klasifikasi='$keterangan' WHERE id='$id'");
		return $hsl;
	}
	function delete_klasifikasi($id){
		$hsl=$this->db->query("DELETE FROM master_klasifikasi where id='$id'");
		return $hsl;
	}


}
?>


