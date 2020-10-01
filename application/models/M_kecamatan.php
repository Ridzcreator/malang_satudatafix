<?php
class M_kecamatan extends CI_Model {




	public function simpan_barang($keterangan){
		$hsl2=$this->db->query("select * from master_kecamatan where nama_kecamatan='$keterangan' and where status='0'");
		$count = $hsl2->num_rows();
		if($count == 0)
		{	
		$hsl=$this->db->query("INSERT INTO master_kecamatan (id_kecamatan, nama_kecamatan) VALUES ('','$keterangan')");
		return $hsl;
		}else{
			echo "<script>alert('Data Sudah Diinput')</script>";
		}
		redirect('Kecamatan','refresh');
	}
	public function tampil_kecamatan(){
		$hsl=$this->db->query("SELECT * from master_kecamatan");
		return $hsl;
	}

	function update_kecamatan($id,$keterangan){
		$hsl=$this->db->query("UPDATE master_kecamatan SET nama_kecamatan='$keterangan' WHERE id_kecamatan='$id'");
		return $hsl;
	}
	function delete_kecamatan($id){
		$hsl=$this->db->query("DELETE FROM master_kecamatan where id_kecamatan='$id'");
		return $hsl;
	}


}
?>


