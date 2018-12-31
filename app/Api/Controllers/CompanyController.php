<?php

namespace App\Api\Controllers;

use App\Api\Requests\CompanyRequest;
use App\Api\Resources\CompanyResource;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
/**
 * @resource Company
 */
class CompanyController extends Controller
{

    /**
     * Get Companies
     */
    public function index()
    {
        //
    }

    /**
     * Add Company
     */
    public function store(CompanyRequest $request)
    {
        try {
            $insert_data = $request->only(['name', 'logo', 'email', 'phone', 'tag_line', 'founded_date',
                'employe_size', 'admin_email', 'description', 'website_url']);

            $insert_data['user_id'] = \Auth::user()->id;
            $company                = Company::create($insert_data);

            return (new CompanyResource($company))->additional([
                'status_code' => 200,
                'message'     => 'Company successfully added',
            ]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Get Company
     */
    public function show($id)
    {
        //
    }

    /**
     * Update Company
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Delete Company
     */
    public function destroy($id)
    {
        //
    }
    public function agenciesList()
    {
        $faker = Faker::create();

        $data = array();
        for ($i=1; $i <= 2; $i++) {
            $data['data'][] = array(
                'title' => $faker->company,
                'image' => 'company_logo'.rand(1,4).'.jpg',
            );
        }
        $data['length'] = '10';
        $data['pageSize'] = '2';
        return (new CompanyResource($data))->additional([
            'status_code' => 200,
        ]);
    }
}
