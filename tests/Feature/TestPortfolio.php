<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Portfolio;
use App\Models\User;

class TestPortfolio extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use WithFaker;


    public function testPortfolioSuccessfully()
    {
        /* $faker = $this->faker;
        $data = array(
            'title' => $faker->name,
            'video' => 'https://sample-videos.com/video123/mp4/720/big_buck_bunny_720p_1mb.mp4',
            'image' => $faker->imageUrl($width = 640, $height = 480),
            'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        ); */
        $data = factory(Portfolio::class)->make();
        $data = json_decode(json_encode($data), true);
        $user = user::where('email', 'test@gmail.com')->first();

        return $this->json('POST', 'api/portfolio', $data,$this->headers($user))
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    "title",
                    "image",
                    "video",
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
