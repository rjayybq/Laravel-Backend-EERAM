<?php

namespace App\Http\Controllers\Auth;

use App\Models\Student;
use App\Models\Guardian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function showUnverifiedUsers()
    {
        $unverifiedStudents = Student::where('is_verified', false)->get();
        $unverifiedGuardians = Guardian::where('is_verified', false)->get();

        return view('auth.unverified-users', compact('unverifiedStudents', 'unverifiedGuardians'));
    }

    // Verify a user by role and ID
    public function verifyUser($role, $id)
    {
        if ($role === 'student') {
            $user = Student::findOrFail($id);
        } else if ($role === 'guardian') {
            $user = Guardian::findOrFail($id);
        } else {
            return redirect()->back()->with('error', 'Invalid role specified.');
        }

        $user->is_verified = true;
        $user->save();

        return redirect()->back()->with('success', 'User verified successfully.');
    }
}
