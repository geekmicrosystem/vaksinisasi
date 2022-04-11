<?php
// koneksi database
$host = "localhost";
$username = "root";
$password = "";
$database = "lat";

$conn = mysqli_connect($host, $username, $password, $database);

function cekdaftar($r, $username)
{
    // pengecekan siswa hanya boleh 1x mendaftar untuk 1 jurusan
    global $conn;
    if ($r['kejuruan_id'] != NULL) {
        echo "<script>alert('Anda Sudah Daftar Pelatihan !!!')</script>";
    } else {
        // ubah jurusan yang akan diikuti jika belum daftar
        $kejuruan_id = $_POST['kejuruan_id'];
        $daftarkejuruan = mysqli_query($conn, "UPDATE pendaftaran SET kejuruan_id=$kejuruan_id WHERE username='$username'");
        if ($daftarkejuruan) {
            echo "<script>alert('Daftar Pelatihan Berhasil')</script>";
            echo "<script>window.location.href='pendaftaran.php'</script>";
        } else {
            echo "<script>alert('Daftar Pelatihan Gagal')</script>";
        }
    }
}
