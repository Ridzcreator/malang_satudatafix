<?php

class M_pengunjungperpus_jkel extends CI_Model {
    
	public function simpan_pengunjung_perpus_jkel($tahun,$bln,$lk,$pr,$j,$penginput){
		$j=0;
		$j=$lk+$pr;
		$hsl=$this->db->query("INSERT INTO pengunjungperpus_jkel  (id,tahun,bulan, laki_laki,perempuan,jumlah,penginput) 
			VALUES 
			('','$tahun','$bln','$lk','$pr','$j','$penginput')");
		return $hsl;
	}
	public function simpan_detail_pengunjung_perpus_jkel($tahun,$bln,$lk,$pr,$j,$penginput){
	$j=0;
		$j=$lk+$pr;
		$hsl=$this->db->query("INSERT INTO pengunjungperpus_jkel  (id,tahun,bulan, laki_laki,perempuan,jumlah,penginput) 
			VALUES 
			('','$tahun','$bln','$lk','$pr','$j','$penginput')");
		return $hsl;
	
	}
	public function  tampil_detail_pengunjung_perpus_jkel($id){
		$hasil=$this->db->query("SELECT * FROM pengunjungperpus_jkel WHERE status='0' AND tahun='$id'");
		return $hasil;
	}
	public function tampil_pengunjung_perpus_jkel($tahun){
		$thn=$tahun;
		if($thn=='0000'){
			$hasil=$this->db->query("SELECT id, tahun,bulan, penginput, sum(laki_laki) as laki_laki, sum(perempuan) as perempuan, sum(jumlah) as jumlah FROM pengunjungperpus_jkel WHERE status='0' GROUP BY tahun");
		}else{
			$hasil=$this->db->query("SELECT id, tahun,bulan, penginput, sum(laki_laki) as laki_laki, sum(perempuan) as perempuan, sum(jumlah) as jumlah FROM pengunjungperpus_jkel WHERE status='0' and tahun='$tahun'");
		}
				return $hasil;
	}
	public function tampil_tahun(){
	$hsl=$this->db->query("SELECT * from pengunjungperpus_jkel where status='0' GROUP BY tahun ");
		return $hsl;
	}
	public function tampil_bulan(){
		$hsl=$this->db->query("SELECT * from master_bulan");
		return $hsl;
	}
	
    public function delete_pengunjung_perpus_jkel($id){
    	$status=1;
		$hsl=$this->db->query("UPDATE pengunjungperpus_jkel set status ='$status' where id='$id'");
		return $hsl;

	}
	public function grafik_perbandingan_perpus_jkel($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, tahun, bulan, penginput, sum(laki_laki) as laki_laki, sum(perempuan) as perempuan, sum(jumlah) as jumlah FROM pengunjungperpus_jkel WHERE status='0' and tahun BETWEEN '$tahun1' AND '$tahun2'  GROUP BY tahun");	
		return $hsl;  
	}
		public function tampil_grafik($tahun){
		$hsl=$this->db->query("SELECT * FROM pengunjungperpus_jkel where status='0' and tahun='$tahun'");	
		return $hsl;  
	}
	public function edit_pengunjung_perpus_jkel($id,$tahun,$bln,$lk,$pr,$j,$penginput) {
		$j=0;
		$j=$lk+$pr;
		$hsl=$this->db->query("UPDATE pengunjungperpus_jkel SET tahun ='$tahun',bulan='$bln', laki_laki ='$lk', perempuan = '$pr',jumlah = '$j', penginput='$penginput' where id='$id'");
		return $hsl;
	}

}