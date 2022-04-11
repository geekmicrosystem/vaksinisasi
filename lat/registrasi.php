<?php
session_start();
require 'functions.php';
if (isset($_SESSION['username'])) {
    echo "<script>window.location.href='pendaftaran.php'</script>";
}

if (isset($_POST['submit'])) {

    // ambil data inputan user
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $repassword = htmlspecialchars($_POST['repassword']);

    // ambil data user dari data base
    $sqlcek = "SELECT * FROM pendaftaran WHERE username='$username'";
    // cek username terpakai atau belum
    $cekusername = mysqli_fetch_assoc(mysqli_query($conn, $sqlcek));
    // cek apakah inputan password dan repassword sama
    if ($password != $repassword) {
        $passwordtidaksama = true;
    } else {
        if ($cekusername) {
            $usernamesudahterpakai = true;
        } else {
            // encrypt password
            $passwordencrypt = htmlspecialchars(password_hash($password, PASSWORD_DEFAULT));
            // ambil data dari post
            date_default_timezone_set('Asia/Jakarta');
            $tanggalpendaftaran = date('Y-m-d');
            $namalengkap = htmlspecialchars($_POST['namalengkap']);
            $tempat = htmlspecialchars($_POST['tempat']);
            $tanggallahir = htmlspecialchars($_POST['tanggallahir']);
            $alamat = htmlspecialchars($_POST['alamat']);
            $nohp = htmlspecialchars($_POST['nohp']);
            $jeniskelamin = htmlspecialchars($_POST['jeniskelamin']);
            $asalsekolah = htmlspecialchars($_POST['asalsekolah']);
            // tambahkan data ke database
            $registrasi = mysqli_query($conn, "INSERT INTO pendaftaran VALUES (NULL,'$tanggalpendaftaran', '$namalengkap','$tempat','$tanggallahir','$alamat','$nohp','$jeniskelamin','$asalsekolah',NULL,'$username','$passwordencrypt')");
            if ($registrasi) {
                // jika berhasil tambah data
                echo "<script>alert('Registrasi Berhasil')</script>";
                echo "<script>window.location.href='login.php'</script>";
            } else {
                // jika gagal tambah data
                echo "<script>alert('Registrasi Gagal')</script>";
            }
        }
    }
}


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Registrasi</title>
</head>

<body>
    <div class="container my-5">
        <div class="card">
            <div class="card-header text-center">
                <h3>Registrasi</h3>
            </div>
            <div class="card-body">
                <?php if (isset($usernamesudahterpakai)) : ?>
                    <center>
                        <p style="color: red;">Username Sudah Terpakai</p>
                    </center>
                <?php endif; ?>
                <?php if (isset($passwordtidaksama)) : ?>
                    <center>
                        <p style="color: red;">Password Tidak Sama</p>
                    </center>
                <?php endif; ?>
                <form action="" method="POST">
                    <div class="row">
                        <div class="col">
                            <label for="username">Username</label>
                            <input id="username" type="text" class="form-control" placeholder="Username" name="username" autocomplete="off" autofocus>
                        </div>
                        <div class="col">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" placeholder="Password" name="password" autocomplete="off">
                        </div>
                        <div class="col">
                            <label for="repassword">Re-Password</label>
                            <input id="repassword" type="password" class="form-control" placeholder="Re-Password" name="repassword" autocomplete="off">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="namalengkap">Nama Lengkap</label>
                            <input id="namalengkap" type="text" class="form-control" placeholder="Nama Lengkap" name="namalengkap" autocomplete="off">
                        </div>
                        <div class="col">
                            <label for="alamat">Alamat</label>
                            <input id="alamat" type="text" class="form-control" placeholder="Alamat" name="alamat" autocomplete="off">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="tempat">Tempat Lahir</label>
                            <input id="tempat" type="text" class="form-control" placeholder="Tempat Lahir" name="tempat" autocomplete="off">
                        </div>
                        <div class="col">
                            <label for="tanggallahir">Tanggal Lahir</label>
                            <input id="tanggallahir" type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggallahir" autocomplete="off">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <label for="nohp">No Hp</label>
                            <input id="nohp" type="text" class="form-control" placeholder="No Hp" name="nohp" autocomplete="off">
                        </div>
                        <div class="col">
                            <label for="asalsekolah">Asal Sekolah</label>
                            <input id="asalsekolah" type="text" class="form-control" placeholder="Asal Sekolah" name="asalsekolah" autocomplete="off">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col"></div>
                        <div class="col">
                            <label>Jenis Kelamin</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jeniskelamin" id="jeniskelamin" value="laki-laki">
                                <label class="form-check-label" for="jeniskelamin1">
                                    Laki-Laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jeniskelamin" id="jeniskelamin2" value="perempuan">
                                <label class="form-check-label" for="jeniskelamin2">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-md btn-primary" type="submit" name="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

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