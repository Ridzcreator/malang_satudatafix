<?php
class M_bencana extends CI_Model {
var $tabel_kecamatan='master_kecamatan';
var $tabel_kelurahan='master_desa';

	public function simpan_barang($bencana,$banyak_bencana,$meninggal,$luka,$date,$penginput,$status,$kecamatann,$desaa){
		
		$hsl=$this->db->query("INSERT INTO jumlah_korban(id, bencana_alam, banyak_bencana, meninggal, luka, periode, penginput, status, kecamatan, desa) VALUES ('','$bencana','$banyak_bencana','$meninggal','$luka','$date','$penginput','$status','$kecamatann', '$desaa')");
		return $hsl;
	}
	public function simpan_detail_barang($bencana,$banyak_bencana,$meninggal,$luka,$date,$penginput,$status,$kecamatann,$desaa){
		
		$hsl=$this->db->query("INSERT INTO jumlah_korban(id, bencana_alam, banyak_bencana, meninggal, luka, periode, penginput, status, kecamatan, desa) VALUES ('','$bencana','$banyak_bencana','$meninggal','$luka','$date','$penginput','$status','$kecamatann', '$desaa')");
		return $hsl;
	}
	public function tampil_bencana(){
		$hsl=$this->db->query("SELECT * from bencana");
		return $hsl;
	}
	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT periode FROM jumlah_korban WHERE STATUS = '0' GROUP BY periode desc");
		return $hsl;
	}
	public function tampil_tahunn(){
		$hsl=$this->db->query("SELECT MAX(periode) as periode FROM jumlah_korban WHERE STATUS='0' ");
		return $hsl;
	}
	public function tampil_jumlah($tahun){
		$thn=$tahun;
		if($thn=='0000'){
			$hsl=$this->db->query("SELECT bencana.id,bencana.bencana,master_kecamatan.nama_kecamatan, jumlah_korban.kecamatan,jumlah_korban.desa,jumlah_korban.bencana_alam, sum(jumlah_korban.banyak_bencana) as banyak_bencana,sum(jumlah_korban.meninggal) as meninggal, sum(jumlah_korban.luka) as luka, jumlah_korban.periode, jumlah_korban.penginput,jumlah_korban.id, master_desa.nama_desa FROM master_kecamatan JOIN jumlah_korban ON master_kecamatan.id_kecamatan=jumlah_korban.kecamatan JOIN master_desa ON master_desa.id_desa=jumlah_korban.desa JOIN bencana ON bencana.id=jumlah_korban.bencana_alam where jumlah_korban.status='0' and jumlah_korban.periode='$thn' GROUP BY jumlah_korban.periode='$thn',jumlah_korban.bencana_alam");
		}else{
			$hsl=$this->db->query("SELECT bencana.id, bencana.bencana,master_kecamatan.nama_kecamatan, jumlah_korban.kecamatan,jumlah_korban.desa,jumlah_korban.bencana_alam, sum(jumlah_korban.banyak_bencana) as banyak_bencana,sum(jumlah_korban.meninggal) as meninggal, sum(jumlah_korban.luka) as luka, jumlah_korban.periode, jumlah_korban.penginput,jumlah_korban.id, master_desa.nama_desa FROM master_kecamatan JOIN jumlah_korban ON master_kecamatan.id_kecamatan=jumlah_korban.kecamatan JOIN master_desa ON master_desa.id_desa=jumlah_korban.desa JOIN bencana ON bencana.id=jumlah_korban.bencana_alam where jumlah_korban.status='0' and jumlah_korban.periode='$thn' GROUP BY jumlah_korban.periode='$thn',jumlah_korban.bencana_alam");
		}
		

		
		return $hsl;

	}
	public function tampil_detail_bencana($tahun,$bencana){
		$thn=$tahun;
		$bcn=$bencana;
		if($thn=='0000'){
			$hsl=$this->db->query("SELECT bencana.id, bencana.bencana,master_kecamatan.nama_kecamatan, jumlah_korban.kecamatan,jumlah_korban.bencana_alam, jumlah_korban.banyak_bencana,jumlah_korban.meninggal, jumlah_korban.luka, jumlah_korban.periode,jumlah_korban.desa, jumlah_korban.penginput,jumlah_korban.id, master_desa.nama_desa FROM master_kecamatan JOIN jumlah_korban ON master_kecamatan.id_kecamatan=jumlah_korban.kecamatan JOIN master_desa ON master_desa.id_desa=jumlah_korban.desa JOIN bencana ON bencana.id=jumlah_korban.bencana_alam WHERE jumlah_korban.status='0' and jumlah_korban.periode='$thn' and jumlah_korban.bencana_alam='$bcn'");
		}else{
			$hsl=$this->db->query("SELECT bencana.id, bencana.bencana,master_kecamatan.nama_kecamatan, jumlah_korban.kecamatan,jumlah_korban.bencana_alam, jumlah_korban.banyak_bencana,jumlah_korban.meninggal, jumlah_korban.luka, jumlah_korban.periode,jumlah_korban.desa, jumlah_korban.penginput,jumlah_korban.id, master_desa.nama_desa FROM master_kecamatan JOIN jumlah_korban ON master_kecamatan.id_kecamatan=jumlah_korban.kecamatan JOIN master_desa ON master_desa.id_desa=jumlah_korban.desa JOIN bencana ON bencana.id=jumlah_korban.bencana_alam WHERE jumlah_korban.status='0' and jumlah_korban.periode='$thn' and jumlah_korban.bencana_alam='$bcn'");
		}
		

		
		return $hsl;

	}
	public function tampil_detail_bencana_grafik($tahun,$bencana){
		$thn=$tahun;
		$bcn=$bencana;
		if($thn=='0000'){
			$hsl=$this->db->query("SELECT bencana.id, bencana.bencana,master_kecamatan.nama_kecamatan, jumlah_korban.kecamatan,jumlah_korban.bencana_alam, sum(jumlah_korban.banyak_bencana) as banyak_bencana,sum(jumlah_korban.meninggal) as meninggal, sum(jumlah_korban.luka) as luka, jumlah_korban.periode,jumlah_korban.desa, jumlah_korban.penginput,jumlah_korban.id, master_desa.nama_desa FROM master_kecamatan JOIN jumlah_korban ON master_kecamatan.id_kecamatan=jumlah_korban.kecamatan JOIN master_desa ON master_desa.id_desa=jumlah_korban.desa JOIN bencana ON bencana.id=jumlah_korban.bencana_alam WHERE jumlah_korban.status='0' and jumlah_korban.periode='$thn' and jumlah_korban.bencana_alam='$bcn' GROUP by jumlah_korban.kecamatan");
		}else{
			$hsl=$this->db->query("SELECT bencana.id, bencana.bencana,master_kecamatan.nama_kecamatan, jumlah_korban.kecamatan,jumlah_korban.bencana_alam, sum(jumlah_korban.banyak_bencana) as banyak_bencana,sum(jumlah_korban.meninggal) as meninggal, sum(jumlah_korban.luka) as luka, jumlah_korban.periode,jumlah_korban.desa, jumlah_korban.penginput,jumlah_korban.id, master_desa.nama_desa FROM master_kecamatan JOIN jumlah_korban ON master_kecamatan.id_kecamatan=jumlah_korban.kecamatan JOIN master_desa ON master_desa.id_desa=jumlah_korban.desa JOIN bencana ON bencana.id=jumlah_korban.bencana_alam WHERE jumlah_korban.status='0' and jumlah_korban.periode='$thn' and jumlah_korban.bencana_alam='$bcn' GROUP by jumlah_korban.kecamatan");
		}
		

		
		return $hsl;

	}
	public function tahun_grafik($tahun1){
		$hsl=$this->db->query("select periode from jumlah_korban where periode='$tahun1' limit 1");
		return $hsl;
	}

	public function grafik_perbandingan_perumahanx($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT bencana.id, bencana.bencana,master_kecamatan.nama_kecamatan, jumlah_korban.kecamatan,jumlah_korban.bencana_alam, sum(jumlah_korban.banyak_bencana) as banyak_bencana ,sum(jumlah_korban.meninggal) as meninggal, sum(jumlah_korban.luka) as luka,jumlah_korban.periode,jumlah_korban.desa, jumlah_korban.penginput,jumlah_korban.id, master_desa.nama_desa FROM master_kecamatan JOIN jumlah_korban ON master_kecamatan.id_kecamatan=jumlah_korban.kecamatan JOIN master_desa ON master_desa.id_desa=jumlah_korban.desa JOIN bencana ON bencana.id=jumlah_korban.bencana_alam WHERE jumlah_korban.status='0' and jumlah_korban.periode between '$tahun1' and '$tahun2' GROUP BY bencana.bencana, periode ORDER BY periode, bencana");
		return $hsl;
	}
	public function grafik_perbandingan_bencana($tahun1,$tahun2,$bencana){
		$hsl=$this->db->query("SELECT bencana.id, bencana.bencana,master_kecamatan.nama_kecamatan, jumlah_korban.kecamatan,jumlah_korban.bencana_alam, sum(jumlah_korban.banyak_bencana) as banyak_bencana ,sum(jumlah_korban.meninggal) as meninggal, sum(jumlah_korban.luka) as luka,jumlah_korban.periode,jumlah_korban.desa, jumlah_korban.penginput,jumlah_korban.id, master_desa.nama_desa FROM master_kecamatan JOIN jumlah_korban ON master_kecamatan.id_kecamatan=jumlah_korban.kecamatan JOIN master_desa ON master_desa.id_desa=jumlah_korban.desa JOIN bencana ON bencana.id=jumlah_korban.bencana_alam WHERE jumlah_korban.status='0' and bencana.id='$bencana' and jumlah_korban.periode between '$tahun1' and '$tahun2' GROUP BY bencana.bencana, periode ORDER BY periode, bencana");
		return $hsl;
	}

	public function tampil_tampil($tahun){
		$thn = $tahun;
		if($thn=='0000'){
			$hsl=$this->db->query("SELECT bencana.id, bencana.bencana,master_kecamatan.nama_kecamatan, jumlah_korban.kecamatan,jumlah_korban.bencana_alam, jumlah_korban.banyak_bencana,jumlah_korban.meninggal, jumlah_korban.luka, jumlah_korban.periode,jumlah_korban.desa, jumlah_korban.penginput,jumlah_korban.id, master_desa.nama_desa FROM master_kecamatan JOIN jumlah_korban ON master_kecamatan.id_kecamatan=jumlah_korban.kecamatan JOIN master_desa ON master_desa.id_desa=jumlah_korban.desa JOIN bencana ON bencana.id=jumlah_korban.bencana_alam WHERE jumlah_korban.status='0'");
		}else{
			$hsl=$this->db->query("SELECT bencana.id, bencana.bencana,master_kecamatan.nama_kecamatan, jumlah_korban.kecamatan,jumlah_korban.bencana_alam, jumlah_korban.banyak_bencana,jumlah_korban.meninggal, jumlah_korban.luka, jumlah_korban.periode,jumlah_korban.desa, jumlah_korban.penginput,jumlah_korban.id, master_desa.nama_desa FROM master_kecamatan JOIN jumlah_korban ON master_kecamatan.id_kecamatan=jumlah_korban.kecamatan JOIN master_desa ON master_desa.id_desa=jumlah_korban.desa JOIN bencana ON bencana.id=jumlah_korban.bencana_alam WHERE jumlah_korban.status='0' and jumlah_korban.periode='$thn'");
		}
		
		return $hsl;
	}

	public function tampil_grafik($tahun){
		$thn = $tahun;
		if($thn=='0000'){
			$hsl=$this->db->query("SELECT bencana.id, bencana.bencana,master_kecamatan.nama_kecamatan, jumlah_korban.kecamatan,jumlah_korban.bencana_alam, jumlah_korban.banyak_bencana,jumlah_korban.meninggal, jumlah_korban.luka, jumlah_korban.periode,jumlah_korban.desa, jumlah_korban.penginput,jumlah_korban.id, master_desa.nama_desa FROM master_kecamatan JOIN jumlah_korban ON master_kecamatan.id_kecamatan=jumlah_korban.kecamatan JOIN master_desa ON master_desa.id_desa=jumlah_korban.desa JOIN bencana ON bencana.id=jumlah_korban.bencana_alam WHERE jumlah_korban.status='0' GROUP BY jumlah_korban.bencana_alam");
		}else{
			$hsl=$this->db->query("SELECT bencana.id, bencana.bencana,master_kecamatan.nama_kecamatan, jumlah_korban.kecamatan,jumlah_korban.bencana_alam, jumlah_korban.banyak_bencana,jumlah_korban.meninggal, jumlah_korban.luka, jumlah_korban.periode,jumlah_korban.desa, jumlah_korban.penginput,jumlah_korban.id, master_desa.nama_desa FROM master_kecamatan JOIN jumlah_korban ON master_kecamatan.id_kecamatan=jumlah_korban.kecamatan JOIN master_desa ON master_desa.id_desa=jumlah_korban.desa JOIN bencana ON bencana.id=jumlah_korban.bencana_alam WHERE jumlah_korban.status='0' AND jumlah_korban.periode='$thn' GROUP BY jumlah_korban.bencana_alam");
		}
		

		
		return $hsl;

	}
	

	// public function tampil_grafik(){
	// 	$hsl=$this->db->query("SELECT master_kecamatan.nama_kecamatan, jumlah_korban.kecamatan,jumlah_korban.desa,jumlah_korban.bencana_alam, jumlah_korban.banyak_bencana,jumlah_korban.meninggal, jumlah_korban.luka, jumlah_korban.periode, jumlah_korban.penginput,jumlah_korban.id, master_desa.nama_desa FROM master_kecamatan JOIN jumlah_korban ON master_kecamatan.id_kecamatan=jumlah_korban.kecamatan JOIN master_desa ON master_desa.id_desa=jumlah_korban.desa where jumlah_korban.status='1'");
	// 	return $hsl;
	// }
	

	public function tampil_jumlaha(){
		$cnt = $this->db->query("SELECT COUNT(bencana_alam) AS cnt FROM jumlah_korban");
		return $cnt;
	}
	public function tampil_bencanax($id){
		$hsl=$this->db->query("SELECT master_kecamatan.nama_kecamatan, jumlah_korban.kecamatan,jumlah_korban.bencana_alam, jumlah_korban.banyak_bencana,jumlah_korban.meninggal, jumlah_korban.luka, jumlah_korban.periode, jumlah_korban.penginput,jumlah_korban.id, master_desa.nama_desa FROM master_kecamatan JOIN jumlah_korban ON master_kecamatan.id_kecamatan=jumlah_korban.kecamatan JOIN master_desa ON master_desa.id_desa=jumlah_korban.desa where jumlah_korban.id='$id'");
		return $hsl;
	}
	
	
	public function simpan_bencana($bencana){
		
		$hsl=$this->db->query("INSERT INTO bencana(id, bencana) VALUES ('','$bencana')");
		return $hsl;
	}

	function update_bencana($id,$bencana,$banyak_bencana,$meninggal,$luka,$tahun,$kecamatannn,$desaaa){
		$hsl=$this->db->query("UPDATE jumlah_korban SET bencana_alam='$bencana',banyak_bencana='$banyak_bencana', meninggal='$meninggal', luka='$luka',periode='$tahun',penginput='$penginput' WHERE id='$id'");
		return $hsl;
	}
	function update_bencana_alam($id,$bencana){
		$hsl=$this->db->query("UPDATE bencana SET bencana='$bencana' WHERE id='$id'");
		return $hsl;
	}
	function delete_bencana($id){
		$status=1;
		$hsl=$this->db->query("UPDATE jumlah_korban SET status='$status' WHERE id='$id'");
		return $hsl;
		// $hsl=$this->db->query("DELETE FROM jumlah_korban where id='$id'");
		// return $hsl;
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


