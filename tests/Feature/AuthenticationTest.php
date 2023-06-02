<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    /**
     * Test can register user
     *
     * @return void
     */
    public function testCanRegisterUser()
    {
        $data = [
            'name' => 'test user',
            'email' => 'test@user.com',
            'password' => 'password'
        ];

        $response = $this->post('/api/register', $data);

        $response->assertStatus(201);

        $this->assertDatabaseHas('users', [
            'name' => 'test user',
            'email' => 'test@user.com'
        ]);
    }

    /**
     * Test can login user
     *
     * @return void
     */
    public function testCanLoginUser()
    {
        $data = [
            'name' => 'test user',
            'email' => 'test@user.com',
            'password' => 'password'
        ];
        
        $this->post('/api/register', $data);
        $response = $this->post('/api/login', $data);

        $response->assertStatus(200);

        $response->assertSeeText('token');
    }
}
