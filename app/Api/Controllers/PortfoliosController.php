<?php

namespace App\Api\Controllers;

use App\Api\Requests\PortfoliosRequest;
use App\Api\Resources\PortfoliosResource;
use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

/**
 * @resource Portfolio
 */
class PortfoliosController extends Controller
{
    /**
     * Get Portfolios
     */
    public function index()
    {
        //
    }

    /**
     * Add Portfolio
     */
    public function store(PortfoliosRequest $request)
    {
        try {
            $company_id = \Auth::user()->company->id;

            if (!$company_id) {
                throw new \Exception('Company not found', 404);
            }

            $insert_data = $request->only(['title', 'image', 'video', 'description']);

            $insert_data['company_id'] = $company_id;
            $portfolio                 = Portfolio::create($insert_data);

            return (new PortfoliosResource($portfolio))->additional([
                'status_code' => 200,
                'message'     => 'Portfolio successfully added',
            ]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Get Portfolio
     */
    public function show($id)
    {
        //
    }

    /**
     * Update Portfolio
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Delete Portfolio
     */
    public function destroy($id)
    {
        //
    }
}
