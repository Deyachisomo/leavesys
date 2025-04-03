@extends('layouts.app')

@section('title', 'Leave Types')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Leave Types</h2>

    <!-- Display Success Message -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Add New Leave Type Button -->
    <a href="{{ route('leave_types.create') }}" class="btn btn-primary mb-4">Add New Leave Type</a>

    <!-- Table for Listing Leave Types -->
    @if ($leaveTypes->isNotEmpty())
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Paid</th>
                    <th>Gender</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leaveTypes as $leaveType)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $leaveType->LeaveTypeName }}</td>
                        <td>{{ $leaveType->IsPaidLeave ? 'Yes' : 'No' }}</td>
                        <td>{{ $leaveType->GenderApplicable }}</td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('leave_types.edit', $leaveType->LeaveTypeID) }}" class="btn btn-warning btn-sm">Edit</a>
                            <!-- Delete Form -->
                            <form action="{{ route('leave_types.destroy', $leaveType->LeaveTypeID) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <!-- Message for Empty Leave Types -->
        <div class="alert alert-info text-center">
            <h4>No leave types found.</h4>
            <p>Add a new leave type to get started.</p>
        </div>
    @endif
</div>
@endsection
