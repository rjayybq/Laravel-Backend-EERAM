<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiStudentRegisterController extends Controller
{
    public function register(Request $request)
    {
        $validationRule = [
            'name' => 'required|string',
            'email' => 'required|email|unique:students',
            'password' => 'required|string',
            'student_id' => 'required|string|unique:students',
            'course' => 'required|string',
        ];

        $validation = Validator::make($request->all(), $validationRule);
        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validation->errors()->first(),
            ]);
        }

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = Hash::make($request->password);
        $student->student_id = $request->student_id;
        $student->course = $request->course;
        $student->save();

        $bearerToken = $student->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Student registration successful',
            'student' => $student,
            'token' => $bearerToken,
        ]);
    }
}
