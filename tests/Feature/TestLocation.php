<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Location;
use App\Models\User;

class TestLocation extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use WithFaker;


    public function testLocationSuccessfully()
    {
        /* $faker = $this->faker;
        $data = array(
            'email' => $faker->unique()->safeEmail,
            'phone' => preg_replace("/[^a-zA-Z0-9]/", "", $faker->tollFreePhoneNumber),
            'longitude' => $faker->longitude($min = -180, $max = 180),
            'latitude' => $faker->latitude($min = -90, $max = 90),
            'address_1' => $faker->streetName,
            'address_2' => $faker->streetAddress,
            'city' => $faker->city,
            'country' => $faker->streetAddress,
            'zip_code' => $faker->postcode,
        ); */
        $data = factory(Location::class)->make();
        $data = json_decode(json_encode($data), true);

        $user = user::where('email', 'test@gmail.com')->first();

        return $this->json('POST', 'api/location', $data,$this->headers($user))
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    "email",
                    "phone",
                    "longitude",
                    "latitude",
                    "address_1",
                    "address_2",
                    "city",
                    "country",
                    "zip_code",
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
