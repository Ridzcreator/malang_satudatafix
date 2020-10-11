<?php
class m_banding_kembang_realisasi_ekspor extends CI_Model {




	public function simpan_barang($komoditi,$volum,$nilai,$total_ekspor,$naik_turun,$naik_turun_nilai,$tahun,$penginput){
		
		$hsl=$this->db->query("INSERT INTO banding_kembang_realisasi_ekspor (id, komoditi, volum, nilai, total_ekspor, naik_turun, naik_turun_nilai, tahun, penginput) VALUES ('','$komoditi','$volum','$nilai','$total_ekspor','$naik_turun','$naik_turun_nilai','$tahun','$penginput')");
		return $hsl;
	}
	public function tampil_banding_kembang_realisasi_ekspor($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT id, tahun, sum(volum) as volum, sum(nilai) as nilai, sum(total_ekspor) as total_ekspor, sum(naik_turun) as naik_turun from banding_kembang_realisasi_ekspor where status='0' group by tahun desc");
		}else{
		$hsl=$this->db->query("SELECT id, tahun,sum(volum) as volum, sum(nilai) as nilai, sum(total_ekspor) as total_ekspor, sum(naik_turun) as naik_turun from banding_kembang_realisasi_ekspor where status='0' and tahun='$thn'");
		}
		return $hsl;  
	}
	public function tampil_detail_banding_kembang_realisasi_ekspor($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT * from banding_kembang_realisasi_ekspor where status='0'");
		}else{
		$hsl=$this->db->query("SELECT * from banding_kembang_realisasi_ekspor WHERE status='0' and tahun='$thn'");
		}
		return $hsl;  
	}

	public function grafik_perbandingan_banding_kembang_realisasi_eksporx($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT id, tahun,sum(volum) as volum, sum(nilai) as nilai, sum(naik_turun) as naik_turun from banding_kembang_realisasi_ekspor where status='0' and tahun between '$tahun1' and '$tahun2' group by tahun");
		return $hsl;  
	}

	public function tampil_grafik($tahun){
		$hsl=$this->db->query("SELECT * from banding_kembang_realisasi_ekspor WHERE status='0' and tahun='$tahun'");	
		return $hsl;  
	}
	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT * from banding_kembang_realisasi_ekspor where status='0' group by tahun order by tahun");
		return $hsl;  
	}
	public function tampil_bulan(){
		$hsl=$this->db->query("SELECT * from master_bulan");
		return $hsl;  
	}

	public function tampil_komoditi(){
		$hasil=$this->db->query("SELECT * FROM master_komoditi");
		return $hasil;
	}

	function update_detail_banding_kembang_realisasi_ekspor($id,$komoditi,$volum,$nilai,$total_ekspor,$naik_turun,$naik_turun_nilai,$tahun,$penginput){
		$hsl=$this->db->query("UPDATE banding_kembang_realisasi_ekspor set penginput='$penginput', tahun='$tahun', komoditi='$komoditi', volum='$volum', nilai='$nilai', total_ekspor='$total_ekspor', naik_turun='$naik_turun', naik_turun_nilai='$naik_turun_nilai' WHERE id='$id'");
		return $hsl;
	}
	function delete_banding_kembang_realisasi_ekspor($id){
		$status=1;
		$hsl=$this->db->query("UPDATE banding_kembang_realisasi_ekspor set status='$status' WHERE id='$id'");
		return $hsl;
	}
}
?>


