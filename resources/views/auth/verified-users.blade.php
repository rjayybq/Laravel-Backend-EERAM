@extends('layouts.main')

@section('title', 'Verified Users')

@section('content')
<div class="container">
    <h2 class="my-4">Account Verified</h2>

    <div class="row">
        <div class="col-md-6">
            <h3>Verified Students</h3>
            @if($verifiedStudents->isEmpty())
                <div class="alert alert-info">No verified students found.</div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Verification Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($verifiedStudents as $student)
                            <tr>
                                <td>{{ $student->student_id }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->is_verified ? 'Verified' : 'Not Verified' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Pagination links for students -->
                {{ $verifiedStudents->links() }}
            @endif
        </div>

        <div class="col-md-6">
            <h3>Verified Guardians</h3>
            @if($verifiedGuardians->isEmpty())
                <div class="alert alert-info">No verified guardians found.</div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Relationship</th>
                            <th>Verification Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($verifiedGuardians as $guardian)
                            <tr>
                                <td>{{ $guardian->name }}</td>
                                <td>{{ $guardian->relationship_to_student }}</td>
                                <td>{{ $guardian->is_verified ? 'Verified' : 'Not Verified' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Pagination links for guardians -->
                {{ $verifiedGuardians->links() }}
            @endif
        </div>
    </div>
</div>
@endsection
