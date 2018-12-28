<?php

namespace App\Api\Controllers;

use App\Api\Requests\ServicesRequest;
use App\Api\Resources\ServicesResource;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

/**
 * @resource Service
 */
class ServicesController extends Controller
{
    /**
     * Get Services
     */
    public function index()
    {
        //
    }

    /**
     * Add Service
     */
    public function store(ServicesRequest $request)
    {
        try {
            $company_id = \Auth::user()->company->id;
            if (!$company_id) {
                throw new \Exception('sorry! Company not found', 400);
            }
            $insert_data = $request->only(['name', 'category', 'focus']);

            $insert_data['company_id'] = $company_id;
            $services                  = Service::create($insert_data);

            return (new ServicesResource($services))->additional([
                'status_code' => 200,
                'message'     => 'Services Added.',
            ]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Get Service
     */
    public function show($id)
    {
        //
    }

    /**
     * Update Service
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Delete Service
     */
    public function destroy($id)
    {
        //
    }
}
