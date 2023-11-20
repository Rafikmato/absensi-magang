<?php
setlocale(LC_TIME, 'id_ID');

$date = strftime('%d %B %Y');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url('public/DataTables/datatables.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('public/css/styles.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('public/css/custom.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('public/toast/jquery.toast.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('public/leaflet/leaflet.css') ?>" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <title>Laporan</title>
</head>
<style>
    body {
        font-family: "Times New Roman";
    }
    .line {
        border: 1px solid #000; 
        margin: 10px 0;
    }
    .ttd {
        text-align: right;
    }
</style>

<body>
    <div class="container py-4">
        <div class="row">
            <div class="col-md-12">
                <img src="<?= base_url('public/logo/gto.png') ?>" width="65px" height="75px" style="float: left; margin-right: 10px;">
                <h6 class="text-center"><strong>PEMERINTAH KOTA GORONTALO</strong></h6>
                <h6 class="text-center"><strong>RUMAH SAKIT UMUM DAERAH PROF. DR. H. ALOEI SABOE</strong></h6>
                <p class="text-center">Jl. Prof. Dr. H. Aloei Saboe No.92 (0435) 822753  Fax (0435) 822150</p>    
                <div class="line"></div>
                <table class="table table-bordered" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jam Masuk</th>
                            <th>Jam Keluar</th>
                            <th>Tanggal Absensi</th>
                            <th>Jabatan</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $rows){ ?>
                        <tr>
                            <td><?= $rows->username ?></td>
                            <td><?= $rows->jam_masuk ?></td>
                            <td><?= $rows->jam_keluar ?></td>
                            <td class="tgl-indo"><?= $rows->tgl ?></td>
                            <td><?= $rows->lingkup ?></td>
                            <td><?= $rows->keterangan ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <br>
                <div class="ttd">
                    <h6>Gorontalo, <?= date('d F Y') ?></h6>
                    <h6>Mengetahui</h6>
                    <br><br><br>
                    <h6>Admin <br>
                    <?php echo $this->session->userdata('user_name') ?></h6>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url('public/bootstrap/js/jquery-3.1.1.min.js') ?>"></script>
    <script src="<?= base_url('public/js/scripts.js') ?>"></script>
    <script src="<?= base_url('public/DataTables/datatables.min.js') ?>"></script>
    <script src="<?= base_url('public/toast/jquery.toast.min.js') ?>"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script>
        // window.print();
    </script>
    <script>
        function tanggalIndonesia(tanggal) {
            const bulan = {
                1: 'Januari',
                2: 'Februari',
                3: 'Maret',
                4: 'April',
                5: 'Mei',
                6: 'Juni',
                7: 'Juli',
                8: 'Agustus',
                9: 'September',
                10: 'Oktober',
                11: 'November',
                12: 'Desember'
            };

            const tanggalArray = tanggal.split('-');
            const hari = parseInt(tanggalArray[0]);
            const bulanIndex = parseInt(tanggalArray[1]);
            const tahun = parseInt(tanggalArray[2]);

            const tanggalIndonesia = hari + ' ' + bulan[bulanIndex] + ' ' + tahun;

            return tanggalIndonesia;
        }

        const tgl = document.querySelectorAll('.tgl-indo');
            tgl.forEach(function (element) {
                element.textContent = tanggalIndonesia(element.textContent);
            });
    </script>
    <script>
    // $(document).ready(function(){
    //     $('#datatablesSimple').DataTable();
    // });

    $(document).ready(function() {
    $('#datatablesSimple').DataTable( {
        paging: false,
        dom: 'Bfrtip',
        button: [
            'excelHtml5'
        ]
    } );
} );
</script>
</body>
</html>