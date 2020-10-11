<?php
class M_inputbencana extends CI_Model {

public function tampil_bencana(){
		$hsl=$this->db->query("SELECT * from bencana");
		return $hsl;
	}
public function simpan_bencana($bencana){
		
		$hsl=$this->db->query("INSERT INTO bencana(id, bencana) VALUES ('','$bencana')");
		return $hsl;
	}

function update_bencana_alam($id,$bencana){
		$hsl=$this->db->query("UPDATE bencana SET bencana='$bencana' WHERE id='$id'");
		return $hsl;
	}
function delete_bencana_alam($id){
		$hsl=$this->db->query("DELETE FROM bencana where id='$id'");
		return $hsl;
	}

}
?>


