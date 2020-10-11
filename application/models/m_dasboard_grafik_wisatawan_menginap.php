<?php
class m_dasboard_grafik_wisatawan_menginap extends CI_Model
{
    public function tampil_grafik_wisatawan_menginap()
    {
        $hasil = $this->db->query("select tahun,sum(domestik) as jumlah_domestik,sum(mancanegara) as jumlah_manca,jenis_wisatawan,sum(jumlah) as jumlah from detail_wisatawan WHERE status='0' and jenis_wisatawan='wisatawan_menginap' group by tahun")->result();
        return $hasil;
    }
}
