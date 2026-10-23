<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul     = trim($_POST['judul'] ?? $_POST['judul_event'] ?? '');
    $deskripsi = trim($_POST['deskripsi'] ?? $_POST['deskripsi_event'] ?? '');
    $kategori  = trim($_POST['kategori'] ?? 'Teknologi');
    $silabus   = trim($_POST['silabus'] ?? '');
    $durasi    = trim($_POST['durasi'] ?? $_POST['durasi_sesi'] ?? '');

    if (!empty($judul)) {
        // Cek tabel yang ada di database (events atau tabel_event)
        $cek_events = mysqli_query($koneksi, "SHOW TABLES LIKE 'events'");
        if ($cek_events && mysqli_num_rows($cek_events) > 0) {
            $stmt = mysqli_prepare($koneksi, "INSERT INTO events (judul, kategori, deskripsi, silabus, durasi) VALUES (?, ?, ?, ?, ?)");
        } else {
            $stmt = mysqli_prepare($koneksi, "INSERT INTO tabel_event (judul_event, kategori, deskripsi_event, silabus, durasi_sesi) VALUES (?, ?, ?, ?, ?)");
        }

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssss", $judul, $kategori, $deskripsi, $silabus, $durasi);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                header("Location: tampil-event.php?status=sukses");
                exit();
            } else {
                echo "Gagal menyimpan data: " . mysqli_stmt_error($stmt);
                mysqli_stmt_close($stmt);
                exit();
            }
        } else {
            echo "Gagal menyiapkan query: " . mysqli_error($koneksi);
            exit();
        }
    } else {
        header("Location: tampil-event.php?status=sukses");
        exit();
    }
} else {
    header("Location: tampil-event.php");
    exit();
}
?>