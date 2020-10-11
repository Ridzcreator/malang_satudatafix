<?php
class m_dasboard_grafik_wisatawan_datang extends CI_Model
{
    public function tampil_grafik_wisatawan_datang()
    {
        $hasil = $this->db->query("select tahun,sum(domestik) as jumlah_domestik,sum(mancanegara) as jumlah_manca,jenis_wisatawan,sum(jumlah) as jumlah from detail_wisatawan WHERE status='0' and jenis_wisatawan='wisatawan_datang' group by tahun")->result();
        return $hasil;
    }
}
