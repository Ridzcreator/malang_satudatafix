<?php
class m_bulan extends CI_Model {

	public function simpan_barang($keterangan){
		
		$hsl=$this->db->query("INSERT INTO master_bulan (kode, keterangan) VALUES ('','$keterangan')");
		return $hsl;
	}
	public function tampil_bulan(){
		$hsl=$this->db->query("SELECT * from master_bulan");
		return $hsl;
	}

	function update_bulan($id,$keterangan){
		$hsl=$this->db->query("UPDATE master_bulan SET keterangan='$keterangan' WHERE kode='$id'");
		return $hsl;
	}
	function delete_bulan($id){
		$hsl=$this->db->query("DELETE FROM master_bulan where kode='$id'");
		return $hsl;
	}


}
?>


