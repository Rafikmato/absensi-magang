<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        // Load necessary libraries and helpers
        $this->load->helper('url');
        $this->load->library('form_validation');
    }


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

    public function filter()
    {   
        // Validate form data
        $this->form_validation->set_rules('f-absen', 'F-absen', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Form validation failed, reload the form
            $this->load->view('daftar_absen',$data);
        } else {
            // Form validation passed, process the data
            $filter = $this->input->post('f-absen');
            date_default_timezone_set('UTC');
            $today = date('Y-m-d');
            $kemarin = date('Y-m-d',strtotime("-1 days"));
            $TigaHari = date('Y-m-d',strtotime("-3 days"));
            $seminggu = date('Y-m-d',strtotime("-1 week"));
            $sebulan = date('Y-m-d',strtotime("-1 month"));

            // var_dump($today);

            // Req Data
            $this->db->select('*');
            $this->db->from('presensi');
            $this->db->join('karyawan', 'presensi.id_pegawai = karyawan.id_karyawan');
            $this->db->join('jabatan', 'jabatan.id_jabatan = karyawan.id_jabatan');
            $this->db->order_by('tgl_presensi', 'DESC');

            if ($filter == '0') {
                $this->db->where('presensi.tgl_presensi', 'CURDATE()', FALSE);
                $data['rafik'] = $this->db->get()->result_array();
            } elseif ($filter == '1') {
                $this->db->where('presensi.tgl_presensi', $kemarin);
                $data['rafik'] = $this->db->get()->result_array();
            } elseif ($filter == '2') {
                $this->db->where('presensi.tgl_presensi >=', $TigaHari);
                $this->db->where('presensi.tgl_presensi <=', $today);
                $data['rafik'] = $this->db->get()->result_array();
            } elseif ($filter == '3') {
                $this->db->where('presensi.tgl_presensi >=', $seminggu);
                $this->db->where('presensi.tgl_presensi <=', $today);
                $data['rafik'] = $this->db->get()->result_array();
            } elseif ($filter == '4') {
                $this->db->where('presensi.tgl_presensi >=', $sebulan);
                $this->db->where('presensi.tgl_presensi <=', $today);
                $data['rafik'] = $this->db->get()->result_array();
            }
            
            // Perform your processing here, e.g., save to the database
            $this->load->view('daftar_absen',$data);
            // Redirect or load a success view
            // redirect('success_page');
        }
        return;

    } 
    
}