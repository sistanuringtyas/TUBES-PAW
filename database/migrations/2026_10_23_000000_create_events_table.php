<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('events')) {
            Schema::create('events', function (Blueprint $table) {
                $table->id();
                $table->string('judul');
                $table->text('deskripsi')->nullable();
                $table->enum('kategori', ['Teknologi', 'Bisnis'])->default('Teknologi');
                $table->text('silabus')->nullable();
                $table->string('durasi')->nullable();
                $table->string('gambar')->nullable();
                $table->timestamps();
            });
        } else {
            Schema::table('events', function (Blueprint $table) {
                if (!Schema::hasColumn('events', 'updated_at')) {
                    $table->timestamp('updated_at')->nullable();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
