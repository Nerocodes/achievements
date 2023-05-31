<?php

namespace Database\Seeders;

use App\Models\Badge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $badges = [
            [
                'name' => 'Beginner',
                'no_of_achievements_to_unlock' => 1
            ],
            [
                'name' => 'Intermediate',
                'no_of_achievements_to_unlock' => 5
            ],
            [
                'name' => 'Advanced',
                'no_of_achievements_to_unlock' => 8
            ],
            [
                'name' => 'Expert',
                'no_of_achievements_to_unlock' => 10
            ],
            [
                'name' => 'Veteran',
                'no_of_achievements_to_unlock' => 20
            ]
        ];

        Badge::upsert($badges, 'name');
    }
}
