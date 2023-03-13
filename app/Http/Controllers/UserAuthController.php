<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function login(UserLoginRequest $request)
    {
        $login_type = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $user = User::where($login_type, $request->login)->firstOrFail();

        if (auth()->validate(['id' => $user->id, 'password' => $request->password])) {
            Auth::loginUsingId($user->id, $request->remember);
            request()->session()->regenerate();
            return response()->json(['message' => 'User login successful', 'data' => $user], 200);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }


    public function logout()
    {
        auth()->guard('web')->logout;
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return response()->json(['message' => 'User logged out successfully'], 201);
    }
}
