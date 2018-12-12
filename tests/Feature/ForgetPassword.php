<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ForgetPassword extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testForgetPassword()
    {

        $data = [
            'email' => 'test@gmail.com'
        ];

        return $this->json('POST', 'api/forget-password', $data)
            ->assertStatus(200)
            ->assertJsonStructure([
                'message',
                'status_code'
            ]);
    }
}
