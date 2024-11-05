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
        $unverifiedStudents = Student::where('is_verified', false)->paginate(5);
        $unverifiedGuardians = Guardian::where('is_verified', false)->paginate(5);

        return view('auth.unverified-users', compact('unverifiedStudents', 'unverifiedGuardians'));
    }

    
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

    public function getVerifiedAccounts()
    {
        // Fetch all verified students and guardians
        $verifiedStudents = Student::where('is_verified', true)->paginate(5);
        $verifiedGuardians = Guardian::where('is_verified', true)->paginate(5);

        // Return a view or JSON response
        return view('auth/verified-users', compact('verifiedStudents', 'verifiedGuardians'));
    }

    public function create()
    {
        return view('auth.create-announcement');
    }

}
