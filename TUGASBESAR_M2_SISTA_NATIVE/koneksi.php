<?php
$host     = "localhost";
$username = "root";
$password = ""; 
$database = "db_master_event";

$conn = mysqli_connect($host, $username, $password, $database);
$koneksi = $conn;

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>
