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

    public function getRecentAnnouncement(Request $request)
    {
        
        $announcement = Announcement::orderBy('created_at', 'desc')->first();

        if ($announcement) {
            return response()->json($announcement, 200);
        } else {
            return response()->json(['message' => 'No announcements found.'], 404);
        }
    }
}
