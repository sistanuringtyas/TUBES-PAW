<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'judul',
        'kategori',
        'deskripsi',
        'silabus',
        'durasi',
        'gambar',
    ];

    // Compatibility accessors for legacy native field names
    public function getJudulEventAttribute(): ?string
    {
        return $this->judul;
    }

    public function getDeskripsiEventAttribute(): ?string
    {
        return $this->deskripsi;
    }

    public function getDurasiSesiAttribute(): ?string
    {
        return $this->durasi;
    }
}
