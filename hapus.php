<?php
include('koneksi.php');

$id = $_GET['id'];
$sql = "DELETE FROM pendaftaran WHERE id = ?";
$stmt = $dbh->prepare($sql);
$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    header('Location: tampil_data.php');
} else {
    echo "Gagal menghapus data: " . $dbh->error;
}
?>