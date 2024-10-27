<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\Guardian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiGuardianRegisterController extends Controller
{
    public function register(Request $request)
    {
        $validationRule = [
            'name' => 'required|string',
            'email' => 'required|email|unique:guardians',
            'password' => 'required|string',
            'relationship_to_student' => 'required|string',
        ];

        $validation = Validator::make($request->all(), $validationRule);
        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validation->errors()->first(),
            ]);
        }

        $guardian = new Guardian();
        $guardian->name = $request->name;
        $guardian->email = $request->email;
        $guardian->password = Hash::make($request->password);
        $guardian->relationship_to_student = $request->relationship_to_student;
        $guardian->save();

        $bearerToken = $guardian->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Guardian registration successful',
            'guardian' => $guardian,
            'token' => $bearerToken,
        ]);
    }
}
