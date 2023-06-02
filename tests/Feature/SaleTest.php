<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SaleTest extends TestCase
{
    /**
     * Test can make purchase
     *
     * @return void
     */
    public function testCanMakePurchase()
    {
        $userData = [
            'name' => 'test user',
            'email' => 'test@user.com',
            'password' => 'password'
        ];

        $registerResponse = $this->post('/api/register', $userData);

        $decodedJson = $registerResponse->decodeResponseJson();

        $response = $this->post('/api/sales', [], [
            'Authorization' => 'Bearer ' . $decodedJson['data']['token']
        ]);

        $response->assertStatus(201);
    }
}
