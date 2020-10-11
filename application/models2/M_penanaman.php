<?php

class M_penanaman extends CI_Model {
    
	public function simpan_penanaman($sektor,$jns,$nilaipma,$unitpma,$nilaipmdn,$unitpmdn,$nilai,$unit,$tng,$tahun,$penginput){
		
		$hsl=$this->db->query("INSERT INTO sektor_penanaman_modal (id, sektor, jenis_sektor, nilai_pma, unit_pma, nilai_pmdn, unit_pmdn, nilai_non, unit_non, tenaga_kerja, tahun, penginput) VALUES ('','$sektor','$jns','$nilaipma','$unitpma','$nilaipmdn','$unitpmdn','$nilai','$unit','$tng','$tahun','$penginput')");
		return $hsl;
	}
	public function tampil_penanaman($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT * from sektor_penanaman_modal where status='0'");
		} else {
			$hsl=$this->db->query("SELECT * from sektor_penanaman_modal where tahun='$tahun' and status='0'");
		}
		return $hsl;
	}
	public function tampil_penanaman2($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT * from sektor_penanaman_modal where status='0'");
		} else {
			$hsl=$this->db->query("SELECT * from sektor_penanaman_modal where tahun='$tahun' and unit_non ='0' and nilai_non='0' and tenaga_kerja='0'  and status='0'");
		}
		return $hsl;
	}
	public function grafik_perbandingan_penanaman($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, tahun, sum(nilai_pma) as nilai_pma, sum(unit_pma) as unit_pma, sum(nilai_pmdn) as nilai_pmdn, sum(unit_pmdn) as unit_pmdn, sum(nilai_non) as nilai_non, sum(unit_non) as unit_non, sum(tenaga_kerja) as tenaga_kerja FROM sektor_penanaman_modal where status='0' AND tahun between '$tahun1' and '$tahun2' group by tahun");	
		return $hsl;  
	}
	public function tampil_jenissektor($jns_sektor){
		$hsl=$this->db->query("SELECT keterangan as keterangan from master_bidang_usaha where sektor='$jns_sektor' group by keterangan");
		return $hsl;
	}
	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT * from sektor_penanaman_modal where status='0' group by tahun");
		return $hsl;
	}
	public function tampil_tahunmax(){
		$hsl=$this->db->query("SELECT max(tahun) as tahun from sektor_penanaman_modal where status='0' group by tahun");
		return $hsl;
	}
	public function tampil_sektor(){
		$hsl=$this->db->query("SELECT * from master_bidang_usaha");
		return $hsl;
	}
	public function tampil_jenis_sektor(){
		$hsl=$this->db->query("SELECT * from master_jenis_sektor");
		return $hsl;
	}
    public function delete_penanaman($id){
		$status = 1;
		$hsl=$this->db->query("UPDATE sektor_penanaman_modal set status= '$status' where id='$id'");
		return $hsl;
	}
	public function edit_penanaman($id,$sektor,$jns,$nilaipma,$unitpma,$nilaipmdn,$unitpmdn,$nilai,$unit,$tng,$tahun,$penginput) {
		$hsl=$this->db->query("UPDATE sektor_penanaman_modal SET  sektor ='$sektor', jenis_sektor='$jns', nilai_pma='$nilaipma', unit_pma='$unitpma', nilai_pmdn='$nilaipmdn', unit_pmdn='$unitpmdn', nilai_non='$nilai', unit_non='$unit', tenaga_kerja='$tng', tahun='$tahun', penginput='$penginput' where id='$id'");
		return $hsl;
	}
}