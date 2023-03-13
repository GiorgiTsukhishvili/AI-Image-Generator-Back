<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'username' => 'required|string|unique:users,name',
            'email' => 'required|email|string|unique:users,email',
            'password' => 'required|confirmed|string',
        ];
    }
}
