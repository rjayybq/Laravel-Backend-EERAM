<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiAnnouncementController extends Controller
{
    public function index(Request $request)
    {
        
        $announcements = Announcement::latest()->get();

        return response()->json([
            'success' => true,
            'announcements' => $announcements,
        ]);
    }

}
