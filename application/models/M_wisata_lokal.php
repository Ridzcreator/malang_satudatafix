<?php
class M_wisata_lokal extends CI_Model {




	public function simpan_barang($penginput,$periode,$kecamatan,$value,$value1,$value2,$value3,$alamat){
		$hsl2=$this->db->query("select * from kec_wisata_lokal where periode='$periode' and kecamatan='$kecamatan' and status='0'");
		$count = $hsl2->num_rows();
		if($count == 0)
		{
		$hsl=$this->db->query("INSERT INTO kec_wisata_lokal (id, penginput, periode, kecamatan, wisata_alam, wisata_buatan, wisata_edukasi, wisata_budaya) VALUES ('','$penginput','$periode','$kecamatan','$value','$value1','$value2','$value3')");
		return $hsl;
		}else{
			echo "<script>alert('Double Input Data Sudah Ada Dalam Database!!')</script>";
		}
		redirect('Kec_wisata_lokal_'.$alamat,'refresh');
	}
	public function tampil_wisata_lokal($tahun,$kecamatan){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT a.*, b.nama_kecamatan from kec_wisata_lokal as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan where a.kecamatan='$kecamatan' and a.status='0'");
		}else{
		$hsl=$this->db->query("SELECT a.*, b.nama_kecamatan from kec_wisata_lokal as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan where a.kecamatan='$kecamatan' and a.periode='$thn' and a.status='0'");	
		}
		return $hsl;  
	}

	public function tampil_tahun($kecamatan){
		$hsl=$this->db->query("SELECT * from kec_wisata_lokal where status='0' and kecamatan='$kecamatan' GROUP BY periode order by periode");
		return $hsl;  
	}
	public function tampil_wisata_lokalx($periode,$kecamatan){
		$thn=$periode;
		$hsl=$this->db->query("SELECT a.*, b.nama_kecamatan from kec_wisata_lokal as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan where a.kecamatan='$kecamatan' and a.periode='$thn' and a.status='0'");
		return $hsl;
	}
	public function tampil_wisata_lokalxx($id,$kecamatan){
		$thn=$id;
		$hsl=$this->db->query("SELECT a.*, b.nama_kecamatan from kec_wisata_lokal as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan where a.kecamatan='$kecamatan' and a.id='$thn' and a.status='0'");
		return $hsl;
	}
	public function grafik_perbandingan_wisata_lokalx($tahun2, $tahun1, $kecamatan){
		$hsl=$this->db->query("SELECT a.*, b.nama_kecamatan from kec_wisata_lokal as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan where a.kecamatan='$kecamatan' and a.periode between '$tahun1' and '$tahun2' and a.status='0' order by a.periode");
		return $hsl;
	}
	function update_wisata_lokal($id,$penginput,$periode,$kecamatan,$value,$value1,$value2,$value3){
		$hsl=$this->db->query("UPDATE kec_wisata_lokal SET penginput='$penginput', periode='$periode', wisata_alam='$value', wisata_buatan='$value1', wisata_edukasi='$value2', wisata_budaya='$value3' WHERE id='$id'");
		return $hsl;
	}
	function delete_wisata_lokal($id){
		$status=1;
		$hsl=$this->db->query("UPDATE kec_wisata_lokal SET status='$status' WHERE id='$id'");
		return $hsl;
	}

}
?>


