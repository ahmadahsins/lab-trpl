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
        // Rename nip_nidn to nip in dosens table
        Schema::table('dosens', function (Blueprint $table) {
            $table->renameColumn('nip_nidn', 'nip');
        });

        // Rename nip_nik to nip and drop jabatan column in laborans table
        Schema::table('laborans', function (Blueprint $table) {
            $table->renameColumn('nip_nik', 'nip');
            $table->dropColumn('jabatan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Restore original column names
        Schema::table('dosens', function (Blueprint $table) {
            $table->renameColumn('nip', 'nip_nidn');
        });

        Schema::table('laborans', function (Blueprint $table) {
            $table->renameColumn('nip', 'nip_nik');
            $table->string('jabatan')->after('email');
        });
    }
};
