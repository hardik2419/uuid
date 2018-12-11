<?php

namespace App\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicesRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'         => 'required',
            'category'     => 'required',
            'sub_category' => 'required',
            'focus'        => 'required',
        ];
    }
}
