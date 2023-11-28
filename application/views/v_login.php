
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/ung.png">
    <link rel="stylesheet" href="<?= base_url('public/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/bootstrap/css/bootstrap.css') ?>">
    <link rel="shortcut icon" href="<?= base_url('public/logo/gto.png') ?>" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet">
    <title>LOGIN | ABSENSI MAHASISWA</title>
    <style>
        body{
            font-family: 'Quicksand', sans-serif;
            background: lightgray;
        }
        .btn-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn {
            margin-right: 10px;
        }
        a.btn {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container mb-4">
        <div class="row justify-content-center" style="margin-top: 30px;">
            <div class="col-md-5">
                
                <form  method="post" action="<?= base_url('Login/auth') ?>">
                    <div class="card shadow bg-light mt-4">
                        <div class="text-center py-4">
                            <img src="<?= base_url('public/logo/gto.png') ?>" alt="logo" width="90">
                            <!-- <img src="<?= base_url('public/logo/logo.png') ?>" alt="logo" width="90"> -->
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('alert'); ?>
                            <h5 class="text-center">ABSENSI MAHASISWA MAGANG</h5>
                            <h5 class="text-center">RSUD Prof. H. dr. Aloei Saboe</h5>
                            <hr>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" required id="email" name="email" class="form-control" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" required id="password" name="password" class="form-control" placeholder="Enter Password">
                            </div>
                            <div class="btn-container">
                                <button class="btn btn-success text-light w-100">Masuk</button><br><br>
                                <a href="<?= base_url('Daftar') ?>" class="btn btn-danger text-light w-100">Kembali</a>
                                <br>
                            </div>
                            <!--<p class="mt-3">Belum Punya Account ? <a href="design-register-yuni.html">Daftar Disini</a></p>-->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>