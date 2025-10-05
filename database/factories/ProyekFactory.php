<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dosen;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proyek>
 */
class ProyekFactory extends Factory
{
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence(4),
            'deskripsi' => $this->faker->paragraph(4),
            'dosen_id' => Dosen::inRandomOrder()->first()?->id ?? Dosen::factory(),
            'tahun' => $this->faker->year(),
            'kategori' => $this->faker->randomElement([
                'Riset', 'Aplikasi Web', 'Aplikasi Mobile', 'IoT', 'Sistem Informasi', 'AI/ML'
            ]),
            'link_web_proyek' => $this->faker->optional()->url(),
            'link_repo' => $this->faker->optional()->url(),
        ];
    }
}
