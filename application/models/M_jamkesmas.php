<?php
class M_jamkesmas extends CI_Model {


	public function simpan_barang($penginput,$kecamatan,$periode,$ket,$unit,$alamat,$status){
		$hsl2=$this->db->query("select * from kec_jaminan_kesehatan where periode='$periode' and desa='$ket' and kecamatan='$kecamatan' and status='0'");
		$count = $hsl2->num_rows();
		if($count == 0)
		{
		$hsl=$this->db->query("INSERT INTO kec_jaminan_kesehatan (id, kecamatan, desa, jumlah, periode, penginput, status) VALUES ('','$kecamatan','$ket','$unit','$periode','$penginput','$status')");
		return $hsl;
		}else{
			echo "<script>alert('Double Input Data Sudah Ada Dalam Database!!')</script>";
		}
		redirect('Kec_jamkesmas_'.$alamat,'refresh');
	}
		
	public function tampil_jaminan_kesehatan($tahun,$kecamatan){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("select a.id,a.kecamatan,a.desa,sum(a.jumlah) as jumlah,a.periode,b.nama_kecamatan,c.nama_desa from kec_jaminan_kesehatan as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan join master_desa as c on a.desa=c.id_desa where a.status=0 and a.kecamatan = '$kecamatan' group by a.periode order by a.periode desc
");
		}else{
		$hsl=$this->db->query("select a.id,a.kecamatan,a.desa,sum(a.jumlah) as jumlah,b.nama_kecamatan,c.nama_desa,a.periode from kec_jaminan_kesehatan as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan join master_desa as c on a.desa=c.id_desa where a.status=0 and a.periode='$tahun' and a.kecamatan='$kecamatan' group by a.periode
");	
		}
		return $hsl;  
	}
	public function tampil_detailkec_jaminan_kesehatan($tahun,$kecamatan){
		$thn=$tahun;
		$hsl=$this->db->query("select a.*,b.nama_kecamatan,c.nama_desa from kec_jaminan_kesehatan as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan join master_desa as c on a.desa=c.id_desa where a.status=0 and a.periode='$tahun' and a.kecamatan='$kecamatan'");
		return $hsl;  
	}
	public function tampil_jumlah_pembinaanx($periode,$kecamatan){
		$thn=$periode;
		$hsl=$this->db->query("SELECT a.*, b.nama_kecamatan as keterangan from kec_jaminan_kesehatan as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan where a.kecamatan='$kecamatan' and a.periode='$thn' and a.status='0'");
		return $hsl;
	}

	public function tampil_grafik($periode,$kecamatan){
		$thn=$periode;
		$hsl=$this->db->query("select a.*,b.nama_kecamatan,c.nama_desa from kec_jaminan_kesehatan as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan join master_desa as c on a.desa=c.id_desa where a.status=0 and a.periode='$thn' and a.kecamatan='$kecamatan'");
		return $hsl;
	}
	public function grafik_perbandingan_kec_jamkesmasx($tahun2, $tahun1, $kecamatan){
		$hsl=$this->db->query("select a.id,a.kecamatan,a.desa,sum(a.jumlah) as jumlah,b.nama_kecamatan,c.nama_desa,a.periode from kec_jaminan_kesehatan as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan join master_desa as c on a.desa=c.id_desa where a.status=0  and a.kecamatan='$kecamatan' and a.periode between '$tahun1' and '$tahun2' group by a.periode order by a.periode");	
		return $hsl;  
	}
	public function tampil_tahun($kecamatan){
		$hsl=$this->db->query("SELECT * from kec_jaminan_kesehatan where status='0' and kecamatan='$kecamatan' group by periode order by periode desc");
		return $hsl;  
	}

	public function tampil_desa($kecamatan){
		$hsl=$this->db->query("select * from master_desa where id_kecamatan = $kecamatan");
		return $hsl;  
	}	



	function update_kec_jamkesmas($id,$penginput,$kecamatan,$periode,$ket,$unit,$alamat,$status){
		$hsl=$this->db->query("UPDATE kec_jaminan_kesehatan set periode='$periode',desa='$ket', jumlah='$unit',penginput='$penginput' WHERE id='$id'");

		return $hsl;
	}
	function delete_kec_jamkesmas($id){
		$status=1;
		$hsl=$this->db->query("UPDATE kec_jaminan_kesehatan set status='$status' WHERE id='$id'");
		return $hsl;
	}

	public function tahun_crosstab($kecamatan){
		$hsl=$this->db->query("SELECT DISTINCT a.jumlah,a.periode,b.nama_kecamatan,c.id_desa,c.nama_desa from kec_jaminan_kesehatan as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan join master_desa as c on a.desa=c.id_desa where a.status=0 and a.kecamatan='$kecamatan'");
		return $hsl;
	}
	public function tampil_keteranganc($kecamatan){
		$hsl=$this->db->query("SELECT DISTINCT c.nama_desa from kec_jaminan_kesehatan as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan join master_desa as c on a.desa=c.id_desa where a.status=0 and kecamatan='$kecamatan'");
		return $hsl;
	}
	public function tampil_periodec($tahun1,$tahun2,$kecamatan){
		$hsl=$this->db->query("SELECT DISTINCT periode from kec_jaminan_kesehatan where status='0' and kecamatan='$kecamatan' and periode BETWEEN '$tahun1' and '$tahun2' order by periode");
		return $hsl;
	}
	public function tampil_jumlahc($tahun1,$tahun2,$kecamatan){
		$hsl=$this->db->query("SELECT DISTINCT sum(jumlah) as jumlah, periode from kec_jaminan_kesehatan where status='0' and kecamatan='$kecamatan' and periode BETWEEN '$tahun1' and '$tahun2' GROUP BY periode");
		return $hsl;
	}
	public function tampil_jumlahxc($tahun1,$tahun2,$kecamatan){
		$hsl=$this->db->query("SELECT DISTINCT sum(jumlah) as jumlah, periode from kec_jaminan_kesehatan where status='0' and kecamatan='$kecamatan' and periode BETWEEN '$tahun1' and '$tahun2'");
		return $hsl;
	}

}
?>


