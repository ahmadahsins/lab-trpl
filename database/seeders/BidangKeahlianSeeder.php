<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BidangKeahlian;

class BidangKeahlianSeeder extends Seeder
{
    public function run()
    {
        BidangKeahlian::factory()->count(10)->create();
    } 
}
