
<?php

class M_pengunjung_negara extends CI_Model {
    
	public function simpan_pengunjung_negara($ngr,$jml,$tahun,$penginput){
		$hsl=$this->db->query("INSERT INTO pengunjung_negara (id, negara, total, tahun, penginput) VALUES ('','$ngr','$jml', '$tahun', '$penginput')");
		return $hsl;
	}

	public function tampil_pengunjung_negara($tahun){
		$thn=$tahun;
		if(!isset($thn)){
		$hsl=$this->db->query("SELECT * from pengunjung_negara where tahun='2018' and status='0'");	
		}else{
		$hsl=$this->db->query("SELECT * from pengunjung_negara where tahun='$thn' and status='0'");
		}
		return $hsl;
	}
	public function tampil_pengunjung_negarax($tahun){
		$thn=$tahun;
		if(!isset($thn)){
		$hsl=$this->db->query("SELECT * from pengunjung_negara where tahun='2018' and status='0'");	
		}else{
		$hsl=$this->db->query("SELECT * from pengunjung_negara where tahun='$thn' and status='0'");
		}
		return $hsl;
	}

	public function tampil_negara(){
		$hsl=$this->db->query("SELECT* FROM master_negara ");
		return $hsl;
	}

	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT * from pengunjung_negara where status='0' group by tahun");
		return $hsl;
	}
	
	public function tampil_tahunmax(){
		$hsl=$this->db->query("SELECT max(tahun) as max from pengunjung_negara where status='0' group by tahun");
		return $hsl;
	}
	
	public function tampil_sum($tahun){
		$hsl=$this->db->query("SELECT sum(total) as total from pengunjung_negara where tahun='$tahun' and status='0'");
		return $hsl;
	}

	public function semua_data_crosstab(){
		$hsl=$this->db->query("SELECT DISTINCT negara, total, persentase, tahun FROM pengunjung_negara where status=0");
		return $hsl;
	}
	public function tampil_negarac(){
		$hsl=$this->db->query("SELECT DISTINCT negara FROM pengunjung_negara where status=0");
		return $hsl;
	}
	public function tampil_periodec($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT tahun FROM pengunjung_negara where status=0 and tahun BETWEEN '$tahun1' and '$tahun2' order by tahun");
		return $hsl;
	}
	public function tampil_jumlahc($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT sum(total) as total,sum(persentase) as persentase, tahun FROM pengunjung_negara  where status=0 and tahun BETWEEN '$tahun1' and '$tahun2' GROUP BY tahun");
		return $hsl;
	}


    public function delete_pengunjung_negara($id){
    	$status = 1;
		$hsl=$this->db->query("UPDATE pengunjung_negara set status= '$status' where id='$id'");
		return $hsl;
	}

	public function edit_pengunjung_negara($id,$ngr,$jml,$tahun,$penginput) {
		$hsl=$this->db->query("UPDATE pengunjung_negara SET negara ='$ngr', total='$jml', tahun='$tahun', penginput='$penginput' where id='$id'");
		return $hsl;
	}

}