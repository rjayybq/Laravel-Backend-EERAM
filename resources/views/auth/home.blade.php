@extends('layouts.app')

@section('content')
<div class="container">
    <a class="btn btn-success" href="{{route ('auth.announcements.index')}}">Post Management</a>
    {{-- <div class="row justify-content-center">
        <h2 class="my-4">All Announcements</h2>

        <!-- Button to Create a New Announcement -->
        <a href="{{ route('auth.announcements.create') }}" class="btn btn-primary mb-4">Create New Announcement</a>
    
        <!-- Announcements Table -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Title</th>
                        <th>Content Preview</th>
                        <th>Target Audience</th>
                        <th>Posted Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($announcements as $announcement)
                        <tr>
                            <td>{{ $announcement->title }}</td>
                            <td>{{ Str::limit($announcement->content, 50) }}</td>
                            <td>{{ ucfirst($announcement->target_audience) }}</td>
                            <td>{{ $announcement->created_at->format('M d, Y') }}</td>
                            <td>
                                <!-- Edit Button -->
                                <a href="{{ route('auth.announcements.edit', $announcement->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                
                                <!-- Delete Form -->
                                <form action="{{ route('admin.announcements.destroy', $announcement->id) }}" method="POST" class="d-inline-block">
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
    </div> --}}
</div>
@endsection
