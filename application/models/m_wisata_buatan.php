<?php
class m_wisata_buatan extends CI_Model
{

	public function tampil_wisata_buatan($kecamatan)
	{
		$kcmtn = $kecamatan;
		if ($kcmtn == '0000') {
			$hasil = $this->db->query("SELECT a.id,a.nama, a.longitude, a.lattitude, a.alamat, a.fasilitas,a.deskripsi,a.pengelola,a.jenis_wisata,a.publikasi,a.aksesibilitas,a.tenaga_kerja,b.nama_kecamatan,c.nama_desa FROM wisata_buatan AS a JOIN master_kecamatan AS b ON a.kecamatan = b.id_kecamatan JOIN master_desa AS c ON a.desa = c.id_desa WHERE a.STATUS = 0");
		} else {
			$hasil = $this->db->query("SELECT a.id,a.nama, a.longitude, a.lattitude, a.alamata, a.fasilitas,a.deskripsi,a.pengelola,a.jenis_wisata,a.publikasi,a.aksesibilitas,a.tenaga_kerja,b.nama_kecamatan,c.nama_desa FROM wisata_buatan AS a JOIN master_kecamatan AS b ON a.kecamatan = b.id_kecamatan JOIN master_desa AS c ON a.desa = c.id_desa WHERE a.STATUS = 0 AND a.kecamatan='$kcmtn'");
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
		$hasil = $this->db->query("SELECT master_kecamatan.id_kecamatan, master_kecamatan.nama_kecamatan FROM wisata_buatan JOIN master_kecamatan ON wisata_buatan.kecamatan = master_kecamatan.id_kecamatan WHERE wisata_buatan.STATUS='0' GROUP BY wisata_buatan.kecamatan");
		return $hasil;
	}

	public function tampil_master_warisan()
	{
		$hasil = $this->db->query("SELECT * FROM master_warisan_budaya");
		return $hasil;
	}

	public function simpan_wibu($nama, $kecamatan, $desa, $longitude, $lattitude, $alamat, $fasilitas, $deskripsi, $pengelola, $publikasi, $aksesibilitas, $tenaga_kerja, $penginput, $jenis_wisata)
	{
		$hasil = $this->db->query("INSERT INTO wisata_buatan
			(id, nama, kecamatan, desa, longitude, lattitude, alamat, fasilitas, deskripsi, pengelola, publikasi, aksesibilitas, tenaga_kerja, penginput, jenis_wisata) 
			VALUES 
			('', '$nama', '$kecamatan', '$desa', '$longitude', '$lattitude', '$alamat', '$fasilitas', '$deskripsi', '$pengelola', '$publikasi', '$aksesibilitas', '$tenaga_kerja', '$penginput', '$jenis_wisata')");
		return $hasil;
	}

	function ubah_wibu($id, $nama, $longitude, $lattitude, $alamat, $fasilitas, $deskripsi, $pengelola, $publikasi, $aksesibilitas, $tenaga_kerja, $penginput, $jenis_wisata)
	{
		$hasil = $this->db->query("UPDATE wisata_buatan 
			SET nama='$nama', longitude='$longitude', lattitude='$lattitude', alamat='$alamat', fasilitas='$fasilitas', deskripsi='$deskripsi', pengelola='$pengelola', publikasi='$publikasi', aksesibilitas='$aksesibilitas', tenaga_kerja='$tenaga_kerja', penginput='$penginput', jenis_wisata='$jenis_wisata' where id='$id'");
		return $hasil;
	}

	function hapus_wibu($id)
	{
		$status = 1;
		$hasil = $this->db->query("UPDATE wisata_buatan SET status='$status' where id='$id'");
		return $hasil;
	}
}
