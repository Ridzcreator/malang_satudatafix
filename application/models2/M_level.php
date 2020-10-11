<?php
class M_level extends CI_Model {

	public function simpan_barang($kode,$keterangan){
		$hsl2=$this->db->query("select * from master_level where keterangan='$keterangan' and kode='$kode' and where status='0'");
		$count = $hsl2->num_rows();
		if($count == 0)
		{	
		$hsl=$this->db->query("INSERT INTO master_level (id, kode, keterangan) VALUES ('','$kode','$keterangan')");
		return $hsl;
		}else{
			echo "<script>alert('Data Sudah Diinput')</script>";
		}
		redirect('Kecamatan','refresh');
	}
	public function tampil_level(){
		$hsl=$this->db->query("SELECT * from master_level");
		return $hsl;
	}

	function update_level($id,$kode,$keterangan){
		$hsl=$this->db->query("UPDATE master_level SET kode='$kode',keterangan='$keterangan' WHERE id='$id'");
		return $hsl;
	}
	function delete_level($id){
		$hsl=$this->db->query("DELETE FROM master_level where id='$id'");
		return $hsl;
	}


}
?>


