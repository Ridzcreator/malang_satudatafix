<?php
class m_master_perpustakaan extends CI_Model {




	public function simpan_perpustakaan($nama_perpustakaan, $lattitude, $longitude, $alamat){
		
		$hsl=$this->db->query("INSERT INTO master_perpustakaan (id, nama_perpustakaan, lattitude, longitude, alamat) VALUES ('','$nama_perpustakaan', '$lattitude''$longitude', '$alamat' )");
		return $hsl;
	}
	public function tampil_perpustakaan(){
		$hsl=$this->db->query("SELECT * from master_perpustakaan");
		return $hsl;
	}

	function edit_tajuk_buku($id,$tb){
		$hsl=$this->db->query("UPDATE master_tajuk_buku SET tajuk_buku='$tb' WHERE id='$id'");
		return $hsl;
	}
	function delete_tajuk_buku($id){
		$hsl=$this->db->query("DELETE FROM master_tajuk_buku where id='$id'");
		return $hsl;
	}


}
?>


