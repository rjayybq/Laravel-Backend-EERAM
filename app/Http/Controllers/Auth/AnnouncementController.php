<?php

namespace App\Http\Controllers\Auth;

use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnnouncementController extends Controller
{

    public function index() {
        $announcements = Announcement::all();
        return view('auth.announcements.index', compact('announcements'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'target_audience' => 'required|string|in:students,guardians,both',
            'attachment' => 'nullable|file|max:5000', // adjust max size as needed
        ]);

        // Handle file upload if an attachment is provided
        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('attachments', 'public');
        }

        // Create the announcement
        Announcement::create([
            'title' => $request->title,
            'content' => $request->content,
            'target_audience' => $request->target_audience,
            'attachment' => $attachmentPath,
        ]);

        return redirect()->route('auth.announcements.index')
                         ->with('success', 'Announcement created successfully');
    }
    public function create()
    {
        return view('auth.create-announcement');
    }
    public function edit($id)
    {
        $announcement = Announcement::findOrFail($id);
        return view('auth.announcements.edit', compact('announcement'));
    }

    // Update an existing announcement
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'target_audience' => 'required|string|in:students,guardians,both',
            'attachment' => 'nullable|file|max:5000',
        ]);

        $announcement = Announcement::findOrFail($id);

        // Handle file upload if an attachment is provided
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('attachments', 'public');
            $announcement->attachment = $attachmentPath;
        }

        // Update other fields
        $announcement->title = $request->title;
        $announcement->content = $request->content;
        $announcement->target_audience = $request->target_audience;
        $announcement->save();

        return redirect()->route('auth.announcements.index')->with('success', 'Announcement updated successfully');
    }

    // Delete an announcement
    public function destroy($id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();

        return redirect()->route('auth.announcements.index')->with('success', 'Announcement deleted successfully');
    }

}
