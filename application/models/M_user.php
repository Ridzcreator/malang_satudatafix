<?php
class M_user extends CI_Model {




	public function simpan_barang($user,$password,$level,$penginput){
		
		$password1 = md5($password);
		$hsl2=$this->db->query("select * from user where username='$user' and password='$password1' and status='0'");
		$count = $hsl2->num_rows();
		if($count == 0)
		{	
		$hsl=$this->db->query("INSERT INTO user (id, username, password, level, penginput) VALUES ('','$user','$password1','$level','$penginput')");
		return $hsl;
		}else{
			echo "<script>alert('Data Sudah Diinput')</script>";
		}
		redirect('User','refresh');
	}
	public function tampil_user(){
		$hsl=$this->db->query("SELECT user.id, user.username, user.password, level.keterangan, user.level, user.status from user as user inner join master_level as level on user.level=level.id where user.status = '0'");
		return $hsl;
	}
	public function tampil_userlevel(){
		$hsl=$this->db->query("SELECT * from master_level");
		return $hsl;
	}

	function update_user($id,$user,$password,$level){
		$password1 = md5($password);
		$hsl=$this->db->query("UPDATE user SET username='$user',password='$password',level='$level' WHERE id='$id'");
		return $hsl;
	}
	function delete_user($id){
		$status=1;
		$hsl=$this->db->query("UPDATE user SET status='$status' WHERE id='$id'");
		return $hsl;
	}


}
?>


