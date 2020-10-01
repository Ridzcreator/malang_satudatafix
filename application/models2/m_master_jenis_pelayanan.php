<?php
class m_master_jenis_pelayanan extends CI_Model {

	public function tampil_data(){
		$hsl=$this->db->query("SELECT * from master_jenis_pelayanan");
		return $hsl;
	}

	public function tambah_data($keterangan){
		$hsl2=$this->db->query("SELECT * FROM master_jenis_pelayanan where keterangan='$keterangan'");
		$count = $hsl2->num_rows();
		if($count == 0)
		{	
		$hsl=$this->db->query("INSERT INTO master_jenis_pelayanan (id, keterangan) VALUES ('','$keterangan')");
		return $hsl;
		}else{
			echo "<script>alert('Data Sudah Diinput')</script>";
		}
		redirect('C_master_jenis_pelayanan','refresh');
	}

	function edit_data($id,$keterangan){
		$hsl=$this->db->query("UPDATE master_jenis_pelayanan SET keterangan='$keterangan' WHERE id='$id'");
		return $hsl;
	}
	function hapus_data($id){
		$hsl=$this->db->query("DELETE FROM master_jenis_pelayanan where id='$id'");
		return $hsl;
	}


}
?>


