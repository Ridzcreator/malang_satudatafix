<?php 
class m_pasar_tradisional extends CI_Model
{

	public function tampil_pasar_tra($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hasil=$this->db->query("SELECT * FROM pasar_tradisional where Status='0'");
		}else{
		$hasil=$this->db->query("SELECT * FROM pasar_tradisional where Status='0' and Tahun='$thn'");
		}
		return $hasil;
	}

	public function detail_pasar_tra_pemerintah($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hasil=$this->db->query("SELECT * FROM pasar_tradisional where Pengelola='Dikelola Pemerintah' and Status='0'");
		}else{
		$hasil=$this->db->query("SELECT * FROM pasar_tradisional where Status='0' and Tahun='$thn' and Pengelola='Dikelola Pemerintah'");
		}
		return $hasil;
	}

	public function detail_pasar_tra_swasta($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hasil=$this->db->query("SELECT * FROM pasar_tradisional where Pengelola='Dikelola Swasta' and Status='0'");
		}else{
		$hasil=$this->db->query("SELECT * FROM pasar_tradisional where Status='0' and Tahun='$thn' and  Pengelola='Dikelola Swasta'");
		}
		return $hasil;
	}

	public function detail_pasar_tra_masyarakat($tahun){
		$thn=$tahun;
		if($thn=='0000'){
		$hasil=$this->db->query("SELECT * FROM pasar_tradisional where Pengelola='Dikelola Masyarakat' and Status='0'");
		}else{
		$hasil=$this->db->query("SELECT * FROM pasar_tradisional where Status='0' and Tahun='$thn' and Pengelola='Dikelola Masyarakat'");
		}
		return $hasil;
	}

	public function tampil_pengelola_pemerintah(){
		$hasil=$this->db->query("SELECT COUNT(Pengelola) as Pengelola FROM pasar_tradisional where Pengelola='Dikelola Pemerintah' and Status='0'");
		return $hasil;
	}

	public function tampil_pengelola_masyarakat(){
		$hasil=$this->db->query("SELECT COUNT(Pengelola) as Pengelola from pasar_tradisional where Pengelola='Dikelola Masyarakat' and Status='0'");
		return $hasil;
	}

	public function tampil_pengelola_swasta(){
		$hasil=$this->db->query("SELECT COUNT(Pengelola) as Pengelola from pasar_tradisional where Pengelola='Dikelola Swasta' and Status='0'");
		return $hasil;
	}

	public function simpan_barang($nama_pasar, $alamat_lengkap, $luas_lahan, $luas_bangunan, $pengelola, $nama_pengelola, $tahun_berdiri, $tahun_terakhir, $kondisi_fisik, $tahun ,$penginput){
		$hasil=$this->db->query("INSERT INTO pasar_tradisional 
			(No, Nama_Pasar, Alamat_Lengkap, Luas_Lahan, Luas_Bangunan, Pengelola, Nama_Pengelola, Tahun_Berdiri, Tahun_Terakhir, Kondisi_Fisik, Tahun ,Penginput) 
			VALUES 
			('', '$nama_pasar', '$alamat_lengkap', '$luas_lahan', '$luas_bangunan', '$pengelola', '$nama_pengelola', '$tahun_berdiri', '$tahun_terakhir', '$kondisi_fisik','$tahun','$penginput')");
		return $hasil;
	} 

	function hapus_pasar_tradisional($no){
		$status=1;
		$hasil=$this->db->query("UPDATE pasar_tradisional SET Status='$status' WHERE No='$no'");
		return $hasil;
	}

	public function tampil_tahun(){
		$hasil=$this->db->query("SELECT * FROM pasar_tradisional where Status='0' GROUP BY Tahun order by Tahun");
		return $hasil;
	}



	function ubah_pasar_tradisional($no, $nama_pasar, $alamat_lengkap, $luas_lahan, $luas_bangunan, $pengelola, $nama_pengelola, $tahun_berdiri, $tahun_terakhir, $kondisi_fisik, $penginput){
		$hasil=$this->db->query("UPDATE pasar_tradisional SET Nama_Pasar='$nama_pasar', Alamat_Lengkap='$alamat_lengkap', Luas_Lahan='$luas_lahan', Luas_Bangunan='$luas_bangunan', Pengelola='$pengelola', Nama_Pengelola='$nama_pengelola' ,Tahun_Berdiri='$tahun_berdiri', Tahun_Terakhir='$tahun_terakhir', Kondisi_Fisik='$kondisi_fisik', Penginput='$penginput' where No='$no'");
		return $hasil;
	}
	
}
?>