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
            'student_id' => 'required_if:role,student',
            'email' => 'required_if:role,guardian|email',
            'password' => 'required',
            'role' => 'required|string|in:student,guardian',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ], 400);
        }
    
        // Define credentials based on role
        if ($request->role === 'student') {
            $credentials = ['student_id' => $request->student_id, 'password' => $request->password];
            $user = \App\Models\Student::where('student_id', $request->student_id)->first();
            $guard = 'student';
        } else {
            $credentials = ['email' => $request->email, 'password' => $request->password];
            $user = \App\Models\Guardian::where('email', $request->email)->first();
            $guard = 'guardian';
        }
    
        if ($user && !$user->is_verified) {
            return response()->json([
                'status' => false,
                'message' => 'Your account is not yet verified by the admin.',
            ], 403);
        }

        // Attempt login
        if ($user && Auth::guard($guard)->attempt($credentials)) {
            $user->role = $request->role;
            $token = $user->createToken('auth_token')->plainTextToken;
    
            return response()->json([
                'status' => true,
                'message' => 'Login successful',
                'token' => $token,
                'user' => $user,
                'is_verified' => $user->is_verified,
            ]);   
        }
         else {
            return response()->json([
                'status' => false,
                'message' => 'Invalid credentials',
            ], 401);
        }
    }
    


    

    public function logout(Request $request)
    {
        $user = Auth::guard($request->user()->role)->user();

      
        $user->currentAccessToken()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Logout successful',
        ]);
    }}
