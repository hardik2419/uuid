<?php

namespace App\Api\Controllers;

use App\Api\Requests\LocationRequest;
use App\Api\Resources\LocationResource;
use App\Http\Controllers\Controller;
use App\Models\Location;

/**
 * @resource Auth
 */
class LocationController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationRequest $request)
    {
        try {
            $company_id = \Auth::user()->company->id;
            if (!$company_id) {
                throw new \Exception('sorry! company not found', 400);
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
                'message'     => 'Location Added.',
            ]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
