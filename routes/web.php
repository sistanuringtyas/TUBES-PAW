<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

// Halaman Utama & Form Tambah Event (Page 1)
Route::get('/', [EventController::class, 'index'])->name('events.index');
Route::get('/event', [EventController::class, 'index'])->name('events.event');

// Detail Acara Teknologi (Page 2)
Route::get('/acara', [EventController::class, 'acara'])->name('events.acara');

// Detail Bisnis (Page 3)
Route::get('/bisnis', [EventController::class, 'bisnis'])->name('events.bisnis');

// Tampil Data Event Database (Page 4)
Route::get('/tampil-event', [EventController::class, 'tampil'])->name('events.tampil');

// Proses Tambah Data
Route::post('/event', [EventController::class, 'store'])->name('events.store');
Route::post('/tampilandata', [EventController::class, 'store'])->name('events.store.alias');

// Proses Hapus Data
Route::delete('/event/{id}', [EventController::class, 'destroy'])->name('events.destroy');
Route::get('/event/{id}/hapus', [EventController::class, 'destroy'])->name('events.destroy.get');
