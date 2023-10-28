<?php 


class M_laporan extends CI_Model
{
    public function rekap($tahun,$bulan)
    {
        $query = $this->db->query("SELECT keterangan,id_presensi,lingkup,jam_masuk,jam_keluar,username,DATE_FORMAT(tgl_presensi,'%d-%mm-%Y') AS tgl FROM presensi INNER JOIN karyawan ON presensi.id_pegawai = karyawan.id_karyawan WHERE month(tgl_presensi) = '$bulan' AND year(tgl_presensi) = '$tahun'");
        return $query;
    }
    public function rekap_all()
    {
        $query = $this->db->query("SELECT keterangan,id_presensi,lingkup,jam_masuk,jam_keluar,username,DATE_FORMAT(tgl_presensi,'%d-%mm-%Y') AS tgl FROM presensi INNER JOIN karyawan ON presensi.id_pegawai = karyawan.id_karyawan");
        return $query;
    }
    
    public function rekap_all_byYear($tahun)
    {
        $query = $this->db->query("SELECT keterangan,id_presensi,lingkup,jam_masuk,jam_keluar,username,DATE_FORMAT(tgl_presensi,'%d-%mm-%Y') AS tgl FROM presensi INNER JOIN karyawan ON presensi.id_pegawai = karyawan.id_karyawan WHERE year(tgl_presensi) = $tahun");
        return $query;
    }
}


?>