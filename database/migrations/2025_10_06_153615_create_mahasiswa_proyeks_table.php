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
        Schema::create('mahasiswa_proyeks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mahasiswa');
            $table->string('nim');
            $table->string('slug')->unique();
            $table->foreignId('dosen_pembimbing_id')->constrained('dosens')->onDelete('cascade');
            $table->string('judul_skripsi');
            $table->year('tahun_lulus');
            $table->string('link_proyek_web')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_proyeks');
    }
};
