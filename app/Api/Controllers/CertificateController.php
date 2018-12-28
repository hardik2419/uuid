<?php

namespace App\Api\Controllers;

use App\Api\Requests\CertificateRequest;
use App\Api\Resources\CertificateResource;
use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

/**
 * @resource Certificate
 */
class CertificateController extends Controller
{
    /**
     * Get Certificates
     */
    public function index()
    {
        //
    }

    /**
     * Add Certificate
     */
    public function store(CertificateRequest $request)
    {
        try {
            $company_id = \Auth::user()->company->id;
            if (!$company_id) {
                throw new \Exception('Company not found', 400);
            }
            $insert_data               = $request->only(['name', 'email', 'years', 'description', 'image']);
            $insert_data['company_id'] = $company_id;
            $certificate               = Certificate::create($insert_data);

            return (new CertificateResource($certificate))->additional([
                'status_code' => 200,
                'message'     => 'Certificate successfully added',
            ]);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Get Certificate
     */
    public function show($id)
    {
        //
    }

    /**
     * Update Certificate
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Delete Certificate
     */
    public function destroy($id)
    {
        //
    }
}
