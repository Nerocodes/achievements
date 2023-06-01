<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $achievements = [
            [
                'name' => 'First Purchase',
                'purchase_requirement' => 1
            ],
            [
                'name' => '5 Purchases',
                'purchase_requirement' => 5
            ],
            [
                'name' => '10 Purchases',
                'purchase_requirement' => 10
            ],
            [
                'name' => '15 Purchases',
                'purchase_requirement' => 15
            ],
            [
                'name' => '20 Purchases',
                'purchase_requirement' => 20
            ],
            [
                'name' => '25 Purchases',
                'purchase_requirement' => 25
            ],
            [
                'name' => '30 Purchases',
                'purchase_requirement' => 30
            ],
            [
                'name' => '35 Purchases',
                'purchase_requirement' => 35
            ],
            [
                'name' => '40 Purchases',
                'purchase_requirement' => 40
            ]
        ];

        Achievement::upsert($achievements, 'name');
    }
}
