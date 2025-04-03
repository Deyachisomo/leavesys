@extends('layouts.app')

@section('title', 'Leave Types List')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4" style="background-color: #d9f3ff; padding: 15px; border-radius: 5px;">
        <div>
            <h1 class="h2">Leave Types List</h1>
            <p>Manage all available leave types in the system.</p>
        </div>
        <div>
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
            <a href="{{ route('leave-types.create') }}" class="btn btn-success">Add New Leave Type</a>
        </div>
    </div>

    <!-- Leave Types Table -->
    <div class="card" style="border: 1px solid #87CEEB; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <div class="card-header text-white" style="background-color: #007bff;">
            <h5 class="mb-0">Leave Types</h5>
        </div>
        <div class="card-body" style="background-color: #f8f9fa;">
            @if($leaveTypes->isEmpty())
                <p class="text-center">No leave types found.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Leave Type ID</th>
                            <th>Leave Type Name</th>
                            <th>Is Paid Leave</th>
                            <th>Gender Applicable</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($leaveTypes as $leaveType)
                            <tr>
                                <td>{{ $leaveType->LeaveTypeID }}</td>
                                <td>{{ $leaveType->LeaveTypeName }}</td>
                                <td>{{ $leaveType->IsPaidLeave ? 'Yes' : 'No' }}</td>
                                <td>{{ $leaveType->GenderApplicable }}</td>
                                <td>
                                    <!-- Action Buttons -->
                                    <a href="{{ route('leave-types.edit', $leaveType->LeaveTypeID) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('leave-types.destroy', $leaveType->LeaveTypeID) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
