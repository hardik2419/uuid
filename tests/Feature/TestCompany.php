<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Company;
use App\Models\User;

class TestCompany extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */


    public function testCompanySuccessfully()
    {

        $data = factory(Company::class)->make();
        $data = json_decode(json_encode($data),true);
        $user = user::where('email', 'test@gmail.com')->first();

        return $this->json('POST', 'api/company', $data,$this->headers($user))
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    "name",
                    "logo",
                    "email",
                    "phone",
                    "tagline",
                    "founded_date",
                    "employe_size",
                    "admin_email",
                    "description",
                    "website_url",
                    "user_id",
                    "updated_at",
                    "created_at",
                    "id",
                ],
                'message',
                'status_code'
            ]);
    }
}
