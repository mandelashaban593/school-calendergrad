<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Add this line for the Auth facade

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            $user = Auth::user();
            return response()->json(['message' => 'Login successful', 'user' => $user], 200)->header('Referrer-Policy', 'no-referrer');
        } else {
            // Authentication failed
            return response()->json(['message' => 'Invalid credentials'], 401)->header('Referrer-Policy', 'no-referrer');
        }
    }
}
