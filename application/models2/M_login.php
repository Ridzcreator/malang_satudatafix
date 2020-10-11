<?php
class M_login extends CI_Model {


	public function cekadmin($u,$p){
        $hasil=$this->db->query("select*from user where username='$u'and password=md5('$p') and status ='0'");
        return $hasil;
    }
	


}
?>


