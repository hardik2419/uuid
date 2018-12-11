<?php

namespace App\Api\Controllers;

use App\Api\Requests\CompanyRequest;
use App\Http\Controllers\Controller;
use App\Api\Resources\CompanyResource;
use App\Models\Company;

/**
 * @resource Auth
 */
class CompanyController extends Controller
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
    public function store(CompanyRequest $request)
    {
        try {
            $insert_data = $request->only(['name','logo','email','phone','tagline','founded_date',
            'employe_size','admin_email','description','website_url']);

            $insert_data['user_id'] = \Auth::user()->id;
            $company = Company::create($insert_data);

            return (new CompanyResource($company))->additional([
                'status_code' => 200,
                'message' => 'Comapny Added.',
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
