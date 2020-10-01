<?php 
class m_master_unggas extends CI_Model
{

	public function tampil_data(){
		$hasil=$this->db->query("SELECT * FROM master_unggas ");
		
		return $hasil;
	}

	public function simpan_data($nama_hewan){
		$hasil=$this->db->query("INSERT INTO master_unggas
			(id, nama_unggas) 
			VALUES 
			('', '$nama_hewan')");
		return $hasil;
	}

	public function ubah_data($id, $nama_hewan){
		$hasil=$this->db->query("UPDATE master_unggas 
			SET nama_unggas='$nama_hewan' where id='$id'");
		return $hasil;
	}

	public function hapus_data($id){
		$hasil=$this->db->query("DELETE FROM master_unggas where id='$id'");
		return $hasil;
	}



}
?>