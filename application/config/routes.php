<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'Daftar';
$route['dashboard'] = 'Dashboard';
$route['riwayat'] = 'Riwayat/my_riwayat';
$route['laporan-absensi'] = 'Riwayat/laporan_riwayat';
$route['detail-laporan/(:any)'] = 'Riwayat/detail/$1';
$route['pesan'] = 'Pesan';
$route['pesan-masuk'] = 'Pesan/list_inbox'; 
$route['daftar-karyawan'] = 'Karyawan';
$route['daftar-admin'] = 'Admin';
$route['management-jabatan'] = 'Karyawan/jabatan';
$route['detail-absensi/(:any)'] = 'Riwayat/detail_absensi/$1';
$route['pengaturan-absensi'] = 'Admin/pengaturan';
$route['detail-karyawan/(:any)'] = 'Karyawan/detail/$1';
$route['detail-admin/(:any)'] = 'Admin/detail/$1';
$route['hapus-admin/(:any)'] = 'Admin/delete_admin/$1';
$route['edit-keterangan/(:any)'] = 'Admin/edit_keterangan/$1';
$route['export'] = 'Laporan/excel';
$route['daftar-absen'] = 'daftar_absen/$1';

$route['hapus-jabatan/(:any)'] = 'Karyawan/delete/$1';
$route['hapus-karyawan/(:any)'] = 'Karyawan/deleteKaryawan/$1';
$route['profile'] = 'Profile';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
