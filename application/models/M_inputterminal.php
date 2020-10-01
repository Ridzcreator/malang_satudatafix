<?php
class M_inputterminal extends CI_Model {

public function tampil_bencana(){
		$hsl=$this->db->query("SELECT * from master_terminal");
		return $hsl;
	}
public function simpan_bencana($terminal){
		
		$hsl=$this->db->query("INSERT INTO master_terminal(id_terminal, nama_terminal) VALUES ('','$terminal')");
		return $hsl;
	}

function update_bencana_alam($id,$terminal){
		$hsl=$this->db->query("UPDATE master_terminal SET nama_terminal='$terminal' WHERE id_terminal='$id'");
		return $hsl;
	}
function delete_bencana_alam($id){
		$hsl=$this->db->query("DELETE FROM master_terminal where id_terminal='$id'");
		return $hsl;
	}

}
?>


