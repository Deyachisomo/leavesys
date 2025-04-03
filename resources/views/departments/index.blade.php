@extends('layouts.app')

@section('title', 'Departments')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Departments</h2>

    <!-- Flash Messages -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Add Department Button -->
    <div class="mb-4">
    <a href="{{ route('departments.create') }}" class="btn btn-success">Add New Department</a>


    </div>

    <!-- Departments Table -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Department Name</th>
                <th>Supervisor</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($departments as $department)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $department->DepartmentName }}</td>
                    <td>
                        @if ($department->SupervisorID)
                            {{ $department->supervisor->FirstName ?? 'N/A' }} {{ $department->supervisor->LastName ?? '' }}
                        @else
                            Not Assigned
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('departments.edit', $department->DepartmentID) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('departments.destroy', $department->DepartmentID) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this department?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No departments found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
