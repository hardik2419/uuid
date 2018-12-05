<?php

namespace App\Api\Requests;

class RegisterRequest extends Request
{
    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:50|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|digits:10|unique:users',
        ];
    }
}