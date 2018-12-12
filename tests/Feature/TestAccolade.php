<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Accolade;
use App\Models\User;

class TestAccolade extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use WithFaker;


    public function testAccoladeSuccessfully()
    {
        $faker = $this->faker;
        $data = array(
            'name' => $faker->name,
            'years' => $faker->year($max = 'now'),
            'image' => $faker->imageUrl($width = 640, $height = 480),
            'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        );
        $user = user::where('email', 'test@gmail.com')->first();

        return $this->json('POST', 'api/accolade', $data,$this->headers($user))
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    "name",
                    "years",
                    "description",
                    "image",
                    "company_id",
                    "updated_at",
                    "created_at",
                    "id",
                ],
                'message',
                'status_code'
            ]);
    }
}
