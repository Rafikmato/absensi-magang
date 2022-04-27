
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/ung.png">
    <link rel="stylesheet" href="<?= base_url('public/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/bootstrap/css/bootstrap.css') ?>">
    <title>LOGIN | SISTEM PRESENSI EMPLOYERS</title>
</head>
<body style="background-color: lightgray;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <form  method="post" action="<?= base_url('Login/auth') ?>">
                    <div class="card shadow bg-light" style="margin-top: 50px;">
                        <div class="card-body">
                            <?= $this->session->flashdata('alert'); ?>
                            <h4 class=" text-center">SISTEM ABSENSI PEGAWAI</h4>
                            <hr>
                            <div class="form-group">
                                <label for="choose">
                                    Hak Akses
                                </label>
                                <select name="role" class="form-control" id="" required>
                                    <option value="">-- Pilih Hak Akses --</option>
                                    <option value="1">Admin/Kepala Dinas</option>
                                    <option value="2">Pegawai</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" required id="email" name="email" class="form-control" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" required id="password" name="password" class="form-control" placeholder="Enter Password">
                            </div>
                            <button class="btn btn-dark text-light w-100">Masuk</button>
                            <br>
                            <p class="mt-3">Belum Punya Account ? <a href="design-register-yuni.html">Daftar Disini</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>