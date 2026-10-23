<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Halaman Form Tambah Event (Page 1)
     */
    public function index()
    {
        return view('events.index');
    }

    /**
     * Halaman Detail Acara Teknologi (Page 2)
     */
    public function acara()
    {
        return view('events.acara');
    }

    /**
     * Halaman Detail Bisnis (Page 3)
     */
    public function bisnis()
    {
        return view('events.bisnis');
    }

    /**
     * Halaman Tampil Data Database (Page 4)
     */
    public function tampil()
    {
        $events = Event::orderBy('id', 'desc')->get();
        return view('events.tampil', compact('events'));
    }

    /**
     * Proses Simpan Data Event Baru
     */
    public function store(Request $request)
    {
        $judul = $request->input('judul', $request->input('judul_event'));
        $deskripsi = $request->input('deskripsi', $request->input('deskripsi_event'));
        $kategori = $request->input('kategori', 'Teknologi');
        $silabus = $request->input('silabus');
        $durasi = $request->input('durasi', $request->input('durasi_sesi'));

        $request->merge([
            'judul_final' => $judul,
        ]);

        $request->validate([
            'judul_final' => 'required|string|max:255',
        ], [
            'judul_final.required' => 'Judul event wajib diisi.',
        ]);

        Event::create([
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'kategori' => $kategori,
            'silabus' => $silabus,
            'durasi' => $durasi,
        ]);

        return redirect()->route('events.tampil')->with('status', 'sukses');
    }

    /**
     * Proses Hapus Data Event
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        if ($event) {
            $event->delete();
            return redirect()->route('events.tampil')->with('status', 'hapus');
        }

        return redirect()->route('events.tampil')->with('error', 'Data tidak ditemukan.');
    }
}
