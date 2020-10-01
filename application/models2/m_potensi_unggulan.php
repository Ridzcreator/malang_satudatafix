<?php 
class m_potensi_unggulan extends CI_Model
{

	public function tampil_potensi_unggulan($tahun){
		$thn=$tahun;

		if($thn=='0000'){
			$hasil=$this->db->query("SELECT a.id,a.kelembagaan, a.potensi_unggulan,a.keterangan,a.tahun,b.nama_kecamatan,c.nama_desa FROM potensi_unggulan AS a JOIN master_kecamatan AS b ON a.kecamatan = b.id_kecamatan JOIN master_desa AS c ON a.desa = c.id_desa WHERE STATUS = 0 order by a.tahun desc");
		}else{
			$hasil=$this->db->query("SELECT a.id,a.kelembagaan, a.potensi_unggulan,a.keterangan,a.tahun,b.nama_kecamatan,c.nama_desa FROM potensi_unggulan AS a JOIN master_kecamatan AS b ON a.kecamatan = b.id_kecamatan JOIN master_desa AS c ON a.desa = c.id_desa WHERE STATUS = 0 and tahun = '$thn' order by a.tahun desc");
		}
		return $hasil;
	}

public function tampil_kecamatan(){
		$hasil=$this->db->query("SELECT * FROM master_kecamatan");
		return $hasil;
	}
	public function tampil_desa($kecamatan){
		$hasil=$this->db->query("SELECT * FROM master_desa where id_kecamatan='$kecamatan'");
		return $hasil;
	}

	public function simpan_potensi($kecamatan, $desa, $kelembagaan, $potensi_unggulan, $keterangan, $penginput, $tahun){
		$hasil=$this->db->query("INSERT INTO potensi_unggulan 
			(id, kecamatan, desa, kelembagaan, potensi_unggulan, keterangan, penginput, tahun) 
			VALUES 
			('', '$kecamatan', '$desa', '$kelembagaan', '$potensi_unggulan', '$keterangan', '$penginput', '$tahun')");
		return $hasil;
	} 

	public function tampil_tahun(){
			$hasil=$this->db->query("SELECT tahun FROM potensi_unggulan WHERE STATUS=0 GROUP BY tahun");
		return $hasil;

	}
	function hapus_potensi_unggulan($no){
		$status=1;
		$hasil=$this->db->query("UPDATE potensi_unggulan SET status='$status' where id='$no'");
		return $hasil;
	}

	function ubah_potensi_unggulan($no, $kelembagaan, $potensi_unggulan, $keterangan, $penginput, $tahun){
		$hasil=$this->db->query("UPDATE potensi_unggulan SET kelembagaan='$kelembagaan', potensi_unggulan='$potensi_unggulan', tahun='$tahun', keterangan='$keterangan', penginput='$penginput' where id='$no'");
		return $hasil;
	}
	
}
?>