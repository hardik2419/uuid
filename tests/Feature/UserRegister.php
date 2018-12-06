<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
class UserRegister extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testUserRegisterSuccessfully()
    {

        $data = factory(User::class)->make();
        $data = json_decode(json_encode($data),true);
        $data['password'] = '123123';
        $data['password_confirmation'] = '123123';

        return $this->json('POST', 'api/register', $data)
            ->assertStatus(200)
            ->assertJsonStructure([
                'user' => [
                    'id',
                    'first_name',
                    'last_name',
                    'email',
                    'phone',
                    'link',
                    'created_at',
                    'updated_at',
                ],
                'message',
                'success'
            ]);
    }
}
