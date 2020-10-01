<?php

class M_penanaman extends CI_Model {
    
	public function simpan_barang($bidang_usaha,$unit_usaha,$realisasi,$indo,$asing,$sumber){
		
		$hsl=$this->db->query("INSERT INTO penanaman_modal (id, bidang_usaha, unit_usaha, realisasi_investasi, tenaga_kerja_indo, tenaga_kerja_asing, sumber_data) VALUES ('','$bidang_usaha','$unit_usaha','$realisasi','$indo','$asing','$sumber')");
		return $hsl;
	}
	public function tampil_penanaman(){
		$hsl=$this->db->query("SELECT * from penanaman_modal");
		return $hsl;
	}
    public function delete_penanaman($id){
		$hsl=$this->db->query("DELETE FROM penanaman_modal where id='$id'");
		return $hsl;
	}
	public function edit_tanam($id,$bidang_usaha,$unit_usaha,$realisasi,$indo,$asing,$sumber) {
		$hsl=$this->db->query("UPDATE penanaman_modal SET bidang_usaha='$bidang_usaha', unit_usaha='$unit_usaha',realisasi_investasi='$realisasi',tenaga_kerja_indo='$indo',tenaga_kerja_asing='$asing',sumber_data='$sumber' where id='$id'");
		return $hsl;
	}

}