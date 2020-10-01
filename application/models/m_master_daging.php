<?php 
class m_master_daging extends CI_Model
{

	public function tampil_data(){
		$hasil=$this->db->query("SELECT * FROM master_daging ");
		
		return $hasil;
	}

	public function simpan_data($nama_hewan){
		$hasil=$this->db->query("INSERT INTO master_daging
			(id, daging_hewan) 
			VALUES 
			('', '$nama_hewan')");
		return $hasil;
	}

	public function ubah_data($id, $nama_hewan){
		$hasil=$this->db->query("UPDATE master_daging 
			SET daging_hewan='$nama_hewan' where id='$id'");
		return $hasil;
	}

	public function hapus_data($id){
		$hasil=$this->db->query("DELETE FROM master_daging where id='$id'");
		return $hasil;
	}



}
?>