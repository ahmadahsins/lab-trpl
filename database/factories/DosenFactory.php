<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BidangKeahlian;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dosen>
 */
class DosenFactory extends Factory
{
    public function definition(): array
    {
        $namaDosen = [
            'Ahmad Syafii', 'Budi Santoso', 'Siti Nurhaliza', 'Rina Marlina',
            'Rizky Pratama', 'Yuli Andriani', 'Dewi Lestari', 'Hendra Wijaya',
            'Fauzan Rahmat', 'Lina Kurniasih', 'Doni Saputra', 'Fitri Handayani',
            'Eka Purnama', 'Bagus Setiawan', 'Tri Utami'
        ];

        return [
            'nip_nidn' => $this->faker->unique()->numerify('19##########'),
            'nama' => $this->faker->randomElement($namaDosen),
            'email' => $this->faker->unique()->safeEmail(),
            'jabatan' => $this->faker->randomElement([
                'Dosen Tetap',
                'Sekretaris Prodi',
                'Guru Besar',
                'Dosen Luar Biasa'
            ]),

            'foto' => 'https://source.unsplash.com/random/400x400/?portrait,teacher,lecturer&' . uniqid(),
            'deskripsi_singkat' => $this->faker->sentence(10),
            'link_pribadi_web' => $this->faker->optional()->url(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function ($dosen) {
            $bidangIds = BidangKeahlian::pluck('id')->toArray();

            if (!empty($bidangIds)) {

                $randomBidang = collect($bidangIds)->random(rand(1, 3))->toArray();
                $dosen->bidangKeahlians()->attach($randomBidang);
            }
        });
    }
}
