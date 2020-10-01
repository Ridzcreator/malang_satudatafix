<?php
class M_login extends CI_Model {


	public function cekadmin($u,$p){
        $hasil=$this->db->query("select a.*,b.* from user as a join master_level as b on a.level=b.id where a.username='$u'and a.password=md5('$p') and a.status ='0'");
        return $hasil;
    }
	


}
?>


