<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $nomor_telepon = $_POST['nomor_telepon'];

    $sql = "INSERT INTO pendaftaran (nama, tanggal_lahir, jenis_kelamin, alamat, email, nomor_telepon) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $dbh->prepare($sql);
    $stmt->bind_param('ssssss', $nama, $tanggal_lahir, $jenis_kelamin, $alamat, $email, $nomor_telepon);

    if ($stmt->execute()) {
        header('Location: tampil_data.php');
    } else {
        echo "Gagal menambahkan data: " . $dbh->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
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
            max-width: 600px;
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
    <div class="container d-flex justify-content-center align-items-center">
        <div class="custom-container">
            <h2 class="text-center mb-4">Tambah Data Pendaftaran</h2>
            <form method="post">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text" name="nomor_telepon" class="form-control" required>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-custom">Simpan</button>
                    <a href="tampil_data.php" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>