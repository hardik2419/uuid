<?php

namespace App\Api\Requests;

class VerifyEmailRequest extends Request
{
    public function rules()
    {
        return [
            'email' => 'required|email',
        ];
    }
}
