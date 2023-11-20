<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{
    public function index()
    {   
        // include(APPATH. 'Rest_api' );

        $this->db->select('*');
        $this->db->from('presensi');
        $this->db->join('karyawan', 'presensi.id_pegawai = karyawan.id_karyawan');
        $this->db->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan');
        $this->db->where('presensi.tgl_presensi', 'CURDATE()', FALSE);
        $data['rafik'] = $this->db->get()->result_array();
        $this->load->view('daftar_absen',$data);
        return;


    }
    
}