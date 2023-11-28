<?php 


class M_laporan extends CI_Model
{
    public function rekap($tahun,$bulan)
    {
        $query = $this->db->query("SELECT keterangan,id_presensi,lingkup,jam_masuk,jam_keluar,username,DATE_FORMAT(tgl_presensi,'%d-%mm-%Y') AS tgl FROM presensi INNER JOIN users ON presensi.id_pegawai = users.id_user WHERE month(tgl_presensi) = '$bulan' AND year(tgl_presensi) = '$tahun'");
        return $query;
    }
    public function rekap_all()
    {
        $query = $this->db->query("SELECT keterangan,id_presensi,lingkup,jam_masuk,jam_keluar,username,DATE_FORMAT(tgl_presensi,'%d-%mm-%Y') AS tgl FROM presensi INNER JOIN users ON presensi.id_pegawai = users.id_user");
        return $query;
    }
    
    public function rekap_all_byYear($tahun)
    {
        $query = $this->db->query("SELECT keterangan,id_presensi,lingkup,jam_masuk,jam_keluar,username,DATE_FORMAT(tgl_presensi,'%d-%mm-%Y') AS tgl FROM presensi INNER JOIN users ON presensi.id_pegawai = users.id_user WHERE year(tgl_presensi) = $tahun");
        return $query;
    }
}


?>