<?php
class M_Mlapanganolahraga extends CI_Model {
	public function simpan_barang($keterangan){
		$hsl2=$this->db->query("select * from master_lapangan_olahraga where keterangan='$keterangan'");
		$count = $hsl2->num_rows();
		if($count == 0)
		{	
		$hsl=$this->db->query("INSERT INTO master_lapangan_olahraga (id, keterangan) VALUES ('','$keterangan')");
		return $hsl;
		}else{
			echo "<script>alert('Data Sudah Diinput')</script>";
		}
		redirect('Mlapanganolahraga','refresh');
	}
	public function tampil_mlapanganolahraga(){
		$hsl=$this->db->query("SELECT * from master_lapangan_olahraga");
		return $hsl;
	}

	function update_mlapanganolahraga($id,$keterangan){
		$hsl=$this->db->query("UPDATE master_lapangan_olahraga SET keterangan='$keterangan' WHERE id='$id'");
		return $hsl;
	}
	function delete_mlapanganolahraga($id){
		$hsl=$this->db->query("DELETE FROM master_lapangan_olahraga where id='$id'");
		return $hsl;
	}


}
?>


