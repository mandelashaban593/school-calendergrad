<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Handle an incoming authentication request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // Extract email and password from request
        $email = $request->input('email');
        $password = $request->input('password');

        // Attempt to retrieve the user based on the provided email
        // Attempt to retrieve the user based on the provided email and password
        $user = User::where('email', $email)
                    ->where('password', $password)
                    ->first();

        // Check if user exists
        if (!$user) {
            // Log failed login attempt (user not found)
            Log::error('Login attempt failed for email: ' . $email . ' - User not found');

            // Return JSON response with error message and status code 401 (Unauthorized)
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Log retrieved hashed password for debugging
        Log::info('Retrieved hashed password: ' . $user->password);

        // Check if password matches using Hash::check() (recommended for production)
        // if (!Hash::check($password, $user->password)) {
        //     // Log failed login attempt (incorrect password)
        //     Log::error('Login attempt failed for email: ' . $email . ' - Incorrect password');

        //     // Return JSON response with error message and status code 401 (Unauthorized)
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }

        // Proceed with authentication if password matches
        Auth::login($user);
        $authdata = Auth::login($user);
        if($authdata){
            Log::info('OOOOOOOOOOOOOk ');
        }
       

        // Regenerate session ID to prevent session fixation attacks
        $request->session()->regenerate();

        // Log authenticated user details for auditing/logging purposes
        Log::info('Authenticated user: ' . $user->name . ' (' . $user->email . ')');

        // Generate and return plain text token using Laravel Sanctum
        $token = $user->createToken('authToken')->plainTextToken;
        Log::info('Token Created: ' . $token);

        // Return JSON response with token and user data
        return response()->json([
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role, // Adjust this based on your User model attributes
            ]
        ], 200);
    }


    public function logout(Request $request)
    {
        // Check if the user is authenticated
        
            // Revoke all tokens for the authenticated user
            $request->user()->tokens()->delete();

            // Logout the user from the current session
            Auth::logout();

            // Invalidate the current session
            $request->session()->invalidate();

            // Return JSON response indicating successful logout
            return response()->json(['message' => 'Logged out successfully'], 200);
        
    
    }

}
