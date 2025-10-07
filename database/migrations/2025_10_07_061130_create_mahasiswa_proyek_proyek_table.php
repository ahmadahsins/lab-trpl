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
        Schema::create('mahasiswa_proyek_proyek', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_proyek_id')->constrained()->onDelete('cascade');
            $table->foreignId('proyek_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            
            // Add unique constraint to prevent duplicate entries
            $table->unique(['mahasiswa_proyek_id', 'proyek_id'], 'mp_p_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_proyek_proyek');
    }
};
