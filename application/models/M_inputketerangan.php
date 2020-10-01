<?php
class M_inputketerangan extends CI_Model {

public function tampil_bencana(){
		$hsl=$this->db->query("SELECT * from master_keterangan_terminal");
		return $hsl;
	}
public function simpan_bencana($terminal){
		
		$hsl=$this->db->query("INSERT INTO master_keterangan_terminal(id_keterangan, nama_keterangan) VALUES ('','$terminal')");
		return $hsl;
	}

function update_bencana_alam($id,$terminal){
		$hsl=$this->db->query("UPDATE master_keterangan_terminal SET nama_keterangan='$terminal' WHERE id_terminal='$id'");
		return $hsl;
	}
function delete_bencana_alam($id){
		$hsl=$this->db->query("DELETE FROM master_keterangan_terminal where id_keterangan='$id'");
		return $hsl;
	}

}
?>


