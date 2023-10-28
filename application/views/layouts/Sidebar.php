<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <!-- <div class="sb-sidenav-menu-heading">Core</div> -->
                <a class="nav-link" href="<?= base_url('dashboard') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link" href="<?= base_url('profile') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    Data Diri
                </a>
    
                <div class="sb-sidenav-menu-heading preker">Manajemen <br> Absensi Mahasiswa</div>
                <hr>
                <?php if($this->session->userdata('role') == 1 && 2){ ?>
                    <a class="nav-link" href="<?= base_url('laporan-absensi') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Laporan Absensi
                    </a>
                    <a class="nav-link" href="<?= base_url('pengaturan-absensi') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-gear"></i></div>
                        Pengaturan Absensi
                    </a>
                    <a class="nav-link" href="<?= base_url('management-jabatan') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Kelola Jabatan
                    </a>
                <?php }else{ ?>    
                    <a class="nav-link" href="<?= base_url('riwayat') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Riwayat Absensi
                    </a>
                <?php } ?>

                <?php if($this->session->userdata('id_jabatan') == 3){ ?>
                    <a class="nav-link" href="<?= base_url('daftar-karyawan') ?>">
                        <div class="sb-nav-link-icon"><i class="fa fa-address-card"></i></div>
                        Daftar Pegawai
                    </a>
                    <a class="nav-link" href="<?= base_url('laporan-presensi') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Laporan Absensi
                    </a>
                    <a class="nav-link" href="<?= base_url('management-jabatan') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Management Jabatan
                    </a>
                <?php } ?>
                
                <?php if($this->session->userdata('role') == 1 && 2){ ?>
                    <a class="nav-link" href="<?= base_url('daftar-karyawan') ?>">
                        <div class="sb-nav-link-icon"><i class="fa fa-address-card"></i></div>
                        Daftar Pegawai
                    </a>
                    <a class="nav-link" href="<?= base_url('daftar-admin') ?>">
                        <div class="sb-nav-link-icon"><i class="fa fa-lock"></i></div>
                        Daftar Admin
                    </a>
                <?php } ?>
                    <a class="nav-link" href="<?= base_url('Login/log_out') ?>">
                        <div class="sb-nav-link-icon"><i class="fa fa-sign-out"></i></div>
                        Logout
                    </a>
            </div>
        </div>
    </nav>
    <style>
        .preker {
            text-align: center;
        }
    </style>
</div>