<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('layouts/Header', [
        'judul' => 'Laporan Absensi'
    ]) ?>
</head>

<body class="sb-nav-fixed">
    <?php $this->load->view('layouts/Navbar') ?>
    <div id="layoutSidenav">
        <?php $this->load->view('layouts/Sidebar') ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Laporan Absensi</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Laporan Absensi</li>
                    </ol>
                    <div class="mt-2">
                        <?= $this->session->flashdata('alert') ?>
                        <?php
                        $bulan_jml = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '010', '011', '012');
                        $name_bulan = array(
                            'Januari',
                            'Februari',
                            'Maret',
                            'April',
                            'Mei',
                            'Juni',
                            'Juli',
                            'Agustus',
                            'September',
                            'Oktober',
                            'November',
                            'Desember',
                            
                        );
                        $now = date('Y');
                        ?>
                        <form action="<?= site_url('Laporan/rekap') ?>" method="post">
                            <div class="row mt-3 mb-3">
                                <div class="col-md-2 col-4">
                                    <select name="bulan" class="form-control">
                                        <option value=""> -- Pilih Bulan --</option>
                                        <?php $jumlah = count($name_bulan); ?>
                                        <?php for ($x = 0; $x < $jumlah; $x += 1) {  ?>
                                            <option value="<?php echo $bulan_jml[$x] ?>"><?php echo $name_bulan[$x] ?></option>
                                        <?php } ?>
                                        <option value="all">All</option>
                                    </select>
                                </div>
                                <div class="col-md-2 col-4">
                                    <select name="tahun" class="form-control">
                                        <option value="">-- Pilih Tahun --</option>
                                        <?php for($y = 2015;$y <= $now;$y++){ ?>
                                            <option value="<?php echo $y ?>"><?php echo $y ?></option>    
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-2 col-4">
                                    <button class="btn btn-outline-success" type="submit" name="rekap">Rekap</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Laporan Absensi
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nik</th>
                                        <?php if ($this->session->userdata('role') == 1 && 2) { ?>
                                            <th>Nama</th>
                                        <?php } ?>
                                        <th>Jabatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    <?php foreach ($data as $rows) { ?>
                                        <tr>
                                            <td><?= $no += 1 ?></td>
                                            <td><?= $rows->nik ?></td>
                                            <td><?= $rows->username ?></td>
                                            <td><?= $rows->ket_jabatan ?></td>
                                            <td><a href="<?= base_url('detail-laporan/' . $rows->id_karyawan) ?>" class="btn btn-info">Lihat</a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php $this->load->view('layouts/Footer') ?>
</body>
</html>