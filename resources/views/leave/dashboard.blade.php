@extends('layouts.app')

@section('title', 'Supervisor Dashboard')

@section('content')
<div class="container-fluid">
    <h1 class="h2">Pending Leave Requests</h1>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee Name</th>
                <th>Leave Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Total Days</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leaveRequests as $leave)
                <tr>
                    <td>{{ $leave->id }}</td>
                    <td>{{ $leave->employee->EmployeeName }}</td>
                    <td>{{ $leave->leaveType->LeaveTypeName }}</td>
                    <td>{{ $leave->StartDate }}</td>
                    <td>{{ $leave->EndDate }}</td>
                    <td>{{ $leave->TotalDays }}</td>
                    <td>
                        <!-- Approve Button -->
                        <form action="{{ route('supervisor.approve', $leave->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Approve</button>
                        </form>

                        <!-- Reject Button -->
                        <form action="{{ route('supervisor.reject', $leave->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('POST')
                            <input type="text" name="Reason" placeholder="Reason for rejection" required>
                            <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
