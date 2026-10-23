<?php
include "koneksi.php";

$pesan_sukses = "";
$pesan_error = "";

// Cek status dari redirect tampilandata.php
if (isset($_GET['status']) && $_GET['status'] == 'sukses') {
    $pesan_sukses = "Data event berhasil disimpan ke database phpMyAdmin!";
}

// Cek apakah tabel 'events' ada di database, jika tidak gunakan 'tabel_event'
$cek_events = mysqli_query($koneksi, "SHOW TABLES LIKE 'events'");
$nama_tabel = ($cek_events && mysqli_num_rows($cek_events) > 0) ? 'events' : 'tabel_event';

// Fitur Hapus data (jika diklik hapus)
if (isset($_GET['hapus']) && is_numeric($_GET['hapus'])) {
    $id_hapus = $_GET['hapus'];
    $stmt = mysqli_prepare($koneksi, "DELETE FROM $nama_tabel WHERE id = ?");
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id_hapus);
        if (mysqli_stmt_execute($stmt)) {
            $pesan_sukses = "Data event berhasil dihapus dari database!";
        } else {
            $pesan_error = "Gagal menghapus data: " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    }
}


$query = "SELECT * FROM $nama_tabel ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Event - Database MySQL</title>
  <link rel="stylesheet" href="Warna Event.css">
  <style>
    
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      margin-bottom: 25px;
      background-color: #ffffff;
    }
    table th, table td {
      border: 1px solid #ddd;
      padding: 10px 12px;
      text-align: left;
      font-size: 14px;
      vertical-align: top;
    }
    table th {
      background-color: #007bff;
      color: white;
    }
    table tr:nth-child(even) {
      background-color: #fcfcfc;
    }
    table tr:hover {
      background-color: #f1f7ff;
    }
    .badge {
      display: inline-block;
      padding: 3px 8px;
      border-radius: 4px;
      font-size: 12px;
      font-weight: bold;
    }
    .badge-tekno {
      background-color: #e3f2fd;
      color: #0d47a1;
      border: 1px solid #90caf9;
    }
    .badge-bisnis {
      background-color: #e8f5e9;
      color: #1b5e20;
      border: 1px solid #a5d6a7;
    }
    .notif-sukses {
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
      padding: 10px 15px;
      border-radius: 4px;
      margin: 15px 0;
      font-size: 14px;
    }
    .notif-error {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
      padding: 10px 15px;
      border-radius: 4px;
      margin: 15px 0;
      font-size: 14px;
    }
    .btn-hapus {
      background-color: #dc3545;
      padding: 5px 10px;
      font-size: 12px;
      text-decoration: none;
      color: white;
      border-radius: 4px;
      display: inline-block;
      font-weight: bold;
    }
    .btn-hapus:hover {
      background-color: #c82333;
    }
  </style>
</head>
<body>
  <header><h1>Master Event</h1></header>
  <nav><a href="Event.html" style="color: #007bff; font-weight: bold; text-decoration: none;">&larr; Tambah Event Baru (Page 1)</a></nav>
  <aside><p>Berikut adalah seluruh data event yang tersimpan di database <strong>db_master_event</strong> pada phpMyAdmin.</p></aside>

  <?php if (!empty($pesan_sukses)): ?>
    <div class="notif-sukses"><?php echo htmlspecialchars($pesan_sukses); ?></div>
  <?php endif; ?>

  <?php if (!empty($pesan_error)): ?>
    <div class="notif-error"><?php echo htmlspecialchars($pesan_error); ?></div>
  <?php endif; ?>

  <section>
    <h2>Data Event Tersimpan di Database MySQL</h2>
    <table>
      <thead>
        <tr>
          <th width="5%">No</th>
          <th width="22%">Judul Event</th>
          <th width="12%">Kategori</th>
          <th width="25%">Deskripsi Event</th>
          <th width="18%">Silabus</th>
          <th width="12%">Durasi Sesi</th>
          <th width="6%">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result && mysqli_num_rows($result) > 0): ?>
          <?php 
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)): 
              $judul = $row['judul'] ?? $row['judul_event'] ?? '';
              $deskripsi = $row['deskripsi'] ?? $row['deskripsi_event'] ?? '';
              $kategori = $row['kategori'] ?? 'Teknologi';
              $silabus = $row['silabus'] ?? '';
              $durasi = $row['durasi'] ?? $row['durasi_sesi'] ?? '';
              $badge_class = ($kategori == 'Teknologi') ? 'badge-tekno' : 'badge-bisnis';
          ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><strong><?php echo htmlspecialchars($judul); ?></strong></td>
              <td><span class="badge <?php echo $badge_class; ?>"><?php echo htmlspecialchars($kategori); ?></span></td>
              <td><?php echo nl2br(htmlspecialchars($deskripsi)); ?></td>
              <td><?php echo nl2br(htmlspecialchars($silabus)); ?></td>
              <td><?php echo htmlspecialchars($durasi); ?></td>
              <td>
                <a href="tampil-event.php?hapus=<?php echo $row['id']; ?>" class="btn-hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus event ini dari database?');">Hapus</a>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr>
            <td colspan="7" style="text-align: center; color: #777; padding: 20px;">
              Belum ada data event di database. Silakan isi form di <a href="Event.html">Page 1</a>.
            </td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </section>

  <!-- Navigasi Halaman -->
  <a href="Event.html">
      <button type="button">Page 1</button>
  </a>

  <a href="Acara.html">
      <button type="button">Page 2</button>
  </a>

  <a href="Bisnis.html">
      <button type="button">Page 3</button>
  </a>

  <a href="tampil-event.php">
      <button type="button">Page 4</button>
  </a>

</body>
</html>
