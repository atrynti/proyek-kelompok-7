<?php

include('koneksi.php');

$sql = "SELECT * FROM pendaftaran";
$result = $dbh->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftaran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('latar_utama.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .custom-container {
            padding: 20px;
            border-radius: 5px;
            background-color: rgba(236, 214, 190, 0.9);
            margin-top: 50px;
        }
        .btn-custom {
            background-color: rgba(135, 45, 45, 0.8);
            border-color: rgba(183, 43, 12, 0.8);
            color: white;
        }
        .btn-custom:hover {
            background-color: rgba(183, 43, 12, 0.8);
            color: white;
        }
        .btn-warning, .btn-danger {
            color: white;
        }
        .table th, .table td {
            background-color: rgba(255, 255, 255, 0.9);
        }
    </style>
</head>
<body>
    <div class="container custom-container">
        <h2 class="text-center mb-4">Daftar Pendaftaran Sanggar Tari Tana Wita</h2>
        <div class="d-flex justify-content-between mb-3">
            <a href="pendaftaran.html" class="btn btn-secondary">Kembali ke Halaman Utama</a>
            <a href="tambah.php" class="btn btn-custom">Tambah Data</a>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['tanggal_lahir']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['jenis_kelamin']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nomor_telepon']) . "</td>";
                        echo "<td>
                                <a href='edit.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='hapus.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center'>Belum ada data pendaftaran.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php

$dbh->close();
?> 
