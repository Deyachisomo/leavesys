@extends('layouts.app')

@section('title', 'Employee Dashboard')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Welcome, {{ auth()->user()->name }}!</h2>

    <!-- Leave Overview -->
    <div class="row text-center">
        <div class="col-md-6 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5>Total Leave Days (Grade: {{ $gradeName }})</h5>
                    <p>{{ $totalLeaveDays }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5>Total Leave Requests</h5>
                    <p>{{ $totalLeaveRequests }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Leave Requests -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h5>Your Leave Requests</h5>
                </div>
                <div class="card-body">
                    @if ($leaveRequests->isNotEmpty())
                        <table class="table table-bordered table-striped">
                            <thead class="table-primary text-center">
                                <tr>
                                    <th>#</th>
                                    <th>Leave Type</th>
                                    <th>Status</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaveRequests as $request)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ optional($request->leaveType)->LeaveTypeName }}</td>
                                        <td>{{ ucfirst($request->Status) }}</td>
                                        <td>{{ $request->StartDate }}</td>
                                        <td>{{ $request->EndDate }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-info text-center">You have not submitted any leave requests yet.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Apply for Leave -->
    <div class="row mt-4">
        <div class="col-12 text-center">
            <a href="{{ route('leaves.create') }}" class="btn btn-success btn-lg">Apply for New Leave</a>
        </div>
    </div>
</div>
@endsection
