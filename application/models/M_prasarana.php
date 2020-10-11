<?php

class M_prasarana extends CI_Model {
    
	public function simpan_prasarana($kec, $desa, $stadion,$spkbola,$voly,$basket,$tenis,$bt,$futsal,$gor,$aula,$kolam,$jumlah,$tahun,$penginput){

		$hsl=$this->db->query("INSERT INTO prasarana_olahraga (id, kcmtn, desa, stadion, sb, bv, bb, tenis, bt, futsal, gor, aula, kr, jumlah, tahun, penginput) VALUES ('','$kec', '$desa', '$stadion','$spkbola','$voly','$basket','$tenis','$bt','$futsal','$gor','$aula','$kolam','$jumlah','$tahun','$penginput')");
		return $hsl;
	}
	public function tampil_prasarana($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT id, tahun, sum(stadion) as stadion, sum(sb) as sb, sum(bv) as bv, sum(bb) as bb, sum(tenis) as tenis, sum(bt) as bt, sum(futsal) as futsal, sum(gor) as gor, sum(aula) as aula, sum(kr) as kr, sum(jumlah) as jumlah FROM prasarana_olahraga where status='0' GROUP BY tahun");
		} else {
			$hsl=$this->db->query("SELECT id, tahun, sum(stadion) as stadion, sum(sb) as sb, sum(bv) as bv, sum(bb) as bb, sum(tenis) as tenis, sum(bt) as bt, sum(futsal) as futsal, sum(gor) as gor, sum(aula) as aula, sum(kr) as kr, sum(jumlah) as jumlah FROM prasarana_olahraga where status='0' AND tahun='$thn'");
		}
		return $hsl;
	}
	public function grafik_perbandingan_prasarana($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, tahun, sum(stadion) as stadion, sum(sb) as sb, sum(bv) as bv, sum(bb) as bb, sum(tenis) as tenis, sum(bt) as bt, sum(futsal) as futsal, sum(gor) as gor, sum(aula) as aula, sum(kr) as kr, sum(jumlah) as jumlah FROM prasarana_olahraga where status='0' AND tahun between '$tahun1' and '$tahun2' group by tahun");	
		return $hsl;  
	}
	public function tampil_grafik($tahun){
		$hsl=$this->db->query("SELECT * FROM prasarana_olahraga WHERE status='0' AND tahun='$tahun'");	
		return $hsl;  
	}
	public function tampil_detail_prasarana($id){
		$hasil=$this->db->query("SELECT * FROM prasarana_olahraga WHERE status='0' AND tahun='$id'");
		return $hasil;
	}
	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT * from prasarana_olahraga where status='0' group by tahun");
		return $hsl;
	}
	public function tampil_kecamatan(){
		$hsl=$this->db->query("SELECT * from master_kecamatan");
		return $hsl;
	}
	public function tampil_desa($kec){
		$hasil=$this->db->query("SELECT * FROM master_desa where id_kecamatan='$kec'");
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
	public function tampil_data_prasarana($id){
		$hasil=$this->db->query("SELECT * FROM prasarana_olahraga WHERE status='0'");
		return $hasil;
	}
	// public function tampil_grafik_semua_prasarana($tahun){
	// 	$thn=$tahun;
	// 	if($thn=='0000'){
	// 	$hsl=$this->db->query("SELECT * from prasarana_olahraga where status='0'");
	// 	} else {
	// 		$hsl=$this->db->query("SELECT * from prasarana_olahraga where tahun='$tahun' and status='0'");
	// 	}
	// 	return $hsl;
	// }
    public function delete_prasarana($id){
    	$status = 1;
		$hsl=$this->db->query("UPDATE prasarana_olahraga set status= '$status' where id='$id'");
		return $hsl;
	}
	public function edit_prasarana($id,$kec,$stadion,$spkbola,$voly,$basket,$tenis,$bt,$futsal,$gor,$aula,$kolam,$jumlah,$tahun,$penginput) {
		$hsl=$this->db->query("UPDATE prasarana_olahraga SET kcmtn ='$kec', stadion='$stadion', sb='$spkbola', bv='$voly', bb='$basket', tenis='$tenis', bt='$bt', futsal='$futsal', gor='$gor', aula='$aula', kr='$kolam',tahun='$tahun', jumlah='$jumlah', penginput='$penginput'  where id='$id'");
		return $hsl;
	}

}