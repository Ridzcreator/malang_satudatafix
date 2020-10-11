<?php
class M_inputbibit extends CI_Model {

public function tampil_bencana(){
		$hsl=$this->db->query("SELECT * from inputbibit");
		return $hsl;
	}
public function simpan_bencana($bibit){
		
		$hsl=$this->db->query("INSERT INTO inputbibit(id_bibit, bibit) VALUES ('','$bibit')");
		return $hsl;
	}

function update_bencana_alam($id,$bibit){
		$hsl=$this->db->query("UPDATE inputbibit SET bibit='$bibit' WHERE id_bibit='$id'");
		return $hsl;
	}
function delete_bencana_alam($id){
		$hsl=$this->db->query("DELETE FROM inputbibit where id_bibit='$id'");
		return $hsl;
	}

}
?>


