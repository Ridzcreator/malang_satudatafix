<?php 
class m_warisan_budaya extends CI_Model
{

	public function tampil_data(){
		$hasil=$this->db->query("SELECT 
								(SELECT COUNT(jenis_wisata) FROM wisata_alam WHERE jenis_wisata=1 AND STATUS=0) AS budaya,
								(SELECT COUNT(jenis_wisata) FROM wisata_buatan WHERE jenis_wisata=1 AND STATUS=0) AS budaya1,
								(SELECT COUNT(jenis_wisata) FROM wisata_budaya WHERE jenis_wisata=1 AND STATUS=0) AS budaya2,

								(SELECT COUNT(jenis_wisata) FROM wisata_alam WHERE jenis_wisata=2 AND STATUS=0) AS museum1,
								(SELECT COUNT(jenis_wisata) FROM wisata_buatan WHERE jenis_wisata=2 AND STATUS=0) AS museum2,
								(SELECT COUNT(jenis_wisata) FROM wisata_budaya WHERE jenis_wisata=2 AND STATUS=0) AS museum3,

								(SELECT COUNT(jenis_wisata) FROM wisata_alam WHERE jenis_wisata=3 AND STATUS=0) AS arsitektur1,
								(SELECT COUNT(jenis_wisata) FROM wisata_buatan WHERE jenis_wisata=3 AND STATUS=0) AS arsitektur2,
								(SELECT COUNT(jenis_wisata) FROM wisata_budaya WHERE jenis_wisata=3 AND STATUS=0) AS arsitektur3,

								(SELECT COUNT(jenis_wisata) FROM wisata_alam WHERE jenis_wisata=4 AND STATUS=0) AS bahasa1,
								(SELECT COUNT(jenis_wisata) FROM wisata_buatan WHERE jenis_wisata=4 AND STATUS=0) AS bahasa2,
								(SELECT COUNT(jenis_wisata) FROM wisata_budaya WHERE jenis_wisata=4 AND STATUS=0) AS bahasa3,

								(SELECT COUNT(jenis_wisata) FROM wisata_alam WHERE jenis_wisata=5 AND STATUS=0) AS kain1,
								(SELECT COUNT(jenis_wisata) FROM wisata_buatan WHERE jenis_wisata=5 AND STATUS=0) AS kain2,
								(SELECT COUNT(jenis_wisata) FROM wisata_budaya WHERE jenis_wisata=5 AND STATUS=0) AS kain3,

								(SELECT COUNT(jenis_wisata) FROM wisata_alam WHERE jenis_wisata=6 AND STATUS=0) AS kearifan1,
								(SELECT COUNT(jenis_wisata) FROM wisata_buatan WHERE jenis_wisata=6 AND STATUS=0) AS kearifan2,
								(SELECT COUNT(jenis_wisata) FROM wisata_budaya WHERE jenis_wisata=6 AND STATUS=0) AS kearifan3,

								(SELECT COUNT(jenis_wisata) FROM wisata_alam WHERE jenis_wisata=7 AND STATUS=0) AS kerajinan1,
								(SELECT COUNT(jenis_wisata) FROM wisata_buatan WHERE jenis_wisata=7 AND STATUS=0) AS kerajinan2,
								(SELECT COUNT(jenis_wisata) FROM wisata_budaya WHERE jenis_wisata=7 AND STATUS=0) AS kerajinan3,

								(SELECT COUNT(jenis_wisata) FROM wisata_alam WHERE jenis_wisata=8 AND STATUS=0) AS kuliner1,
								(SELECT COUNT(jenis_wisata) FROM wisata_buatan WHERE jenis_wisata=8 AND STATUS=0) AS kuliner2,
								(SELECT COUNT(jenis_wisata) FROM wisata_budaya WHERE jenis_wisata=8 AND STATUS=0) AS kuliner3,

								(SELECT COUNT(jenis_wisata) FROM wisata_alam WHERE jenis_wisata=9 AND STATUS=0) AS naskah1,
								(SELECT COUNT(jenis_wisata) FROM wisata_buatan WHERE jenis_wisata=9 AND STATUS=0) AS naskah2,
								(SELECT COUNT(jenis_wisata) FROM wisata_budaya WHERE jenis_wisata=9 AND STATUS=0) AS naskah3,

								(SELECT COUNT(jenis_wisata) FROM wisata_alam WHERE jenis_wisata=10 AND STATUS=0) AS pakaian1,
								(SELECT COUNT(jenis_wisata) FROM wisata_buatan WHERE jenis_wisata=10 AND STATUS=0) AS pakaian2,
								(SELECT COUNT(jenis_wisata) FROM wisata_budaya WHERE jenis_wisata=10 AND STATUS=0) AS pakaian3,

								(SELECT COUNT(jenis_wisata) FROM wisata_alam WHERE jenis_wisata=11 AND STATUS=0) AS permainan1,
								(SELECT COUNT(jenis_wisata) FROM wisata_buatan WHERE jenis_wisata=11 AND STATUS=0) AS permainan2,
								(SELECT COUNT(jenis_wisata) FROM wisata_budaya WHERE jenis_wisata=11 AND STATUS=0) AS permainan3,

								(SELECT COUNT(jenis_wisata) FROM wisata_alam WHERE jenis_wisata=12 AND STATUS=0) AS seni1,
								(SELECT COUNT(jenis_wisata) FROM wisata_buatan WHERE jenis_wisata=12 AND STATUS=0) AS seni2,
								(SELECT COUNT(jenis_wisata) FROM wisata_budaya WHERE jenis_wisata=12 AND STATUS=0) AS seni3,

								(SELECT COUNT(jenis_wisata) FROM wisata_alam WHERE jenis_wisata=13 AND STATUS=0) AS senjata1,
								(SELECT COUNT(jenis_wisata) FROM wisata_buatan WHERE jenis_wisata=13 AND STATUS=0) AS senjata2,
								(SELECT COUNT(jenis_wisata) FROM wisata_budaya WHERE jenis_wisata=13 AND STATUS=0) AS senjata3,

								(SELECT COUNT(jenis_wisata) FROM wisata_alam WHERE jenis_wisata=14 AND STATUS=0) AS teknologi1,
								(SELECT COUNT(jenis_wisata) FROM wisata_buatan WHERE jenis_wisata=14 AND STATUS=0) AS teknologi2,
								(SELECT COUNT(jenis_wisata) FROM wisata_budaya WHERE jenis_wisata=14 AND STATUS=0) AS teknologi3, 

								(SELECT COUNT(jenis_wisata) FROM wisata_alam WHERE jenis_wisata=15 AND STATUS=0) AS lisan1,
								(SELECT COUNT(jenis_wisata) FROM wisata_buatan WHERE jenis_wisata=15 AND STATUS=0) AS lisan2,
								(SELECT COUNT(jenis_wisata) FROM wisata_budaya WHERE jenis_wisata=15 AND STATUS=0) AS lisan3,

								(SELECT COUNT(jenis_wisata) FROM wisata_alam WHERE jenis_wisata=16 AND STATUS=0) AS upacara1,
								(SELECT COUNT(jenis_wisata) FROM wisata_buatan WHERE jenis_wisata=16 AND STATUS=0) AS upacara2,
								(SELECT COUNT(jenis_wisata) FROM wisata_budaya WHERE jenis_wisata=16 AND STATUS=0) AS upacara3,

								(SELECT COUNT(jenis_wisata) FROM wisata_alam WHERE jenis_wisata=17 AND STATUS=0) AS belum1,
								(SELECT COUNT(jenis_wisata) FROM wisata_buatan WHERE jenis_wisata=17 AND STATUS=0) AS belum2,
								(SELECT COUNT(jenis_wisata) FROM wisata_budaya WHERE jenis_wisata=17 AND STATUS=0) AS belum3");

		
		return $hasil;
	}

}

?>