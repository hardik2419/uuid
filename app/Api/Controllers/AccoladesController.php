<?php

namespace App\Api\Controllers;

use App\Api\Requests\AccoladesRequest;
use App\Api\Resources\AccoladesResource;
use App\Http\Controllers\Controller;
use App\Models\Accolade;
use Illuminate\Http\Request;

/**
 * @resource Accolade
 */
class AccoladesController extends Controller
{
    /**
     * Get Accolades
     */
    public function index()
    {
        //
    }

    /**
     * Add Accolade
     */
    public function store(AccoladesRequest $request)
    {
        try {
            $company_id = \Auth::user()->company->id;
            if (!$company_id) {
                throw new \Exception('Company not found', 400);
            }
            $insert_data = $request->only(['name', 'years', 'description', 'image']);

            $insert_data['company_id'] = $company_id;
            $accolades                 = Accolade::create($insert_data);

            return (new AccoladesResource($accolades))->additional([
                'status_code' => 200,
                'message'     => 'Accolades successfully added',
            ]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Get Accolade
     */
    public function show($id)
    {
        //
    }

    /**
     * Update Accolade
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Delete Accolade
     */
    public function destroy($id)
    {
        //
    }
}
