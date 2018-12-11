<?php

namespace App\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'address_1' => 'required',
            'address_2' => 'required',
            'city'      => 'required',
            'country'   => 'required',
            'zip_code'  => 'required',
            'longitude' => 'required',
            'latitude'  => 'required',
        ];
    }
}
