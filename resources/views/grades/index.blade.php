@extends('layouts.app')

@section('title', 'Manage Grades')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Manage Grades</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Add New Grade Button -->
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('grades.create') }}" class="btn btn-success">Add New Grade</a>
    </div>

    <!-- Grades Table -->
    @if ($grades->isNotEmpty())
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-primary text-center">
                    <tr>
                        <th>#</th>
                        <th>Grade Name</th>
                        <th>Annual Leave Days</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($grades as $grade)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $grade->GradeName }}</td>
                            <td>{{ $grade->AnnualLeaveDays }}</td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="{{ route('grades.edit', $grade->GradeID) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('grades.destroy', $grade->GradeID) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this grade?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info text-center">No grades found. Click "Add New Grade" above to create one.</div>
    @endif
</div>
@endsection
