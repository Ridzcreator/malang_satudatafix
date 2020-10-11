<?php
class M_jenispengairan extends CI_Model {




	public function simpan_barang($penginput,$periode,$kecamatan,$irigasi,$tadah,$pasang,$lebak){
		$hsl2=$this->db->query("select * from luas_sawah_menurut_jenis_perairan where periode='$periode' and kecamatan='$kecamatan' and status='0'");
		$count = $hsl2->num_rows();
		if($count == 0)
		{	
		$hsl=$this->db->query("INSERT INTO luas_sawah_menurut_jenis_perairan (id, penginput, periode, kecamatan, irigasi, tadah, rawa_pasang, rawa_lebak) VALUES ('','$penginput','$periode','$kecamatan','$irigasi','$tadah','$pasang','$lebak')");
		return $hsl;
		}else{
			echo "<script>alert('Data Sudah Diinput')</script>";
		}
		redirect('Jenispengairan','refresh');
	}
	public function tampil_jenispengairan($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT a.id, sum(a.irigasi) as irigasi, sum(a.tadah) as tadah, sum(a.rawa_pasang) as rawa_pasang, sum(a.rawa_lebak) as rawa_lebak, a.periode, a.penginput, a.status, b.nama_kecamatan as kecamatan from luas_sawah_menurut_jenis_perairan as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan where a.status='0' group by periode");
		}else{
		$hsl=$this->db->query("SELECT a.id, sum(a.irigasi) as irigasi, sum(a.tadah) as tadah, sum(a.rawa_pasang) as rawa_pasang, sum(a.rawa_lebak) as rawa_lebak,  a.periode, a.penginput, a.status, b.nama_kecamatan as kecamatan from luas_sawah_menurut_jenis_perairan as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan where a.status='0' and a.periode='$thn' group by periode");	
		}
		return $hsl;  
	}

	public function tampil_jenispengairanx($tahun){
		$thn=$tahun;
		
		$hsl=$this->db->query("SELECT a.id, sum(a.irigasi) as irigasi, sum(a.tadah) as tadah, sum(a.rawa_pasang) as rawa_pasang, sum(a.rawa_lebak) as rawa_lebak,  a.periode, a.penginput, a.status, b.nama_kecamatan as kecamatan from luas_sawah_menurut_jenis_perairan as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan where a.status='0' and a.periode='$thn' group by periode");	
		
		return $hsl;  
	}
	public function tampil_jenispengairanmaximum($tahun){
		$thn=$tahun;
		
		$hsl=$this->db->query("SELECT a.id, sum(a.irigasi+a.tadah+a.rawa_pasang+a.rawa_lebak) as jumlah,  a.periode, a.penginput, a.status, b.nama_kecamatan as kecamatan from luas_sawah_menurut_jenis_perairan as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan where a.status='0' and a.periode='$thn' group by periode");	
		
		return $hsl;  
	}
	public function tampil_detailjenispengairan($tahun){

		$hsl=$this->db->query("SELECT a.id, a.irigasi, a.tadah, a.rawa_pasang, a.rawa_lebak, a.periode, a.penginput, a.status, b.nama_kecamatan as kecamatan from luas_sawah_menurut_jenis_perairan as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan where a.status='0' and a.periode='$tahun' order by a.kecamatan");		
		return $hsl;  
	}
	public function tampil_grafik($tahun){
		$hsl=$this->db->query("SELECT a.id, a.irigasi, a.tadah, a.rawa_pasang, a.rawa_lebak, a.periode, a.penginput, a.status, b.nama_kecamatan as kecamatan from luas_sawah_menurut_jenis_perairan as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan where a.status='0' and a.periode='$tahun' order by a.kecamatan");	
		return $hsl;  
	}
	public function grafik_perbandingan_jenispengairanx($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT a.id, sum(a.irigasi) as irigasi, sum(a.tadah) as tadah, sum(a.rawa_pasang) as rawa_pasang, sum(a.rawa_lebak) as rawa_lebak,  a.periode, a.penginput, a.status, b.nama_kecamatan as kecamatan from luas_sawah_menurut_jenis_perairan as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan where a.status='0' and a.periode between '$tahun1' and '$tahun2' group by periode");	
		return $hsl;  
	}
	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT * from luas_sawah_menurut_jenis_perairan where status='0' group by periode order by periode desc");
		return $hsl;  
	}
	public function tampil_tahunmax(){
		$hsl=$this->db->query("SELECT max(periode) as tahun from luas_sawah_menurut_jenis_perairan where status='0' group by periode order by periode desc");
		return $hsl;  
	}
	public function tampil_kecamatan(){
		$hsl=$this->db->query("SELECT * from master_kecamatan");
		return $hsl;  
	}
	function update_jenispengairan($id,$penginput,$periode,$kecamatan,$irigasi,$tadah,$pasang,$lebak){
		$hsl=$this->db->query("UPDATE luas_sawah_menurut_jenis_perairan set penginput='$penginput', periode='$periode', kecamatan='$kecamatan', irigasi='$irigasi', tadah='$tadah', rawa_pasang='$pasang', rawa_lebak='$lebak' WHERE id='$id'");
		return $hsl;
	}
	function delete_jenispengairan($id){
		$status=1;
		$hsl=$this->db->query("UPDATE luas_sawah_menurut_jenis_perairan set status='$status' WHERE id='$id'");
		return $hsl;
	}
}
?>


