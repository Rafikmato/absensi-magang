<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('in') != 'login') {
            $this->session->set_flashdata('alert', '<div class="alert alert-danger">Maaf anda harus Login Terlebih dahulu !</div>');
            redirect('/');
        }
    }


    public function pengajuan()
    {
        if (isset($_POST["send"])) {
            $pengajuan = $_POST["pengajuan"];
            $id = $this->session->userdata('id');
            $now = date('Y-m-d');
            $query = $this->db->query("SELECT jam_masuk,jam_keluar,id_presensi,DATE_FORMAT(tgl_presensi,'%d %m %y') AS tl FROM presensi WHERE id_pegawai = '$id' AND tgl_presensi = '$now'");
            if ($query->num_rows() > 0) {
                $this->session->set_flashdata('alert', "<div class='alert alert-danger'><strong>Presensi/Pengajuan hari ini telah di ajukan</strong></div>");
                return redirect('/dashboard');
            } else {
                $today = date('l');
                if ($today == 'Monday') {
                    $this->session->set_flashdata('alert', '<div class="alert alert-danger"><strong>Tidak dapat melakukan absensi pada hari Minggu</strong></div>');
                    return redirect('/dashboard');
                } else {
                    $config['upload_path'] = './public/images/';
                    $config['allowed_types'] = 'pdf|jpg|png|jpeg';
                    $config['encrypt_name'] = TRUE;
                    $this->upload->initialize($config);
                    if (!empty($_FILES['berkas']['name'])) {
                        if ($this->upload->do_upload('berkas')) {
                            $nama_file = $this->upload->data();
                            $token = [
                                'id_pegawai' => $id,
                                'gambar_in' => $nama_file['file_name'],
                                'jam_masuk' => '-',
                                'tgl_presensi' => $now,
                                'keterangan' => strtolower($pengajuan),
                            ];
                            $this->db->insert('presensi', $token);
                            $this->session->set_flashdata('alert', "<div class='alert alert-info'>Pengajuan <strong>{$pengajuan} Berhasil !</strong></div>");
                            return redirect('/dashboard');
                        } else {
                            $this->session->set_flashdata('alert', "<div class='alert alert-danger'><strong>Periksa Kembali File Ekstensi</strong></div>");
                            return redirect('/dashboard');
                        }
                    }
                    
                  
                }
            }
        }
    }
}
