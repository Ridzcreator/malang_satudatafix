<?php
class M_master_tajukbuku extends CI_Model {




	public function simpan_tajuk_buku($tb){
		
		$hsl=$this->db->query("INSERT INTO master_tajuk_buku (id,tajuk_buku) VALUES ('','$tb')");
		return $hsl;
	}
	public function tampil_tajuk_buku(){
		$hsl=$this->db->query("SELECT * from master_tajuk_buku");
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


