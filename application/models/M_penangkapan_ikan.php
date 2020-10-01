<?php

class M_penangkapan_ikan extends CI_Model {
    
	public function simpan_produksi_penangkapan($tahun,$kec,$si,$wk,$ra,$lt,$jl){
		$jl=0;
		$jl=$si+$wk+$ra+$lt;
		$hsl=$this->db->query("INSERT INTO produksi_penangkapan_ikan (id,tahun, kecamatan, sungai, waduk,rawa,laut,jumlah ) VALUES ('','$tahun','$kec','$si','$wk','$ra','$lt','$jl')");
		return $hsl;
	}
	public function tampil_produksi_penangkapan($tahun){
		if($tahun=="0000"){
		$hsl=$this->db->query("SELECT * from produksi_penangkapan_ikan where status='0'");
		}else{
		$hsl=$this->db->query("SELECT * from produksi_penangkapan_ikan where tahun='$tahun' AND status='0'");
		}
		return $hsl;
	}
	public function tampil_tahun(){
	$hsl=$this->db->query("SELECT * from produksi_penangkapan_ikan");
		return $hsl;
	}
	
	public function tampil_kecamatan(){
		$hsl=$this->db->query("SELECT * from master_kecamatan");
		return $hsl;
	}
    public function delete_produksi_penangkapan($id){
		$status=1;
		$hsl=$this->db->query("UPDATE produksi_penangkapan_ikan set status ='$status' where id='$id'");
		return $hsl;
	}
	public function edit_produksi_penangkapan($id,$tahun,$kec,$si,$wk,$ra,$lt,$jl) {
			$jl=0;
		$jl=$si+$wk+$ra+$lt;
		$hsl=$this->db->query("UPDATE produksi_penangkapan_ikan SET  tahun='$tahun', kecamatan ='$kec', sungai='$si', waduk='$wk' ,rawa='$ra',laut='$lt',jumlah='$jl' where id='$id'");
		return $hsl;
	}

}