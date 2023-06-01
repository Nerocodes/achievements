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
                'achievement_requirement' => 1
            ],
            [
                'name' => 'Intermediate',
                'achievement_requirement' => 5
            ],
            [
                'name' => 'Advanced',
                'achievement_requirement' => 8
            ],
            [
                'name' => 'Expert',
                'achievement_requirement' => 10
            ],
            [
                'name' => 'Veteran',
                'achievement_requirement' => 20
            ]
        ];

        Badge::upsert($badges, 'name');
    }
}
