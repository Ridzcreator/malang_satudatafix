<?php

class M_cabangolah extends CI_Model {
    
	public function simpan_cabang_olah($kecamatan, $desa, $co,$ps,$db,$jm,$tahun,$penginput){
		$jumlah= $ps+$db;
		
		$hsl=$this->db->query("INSERT INTO cabang_olahraga (id, kecamatan, desa, cabang_olahraga, prestasi, dibina, jumlah, tahun, penginput) VALUES ('', '$kecamatan', '$desa', '$co','$ps','$db', '$jumlah', '$tahun', '$penginput')");
		return $hsl;
	}
	public function tampil_cabang_olah($tahun){
		$thn=$tahun;
		if($thn=='0000'){
			$hsl=$this->db->query("SELECT * from cabang_olahraga where status='0'");
		} else {
			$hsl=$this->db->query("SELECT * from cabang_olahraga where tahun='$thn' and status='0'");
		}
		return $hsl;
	}
	public function tampil_kecamatan(){
		$hasil=$this->db->query("SELECT * FROM master_kecamatan ");
		return $hasil;
	}
	public function tampil_desa($kecamatan){
		$hasil=$this->db->query("SELECT * FROM master_desa where id_kecamatan='$kecamatan'");
		return $hasil;
	}
	public function tampil_desaku(){
		$hasil=$this->db->query("SELECT * FROM master_desa inner join master_kecamatan on master_desa.id_kecamatan = master_kecamatan.id_kecamatan");
		return $hasil;
	}
	public function getNamaKecamatanWhere($where){
		$this->db->select('*');
		$this->db->from('master_kecamatan');
		$this->db->where($where);
		$query = $this->db->get();
		return $query;
	}
	public function getNamaDesaWhere($where){
		$this->db->select('*');
		$this->db->from('master_desa');
		$this->db->where($where);
		$query = $this->db->get();
		return $query;
	}
	public function tampil_cabang_olahmax($tahun){
		$thn=$tahun;

			$hsl=$this->db->query("SELECT sum(prestasi) as prestasi from cabang_olahraga where tahun='$thn' and status='0'");
		
		return $hsl;
	}
	public function tampil_cabang_olahmaximum($tahun){
		$thn=$tahun;

			$hsl=$this->db->query("SELECT sum(prestasi+dibina) as jumlah from cabang_olahraga where tahun='$thn' and status='0'");
		
		return $hsl;
	}

	public function tampil_grafik($tahun){
		$hsl=$this->db->query("SELECT * FROM cabang_olahraga WHERE status='0' AND tahun='$tahun'");	
		return $hsl;  
	}

	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT * from cabang_olahraga where status='0' group by tahun");
		return $hsl;
	}
	public function tampil_tahunmax(){
		$hsl=$this->db->query("SELECT max(tahun) as tahun from cabang_olahraga where status='0' ");
		return $hsl;
	}
	public function tampil_cabang(){
		$hsl=$this->db->query("SELECT * from master_cabangolahraga");
		return $hsl;
	}
	public function grafik_perbandingan_cabangolah($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, tahun, sum(prestasi) as prestasi, sum(dibina) as dibina FROM cabang_olahraga where status='0' AND tahun between '$tahun1' and '$tahun2' group by tahun");	
		return $hsl;  
	}
    public function delete_cabang_olah($id){
    	$status = 1;
		$hsl=$this->db->query("UPDATE cabang_olahraga set status= '$status' where id='$id'");
		return $hsl;
	}
	public function edit_cabang_olah($id,$co,$ps,$db,$jm,$tahun,$penginput) {
		$jumlah= $ps+$db;
		$hsl=$this->db->query("UPDATE cabang_olahraga SET cabang_olahraga ='$co', prestasi='$ps', dibina='$db', jumlah='$jumlah', tahun='$tahun', penginput='$penginput' where id='$id'");
		return $hsl;
	}

}