<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
    }

    public function store(UserStoreRequest $request)
    {
        $data = [
            'name' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'image' => asset('imgs/avatar.png')
            ];

        User::create($data);

        return $data;
    }
}
