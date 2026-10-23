<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Event</title>
    <link rel="stylesheet" href="{{ asset('css/Warna Bisnis.css') }}">
</head>
<body>

    <h1>Master Event</h1>
    
    <p>Berikut adalah detail event pilihan untuk Anda.</p>
    
    <h2>Judul Event</h2>

    <div>
        <img src="{{ asset('images/bisnis.jpg') }}" width="200" alt="Sketsa Website" onerror="this.src='C:\\Users\\Sista\\Downloads\\bisnis.jpg'">
    </div>

    <p>Start from Zero with Us: Bisnis untuk Gen Z</p>
    
    <h2>Kategori</h2>
    <p>Bisnis</p>

    <h2>Deskripsi Event</h2>
    <p>Pelajari dari nol bagaimana memulai bisnis di era digital.</p>
    
    <h2>Silabus</h2>
    <p>1. Bisnis di Era Digital<br>2. Perancangan Bisnis<br>3. Company Profile</p>

    <h2>Durasi Sesi</h2>
    <p>2 Jam (12.00 - 14.00 WIB)</p>

    <div>
        <button type="button">Pesan Tiket</button>
    </div>

    <p></p>

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
