<?php
class m_wisata_alam extends CI_Model
{

	public function tampil_wisata_alam($kecamatan)
	{
		$kcmtn = $kecamatan;
		if ($kcmtn == '0000') {
			$hasil = $this->db->query("SELECT a.id,a.nama,a.latitude,a.longitude,a.alamat,a.fasilitas,a.pengelola,a.jenis_wisata,a.publikasi,a.aksesibilitas,a.tenaga_kerja,b.nama_kecamatan,c.nama_desa FROM wisata_alam AS a JOIN master_kecamatan AS b ON a.kecamatan = b.id_kecamatan JOIN master_desa AS c ON a.desa = c.id_desa WHERE STATUS = 0");
		} else {
			$hasil = $this->db->query("SELECT a.id,a.nama,a.latitude,a.longitude,a.alamata.a.fasilitas,a.pengelola,a.jenis_wisata,a.publikasi,a.aksesibilitas,a.tenaga_kerja,b.nama_kecamatan,c.nama_desa FROM wisata_alam AS a JOIN master_kecamatan AS b ON a.kecamatan = b.id_kecamatan JOIN master_desa AS c ON a.desa = c.id_desa WHERE STATUS = 0 AND a.kecamatan='$kcmtn'");
		}
		return $hasil;
	}

	public function tampil_kecamatan()
	{
		$hasil = $this->db->query("SELECT * FROM master_kecamatan");
		return $hasil;
	}

	public function tampil_desa($kecamatan)
	{
		$hasil = $this->db->query("SELECT * FROM master_desa where id_kecamatan='$kecamatan'");
		return $hasil;
	}

	public function tampil_kec()
	{
		$hasil = $this->db->query("SELECT master_kecamatan.id_kecamatan, master_kecamatan.nama_kecamatan FROM wisata_alam JOIN master_kecamatan ON wisata_alam.kecamatan = master_kecamatan.id_kecamatan WHERE wisata_alam.STATUS='0' GROUP BY wisata_alam.kecamatan");
		return $hasil;
	}
	public function tampil_jumlahmax()
	{
		$hasil = $this->db->query("SELECT count(nama) as jumlah FROM wisata_alam where status=0  GROUP BY kecamatan");
		return $hasil;
	}

	public function tampil_master_warisan()
	{
		$hasil = $this->db->query("SELECT * FROM master_warisan_budaya");
		return $hasil;
	}

	public function simpan_wisata_alam($nama, $kecamatan, $desa, $latitude, $longitude, $alamat, $fasilitas, $pengelola, $publikasi, $aksesibilitas, $tenaga_kerja, $penginput, $jenis_wisata)
	{
		$hasil = $this->db->query("INSERT INTO wisata_alam
			(id, nama, kecamatan, desa, latitude, longitude, alamat, fasilitas, pengelola, publikasi, aksesibilitas, tenaga_kerja, penginput, jenis_wisata) 
			VALUES 
			('', '$nama', '$kecamatan', '$desa', '$latitude', '$longitude', '$alamat', '$fasilitas', '$pengelola', '$publikasi', '$aksesibilitas', '$tenaga_kerja', '$penginput', '$jenis_wisata')");
		return $hasil;
	}

	function ubah_wisata_alam($id, $nama, $latitude, $longitude, $alamat, $fasilitas, $pengelola, $publikasi, $aksesibilitas, $tenaga_kerja, $penginput, $jenis_wisata)
	{
		$hasil = $this->db->query("UPDATE wisata_alam 
			SET nama='$nama', latitude='$latitude', longitude='$longitude',alamat='$alamat', fasilitas='$fasilitas', pengelola='$pengelola', publikasi='$publikasi', aksesibilitas='$aksesibilitas', tenaga_kerja='$tenaga_kerja', penginput='$penginput', jenis_wisata='$jenis_wisata' where id='$id'");
		return $hasil;
	}

	function hapus_wisata_alam($id)
	{
		$status = 1;
		$hasil = $this->db->query("UPDATE wisata_alam SET status='$status' where id='$id'");
		return $hasil;
	}
}
