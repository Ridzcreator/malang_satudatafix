<?php
class M_luas_wilayah extends CI_Model {




	public function simpan_barang($penginput,$periode,$kecamatan,$value,$alamat){
		$hsl2=$this->db->query("select * from kec_luas_wilayah where periode='$periode' and kecamatan='$kecamatan' and status='0'");
		$count = $hsl2->num_rows();
		if($count == 0)
		{
		$hsl=$this->db->query("INSERT INTO kec_luas_wilayah (id, penginput, periode, kecamatan, luas_wilayah) VALUES ('','$penginput','$periode','$kecamatan','$value')");
		return $hsl;
		}else{
			echo "<script>alert('Double Input Data Sudah Ada Dalam Database!!')</script>";
		}
		redirect('Kec_luas_wilayah_'.$alamat,'refresh');
	}
	public function tampil_luas_wilayah($tahun,$kecamatan){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT id, luas_wilayah, periode from kec_luas_wilayah where status='0' and kecamatan='$kecamatan' group by periode");
		}else{
		$hsl=$this->db->query("SELECT id, luas_wilayah, periode from kec_luas_wilayah where status='0' and periode='$tahun' and kecamatan='$kecamatan'");	
		}
		return $hsl;  
	}

	public function tampil_tahun($kecamatan){
		$hsl=$this->db->query("SELECT * from kec_luas_wilayah where status='0' and kecamatan='$kecamatan' GROUP BY periode order by periode");
		return $hsl;  
	}
	public function tampil_jumlah_penduduk_agamax($periode,$kecamatan){
		$thn=$periode;
		$hsl=$this->db->query("SELECT a.*, b.nama_kecamatan , c.keterangan as keterangan from kec_luas_wilayah as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan join master_agama as c on a.agama=c.id where a.kecamatan='$kecamatan' and a.periode='$thn' and a.status='0'");
		return $hsl;
	}
	public function grafik_perbandingan_luas_wilayahx($tahun2, $tahun1, $kecamatan){
		$hsl=$this->db->query("SELECT a.id, a.penginput, a.kecamatan, a.luas_wilayah, a.periode , b.nama_kecamatan from kec_luas_wilayah as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan where a.kecamatan='$kecamatan' and a.status='0' and a.periode between '$tahun1' and '$tahun2' group by a.periode order by a.periode");
		return $hsl;
	}
	function update_luas_wilayah($id,$penginput,$periode,$kecamatan,$value){
		$hsl=$this->db->query("UPDATE kec_luas_wilayah SET penginput='$penginput', periode='$periode', luas_wilayah='$value' WHERE id='$id'");
		return $hsl;
	}
	function delete_luas_wilayah($id){
		$status=1;
		$hsl=$this->db->query("UPDATE kec_luas_wilayah SET status='$status' WHERE id='$id'");
		return $hsl;
	}

}
?>


