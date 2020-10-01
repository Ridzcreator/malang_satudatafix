<?php
class M_jeniskorban extends CI_Model {
var $tabel_kecamatan='master_kecamatan';
var $tabel_kelurahan='master_desa';

	public function simpan_barang($periode,$jenis,$nol,$sepuluh,$duapuluh,$tigapuluh,$status,$penginput){
		
		$hsl=$this->db->query("INSERT INTO jenis_korban(id, jeniskorban, nol, sepuluh, duapuluh, tigalima, periode, status, penginput) VALUES ('','$jenis','$nol','$sepuluh','$duapuluh','$tigapuluh','$periode','$status','$penginput')");
		return $hsl;
	}
	public function update_jenis($id,$periode,$jenis,$nol,$sepuluh,$duapuluh,$tigapuluh,$jumlah,$status,$penginput){
		$hsl=$this->db->query("UPDATE jenis_korban SET jeniskorban='$jenis',nol='$nol', sepuluh='$sepuluh',duapuluh='$duapuluh',tigalima='$tigapuluh',periode='$periode' WHERE id='$id'");
		return $hsl;

	}
function delete_jenis($id){
		$status=1;
		$hsl=$this->db->query("UPDATE jenis_korban SET status='$status' WHERE id='$id'");
		return $hsl;
		// $hsl=$this->db->query("DELETE FROM jumlah_korban where id='$id'");
		// return $hsl;
	}
	public function tampil_bencana(){
		$hsl=$this->db->query("SELECT * from bencana");
		return $hsl;
	}
	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT periode FROM jenis_korban WHERE STATUS = '0' GROUP BY periode desc");
		return $hsl;
	}
	public function tampil_tahunn(){
		$hsl=$this->db->query("SELECT MAX(periode) as periode FROM jenis_korban WHERE STATUS='0' ");
		return $hsl;
	}
	public function tampil_jumlah_dashboard($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hsl=$this->db->query("select periode, sum(nol) as nol,sum(sepuluh) as sepuluh,sum(duapuluh) as duapuluh,sum(tigalima) as tigalima from jenis_korban where status = 0 GROUP BY periode order by periode asc");
		}else{
			$hsl=$this->db->query("select periode, sum(nol) as nol,sum(sepuluh) as sepuluh,sum(duapuluh) as duapuluh,sum(tigalima) as tigalima from jenis_korban where status = 0 and periode = '$thn' GROUP BY periode ");
		}
		return $hsl;
		}
	public function tampil_jumlah($tahun){
		$thn=$tahun;
		if($thn=='0000'){
			$hsl=$this->db->query("SELECT * from jenis_korban where status='0'");
		}else{
			$hsl=$this->db->query("SELECT * from jenis_korban where status='0' and periode='$thn'");
		}
		

		
		return $hsl;

	}
	public function tampil_grafik($id){
		$hsl=$this->db->query("select periode,jeniskorban, nol,sepuluh,duapuluh,tigalima,(nol+sepuluh+duapuluh+tigalima) as jumlah from jenis_korban where status = 0 and periode = '$id' 
");
		return $hsl;
	}
	public function grafik_Perbandingan_perumahanx($tahun1, $tahun2){
		$hsl=$this->db->query("select periode, sum(nol) as nol,sum(sepuluh) as sepuluh,sum(duapuluh) as duapuluh,sum(tigalima) as tigalima from jenis_korban where status = 0 and periode BETWEEN '$tahun1' and '$tahun2' GROUP BY periode");
		return $hsl;
	}
	
	// public function tampil_grafik(){
	// 	$hsl=$this->db->query("SELECT master_kecamatan.nama_kecamatan, jumlah_korban.kecamatan,jumlah_korban.desa,jumlah_korban.bencana_alam, jumlah_korban.banyak_bencana,jumlah_korban.meninggal, jumlah_korban.luka, jumlah_korban.periode, jumlah_korban.penginput,jumlah_korban.id, master_desa.nama_desa FROM master_kecamatan JOIN jumlah_korban ON master_kecamatan.id_kecamatan=jumlah_korban.kecamatan JOIN master_desa ON master_desa.id_desa=jumlah_korban.desa where jumlah_korban.status='1'");
	// 	return $hsl;
	// }
	

	// public function tampil_jumlaha(){
	// 	$cnt = $this->db->query("SELECT COUNT(bencana_alam) AS cnt FROM jumlah_korban");
	// 	return $cnt;
	// }
	
	
	// public function simpan_bencana($bencana){
		
	// 	$hsl=$this->db->query("INSERT INTO bencana(id, bencana) VALUES ('','$bencana')");
	// 	return $hsl;
	// }

	
	// function update_bencana_alam($id,$bencana){
	// 	$hsl=$this->db->query("UPDATE bencana SET bencana='$bencana' WHERE id='$id'");
	// 	return $hsl;
	// }
	
	// function delete_bencana_alam($id){
	// 	$hsl=$this->db->query("DELETE FROM bencana where id='$id'");
	// 	return $hsl;
	// }
	// 	public function tampil_kecamatan(){
	// 	$hsl=$this->db->query("SELECT * from master_kecamatan");
	// 	return $hsl;
	// }
	// public function tampil_desa(){
	// 	$hsl=$this->db->query("SELECT * FROM master_desa ORDER BY id_kecamatan ASC limit 10 ");
	// 	return $hsl;
	// }

	// 	public function tampil_kelurahan($kdkec){
	// 	$hsl=$this->db->query("SELECT * from master_desa where id_kecamatan='$kdkec' order by nama_desa asc");
	// 	return $hsl;
	// }
	// public function ambil_kecamatan() {
	// $sql_prov=$this->db->get($this->tabel_kecamatan);	
	// if($sql_prov->num_rows()>0){
	// 	foreach ($sql_prov->result_array() as $row)
	// 		{
	// 			$result['-']= '- Pilih Kecamatan -';
	// 			$result[$row['id_kecamatan']]= ucwords(strtolower($row['nama_kecamatan']));
	// 		}
	// 		return $result;
	// 	}
	// }

	// public function ambil_kelurahan($kdkec){
	// $this->db->where('id_kecamatan',$kdkec);
	// $this->db->order_by('nama_desa','asc');
	// $sql_kelurahan=$this->db->get($this->tabel_kelurahan);
	// if($sql_kelurahan->num_rows()>0){

	// 	foreach ($sql_kelurahan->result_array() as $row)
 //        {
 //            $result[$row['id_desa']]= ucwords(strtolower($row['nama_desa']));
 //        }
	// 	} else {
	// 	   $result['-']= '- Belum Ada Kelurahan -';
	// 	}
 //        return $result;
	// }


}
?>


