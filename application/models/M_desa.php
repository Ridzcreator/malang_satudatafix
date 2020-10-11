<?php
class M_desa extends CI_Model {




	public function simpan_barang($keterangan,$kecamatan){
		
		$hsl=$this->db->query("INSERT INTO master_desa (id_desa,id_kecamatan, nama_desa) VALUES ('','$kecamatan','$keterangan')");
		return $hsl;
	}
	public function tampil_desa(){
		$hsl=$this->db->query("SELECT master_desa.id_desa, master_desa.nama_desa,master_desa.id_kecamatan,master_kecamatan.nama_kecamatan from master_desa join master_kecamatan on master_desa.id_kecamatan = master_kecamatan.id_kecamatan order by id_kecamatan");
		return $hsl;
	}
	public function tampil_kecamatan(){
		$hsl=$this->db->query("SELECT id_kecamatan, nama_kecamatan from master_kecamatan");
		return $hsl;
	}

	function update_desa($id,$keterangan,$kecamatan){
		$hsl=$this->db->query("UPDATE master_desa SET id_kecamatan='$kecamatan', nama_desa='$keterangan' WHERE id_desa='$id'");
		return $hsl;
	}
	function delete_desa($id){
		$hsl=$this->db->query("DELETE FROM master_desa where id_desa='$id'");
		return $hsl;
	}


}
?>


