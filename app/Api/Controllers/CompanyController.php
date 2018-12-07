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
     * add or edit
     */
    public function addUpdate(CompanyRequest $request)
    {
        try {
            $company = \Auth::user()->company;
            if (!$company) {
                $company = new Company([
                    'user_id' => \Auth::user()->id,
                ]);
            }

            $company->name         = $request->get('name');
            $company->logo         = $request->get('logo');
            $company->email        = $request->get('email');
            $company->phone        = $request->get('phone');
            $company->tagline      = $request->get('tagline');
            $company->founded_date = $request->get('founded_date');
            $company->employe_size = $request->get('employe_size');
            $company->admin_email  = $request->get('admin_email');
            $company->description  = $request->get('description');
            $company->website_url  = $request->get('website_url');
            $company->save();
            return (new CompanyResource($company))->additional([
                'status_code' => 200,
                'message' => 'Comapny Added.',
            ]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
}
