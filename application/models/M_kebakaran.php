<?php
class M_kebakaran extends CI_Model {
var $tabel_kecamatan='master_kecamatan';
var $tabel_kelurahan='master_desa';

	public function simpan_barang($periode,$kecamatan,$kebakaran,$manusia,$status,$penginput){
		
	$hsl=$this->db->query("INSERT INTO banyak_kebakaran(id, kecamatan, kebakaran, korban_manusia, periode, penginput, status) VALUES ('','$kecamatan','$kebakaran','$manusia','$periode','$penginput','$status')");
		return $hsl;
	}
	public function update_kebakaran($id,$periode,$kecamatan,$kebakaran,$manusia,$status,$penginput){
		$hsl=$this->db->query("UPDATE banyak_kebakaran SET kecamatan='$kecamatan',kebakaran='$kebakaran', korban_manusia='$manusia', periode='$periode',penginput='$penginput' WHERE id='$id'");
		return $hsl;
	}
	function delete_kebakaran($id){
		$status=1;
		$hsl=$this->db->query("UPDATE banyak_kebakaran SET status='$status' WHERE id='$id'");
		return $hsl;
		// $hsl=$this->db->query("DELETE FROM banyak_kebakaran where id='$id'");
		// return $hsl;
	}
	public function tampil_bencana(){
		$hsl=$this->db->query("SELECT * from bencana");
		return $hsl;
	}
	public function tahun_crosstab(){
		$hsl=$this->db->query("SELECT DISTINCT banyak_kebakaran.id,banyak_kebakaran.kecamatan,master_kecamatan.nama_kecamatan,banyak_kebakaran.kebakaran,banyak_kebakaran.korban_manusia,banyak_kebakaran.periode FROM master_kecamatan INNER JOIN banyak_kebakaran ON master_kecamatan.id_kecamatan=banyak_kebakaran.kecamatan where banyak_kebakaran.status=0");
		return $hsl;
	}
	public function tampil_kecamatanc(){
		$hsl=$this->db->query("SELECT DISTINCT master_kecamatan.nama_kecamatan FROM master_kecamatan INNER JOIN banyak_kebakaran ON master_kecamatan.id_kecamatan=banyak_kebakaran.kecamatan where banyak_kebakaran.status=0");
		return $hsl;
	}
	public function tampil_periodec($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT banyak_kebakaran.periode FROM master_kecamatan INNER JOIN banyak_kebakaran ON master_kecamatan.id_kecamatan=banyak_kebakaran.kecamatan where banyak_kebakaran.status=0 and periode BETWEEN '$tahun1' and '$tahun2' order by banyak_kebakaran.periode");
		return $hsl;
	}
	public function tampil_jumlahc($tahun1,$tahun2){
		$hsl=$this->db->query("SELECT DISTINCT sum(banyak_kebakaran.kebakaran) as kebakaran,sum(banyak_kebakaran.korban_manusia) as korban_manusia,banyak_kebakaran.periode FROM master_kecamatan INNER JOIN banyak_kebakaran ON master_kecamatan.id_kecamatan=banyak_kebakaran.kecamatan where banyak_kebakaran.status=0 and periode BETWEEN '$tahun1' and '$tahun2' GROUP BY banyak_kebakaran.periode");
		return $hsl;
	}

	public function tampil_jumlah_dashboard(){
		$hsl=$this->db->query("SELECT DISTINCT sum(banyak_kebakaran.kebakaran) as kebakaran,sum(banyak_kebakaran.korban_manusia) as korban_manusia,banyak_kebakaran.periode FROM master_kecamatan INNER JOIN banyak_kebakaran ON master_kecamatan.id_kecamatan=banyak_kebakaran.kecamatan where banyak_kebakaran.status=0  GROUP BY banyak_kebakaran.periode");
		return $hsl;
	}

	public function tampil_grafikc($id){
		$hsl=$this->db->query("SELECT DISTINCT master_kecamatan.nama_kecamatan, banyak_kebakaran.kebakaran, banyak_kebakaran.korban_manusia,(banyak_kebakaran.kebakaran + banyak_kebakaran.korban_manusia) as jumlah,banyak_kebakaran.periode FROM master_kecamatan INNER JOIN banyak_kebakaran ON master_kecamatan.id_kecamatan=banyak_kebakaran.kecamatan where banyak_kebakaran.status=0 and banyak_kebakaran.periode ='$id'");
		return $hsl;
	}
	public function grafik_Perbandingan_perumahanx($tahun1, $tahun2){
		$hsl=$this->db->query("SELECT DISTINCT sum(banyak_kebakaran.kebakaran) as kebakaran,sum(banyak_kebakaran.korban_manusia) as korban_manusia,banyak_kebakaran.periode FROM master_kecamatan INNER JOIN banyak_kebakaran ON master_kecamatan.id_kecamatan=banyak_kebakaran.kecamatan where banyak_kebakaran.status=0 and banyak_kebakaran.periode BETWEEN '$tahun1' and '$tahun2'  GROUP BY banyak_kebakaran.periode");
		return $hsl;
	}
	
