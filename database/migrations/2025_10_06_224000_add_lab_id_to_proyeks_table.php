<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('proyeks', function (Blueprint $table) {
            if (!Schema::hasColumn('proyeks', 'lab_id')) {
                $table->foreignId('lab_id')->nullable()->after('dosen_id')->constrained()->nullOnDelete();
            }
            
            if (!Schema::hasColumn('proyeks', 'slug')) {
                $table->string('slug')->nullable()->unique()->after('judul');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('proyeks', function (Blueprint $table) {
            $table->dropForeign(['lab_id']);
            $table->dropColumn(['lab_id', 'slug']);
        });
    }
};
