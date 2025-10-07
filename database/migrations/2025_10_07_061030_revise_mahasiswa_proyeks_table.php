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
        Schema::table('mahasiswa_proyeks', function (Blueprint $table) {
            // Drop columns that are no longer needed
            $table->dropColumn(['judul_skripsi', 'tahun_lulus', 'link_proyek_web']);
            
            // Add foto_profil column
            $table->string('foto_profil')->nullable()->after('dosen_pembimbing_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mahasiswa_proyeks', function (Blueprint $table) {
            // Restore dropped columns
            $table->string('judul_skripsi')->after('dosen_pembimbing_id');
            $table->year('tahun_lulus')->after('judul_skripsi');
            $table->string('link_proyek_web')->nullable()->after('tahun_lulus');
            
            // Drop added column
            $table->dropColumn('foto_profil');
        });
    }
};
