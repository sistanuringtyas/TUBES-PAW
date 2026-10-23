<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'judul' => 'Masterclass: Membangun Aplikasi',
                'kategori' => 'Teknologi',
                'deskripsi' => 'Pelajari cara merancang arsitektur perangkat lunak modern dan mengintegrasikan kecerdasan buatan (AI) ke dalam aplikasi secara efisien.',
                'silabus' => "1. Pengantar Arsitektur Modern\n2. Integrasi Model AI\n3. Studi Kasus & Sesi Tanya Jawab",
                'durasi' => '3 Jam (19.00 - 22.00 WIB)',
                'gambar' => 'gambar website.jpg',
            ],
            [
                'judul' => 'Start from Zero with Us: Bisnis untuk Gen Z',
                'kategori' => 'Bisnis',
                'deskripsi' => 'Pelajari dari nol bagaimana memulai bisnis di era digital.',
                'silabus' => "1. Bisnis di Era Digital\n2. Perancangan Bisnis\n3. Company Profile",
                'durasi' => '2 Jam (12.00 - 14.00 WIB)',
                'gambar' => 'bisnis.jpg',
            ],
            [
                'judul' => 'Workshop Web Development Modern dengan Laravel',
                'kategori' => 'Teknologi',
                'deskripsi' => 'Mempelajari dasar pembuatan RESTful API dan arsitektur MVC menggunakan framework PHP Laravel.',
                'silabus' => "1. Konsep MVC & Routing\n2. Database Migration & Eloquent ORM\n3. Pembuatan API & Autentikasi",
                'durasi' => '4 Jam (13.00 - 17.00 WIB)',
                'gambar' => 'laravel_workshop.jpg',
            ],
            [
                'judul' => 'Strategi Digital Marketing & Social Media Ads untuk Pemula',
                'kategori' => 'Bisnis',
                'deskripsi' => 'Panduan praktis mengoptimalkan iklan media sosial (Meta & TikTok Ads) untuk meningkatkan penjualan produk.',
                'silabus' => "1. Menentukan Target Audience\n2. Copywriting yang Menjual\n3. Analisis ROI & Metrik Iklan",
                'durasi' => '2 Jam (10.00 - 12.00 WIB)',
                'gambar' => 'digital_marketing.jpg',
            ],
            [
                'judul' => 'Fundamental UI/UX Design: Dari Wireframe hingga Prototype',
                'kategori' => 'Teknologi',
                'deskripsi' => 'Belajar cara merancang antarmuka pengguna yang intuitif menggunakan Figma berbasis Design Thinking.',
                'silabus' => "1. Prinsip Dasar UI/UX\n2. User Research & User Flow\n3. Wireframing & Prototyping di Figma",
                'durasi' => '3 Jam (15.00 - 18.00 WIB)',
                'gambar' => 'ui_ux_design.jpg',
            ],
            [
                'judul' => 'Financial Planning & Pitch Deck untuk Startup Baru',
                'kategori' => 'Bisnis',
                'deskripsi' => 'Pelajari cara mengelola arus kas usaha dan menyusun pitch deck yang memikat calon investor.',
                'silabus' => "1. Manajemen Cashflow Awal\n2. Valuasi Bisnis Sederhana\n3. Anatomi Pitch Deck yang Efektif",
                'durasi' => '2.5 Jam (19.30 - 22.00 WIB)',
                'gambar' => 'startup_funding.jpg',
            ],
            [
                'judul' => 'Pengantar Keamanan Siber & Ethical Hacking',
                'kategori' => 'Teknologi',
                'deskripsi' => 'Mengenal dasar-dasar pertahanan web aplikasi terhadap celah keamanan umum seperti SQL Injection dan XSS.',
                'silabus' => "1. Dasar Jaringan Komputer\n2. OWASP Top 10 Vulnerabilities\n3. Praktik Penetrasi & Pencegahan",
                'durasi' => '3 Jam (09.00 - 12.00 WIB)',
                'gambar' => 'cyber_security.jpg',
            ],
        ];

        foreach ($events as $event) {
            Event::updateOrCreate(
                ['judul' => $event['judul']],
                $event
            );
        }
    }
}
