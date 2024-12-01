<?php
include('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = $_POST['name'];
    $tanggal_lahir = $_POST['dob'];
    $jenis_kelamin = $_POST['gender'];
    $alamat = $_POST['address'];
    $email = $_POST['email'];
    $nomor_telepon = $_POST['phone'];

    $sql = "INSERT INTO pendaftaran (nama, tanggal_lahir, jenis_kelamin, alamat, email, nomor_telepon) 
            VALUES ('$nama', '$tanggal_lahir', '$jenis_kelamin', '$alamat', '$email', '$nomor_telepon')";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran</title>
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
    </style>
</head>
<body>
    <div class="container custom-container">
        <?php if ($dbh->query($sql) === TRUE): ?>
            <h2 class="text-center">Pendaftaran Berhasil!</h2>
            <p class="text-center">Terima kasih telah mendaftar di Sanggar Tari Tanah Wita.</p>
            <div class="text-center">
                <a href="pendaftaran.html" class="btn btn-custom mt-3">Kembali</a>
                <a href="tampil_data.php" class="btn btn-success mt-3">Lihat Data Pendaftaran</a>
            </div>
        <?php else: ?>
            <h2 class="text-center text-danger">Pendaftaran Gagal</h2>
            <p class="text-center">Terjadi kesalahan: <?= $dbh->connect_error; ?></p>
            <div class="text-center">
                <a href="pendaftaran.html" class="btn btn-custom mt-3">Kembali</a>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$dbh->close();
?>
