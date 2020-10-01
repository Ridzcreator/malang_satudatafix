<?php 
class m_master_hewan_ternak extends CI_Model
{

	public function tampil_data(){
		$hasil=$this->db->query("SELECT * FROM master_hewan_ternak ");
		
		return $hasil;
	}

	public function simpan_data($nama_hewan){
		$hasil=$this->db->query("INSERT INTO master_hewan_ternak
			(id, hewan_ternak) 
			VALUES 
			('', '$nama_hewan')");
		return $hasil;
	}

	public function ubah_data($id, $nama_hewan){
		$hasil=$this->db->query("UPDATE master_hewan_ternak 
			SET hewan_ternak='$nama_hewan' where id='$id'");
		return $hasil;
	}

	public function hapus_data($id){
		$hasil=$this->db->query("DELETE FROM master_hewan_ternak where id='$id'");
		return $hasil;
	}



}
?>