<?php
class M_mstrbidang extends CI_Model {
	
	public function simpan_bidang($sktr,$keterangan){
		
		$hsl=$this->db->query("INSERT INTO master_bidang_usaha (id, sektor, keterangan) VALUES ('','$sktr','$keterangan')");
		return $hsl;
	}
	public function tampil_bidang(){
		$hsl=$this->db->query("SELECT * from master_bidang_usaha");
		return $hsl;
	}

	function update_mstrbidang($id,$sktr,$keterangan){
		$hsl=$this->db->query("UPDATE master_bidang_usaha SET sektor='$sktr', keterangan='$keterangan' WHERE id='$id'");
		return $hsl;
	}
	function delete_mstrbidang($id){
		$hsl=$this->db->query("DELETE FROM master_bidang_usaha where id='$id'");
		return $hsl;
	}


}
?>


