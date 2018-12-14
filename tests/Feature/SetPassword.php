<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
class SetPassword extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testSetPassword()
    {
        $user = User::where('email', 'test@gmail.com')->first();
        $data = [
            'email' => 'test@gmail.com',
            'token' => $user->remember_token,
            'password' => 'test@123',
            'password_confirmation' => 'test@123',
        ];

        return $this->json('POST', 'api/set-password', $data)
            ->assertStatus(200)
            ->assertJsonStructure([
                'message',
                'success'
            ]);
    }
}
