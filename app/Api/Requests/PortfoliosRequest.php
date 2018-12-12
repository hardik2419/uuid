<?php

namespace App\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfoliosRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'       => 'required',
            'description' => 'required',
        ];
    }
}
