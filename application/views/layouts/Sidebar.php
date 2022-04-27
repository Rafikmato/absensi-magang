<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="<?= base_url('dashboard') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link" href="<?= base_url('profile') ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    Profile
                </a>
    
                <div class="sb-sidenav-menu-heading">Management Presensi</div>
                <?php if($this->session->userdata('role') == 1 && 2){ ?>
                    <a class="nav-link" href="<?= base_url('laporan-presensi') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Laporan Absensi
                    </a>
                <?php }else{ ?>    
                    <a class="nav-link" href="<?= base_url('riwayat') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                        Riwayat Absensi
                    </a>
                <?php } ?>

                <?php if($this->session->userdata('role') == 1 && 2){ ?>
                    <a class="nav-link"  href="<?= base_url('pesan-masuk') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                        Pesan Masuk
                    </a>
                <?php }else{ ?>
                    <a class="nav-link" href="<?= base_url('pesan') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                        Pesan
                    </a>
                <?php } ?>
                <?php if($this->session->userdata('role') == 1 && 2){ ?>
                    <div class="sb-sidenav-menu-heading">Management Aplikasi</div>
                    <a class="nav-link" href="<?= base_url('laporan-presensi') ?>">
                        <div class="sb-nav-link-icon"><i class="fa fa-address-card"></i></div>
                        Daftar Karyawan
                    </a>
                    <a class="nav-link" href="<?= base_url('laporan-presensi') ?>">
                        <div class="sb-nav-link-icon"><i class="fa fa-lock"></i></div>
                        Daftar Admin
                    </a>
                    <div class="sb-sidenav-menu-heading">Pengaturan Database</div>
                    <a class="nav-link" href="<?= base_url('laporan-presensi') ?>">
                        <div class="sb-nav-link-icon"><i class="fa fa-cog"></i></div>
                        Reset Pabrik
                    </a>
                <?php } ?>
                <!-- <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Laporan Absensi
                </a> -->
            </div>
        </div>
    </nav>
</div>