	public function tampil_tahun(){
		$hsl=$this->db->query("SELECT periode FROM banyak_kebakaran WHERE STATUS = '0' GROUP BY periode desc");
		return $hsl;
	}
	public function tampil_tahunn(){
		$hsl=$this->db->query("SELECT MAX(periode) as periode FROM banyak_kebakaran WHERE STATUS='0' ");
		return $hsl;
	}
	public function tampil_jumlah($tahun){
		$thn=$tahun;
		if($thn=='0000'){
			$hsl=$this->db->query("SELECT banyak_kebakaran.id,banyak_kebakaran.kecamatan,master_kecamatan.nama_kecamatan, banyak_kebakaran.kebakaran,banyak_kebakaran.korban_manusia,banyak_kebakaran.periode FROM master_kecamatan INNER JOIN banyak_kebakaran ON master_kecamatan.id_kecamatan=banyak_kebakaran.kecamatan where banyak_kebakaran.status='0' and banyak_kebakaran.periode='$thn'");
		}else{
			$hsl=$this->db->query("SELECT banyak_kebakaran.id,banyak_kebakaran.kecamatan,master_kecamatan.nama_kecamatan, banyak_kebakaran.kebakaran,banyak_kebakaran.korban_manusia,banyak_kebakaran.periode FROM master_kecamatan INNER JOIN banyak_kebakaran ON master_kecamatan.id_kecamatan=banyak_kebakaran.kecamatan where banyak_kebakaran.status='0' and banyak_kebakaran.periode='$thn'");
		}
		
		return $hsl;

	}
	public function tampil_tampil($tahun){
		$thn=$tahun;
		if($thn=='0000'){
			$hsl=$this->db->query("SELECT banyak_kebakaran.id,banyak_kebakaran.kecamatan,master_kecamatan.nama_kecamatan,banyak_kebakaran.kebakaran,banyak_kebakaran.korban_manusia,banyak_kebakaran.periode FROM master_kecamatan INNER JOIN banyak_kebakaran ON master_kecamatan.id_kecamatan=banyak_kebakaran.kecamatan where banyak_kebakaran.status='0'");
		}else{
			$hsl=$this->db->query("SELECT banyak_kebakaran.id,banyak_kebakaran.kecamatan,master_kecamatan.nama_kecamatan, banyak_kebakaran.kebakaran,banyak_kebakaran.korban_manusia,banyak_kebakaran.periode FROM master_kecamatan INNER JOIN banyak_kebakaran ON master_kecamatan.id_kecamatan=banyak_kebakaran.kecamatan where banyak_kebakaran.status='0' and banyak_kebakaran.periode='$thn'");
		}
		
		return $hsl;

	}
	public function tampil_detail_bencana($tahun,$bencana){
		$thn=$tahun;
		if($thn=='0000'){
			$hsl=$this->db->query("SELECT bencana.id, bencana.bencana,master_kecamatan.nama_kecamatan, banyak_kebakaran.kecamatan,banyak_kebakaran.bencana_alam, banyak_kebakaran.banyak_bencana,banyak_kebakaran.meninggal, banyak_kebakaran.luka, banyak_kebakaran.periode,banyak_kebakaran.desa, banyak_kebakaran.penginput,banyak_kebakaran.id, master_desa.nama_desa FROM master_kecamatan JOIN banyak_kebakaran ON master_kecamatan.id_kecamatan=banyak_kebakaran.kecamatan JOIN master_desa ON master_desa.id_desa=banyak_kebakaran.desa JOIN bencana ON bencana.id=banyak_kebakaran.bencana_alam WHERE banyak_kebakaran.status='0' and banyak_kebakaran.periode='$thn' and banyak_kebakaran.bencana_alam='$bencana'");
		}else{
			$hsl=$this->db->query("SELECT bencana.id, bencana.bencana,master_kecamatan.nama_kecamatan, banyak_kebakaran.kecamatan,banyak_kebakaran.bencana_alam, banyak_kebakaran.banyak_bencana,banyak_kebakaran.meninggal, banyak_kebakaran.luka, banyak_kebakaran.periode,banyak_kebakaran.desa, banyak_kebakaran.penginput,banyak_kebakaran.id, master_desa.nama_desa FROM master_kecamatan JOIN banyak_kebakaran ON master_kecamatan.id_kecamatan=banyak_kebakaran.kecamatan JOIN master_desa ON master_desa.id_desa=banyak_kebakaran.desa JOIN bencana ON bencana.id=banyak_kebakaran.bencana_alam WHERE banyak_kebakaran.status='0' and banyak_kebakaran.periode='$thn' and banyak_kebakaran.bencana_alam='$bencana'");
		}
		

		
		return $hsl;

	}
	

