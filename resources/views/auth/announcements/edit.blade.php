
@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Edit Announcement</h2>

    <form action="{{ route('auth.announcements.update', $announcement->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $announcement->title }}" required>
        </div>

        <div class="form-group">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" rows="5" class="form-control" required>{{ $announcement->content }}</textarea>
        </div>


        <div class="form-group">
            <label for="attachment" class="form-label">Attachment (optional)</label>
            <input type="file" name="attachment" id="attachment" class="form-control-file">
        </div>

        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">Update Announcement</button>
            <a href="{{ route('auth.announcements.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
