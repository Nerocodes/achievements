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
                'no_of_purchases_to_unlock' => 1
            ],
            [
                'name' => '5 Purchases',
                'no_of_purchases_to_unlock' => 5
            ],
            [
                'name' => '10 Purchases',
                'no_of_purchases_to_unlock' => 10
            ],
            [
                'name' => '15 Purchases',
                'no_of_purchases_to_unlock' => 15
            ],
            [
                'name' => '20 Purchases',
                'no_of_purchases_to_unlock' => 20
            ],
            [
                'name' => '25 Purchases',
                'no_of_purchases_to_unlock' => 25
            ],
            [
                'name' => '30 Purchases',
                'no_of_purchases_to_unlock' => 30
            ],
            [
                'name' => '35 Purchases',
                'no_of_purchases_to_unlock' => 35
            ],
            [
                'name' => '40 Purchases',
                'no_of_purchases_to_unlock' => 40
            ]
        ];

        Achievement::upsert($achievements, 'name');
    }
}