	public function tampil_grafik($tahun){
		$thn = $tahun;
		if($thn=='0000'){
			$hsl=$this->db->query("SELECT bencana.id, bencana.bencana,master_kecamatan.nama_kecamatan, banyak_kebakaran.kecamatan,banyak_kebakaran.bencana_alam, banyak_kebakaran.banyak_bencana,banyak_kebakaran.meninggal, banyak_kebakaran.luka, banyak_kebakaran.periode,banyak_kebakaran.desa, banyak_kebakaran.penginput,banyak_kebakaran.id, master_desa.nama_desa FROM master_kecamatan JOIN banyak_kebakaran ON master_kecamatan.id_kecamatan=banyak_kebakaran.kecamatan JOIN master_desa ON master_desa.id_desa=banyak_kebakaran.desa JOIN bencana ON bencana.id=banyak_kebakaran.bencana_alam WHERE banyak_kebakaran.status='0' GROUP BY banyak_kebakaran.bencana_alam");
		}else{
			$hsl=$this->db->query("SELECT bencana.id, bencana.bencana,master_kecamatan.nama_kecamatan, banyak_kebakaran.kecamatan,banyak_kebakaran.bencana_alam, banyak_kebakaran.banyak_bencana,banyak_kebakaran.meninggal, banyak_kebakaran.luka, banyak_kebakaran.periode,banyak_kebakaran.desa, banyak_kebakaran.penginput,banyak_kebakaran.id, master_desa.nama_desa FROM master_kecamatan JOIN banyak_kebakaran ON master_kecamatan.id_kecamatan=banyak_kebakaran.kecamatan JOIN master_desa ON master_desa.id_desa=banyak_kebakaran.desa JOIN bencana ON bencana.id=banyak_kebakaran.bencana_alam WHERE banyak_kebakaran.status='0' AND banyak_kebakaran.periode='$thn' GROUP BY banyak_kebakaran.bencana_alam");
		}
		

		
		return $hsl;

	}
	

	// public function tampil_grafik(){
	// 	$hsl=$this->db->query("SELECT master_kecamatan.nama_kecamatan, banyak_kebakaran.kecamatan,banyak_kebakaran.desa,banyak_kebakaran.bencana_alam, banyak_kebakaran.banyak_bencana,banyak_kebakaran.meninggal, banyak_kebakaran.luka, banyak_kebakaran.periode, banyak_kebakaran.penginput,banyak_kebakaran.id, master_desa.nama_desa FROM master_kecamatan JOIN banyak_kebakaran ON master_kecamatan.id_kecamatan=banyak_kebakaran.kecamatan JOIN master_desa ON master_desa.id_desa=banyak_kebakaran.desa where banyak_kebakaran.status='1'");
	// 	return $hsl;
	// }
	

	public function tampil_jumlaha(){
		$cnt = $this->db->query("SELECT COUNT(bencana_alam) AS cnt FROM banyak_kebakaran");
		return $cnt;
	}
	public function tampil_bencanax($id){
		$hsl=$this->db->query("SELECT master_kecamatan.nama_kecamatan, banyak_kebakaran.kecamatan,banyak_kebakaran.bencana_alam, banyak_kebakaran.banyak_bencana,banyak_kebakaran.meninggal, banyak_kebakaran.luka, banyak_kebakaran.periode, banyak_kebakaran.penginput,banyak_kebakaran.id, master_desa.nama_desa FROM master_kecamatan JOIN banyak_kebakaran ON master_kecamatan.id_kecamatan=banyak_kebakaran.kecamatan JOIN master_desa ON master_desa.id_desa=banyak_kebakaran.desa where banyak_kebakaran.id='$id'");
		return $hsl;
	}
	
	
	public function simpan_bencana($bencana){
		
		$hsl=$this->db->query("INSERT INTO bencana(id, bencana) VALUES ('','$bencana')");
		return $hsl;
	}

	function update_bencana($id,$bencana,$banyak_bencana,$meninggal,$luka,$tahun,$kecamatannn,$desaaa){
		$hsl=$this->db->query("UPDATE banyak_kebakaran SET bencana_alam='$bencana',banyak_bencana='$banyak_bencana', meninggal='$meninggal', luka='$luka',periode='$tahun', kecamatan='$kecamatannn', desa = '$desaaa' WHERE id='$id'");
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


