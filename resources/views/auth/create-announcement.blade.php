<!-- resources/views/admin/create-announcement.blade.php -->
@extends('layouts.app') <!-- Assuming you have an admin layout -->

@section('content')
<div class="container">
    <h2 class="my-4">Create New Announcement</h2>
    
    <form action="{{ route('auth.announcements.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Title Input -->
        <div class="form-group">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter announcement title" required>
        </div>

        <!-- Content Input -->
        <div class="form-group">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" rows="5" class="form-control" placeholder="Enter announcement content" required></textarea>
        </div>

        <!-- Target Audience Dropdown -->
        <div class="form-group">
            <label for="target_audience" class="form-label">Target Audience</label>
            <select name="target_audience" id="target_audience" class="form-control" required>
                <option value="students">Students</option>
                <option value="guardians">Guardians</option>
                <option value="both">Both</option>
            </select>
        </div>

        <!-- File Upload -->
        <div class="form-group">
            <label for="attachment" class="form-label">Attachment (optional)</label>
            <input type="file" name="attachment" id="attachment" class="form-control-file">
        </div>

        <!-- Submit Button -->
        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">Post Announcement</button>
            <a href="{{ route('auth.announcements.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
