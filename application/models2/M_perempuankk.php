<?php
class M_perempuankk extends CI_Model {




	public function simpan_barang($penginput,$periode,$kecamatan,$jpekka,$jpekkapro,$jpekkarentan){
		$hsl2=$this->db->query("select * from jumlah_perempuan_sebagai_kepala_keluarga where kecamatan='$kecamatan' and periode='$periode' and status='0'");
		$count = $hsl2->num_rows();
		if($count == 0)
		{
		$hsl=$this->db->query("INSERT INTO jumlah_perempuan_sebagai_kepala_keluarga (id, penginput, periode, kecamatan, pekka_jumlah, usiapro_jumlah, pekka_rentan) VALUES ('','$penginput','$periode','$kecamatan','$jpekka','$jpekkapro','$jpekkarentan')");
		return $hsl;
		}else{
			echo "<script>alert('Data Sudah Diinput')</script>";
		}
		redirect('Perempuankk','refresh');
	}
	public function tampil_perempuankk($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT a.id, sum(a.pekka_jumlah) as pekka_jumlah, sum(a.usiapro_jumlah) as usiapro_jumlah, sum(a.pekka_rentan) as pekka_rentan, a.periode, a.penginput, a.status, b.nama_kecamatan as kecamatan from jumlah_perempuan_sebagai_kepala_keluarga as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan where a.status='0' group by periode");
		}else{
		$hsl=$this->db->query("SELECT a.id, sum(a.pekka_jumlah) as pekka_jumlah, sum(a.usiapro_jumlah) as usiapro_jumlah, sum(a.pekka_rentan) as pekka_rentan, a.periode, a.penginput, a.status, b.nama_kecamatan as kecamatan from jumlah_perempuan_sebagai_kepala_keluarga as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan where a.status='0' and a.periode='$tahun' group by periode");	
		}
		return $hsl;  
	}
	public function tampil_detailperempuankk($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("SELECT a.id, a.pekka_jumlah, a.usiapro_jumlah, a.pekka_rentan, a.periode, a.penginput, a.status, b.nama_kecamatan as kecamatan from jumlah_perempuan_sebagai_kepala_keluarga as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan where a.status='0'");
		}else{
		$hsl=$this->db->query("SELECT a.id, a.pekka_jumlah, a.usiapro_jumlah, a.pekka_rentan, a.periode, a.penginput, a.status, b.nama_kecamatan as kecamatan from jumlah_perempuan_sebagai_kepala_keluarga as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan where a.status='0' and a.periode='$tahun'");	
		}
		return $hsl;  
	}
	public function tampil_grafik($tahun){
		$hsl=$this->db->query("SELECT a.id, a.pekka_jumlah, a.usiapro_jumlah, a.pekka_rentan, a.periode, a.penginput, a.status, b.nama_kecamatan as kecamatan from jumlah_perempuan_sebagai_kepala_keluarga as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan where a.status='0' and a.periode='$tahun'");	
		return $hsl;  
	}
	public function grafik_perbandingan_perempuankkx($tahun2, $tahun1){
		$hsl=$this->db->query("SELECT a.id, sum(a.pekka_jumlah) as pekka_jumlah, sum(a.usiapro_jumlah) as usiapro_jumlah, sum(a.pekka_rentan) as pekka_rentan, a.periode, a.penginput, a.status, b.nama_kecamatan as kecamatan from jumlah_perempuan_sebagai_kepala_keluarga as a join master_kecamatan as b on a.kecamatan=b.id_kecamatan where a.status='0' and a.periode between '$tahun1' and '$tahun2' group by periode");	
		return $hsl;  
	}
	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT * from jumlah_perempuan_sebagai_kepala_keluarga where status='0' group by periode order by periode desc");
		return $hsl;  
	}
	public function tampil_kecamatan(){
		$hsl=$this->db->query("SELECT * from master_kecamatan");
		return $hsl;  
	}
	function update_perempuankk($id,$penginput,$periode,$kecamatan,$jpekka,$jpekkapro,$jpekkarentan){
		$hsl=$this->db->query("UPDATE jumlah_perempuan_sebagai_kepala_keluarga set penginput='$penginput', periode='$periode', pekka_jumlah='$jpekka', usiapro_jumlah='$jpekkapro', pekka_rentan='$jpekkarentan' WHERE id='$id'");
		return $hsl;
	}
	function delete_perempuankk($id){
		$status=1;
		$hsl=$this->db->query("UPDATE jumlah_perempuan_sebagai_kepala_keluarga set status='$status' WHERE id='$id'");
		return $hsl;
	}
}
?>


