<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Absensi Mahasiswa RSUD</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="<?= base_url('template_frond/')?>assets/img/favicon.png" rel="icon"> -->
  <link href="<?= base_url('template_frond/')?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('template_frond/')?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('template_frond/')?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url('template_frond/')?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url('template_frond/')?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url('template_frond/')?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url('template_frond/')?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('template_frond/')?>assets/css/style.css" rel="stylesheet">

  <?php $this->load->view('layouts/Header', [
        'judul' => 'Laporan Absensi'
    ]) ?>
</head>

<style>
    a {
        text-decoration: none;
    }

    .date {
      float: left;
    }
</style>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container-fluid">

      <div class="row justify-content-center">
        <div class="col-xl-9 d-flex align-items-center justify-content-lg-between">
          <h1 class="logo me-auto me-lg-0"><a href="">RSUD PROF. DR. H. ALOEI SABOE</a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->

          <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
              <!-- <li><a class="nav-link scrollto" href="#hero"></a></li> -->
              <li><a class="nav-link scrollto" href="#about"></a></li>
              <li><a class="nav-link scrollto" href="#services"></a></li>
              <li><a class="nav-link scrollto " href="#portfolio"></a></li>
              <li><a class="nav-link scrollto" href="#pricing"></a></li>
              
              <li><a class="nav-link scrollto" href="#contact"></a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav>

          <a href="<?= base_url('login') ?>" class="get-started-btn scrollto">LOGIN</a>
        </div>
      </div>

    </div>
  </header><!-- End Header -->

  <?php
    $no = 1;
    date_default_timezone_set('Asia/Makassar');
  ?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-8">
          <div class="card">
            <div class="card-header">
              Daftar Nama Mahasiswa
            </div>
            <div class="card-body">
              <form action="<?= base_url('Daftar/filter') ?>" method="POST">
                <input type="text" hidden name="" value="">
                <div class="row mt-1">
                    <div class="col-md-3">
                        <div class="form-group">
                          <select name="f-absen" class="form-control">
                              <option value="0">-- Hari Ini --</option>
                              <option value="1">Kemarin</option>
                              <option value="2">3 Hari Terakhir</option>
                              <option value="3">1 Minggu Terakhir</option>
                              <option value="4">1 Bulan Terakhir</option>
                          </select>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-outline-success" name="filter" type="submit">Cari</button>
                    </div>
                </div>
            </form>
                    <div class="table-responsive">
                        <table id="example" class="table-light table-bordered" style="width: 100%; ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Keluar</th>
                                    <th>Tanggal Presensi</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rafik as $r) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $r['username'] ?></td>
                                        <td><?= $r['jam_masuk'] ?></td>
                                        <td><?= $r['jam_keluar'] ?></td>
                                        <td><?= $r['tgl_presensi'] ?></td>
                                        <td style="color: <?php
                                            switch ($r['keterangan']) {
                                                case 'Alpa':
                                                    echo 'red';
                                                    break;
                                                case 'Terlambat':
                                                    echo 'orange';
                                                    break;
                                                default:
                                                    echo 'green';
                                                    break;
                                            }
                                        ?>;"><?= $r['keterangan'] ?></td>  
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>    
                    </div>

                </div>
            </div>
        
        </div>
      </div>
    </div>
  </section><!-- End Hero -->


  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('template_frond/')?>assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?= base_url('template_frond/')?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('template_frond/')?>assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url('template_frond/')?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url('template_frond/')?>assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url('template_frond/')?>assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('template_frond/')?>assets/js/main.js"></script>

</body>

<script>
    new DataTable('#example');
    
    
</script>
</html>