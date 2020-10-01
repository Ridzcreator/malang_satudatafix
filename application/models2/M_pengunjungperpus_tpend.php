<?php

class M_pengunjungperpus_tpend extends CI_Model {
    
	public function simpan_pengunjung_perpus_tpend($tahun,$bln,$sp,$sa,$pt,$jml,$penginput){
		$jml=0;
		$jml=$sp+$sa+$pt;
		$hsl=$this->db->query("INSERT INTO pengunjungperpus_tingkatpend  
			(id, tahun, bulan,smp,sma,perguruan_tinggi,jumlah,penginput) 
			VALUES 
			('','$tahun','$bln','$sp','$sa','$pt','$jml','$penginput')");
		return $hsl;
	}
	public function simpan_detail_pengunjung_perpus_tpend($tahun,$bln,$sp,$sa,$pt,$jml,$penginput){
		$jml=0;
		$jml=$sp+$sa+$pt;
		$hsl=$this->db->query("INSERT INTO pengunjungperpus_tingkatpend  
			(id, tahun, bulan,smp,sma,perguruan_tinggi,jumlah,penginput) 
			VALUES 
			('','$tahun','$bln','$sp','$sa','$pt','$jml','$penginput')");
		return $hsl;
	}
	public function tampil_pengunjung_perpus_tpend($tahun){
		$thn=$tahun;
		if($thn=='0000'){
			$hasil=$this->db->query("SELECT id, tahun,bulan, penginput, sum(smp) as smp, sum(sma) as sma, sum(perguruan_tinggi) as perguruan_tinggi, sum(jumlah) as jumlah FROM pengunjungperpus_tingkatpend WHERE status='0' GROUP BY tahun");
		}else{
			$hasil=$this->db->query("SELECT id, tahun,bulan, penginput, sum(smp) as smp, sum(sma) as sma, sum(perguruan_tinggi) as perguruan_tinggi, sum(jumlah) as jumlah FROM pengunjungperpus_tingkatpend WHERE status='0' and tahun='$tahun'");
		}
				return $hasil;
	}
	public function  tampil_detail_pengunjung_perpus_tpend($id){
		$hasil=$this->db->query("SELECT * FROM pengunjungperpus_tingkatpend WHERE status='0' AND tahun='$id'");
		return $hasil;
	}
	public function tampil_tahun(){
	$hsl=$this->db->query("SELECT * from pengunjungperpus_tingkatpend where status='0' GROUP by tahun ");
		return $hsl;
	}
	public function tampil_bulan(){
		$hsl=$this->db->query("SELECT * from master_bulan");
		return $hsl;
	}
	
    public function delete_pengunjung_perpus_tpend($id){
    	$status=1;
		$hsl=$this->db->query("UPDATE pengunjungperpus_tingkatpend set status ='$status' where id='$id'");
		return $hsl;

	}
	public function edit_pengunjung_perpus_tpend($id,$tahun,$bln,$sp,$sa,$pt,$jml,$penginput) {
		$jml=0;
		$jml=$sp+$sa+$pt;
		$hsl=$this->db->query("UPDATE pengunjungperpus_tingkatpend SET tahun = '$tahun', bulan='$bln', smp ='$sp', sma = '$sa',perguruan_tinggi='$pt', jumlah = '$jml', penginput='$penginput'  where id='$id'");
		return $hsl;
	}
public function grafik_perbandingan_perpus_tpend($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, tahun, bulan, penginput, sum(smp) as smp, sum(sma) as sma, sum(perguruan_tinggi) as perguruan_tinggi, sum(jumlah) as jumlah FROM pengunjungperpus_tingkatpend WHERE status='0' and tahun BETWEEN '$tahun1' AND '$tahun2'  GROUP BY tahun");	
		return $hsl;  
	}
		public function tampil_grafik($tahun){
		$hsl=$this->db->query("SELECT * FROM pengunjungperpus_tingkatpend where status='0' and tahun='$tahun'");	
		return $hsl;  
	}
}