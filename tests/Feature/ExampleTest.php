<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        /*$payload = ['email' => 'test@gmail.com', 'password' => 'test@123'];

        $response = $this->json('POST', 'api/login', $payload)
            ->assertStatus(200)
            ->assertJsonStructure([
                'user' => [
                    'id',
                    'first_name',
                    'last_name',
                    'email',
                    'phone',
                    'image',
                    'is_verified',
                    'is_profile_completed',
                    'status',
                    'created_at',
                    'updated_at',
                ],
                'token'
            ]);*/
    }
}
