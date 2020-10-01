<?php
class M_banyakbencana extends CI_Model {
var $tabel_kecamatan='master_kecamatan';
var $tabel_kelurahan='master_desa';

	public function simpan_barang($periode,$kecamatan,$jumlah,$mati,$luka,$menderita,$hancur,$rusak,$rugi,$status,$penginput){
		
	$hsl=$this->db->query("INSERT INTO banyak_bencana(id, kecamatan, jumlah_bencana, mati,luka,menderita,hancur,rusak,kerugian, periode, penginput, status) VALUES ('','$kecamatan','$jumlah','$mati','$luka','$menderita','$hancur','$rusak','$rugi','$periode','$penginput','$status')");
		return $hsl;
	}
	public function tampil_jumlahmax($tahun){
	
		$hsl=$this->db->query("SELECT sum(kerugian) as jumlah from banyak_bencana where periode='$tahun' AND status='0'");
		
		return $hsl;
	}
	public function tampil_jumlahmin($tahun){
	
		$hsl=$this->db->query("SELECT sum(kerugian) as jumlah from banyak_bencana where periode='$tahun' AND status='0'");
		
		return $hsl;
	}
	public function tampil_tahunmax(){
		$hsl=$this->db->query("SELECT max(periode) as tahun from banyak_bencana where status='0' ");
		return $hsl;
	}
	public function tampil_tahunmin(){
		$hsl=$this->db->query("SELECT max(periode-1) as tahun from banyak_bencana where status='0' ");
		return $hsl;
	}
	

