<?php

namespace App\Api\Controllers;

use App\Api\Requests\PortfoliosRequest;
use App\Api\Resources\PortfoliosResource;
use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfoliosController extends Controller
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
    public function store(PortfoliosRequest $request)
    {
        try {
            $company_id = \Auth::user()->company->id;
            if (!$company_id) {
                throw new \Exception('sorry! Company not found', 400);
            }
            $insert_data = $request->only(['title', 'image', 'video', 'description']);

            $insert_data['company_id'] = $company_id;
            $portfolio                 = Portfolio::create($insert_data);

            return (new PortfoliosResource($portfolio))->additional([
                'status_code' => 200,
                'message'     => 'Portfolio Added.',
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
