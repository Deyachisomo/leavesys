@extends('layouts.app')

@section('title', 'Leave Requests')

@section('content')
<div class="container mt-3"> <!-- Adjusted the margin to mt-3 for consistency -->
    <!-- Page Title -->
    <h2 class="mb-4">Leave Requests</h2>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Leave Requests Table -->
    <div class="table-responsive"> <!-- Make table responsive for better viewing -->
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Request ID</th>
                    <th>Employee</th>
                    <th>Leave Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Total Days</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leaveRequests as $request)
                    <tr>
                        <td>{{ $request->LeaveRequestID }}</td>
                        <td>{{ $request->employee->FirstName }} {{ $request->employee->LastName }}</td>
                        <td>{{ $request->leaveType->LeaveTypeName }}</td>
                        <td>{{ $request->StartDate }}</td>
                        <td>{{ $request->EndDate }}</td>
                        <td>{{ $request->TotalDays }}</td>
                        <td>
                            <span class="badge {{ $request->RequestStatus == 'approved' ? 'bg-success' : ($request->RequestStatus == 'rejected' ? 'bg-danger' : 'bg-warning text-dark') }}">
                                {{ ucfirst($request->RequestStatus) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('leave-requests.approve', $request->LeaveRequestID) }}" class="btn btn-sm btn-success">Approve</a>
                            <a href="{{ route('leave-requests.reject', $request->LeaveRequestID) }}" class="btn btn-sm btn-danger">Reject</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
