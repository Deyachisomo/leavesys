@extends('layouts.app')

@section('title', 'My Leave Requests')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">My Leave Requests</h2>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Leave Requests Table -->
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Leave Requests</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Leave Type</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Total Days</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($leaveRequests as $request)
                    <tr>
                        <td>{{ $request->leaveType->LeaveTypeName }}</td>
                        <td>{{ $request->StartDate }}</td>
                        <td>{{ $request->EndDate }}</td>
                        <td>{{ $request->TotalDays }}</td>
                        <td>
                            @if ($request->RequestStatus === 'Approved')
                                <span class="badge bg-success">Approved</span>
                            @elseif ($request->RequestStatus === 'Rejected')
                                <span class="badge bg-danger">Rejected</span>
                            @else
                                <span class="badge bg-warning">Pending</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection