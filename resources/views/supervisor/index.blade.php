@extends('layouts.dashboard')

@section('title', 'Supervisor Leave Requests')

@section('content')
<div class="container mt-5">
    <h2>Leave Requests for Supervisor</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($leaveRequests->isEmpty())
        <p>No leave requests assigned to you.</p>
    @else
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Employee</th>
                    <th>Leave Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leaveRequests as $request)
                    <tr>
                        <td>{{ $request->employee->FirstName }} {{ $request->employee->LastName }}</td>
                        <td>{{ $request->leaveType->LeaveTypeName }}</td>
                        <td>{{ $request->StartDate }}</td>
                        <td>{{ $request->EndDate }}</td>
                        <td>
                            <span class="badge {{ $request->RequestStatus == 'Approved' ? 'bg-success' : ($request->RequestStatus == 'Rejected' ? 'bg-danger' : 'bg-warning') }}">
                                {{ ucfirst($request->RequestStatus) }}
                            </span>
                        </td>
                        <td>
                            <!-- Approve Button -->
                            <form action="{{ route('leave-requests.approve', $request->LeaveRequestID) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">Approve</button>
                            </form>
                            <!-- Reject Button -->
                            <form action="{{ route('leave-requests.reject', $request->LeaveRequestID) }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="text" name="Reason" placeholder="Rejection Reason" required>
                                <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
