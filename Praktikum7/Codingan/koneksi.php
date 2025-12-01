<?php
$koneksi = mysqli_connect("localhost", "root", "", "upload_foto");

if (!$koneksi) {
    die("Gagal koneksi: " . mysqli_connect_error());
}
?>
