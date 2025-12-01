<?php
$koneksi = mysqli_connect("localhost", "root", "", "form_mahasiswa");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$nim     = $_POST['nim'];
$nama    = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$email   = $_POST['email'];
$alamat  = $_POST['alamat'];

$query = "INSERT INTO mahasiswa (nim, nama, jurusan, email, alamat)
VALUES ('$nim', '$nama', '$jurusan', '$email', '$alamat')";

if (mysqli_query($koneksi, $query)) {
    echo "<h2>Data Berhasil Disimpan</h2>";
    echo "NIM: $nim <br>";
    echo "Nama: $nama <br>";
    echo "Jurusan: $jurusan <br>";
    echo "Email: $email <br>";
    echo "Alamat: $alamat <br>";
} else {
    echo "Gagal menyimpan: " . mysqli_error($koneksi);
}
?>
