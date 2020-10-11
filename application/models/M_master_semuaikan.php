<?php
class M_master_semuaikan extends CI_Model {




	public function simpan_semua_ikan($jnsikan,$ktr){
		
		$hsl=$this->db->query("INSERT INTO master_semua_ikan (id,jenis_ikan,keterangan) VALUES ('','$jnsikan','$ktr')");
		return $hsl;
	}
	public function tampil_semua_ikan(){
		$hsl=$this->db->query("SELECT * from master_semua_ikan");
		return $hsl;
	}

	function edit_semua_ikan($id,$jnsikan,$ktr){
		$hsl=$this->db->query("UPDATE master_semua_ikan SET jenis_ikan='$jnsikan', keterangan = '$ktr' WHERE id='$id'");
		return $hsl;
	}
	function delete_semua_ikan($id){
		$hsl=$this->db->query("DELETE FROM master_semua_ikan where id='$id'");
		return $hsl;
	}


}
?>


