<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Certificate;
use App\Models\User;

class TestCertificate extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use WithFaker;


    public function testCertificateSuccessfully()
    {
        /* $faker = $this->faker;
        $data = array(
            'name' => $faker->name,
            'years' => $faker->year($max = 'now'),
            'image' => $faker->imageUrl($width = 640, $height = 480),
            'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        ); */
        $data = factory(Certificate::class)->make();
        $data = json_decode(json_encode($data), true);

        $user = user::where('email', 'test@gmail.com')->first();

        return $this->json('POST', 'api/certificate', $data,$this->headers($user))
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    "name",
                    "years",
                    "description",
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
