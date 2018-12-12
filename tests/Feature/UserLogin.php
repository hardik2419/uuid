<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserLogin extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testUserLoginsSuccessfully()
    {

        $payload = ['email' => 'test@gmail.com', 'password' => 'test@123'];

        return $this->json('POST', 'api/login', $payload)
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'first_name',
                    'last_name',
                    'email',
                    'phone',
                    'image',
                    'email_verified_at',
                    'is_profile_completed',
                    'status',
                    'created_at',
                    'updated_at',
                ],
                'token'
            ]);
    }
}
