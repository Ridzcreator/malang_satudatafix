<?php 
class m_wisata_budaya extends CI_Model
{

	public function tampil_wisata_budaya($kecamatan){
		$kcmtn=$kecamatan;
		if($kcmtn=='0000'){
			$hasil=$this->db->query("SELECT a.id,a.nama,a.latitude,a.longitude,a.alamat,a.fasilitas,a.deskripsi,a.pengelola,a.jenis_wisata,a.publikasi,a.aksesibilitas,b.nama_kecamatan,c.nama_desa FROM wisata_budaya AS a JOIN master_kecamatan AS b ON a.kecamatan = b.id_kecamatan JOIN master_desa AS c ON a.desa = c.id_desa WHERE a.STATUS = 0 ");
		}else{
			$hasil=$this->db->query("SELECT a.id,a.nama,a.latitude,a.longitude,a.alamat,a.fasilitas,a.deskripsi,a.pengelola,a.jenis_wisata,a.publikasi,a.aksesibilitas,b.nama_kecamatan,c.nama_desa FROM wisata_budaya AS a JOIN master_kecamatan AS b ON a.kecamatan = b.id_kecamatan JOIN master_desa AS c ON a.desa = c.id_desa WHERE a.STATUS = 0 AND kecamatan='$kcmtn'");
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

	public function tampil_kec(){
		$hasil=$this->db->query("SELECT master_kecamatan.id_kecamatan, master_kecamatan.nama_kecamatan FROM wisata_budaya JOIN master_kecamatan ON wisata_budaya.kecamatan = master_kecamatan.id_kecamatan WHERE wisata_budaya.STATUS='0' GROUP BY wisata_budaya.kecamatan");
		return $hasil;
	}

	public function tampil_master_warisan(){
		$hasil=$this->db->query("SELECT * FROM master_warisan_budaya");
		return $hasil;
	}

	public function simpan_wibu($nama, $kecamatan, $desa, $latitude, $longitude, $alamat, $fasilitas, $deskripsi, $pengelola, $publikasi, $aksesibilitas, $penginput, $jenis_wisata){
		$hasil=$this->db->query("INSERT INTO wisata_budaya
			(id, nama, kecamatan, desa, latitude, longitude, alamat, fasilitas, deskripsi, pengelola, publikasi, aksesibilitas, penginput, jenis_wisata) 
			VALUES 
			('', '$nama', '$kecamatan', '$desa', '$latitude', '$longitude', '$alamat', '$fasilitas', '$deskripsi', '$pengelola', '$publikasi', '$aksesibilitas', '$penginput', '$jenis_wisata')");
		return $hasil;
	}

	function ubah_wibu($id, $nama, $latitude, $longitude, $alamat,$fasilitas, $deskripsi, $pengelola, $publikasi, $aksesibilitas,  $penginput, $jenis_wisata){
		$hasil=$this->db->query("UPDATE wisata_budaya 
			SET nama='$nama', latitude='$latitude', longitude='$longitude', alamat='$alamat', fasilitas='$fasilitas', deskripsi='$deskripsi', pengelola='$pengelola', publikasi='$publikasi', aksesibilitas='$aksesibilitas', penginput='$penginput', jenis_wisata='$jenis_wisata' where id='$id'");
		return $hasil;
	}

	function hapus_wibu($id){
		$status=1;
		$hasil=$this->db->query("UPDATE wisata_budaya SET status='$status' where id='$id'");
		return $hasil;
	}	
}
?>