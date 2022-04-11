<?php
session_start();
require 'functions.php';
// cek apakah ada session
if (isset($_SESSION['username'])) {
    echo "<script>window.location.href='pendaftaran.php'</script>";
}

if (isset($_POST["submit"])) {
    // ambil data inputan user
    $username = $_POST['username'];
    $password = $_POST['password'];
    // ambil data user dari database
    $sqlcek = "SELECT * FROM pendaftaran WHERE username='$username'";
    $user = mysqli_fetch_assoc(mysqli_query($conn, $sqlcek));
    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            echo "<script>window.location.href='pendaftaran.php'</script>";
            exit;
        } else {
            $passwordusernamesalah = true;
        }
    } else {
        $passwordusernamesalah = true;
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

    <title>Login</title>
    <style>
        body {
            background-color: darkgray;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center pt-5 mt-5">
        <div class="row">
            <div class="card shadow-lg">
                <div class="card-header text-center">
                    <strong>Login</strong>
                    <?php if (isset($passwordusernamesalah)) : ?>
                        <p style="color: red; font-style: italic; ">Username Password Salah</p>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" id="username" name="username" type="text" autofocus required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" id="password" name="password" type="password" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-sm btn-block btn-primary">Login</button>
                                    <hr>
                                    <p class="text-center">Belum Punya Akun?</p>
                                    <a href="registrasi.php" class="nav-link text-center p-0 btn-md">Registrasi</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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