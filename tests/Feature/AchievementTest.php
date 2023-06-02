<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class AchievementTest extends TestCase
{
    /**
     * Can get achievement details
     *
     * @return void
     */
    public function testCanGetAchievementDetails()
    {
        Artisan::call('db:seed');
        $userData = [
            'name' => 'test user',
            'email' => 'test@user.com',
            'password' => 'password'
        ];

        $registerResponse = $this->post('/api/register', $userData);

        $decodedJson = $registerResponse->decodeResponseJson();
        $userId = $decodedJson['data']['user']['id'];

        for($i = 0; $i < 5; $i++) {
            $this->post('/api/sales', [], [
                'Authorization' => 'Bearer ' . $decodedJson['data']['token']
            ]);
        }

        $response = $this->get('/users/' . $userId . '/achievements');

        $response->assertStatus(200);

        $achievementResponseData = $response->decodeResponseJson()['data'];

        $this->assertGreaterThan(0, count($achievementResponseData['unlocked_achievements']));
        $this->assertGreaterThan(0, count($achievementResponseData['next_available_achievements']));
        $this->assertNotEmpty($achievementResponseData['current_badge']);
        $this->assertNotEmpty($achievementResponseData['next_badge']);
        $this->assertGreaterThan(0, $achievementResponseData['remaining_to_unlock_next_badge']);
    }
}
