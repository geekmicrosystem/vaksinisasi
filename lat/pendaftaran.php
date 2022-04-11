<?php
session_start();
require 'functions.php';
// cek apakah ada session
if (!isset($_SESSION['username'])) {
    echo "<script>window.location.href='login.php'</script>";
}
$username = $_SESSION['username'];
$queryrekapdata = "SELECT * FROM pendaftaran JOIN kejuruan ON pendaftaran.kejuruan_id = kejuruan.id WHERE username='$username'";
$rekap = mysqli_query($conn, $queryrekapdata);
$r = mysqli_fetch_assoc($rekap);

if (isset($_POST['submit'])) {
    cekdaftar($r, $username);
}
$kej = mysqli_query($conn, "SELECT * FROM kejuruan");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Pendaftaran Online</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar navbar-light mb-5" style="background-color: lightblue;">
        <div class="container">
            <a class="navbar-brand" href="pendaftaran.php"><img src="img/jt.png" alt="" height="50">&nbsp;&nbsp;Sistem Pendaftaran Online BLK</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">LOGOUT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container my-5">
        <div class="card">
            <div class="card-header text-center">
                <h3>Pendaftaran Online BLK</h3>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col">
                            <label for="kejuruan_id">Kejuruan Yang Akan Di Ikuti</label>
                            <select class="custom-select" id="kejuruan_id" name="kejuruan_id">
                                <?php while ($k = mysqli_fetch_assoc($kej)) : ?>
                                    <option value="<?= $k['id']; ?>"><?= $k['nama_kejuruan']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-md btn-primary float-right" type="submit" name="submit">Daftar Pelatihan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php if ($r['kejuruan_id'] != NULL) { ?>
        <div class="container my-5">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Rekap Data Pendaftaran</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead">
                            <tr>
                                <th scope="col">Tanggal Daftar</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">Tempat Tanggal Lahir</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No Hp</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Asal Sekolah</th>
                                <th scope="col">Kejuruan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"><?= $r['tanggalpendaftaran']; ?></th>
                                <td><?= $r['namalengkap']; ?></td>
                                <td><?= $r['tempat']; ?>, <?= $r['tanggallahir']; ?></td>
                                <td><?= $r['alamat']; ?></td>
                                <td><?= $r['nohp']; ?></td>
                                <td><?= $r['jeniskelamin']; ?></td>
                                <td><?= $r['asalsekolah']; ?></td>
                                <td><?= $r['nama_kejuruan']; ?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
</body>

</html>