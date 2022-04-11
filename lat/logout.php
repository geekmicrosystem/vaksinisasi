<?php 

session_start();
session_destroy();
echo "<script>alert('LOGOUT BERHASIL')</script>";
echo "<script>window.location.href='login.php'</script>";

?>