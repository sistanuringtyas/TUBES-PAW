<?php
$host     = "localhost";
$username = "root";
$password = ""; // Default Laragon adalah kosong
$database = "db_master_event";

// Membuat koneksi database
$conn = mysqli_connect($host, $username, $password, $database);
$koneksi = $conn; // Kompatibilitas untuk variabel $koneksi

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>
