<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'Login';
$route['dashboard'] = 'Dashboard';
$route['riwayat'] = 'Riwayat/my_riwayat';
$route['laporan-presensi'] = 'Riwayat/laporan_riwayat';
$route['detail-laporan/(:any)'] = 'Riwayat/detail/$1';
$route['pesan'] = 'Pesan';
$route['pesan-masuk'] = 'Pesan/list_inbox';
$route['detail-pesan/(:any)'] = 'Pesan/detail/$1';
$route['detail-message/(:any)'] = 'Pesan/admin_message/$1';
$route['profile'] = 'Profile';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
