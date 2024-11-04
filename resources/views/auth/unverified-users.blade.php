<!-- resources/views/admin/unverified-users.blade.php -->

@extends('layouts.main')

@section('content')
    <div class="container">
        <h2>Unverified Users</h2>

        <h3>Students</h3>
        @if ($unverifiedStudents->isEmpty())
            <p>No unverified students found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @foreach ($unverifiedStudents as $student)
                        <tr>

                            <td>{{ $student->student_id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->course }}</td>
                            <td>

                                <form action="{{ route('auth.verify-user', ['role' => 'student', 'id' => $student->id]) }}"
                                    method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Verify</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <h3>Guardians</h3>
        @if ($unverifiedGuardians->isEmpty())
            <p>No unverified guardians found.</p>
        @else
            <table class="table">
                <thead>

                    <tr>
                        <th>Name</th>
                        <th>Relationship</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   
                    @foreach ($unverifiedGuardians as $guardian)
                        <tr>
                          
                            <td>{{ $guardian->name }}</td>
                            <td>{{ $guardian->relationship_to_student }}</td>
                            <td>
                                <form action="{{ route('auth.verify-user', ['role' => 'guardian', 'id' => $guardian->id]) }}"
                                    method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Verify</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
