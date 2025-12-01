<?php
require_once "koneksi.php";

$notif = "";

if (isset($_POST['simpan'])) {
    $nim    = $_POST['nim'];
    $nama   = $_POST['nama'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO mahasiswa (nim, nama, alamat) VALUES ('$nim', '$nama', '$alamat')";
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        $notif = "<div class='alert alert-success'>Data berhasil disimpan!</div>";
    } else {
        $notif = "<div class='alert alert-danger'>Gagal menyimpan data: " . mysqli_error($koneksi) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Mahasiswa</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f2f6fc;
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            border-radius: 15px;
            padding: 25px;
        }
        .title {
            font-weight: 700;
            color: #2c3e50;
        }
        .btn-custom {
            background-color: #2c3e50;
            color: white;
            font-weight: 600;
            border-radius: 10px;
        }
        .btn-custom:hover {
            background-color: #1a242f;
        }
    </style>
</head>
<body>

<div class="container mt-5" style="max-width: 650px;">
    <div class="text-center mb-4">
        <h2 class="title">Form Input Data Mahasiswa</h2>
        <p class="text-secondary">Silakan isi data berikut dengan lengkap dan benar</p>
    </div>

    <div class="card shadow">
        
        <?= $notif ?>

        <form method="post">
            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat" rows="3"></textarea>
            </div>

            <button type="submit" name="simpan" class="btn btn-custom w-100">Simpan Data</button>
        </form>
    </div>
</div>

</body>
</html>
