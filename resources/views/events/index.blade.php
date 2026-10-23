<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Master Event</title>
  <link rel="stylesheet" href="{{ asset('css/Warna Event.css') }}">
</head>
<body>
  <header><h1>Master Event</h1></header>
  <nav><a href="#about">Tentang Event</a></nav>
  <aside><p>Halo! Temukan berbagai event Teknologi & Bisnis menarik di sini!</p></aside>
  
  <section id="about">
    <article><h2>Masalah</h2><p>Kesulitan mencari informasi event berkualitas & terstruktur.</p></article>
    <article><h2>Solusi</h2><p>Kumpulan Event Teknologi & Bisnis terbaik dengan silabus jelas.</p></article>
  </section>

  <section id="form-tugas">
    <h2>Tambah Event Baru (Master Event)</h2>
    
    <form action="{{ route('events.store') }}" method="POST">
      @csrf
      <label for="judulInput">Judul Event</label>
      <input type="text" id="judulInput" name="judul_event" placeholder="Tulis judul event..." required>

      <label for="deskripsiInput">Deskripsi Event</label>
      <input type="text" id="deskripsiInput" name="deskripsi_event" placeholder="Deskripsi singkat event...">

      <label for="kategoriInput">Kategori</label>
      <select id="kategoriInput" name="kategori">
        <option value="Teknologi" selected>Teknologi</option>
        <option value="Bisnis">Bisnis</option>
      </select>

      <label for="silabusInput">Silabus</label>
      <input type="text" id="silabusInput" name="silabus" placeholder="Cth: Sesi 1, Sesi 2...">

      <label for="durasiInput">Durasi Sesi</label>
      <input type="text" id="durasiInput" name="durasi_sesi" placeholder="Cth: 2 Jam / 3 Hari">

      <button type="submit" name="simpan">Tambah &amp; Publikasikan Event</button>
    </form>
    <p id="hasilAI"></p>
  </section>

  <section id="daftar-tugas">
    <h2>Daftar Event Tersedia</h2>
    <ol id="listTugas"></ol>
  </section>

  <!-- Navigasi Halaman -->
  <a href="{{ route('events.index') }}">
      <button type="button">Page 1</button>
  </a>

  <a href="{{ route('events.acara') }}">
      <button type="button">Page 2</button>
  </a>

  <a href="{{ route('events.bisnis') }}">
      <button type="button">Page 3</button>
  </a>

  <a href="{{ route('events.tampil') }}">
      <button type="button">Page 4 (Data Database)</button>
  </a>

</body>
</html>
