<?php 
class m_desa_wisata extends CI_Model
{

	public function tampil_desa_wisata($kecamatan){
		$kcmtn=$kecamatan;
		if($kcmtn=='0000'){
			$hasil=$this->db->query("SELECT id, kecamatan, desa, kelembagaan FROM desa_wisata WHERE status='0' ORDER BY kecamatan ASC ");
		}else{
			$hasil=$this->db->query("SELECT id, kecamatan, desa, kelembagaan FROM desa_wisata WHERE status='0' AND kecamatan='$kcmtn'");
		}
		return $hasil;
	}

	public function tampil_kecamatan(){
		$hasil=$this->db->query("SELECT * FROM master_kecamatan");
		return $hasil;
	}

	public function tampil_kec(){
		$hasil=$this->db->query("SELECT * FROM desa_wisata  WHERE status='0' GROUP BY kecamatan");
		return $hasil;
	}

	public function simpan_dewi($kecamatan, $desa, $kelembagaan, $penginput){
		$hasil=$this->db->query("INSERT INTO desa_wisata
			(id, kecamatan, desa, kelembagaan, penginput) 
			VALUES 
			('', '$kecamatan', '$desa', '$kelembagaan', '$penginput')");
		return $hasil;
	}

	function ubah_dewi($id, $kecamatan, $desa, $kelembagaan, $penginput){
		$hasil=$this->db->query("UPDATE desa_wisata 
			SET kecamatan='$kecamatan', desa='$desa', kelembagaan='$kelembagaan', penginput='$penginput' where id='$id'");
		return $hasil;
	}

	function hapus_dewi($id){
		$status=1;
		$hasil=$this->db->query("UPDATE desa_wisata SET status='$status' where id='$id'");
		return $hasil;
	}





	
	
}
?>