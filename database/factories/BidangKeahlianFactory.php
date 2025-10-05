<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BidangKeahlian>
 */
class BidangKeahlianFactory extends Factory
{
    public function definition(): array
    {
        $bidangList = [
            'Artificial Intelligence',
            'Machine Learning',
            'Data Science',
            'Computer Vision',
            'Natural Language Processing',
            'Software Engineering',
            'Web Development',
            'Mobile Development',
            'Cyber Security',
            'Internet of Things (IoT)',
            'Cloud Computing',
            'Database Systems',
            'Network Engineering',
            'Game Development',
            'Human Computer Interaction (HCI)',
            'Robotics',
            'Embedded Systems',
            'Information Systems',
            'Big Data Analytics',
            'Computer Graphics',
        ];

        return [
            'nama_bidang' => $this->faker->unique()->randomElement($bidangList),
        ];
    }
}
