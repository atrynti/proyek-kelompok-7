<?php

$database = "web"; 
$hostname = "localhost"; 
$username = "root"; 
$password = ""; 

$dbh = new mysqli($hostname, $username, $password, $database);

if ($dbh->connect_error) {
    die("Koneksi gagal: " . $dbh->connect_error);
}
?>