	public function update_bencana($id,$periode,$kecamatan,$jumlah,$mati,$luka,$menderita,$hancur,$rusak,$rugi,$status,$penginput){
		$hsl=$this->db->query("UPDATE banyak_bencana SET kecamatan='$kecamatan',jumlah_bencana='$jumlah', mati='$mati',luka='$luka',menderita='$menderita',hancur='$hancur', rusak='$rusak',kerugian='$rugi',periode='$periode',penginput='$penginput' WHERE id='$id'");
		return $hsl;
	}
	function delete_bencanaa($id){
		$status=1;
		$hsl=$this->db->query("UPDATE banyak_bencana SET status='$status' WHERE id='$id'");
		return $hsl;
		// $hsl=$this->db->query("DELETE FROM banyak_bencana where id='$id'");
		// return $hsl;
	}
	function delete_bencana_tahun($id){
		$status=1;
		$hsl=$this->db->query("UPDATE banyak_bencana SET status='$status' WHERE periode='$id'");
		return $hsl;
		// $hsl=$this->db->query("DELETE FROM banyak_bencana where id='$id'");
		// return $hsl;
	}
	public function tampil_bencana(){
		$hsl=$this->db->query("SELECT * from bencana");
		return $hsl;
	}
	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT periode FROM banyak_bencana WHERE STATUS = '0' GROUP BY periode desc");
		return $hsl;
	}
	public function tampil_tahunn(){
		$hsl=$this->db->query("SELECT MAX(periode) as periode FROM banyak_bencana WHERE STATUS='0' ");
		return $hsl;
	}
	public function tampil_jumlah($tahun){
		$thn=$tahun;
		if($thn=='0000'){
			$hsl=$this->db->query("SELECT banyak_bencana.id, sum(banyak_bencana.jumlah_bencana) as jumlah_bencana,sum(banyak_bencana.mati) as mati,sum(banyak_bencana.luka) as luka,sum(banyak_bencana.menderita) as menderita,sum(banyak_bencana.hancur) as hancur,sum(banyak_bencana.rusak) as rusak,sum(banyak_bencana.kerugian) as kerugian,banyak_bencana.periode FROM master_kecamatan JOIN banyak_bencana ON master_kecamatan.id_kecamatan=banyak_bencana.kecamatan where banyak_bencana.status='0' GROUP BY banyak_bencana.periode");
		}else{
			$hsl=$this->db->query("SELECT banyak_bencana.id, sum(banyak_bencana.jumlah_bencana) as jumlah_bencana,sum(banyak_bencana.mati) as mati,sum(banyak_bencana.luka) as luka,sum(banyak_bencana.menderita) as menderita,sum(banyak_bencana.hancur) as hancur,sum(banyak_bencana.rusak) as rusak,sum(banyak_bencana.kerugian) as kerugian,banyak_bencana.periode FROM master_kecamatan JOIN banyak_bencana ON master_kecamatan.id_kecamatan=banyak_bencana.kecamatan where banyak_bencana.status='0' and banyak_bencana.periode='$thn' GROUP BY banyak_bencana.periode");
		}
		
		return $hsl;

	}
	public function tampil_detailjumlah($tahun){
		$thn=$tahun;
		$hsl=$this->db->query("SELECT banyak_bencana.id,banyak_bencana.kecamatan,master_kecamatan.nama_kecamatan, banyak_bencana.jumlah_bencana,banyak_bencana.mati,banyak_bencana.luka,banyak_bencana.menderita,banyak_bencana.hancur,banyak_bencana.rusak,banyak_bencana.kerugian,banyak_bencana.periode FROM master_kecamatan JOIN banyak_bencana ON master_kecamatan.id_kecamatan=banyak_bencana.kecamatan where banyak_bencana.status='0' and banyak_bencana.periode='$thn' ORDER BY id_kecamatan asc");
		
		return $hsl;

	}
	public function tampil_tampil($tahun){
		$thn=$tahun;
		if($thn=='0000'){
			$hsl=$this->db->query("SELECT banyak_bencana.id,banyak_bencana.kecamatan,master_kecamatan.nama_kecamatan, banyak_bencana.jumlah_bencana,banyak_bencana.mati,banyak_bencana.luka,banyak_bencana.menderita,banyak_bencana.hancur,banyak_bencana.rusak,banyak_bencana.kerugian,banyak_bencana.periode FROM master_kecamatan JOIN banyak_bencana ON master_kecamatan.id_kecamatan=banyak_bencana.kecamatan where banyak_bencana.status='0'");
		}else{
			$hsl=$this->db->query("SELECT banyak_bencana.id,banyak_bencana.kecamatan,master_kecamatan.nama_kecamatan, sum(banyak_bencana.jumlah_bencana) as jumlah_bencana,sum(banyak_bencana.mati) as mati,sum(banyak_bencana.luka) as luka,sum(banyak_bencana.menderita) as menderita,sum(banyak_bencana.hancur) as hancur,sum(banyak_bencana.rusak) as rusak,sum(banyak_bencana.kerugian) as kerugian,banyak_bencana.periode FROM master_kecamatan JOIN banyak_bencana ON master_kecamatan.id_kecamatan=banyak_bencana.kecamatan where banyak_bencana.status='0' and banyak_bencana.periode='$thn' GROUP BY banyak_bencana.periode='$thn',banyak_bencana.kecamatan ORDER BY id_kecamatan asc");
		}
		
		return $hsl;

	}
	public function tampil_detail_bencana($tahun){
		$thn=$tahun;
		if($thn=='0000'){
			$hsl=$this->db->query("SELECT bencana.id, bencana.bencana,master_kecamatan.nama_kecamatan, banyak_bencana.kecamatan,banyak_bencana.bencana_alam, banyak_bencana.banyak_bencana,banyak_bencana.meninggal, banyak_bencana.luka, banyak_bencana.periode,banyak_bencana.desa, banyak_bencana.penginput,banyak_bencana.id, master_desa.nama_desa FROM master_kecamatan JOIN banyak_bencana ON master_kecamatan.id_kecamatan=banyak_bencana.kecamatan JOIN master_desa ON master_desa.id_desa=banyak_bencana.desa JOIN bencana ON bencana.id=banyak_bencana.bencana_alam WHERE banyak_bencana.status='0' and banyak_bencana.periode='$thn' and banyak_bencana.bencana_alam='$bencana'");
		}else{
			$hsl=$this->db->query("SELECT bencana.id, bencana.bencana,master_kecamatan.nama_kecamatan, banyak_bencana.kecamatan,banyak_bencana.bencana_alam, banyak_bencana.banyak_bencana,banyak_bencana.meninggal, banyak_bencana.luka, banyak_bencana.periode,banyak_bencana.desa, banyak_bencana.penginput,banyak_bencana.id, master_desa.nama_desa FROM master_kecamatan JOIN banyak_bencana ON master_kecamatan.id_kecamatan=banyak_bencana.kecamatan JOIN master_desa ON master_desa.id_desa=banyak_bencana.desa JOIN bencana ON bencana.id=banyak_bencana.bencana_alam WHERE banyak_bencana.status='0' and banyak_bencana.periode='$thn' and banyak_bencana.bencana_alam='$bencana'");
		}
		

		
		return $hsl;

	}

	public function grafik_Perbandingan_perumahanx($tahun1, $tahun2){
		$hsl=$this->db->query("SELECT banyak_bencana.id, sum(banyak_bencana.jumlah_bencana) as jumlah_bencana,sum(banyak_bencana.mati) as mati,sum(banyak_bencana.luka) as luka, (mati+luka+menderita) as jumlah_korban,sum(banyak_bencana.menderita) as menderita,sum(banyak_bencana.hancur) as hancur,sum(banyak_bencana.rusak) as rusak,sum(banyak_bencana.kerugian) as kerugian,banyak_bencana.periode FROM master_kecamatan JOIN banyak_bencana ON master_kecamatan.id_kecamatan=banyak_bencana.kecamatan where banyak_bencana.status='0' and banyak_bencana.periode BETWEEN '$tahun1' and '$tahun2' GROUP BY banyak_bencana.periode");
		return $hsl;
	}
	

	public function tampil_grafik($id){
		$thn = $id;
		if($thn=='0000'){
			$hsl=$this->db->query("SELECT banyak_bencana.id,banyak_bencana.kecamatan,master_kecamatan.nama_kecamatan, banyak_bencana.jumlah_bencana,banyak_bencana.mati,banyak_bencana.luka,banyak_bencana.menderita,banyak_bencana.hancur,banyak_bencana.rusak,banyak_bencana.kerugian,(banyak_bencana.mati+banyak_bencana.luka+banyak_bencana.menderita) as jumlah,banyak_bencana.periode FROM master_kecamatan JOIN banyak_bencana ON master_kecamatan.id_kecamatan=banyak_bencana.kecamatan where banyak_bencana.status='0' and periode='$thn'");
		}else{
			$hsl=$this->db->query("SELECT banyak_bencana.id,banyak_bencana.kecamatan,master_kecamatan.nama_kecamatan, banyak_bencana.jumlah_bencana,banyak_bencana.mati,banyak_bencana.luka,banyak_bencana.menderita,banyak_bencana.hancur,banyak_bencana.rusak,banyak_bencana.kerugian,(banyak_bencana.mati+banyak_bencana.luka+banyak_bencana.menderita) as jumlah,banyak_bencana.periode FROM master_kecamatan JOIN banyak_bencana ON master_kecamatan.id_kecamatan=banyak_bencana.kecamatan where banyak_bencana.status='0' and periode='$thn'");
		}
		

		
		return $hsl;

	}
	

	// public function tampil_grafik(){
	// 	$hsl=$this->db->query("SELECT master_kecamatan.nama_kecamatan, banyak_bencana.kecamatan,banyak_bencana.desa,banyak_bencana.bencana_alam, banyak_bencana.banyak_bencana,banyak_bencana.meninggal, banyak_bencana.luka, banyak_bencana.periode, banyak_bencana.penginput,banyak_bencana.id, master_desa.nama_desa FROM master_kecamatan JOIN banyak_bencana ON master_kecamatan.id_kecamatan=banyak_bencana.kecamatan JOIN master_desa ON master_desa.id_desa=banyak_bencana.desa where banyak_bencana.status='1'");
	// 	return $hsl;
	// }
	

	public function tampil_jumlaha(){
		$cnt = $this->db->query("SELECT COUNT(bencana_alam) AS cnt FROM banyak_bencana");
		return $cnt;
	}
	public function tampil_bencanax($id){
		$hsl=$this->db->query("SELECT master_kecamatan.nama_kecamatan, banyak_bencana.kecamatan,banyak_bencana.bencana_alam, banyak_bencana.banyak_bencana,banyak_bencana.meninggal, banyak_bencana.luka, banyak_bencana.periode, banyak_bencana.penginput,banyak_bencana.id, master_desa.nama_desa FROM master_kecamatan JOIN banyak_bencana ON master_kecamatan.id_kecamatan=banyak_bencana.kecamatan JOIN master_desa ON master_desa.id_desa=banyak_bencana.desa where banyak_bencana.id='$id'");
		return $hsl;
	}
	
	
	public function simpan_bencana($bencana){
		
		$hsl=$this->db->query("INSERT INTO bencana(id, bencana) VALUES ('','$bencana')");
		return $hsl;
	}

	function update_bencanaa($id,$bencana,$banyak_bencana,$meninggal,$luka,$tahun,$kecamatannn,$desaaa){
		$hsl=$this->db->query("UPDATE banyak_bencana SET bencana_alam='$bencana',banyak_bencana='$banyak_bencana', meninggal='$meninggal', luka='$luka',periode='$tahun', kecamatan='$kecamatannn', desa = '$desaaa' WHERE id='$id'");
		return $hsl;
	}
	function update_bencana_alam($id,$bencana){
		$hsl=$this->db->query("UPDATE bencana SET bencana='$bencana' WHERE id='$id'");
		return $hsl;
	}
	
	function delete_bencana_alam($id){
		$hsl=$this->db->query("DELETE FROM bencana where id='$id'");
		return $hsl;
	}
		public function tampil_kecamatan(){
		$hsl=$this->db->query("SELECT * from master_kecamatan");
		return $hsl;
	}
	public function tampil_desa(){
		$hsl=$this->db->query("SELECT * FROM master_desa ORDER BY id_kecamatan ASC limit 10 ");
		return $hsl;
	}

		public function tampil_kelurahan($kdkec){
		$hsl=$this->db->query("SELECT * from master_desa where id_kecamatan='$kdkec' order by nama_desa asc");
		return $hsl;
	}
	public function ambil_kecamatan() {
	$sql_prov=$this->db->get($this->tabel_kecamatan);	
	if($sql_prov->num_rows()>0){
		foreach ($sql_prov->result_array() as $row)
			{
				$result['-']= '- Pilih Kecamatan -';
				$result[$row['id_kecamatan']]= ucwords(strtolower($row['nama_kecamatan']));
			}
			return $result;
		}
	}

	public function ambil_kelurahan($kdkec){
	$this->db->where('id_kecamatan',$kdkec);
	$this->db->order_by('nama_desa','asc');
	$sql_kelurahan=$this->db->get($this->tabel_kelurahan);
	if($sql_kelurahan->num_rows()>0){

		foreach ($sql_kelurahan->result_array() as $row)
        {
            $result[$row['id_desa']]= ucwords(strtolower($row['nama_desa']));
        }
		} else {
		   $result['-']= '- Belum Ada Kelurahan -';
		}
        return $result;
	}


}
?>


