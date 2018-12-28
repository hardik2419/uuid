<?php

namespace App\Api\Controllers;

use App\Api\Requests\LocationRequest;
use App\Api\Resources\LocationResource;
use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

/**
 * @resource Location
 */
class LocationController extends Controller
{

    /**
     * Get Locations
     */
    public function index()
    {
        //
    }

    /**
     * Add Location
     */
    public function store(LocationRequest $request)
    {
        try {
            $company_id = \Auth::user()->company->id;
            if (!$company_id) {
                throw new \Exception('Company not found', 400);
            }

            $insert_data = $request->only([
                "email",
                "phone",
                "longitude",
                "latitude",
                "address_1",
                "address_2",
                "city",
                "country",
                "zip_code",
                "employee_count",
            ]);
            $insert_data['company_id'] = $company_id;
            $location                  = Location::create($insert_data);

            return (new LocationResource($location))->additional([
                'status_code' => 200,
                'message'     => 'Location successfully added',
            ]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Get Location
     */
    public function show($id)
    {
        //
    }

    /**
     * Update Location
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Delete Location
     */
    public function destroy($id)
    {
        //
    }
}
