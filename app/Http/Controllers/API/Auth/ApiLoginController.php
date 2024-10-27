<?php

namespace App\Http\Controllers\API\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class ApiLoginController extends Controller
{
    use AuthenticatesUsers;

    public function login(Request $request)
{
    $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required',
        'role' => 'required|string|in:student,guardian',
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'message' => $validator->errors()->first(),
        ], 400);
    }

    $credentials = $request->only('email', 'password');

    // Attempt to log in based on the role
    if ($request->role === 'student') {
        $guard = 'student';
        $user = \App\Models\Student::where('email', $request->email)->first();
    } else {
        $guard = 'guardian';
        $user = \App\Models\Guardian::where('email', $request->email)->first();
    }

    if ($user && Auth::guard($guard)->attempt($credentials)) {
        
        $user->role = $request->role;

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Login successful',
            'token' => $token,
            'user' => $user,
        ]);
    } else {
        return response()->json([
            'status' => false,
            'message' => 'Invalid credentials',
        ], 401);
    }
}



    // public function login(Request $request)
    // {
    //     // Validate request data
    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required|email',
    //         'password' => 'required',
    //         'role' => 'required|string|in:student,guardian',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'status' => false,
    //             'message' => $validator->errors()->first(),
    //         ], 400);
    //     }

    //     $credentials = $request->only('email', 'password');

    //     // Attempt to log in based on the role
    //     if ($request->role === 'student') {
    //         $guard = 'student';
    //     } else {
    //         $guard = 'guardian';
    //     }

    //     if (Auth::guard($guard)->attempt($credentials)) {
    //         $user = Auth::guard($guard)->user();
    //     } else {
    //         return response()->json([
    //             'status' => false,
    //             'message' => 'Invalid credentials',
    //         ], 401);
    //     }

    //     // Generate a new token for the user
    //     $token = $user->createToken('auth_token')->plainTextToken;
    //     $user->role = $user->role; 
    //     return response()->json([
    //         'status' => true,
    //         'message' => 'Login successful',
    //         'token' => $token,
    //         'user' => $user,
    //     ]);
    // }

    public function logout(Request $request)
    {
        $user = Auth::guard($request->user()->role)->user();

      
        $user->currentAccessToken()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Logout successful',
        ]);
    }}
