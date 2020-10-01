<?php
class m_singosari_struktur_pemerintahan extends CI_Model {




	public function simpan_barang($penginput,$periode,$kecamatan,$value,$value1,$value2,$value3){
		$hsl2=$this->db->query("select * from kec_struktur_pemerintahan where periode='$periode' and kecamatan='$kecamatan' and status='0'");
		$count = $hsl2->num_rows();
		if($count == 0)
		{
		$hsl=$this->db->query("INSERT INTO kec_struktur_pemerintahan (id, penginput, periode, kecamatan, desa, dusun, rw, rt) VALUES ('','$penginput','$periode','$kecamatan','$value','$value1','$value2','$value3')");
		return $hsl;
		}else{
			echo "<script>alert('Data Sudah Diinput')</script>";
		}
		redirect('singosari_struktur_pemerintahan','refresh');
	}
	public function tampil_singosari_struktur_pemerintahan($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT * from kec_struktur_pemerintahan where status='0' and kecamatan='9'");
		}else{
		$hsl=$this->db->query("SELECT * from kec_struktur_pemerintahan where status='0' and periode='$tahun' and kecamatan='9'");	
		}
		return $hsl;  
	}
	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT * from kec_struktur_pemerintahan where status='0' and kecamatan='9' order by periode desc");
		return $hsl;  
	}
	public function tampil_singosari_struktur_pemerintahanx($id){
		$hsl=$this->db->query("SELECT a.*, b.nama_kecamatan as keterangan from kec_struktur_pemerintahan as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan where id='$id'");
		return $hsl;
	}
	public function grafik_perbandingan_singosari_struktur_pemerintahanx($tahun2, $tahun1, $kecamatan){
		$hsl=$this->db->query("SELECT a.*, b.nama_kecamatan as keterangan from kec_struktur_pemerintahan as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan where a.periode between '$tahun1' and '$tahun2' and status='0' and kecamatan ='$kecamatan' order by periode");
		return $hsl;
	}
	function update_singosari_struktur_pemerintahan($id,$penginput,$periode,$kecamatan,$value,$value1,$value2,$value3){
		$hsl=$this->db->query("UPDATE kec_struktur_pemerintahan SET penginput='$penginput', periode='$periode', desa='$value', dusun='$value1', rw='$value2', rt='$value3' WHERE id='$id'");
		return $hsl;
	}
	function delete_singosari_struktur_pemerintahan($id){
		$status=1;
		$hsl=$this->db->query("UPDATE kec_struktur_pemerintahan SET status='$status' WHERE id='$id'");
		return $hsl;
	}
}
?>


