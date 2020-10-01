<?php 
class m_master_susu extends CI_Model
{

	public function tampil_data(){
		$hasil=$this->db->query("SELECT * FROM master_susu ");
		
		return $hasil;
	}

	public function simpan_data($nama_hewan){
		$hasil=$this->db->query("INSERT INTO master_susu
			(id, susu_hewan) 
			VALUES 
			('', '$nama_hewan')");
		return $hasil;
	}

	public function ubah_data($id, $nama_hewan){
		$hasil=$this->db->query("UPDATE master_susu 
			SET susu_hewan='$nama_hewan' where id='$id'");
		return $hasil;
	}

	public function hapus_data($id){
		$hasil=$this->db->query("DELETE FROM master_susu where id='$id'");
		return $hasil;
	}



}
?>