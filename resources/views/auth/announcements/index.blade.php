
@extends('layouts.main') 

@section('content')
<div class="container">
    <h2 class="my-4">All Announcements</h2>

    <!-- Button to Create a New Announcement -->
   

    <!-- Announcements Table -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Title</th>
                    <th>Content Preview</th>
                    <th>Posted Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($announcements as $announcement)
                    <tr>
                        <td>{{ $announcement->title }}</td>
                        <td>{{ Str::limit($announcement->content, 50) }}</td>
                        <td>{{ $announcement->created_at->format('M d, Y') }}</td>
                        <td>
                            
                            <a href="{{ route('auth.announcements.edit', $announcement->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                            
                            
                            <form action="{{ route('auth.announcements.destroy', $announcement->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this announcement?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No announcements found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
