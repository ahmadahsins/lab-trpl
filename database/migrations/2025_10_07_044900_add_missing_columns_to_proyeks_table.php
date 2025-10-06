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
        // Check if the columns exist before adding them
        if (!Schema::hasColumn('proyeks', 'lab_id')) {
            Schema::table('proyeks', function (Blueprint $table) {
                $table->foreignId('lab_id')->nullable()->after('dosen_id')->constrained()->nullOnDelete();
            });
        }

        if (!Schema::hasColumn('proyeks', 'slug')) {
            Schema::table('proyeks', function (Blueprint $table) {
                $table->string('slug')->nullable()->unique()->after('judul');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Only drop columns if they exist
        if (Schema::hasColumn('proyeks', 'lab_id')) {
            Schema::table('proyeks', function (Blueprint $table) {
                $table->dropForeign(['lab_id']);
                $table->dropColumn('lab_id');
            });
        }

        if (Schema::hasColumn('proyeks', 'slug')) {
            Schema::table('proyeks', function (Blueprint $table) {
                $table->dropColumn('slug');
            });
        }
    }
};
