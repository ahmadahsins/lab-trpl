<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proyek;

class ProyekSeeder extends Seeder
{
    public function run()
    {
        Proyek::factory()->count(10)->create();
    }
}
