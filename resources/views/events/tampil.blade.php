<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Event - Database</title>
  <link rel="stylesheet" href="{{ asset('css/Warna Event.css') }}">
  <style>
    /* Desain tabel yang simpel dan bersih */
    table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0;
      background-color: #fff;
    }
    table, th, td {
      border: 1px solid #ccc;
    }
    th, td {
      padding: 8px 10px;
      text-align: left;
      font-size: 14px;
    }
    th {
      background-color: #f2f2f2;
    }
    .pesan {
      color: green;
      font-weight: bold;
      margin: 10px 0;
    }
    .pesan-error {
      color: red;
      font-weight: bold;
      margin: 10px 0;
    }
    .btn-hapus {
      color: red;
      text-decoration: none;
      font-weight: bold;
      background: none;
      border: none;
      cursor: pointer;
      padding: 0;
      font-size: 14px;
      font-family: inherit;
    }
    .btn-hapus:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <h1>Master Event</h1>
  <p>Berikut data event yang tersimpan di database:</p>

  @if (session('status') == 'sukses')
    <p class="pesan">Data event berhasil disimpan ke database!</p>
  @elseif (session('status') == 'hapus')
    <p class="pesan">Data event berhasil dihapus dari database!</p>
  @elseif (session('error'))
    <p class="pesan-error">{{ session('error') }}</p>
  @endif

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Judul Event</th>
        <th>Kategori</th>
        <th>Deskripsi Event</th>
        <th>Silabus</th>
        <th>Durasi Sesi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($events as $index => $event)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $event->judul }}</td>
          <td>{{ $event->kategori }}</td>
          <td>{!! nl2br(e($event->deskripsi)) !!}</td>
          <td>{!! nl2br(e($event->silabus)) !!}</td>
          <td>{{ $event->durasi }}</td>
          <td>
            <form action="{{ route('events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?');" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn-hapus">Hapus</button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="7" style="text-align: center;">Belum ada data event di database.</td>
        </tr>
      @endforelse
    </tbody>
  </table>

  <!-- Navigasi Halaman Sama Seperti Halaman Lain -->
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
      <button type="button">Page 4</button>
  </a>

</body>
</html>
