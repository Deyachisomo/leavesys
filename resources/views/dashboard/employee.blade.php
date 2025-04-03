@extends('layouts.dashboard')

@section('title', 'Employee Dashboard')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2">Employee Dashboard</h1>
    </div>

    <!-- Annual Leave Overview -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            Annual Leave Overview
        </div>
        <div class="card-body">
            <p><strong>Total Annual Leave Days:</strong> {{ $totalLeaveDays ?? 'N/A' }}</p>
            <p><strong>Remaining Leave Days:</strong> {{ $remainingLeaveDays ?? 'N/A' }}</p>
        </div>
    </div>

    <!-- Recent Leave Request -->
    @if($recentLeaveRequest)
        <div class="card mb-4">
            <div class="card-header bg-warning text-dark">
                Recent Leave Request
            </div>
            <div class="card-body">
                <p><strong>Type:</strong> {{ $recentLeaveRequest->leaveType->LeaveTypeName ?? 'N/A' }}</p>
                <p><strong>From:</strong> {{ $recentLeaveRequest->StartDate ?? 'N/A' }}</p>
                <p><strong>To:</strong> {{ $recentLeaveRequest->EndDate ?? 'N/A' }}</p>
                <p><strong>Status:</strong> 
                    <span class="badge bg-{{ $recentLeaveRequest->RequestStatus == 'Approved' ? 'success' : ($recentLeaveRequest->RequestStatus == 'Rejected' ? 'danger' : 'info') }}">
                        {{ $recentLeaveRequest->RequestStatus }}
                    </span>
                </p>
            </div>
        </div>
    @else
        <div class="alert alert-info">No recent leave requests found.</div>
    @endif

    <!-- Leave Requests Summary -->
    <div class="card">
        <div class="card-header bg-secondary text-white">
            Leave Requests Summary
        </div>
        <div class="card-body">
            @if ($leaveRequestsSummary->isEmpty())
                <p class="text-muted">No leave requests found.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Request Date</th>
                            <th>Type</th>
                            <th>Duration</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leaveRequestsSummary as $request)
                            <tr>
                                <td>{{ $request->created_at->format('Y-m-d') ?? 'N/A' }}</td>
                                <td>{{ $request->leaveType->LeaveTypeName ?? 'N/A' }}</td>
                                <td>{{ $request->TotalDays ?? 'N/A' }} days</td>
                                <td>
                                    <span class="badge bg-{{ $request->RequestStatus == 'Approved' ? 'success' : ($request->RequestStatus == 'Rejected' ? 'danger' : 'info') }}">
                                        {{ $request->RequestStatus }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <!-- Navigation Buttons -->
    <div class="mt-4">
        <a href="{{ route('leaves.create') }}" class="btn btn-success me-2">Apply for Leave</a>
        <a href="{{ route('leave.policies') }}" class="btn btn-info me-2">View Leave Policies</a>
        <a href="{{ route('contact.hr') }}" class="btn btn-warning">Contact HR</a>
    </div>
</div>
@endsection
