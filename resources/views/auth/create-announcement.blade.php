@extends('layouts.app') 

@section('content')
<div class="container">
    <h2 class="my-4">Create New Announcement</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('auth.announcements.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter announcement title" required>
        </div>

        <div class="form-group">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" rows="5" class="form-control" placeholder="Enter announcement content" required></textarea>
        </div>

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
