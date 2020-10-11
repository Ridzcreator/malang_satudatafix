<?php 
class m_jenis_wisata extends CI_Model
{

	public function tampil_jenis_wisata(){
		$hasil=$this->db->query("SELECT * FROM master_warisan_budaya ");
		
		return $hasil;
	}

	public function simpan_jenis_wisata($jenis_wisata){
		$query= "INSERT INTO master_warisan_budaya (jenis_wisata) VALUES ('$jenis_wisata')";
		//die($query);
		$hasil=$this->db->query($query);
		return $hasil;
	}

	public function update_jenis_wisata($id, $jenis_wisata){
		$hasil=$this->db->query("UPDATE master_warisan_budaya 
			SET jenis_wisata='$jenis_wisata' where id='$id'");
		return $hasil;
	}

	public function delete_jenis_wisata($id){
		$hasil=$this->db->query("DELETE FROM master_warisan_budaya where id='$id'");
		return $hasil;
	}



}
?>