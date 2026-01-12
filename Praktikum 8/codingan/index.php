<?php
// Koneksi ke database
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'pagination'; // Mengubah nama database menjadi 'pagination'

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Konfigurasi pagination
$limit = 10; // Jumlah data per halaman
$page = isset($_GET['pn']) ? (int)$_GET['pn'] : 1;
$offset = ($page - 1) * $limit;

// Query untuk mendapatkan data
$sql = "SELECT * FROM anggota LIMIT $offset, $limit";
$result = $conn->query($sql);

// Query untuk menghitung total data
$totalSql = "SELECT COUNT(*) AS total FROM anggota";
$totalResult = $conn->query($totalSql);

// Validasi hasil query total data
if (!$totalResult) {
    die("Error pada query: " . $conn->error);
}

$totalRow = $totalResult->fetch_assoc();
$totalData = $totalRow['total'];
$totalPages = ceil($totalData / $limit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">PAGINATION PHP (Tabel Anggota)</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Anggota ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['firstname'] . "</td>";
                        echo "<td>" . $row['lastname'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>Tidak ada data</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Navigasi Pagination -->
        <nav>
            <ul class="pagination justify-content-center">
                <?php
                for ($i = 1; $i <= $totalPages; $i++) {
                    $active = ($i == $page) ? 'active' : '';
                    echo "<li class='page-item $active'><a class='page-link' href='?pn=$i'>$i</a></li>";
                }
                ?>
            </ul>
        </nav>
    </div>
</body>
</html>

<?php
$conn->close();
?>