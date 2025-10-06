<?php

use App\Models\Proyek;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $proyeks = Proyek::all();
        
        foreach ($proyeks as $proyek) {
            if (empty($proyek->slug)) {
                $proyek->slug = Str::slug($proyek->judul);
                $proyek->save();
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No need to reverse this operation
    }
};
