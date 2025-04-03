@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5>Management</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{ route('employees.index') }}" class="btn btn-link w-100">Manage Employees</a></li>
                        <li class="list-group-item"><a href="{{ route('departments.index') }}" class="btn btn-link w-100">Manage Departments</a></li>
                        <li class="list-group-item"><a href="{{ route('leave_types.index') }}" class="btn btn-link w-100">Manage Leave Types</a></li>
                        <li class="list-group-item"><a href="{{ route('positions.index') }}" class="btn btn-link w-100">Manage Positions</a></li>
                        <li class="list-group-item"><a href="{{ route('grades.index') }}" class="btn btn-link w-100">Manage Grades</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <!-- Overview Cards -->
            <div class="row text-center">
                <!-- Total Employees -->
                <div class="col-md-4 mb-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5>Total Employees</h5>
                            <p>{{ $totalEmployees }}</p>
                        </div>
                    </div>
                </div>
                <!-- Male Employees -->
                <div class="col-md-4 mb-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5>Male Employees</h5>
                            <p>{{ $maleEmployees }}</p>
                        </div>
                    </div>
                </div>
                <!-- Female Employees -->
                <div class="col-md-4 mb-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5>Female Employees</h5>
                            <p>{{ $femaleEmployees }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- More Overview Cards -->
            <div class="row text-center">
                <!-- Total Positions -->
                <div class="col-md-4 mb-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5>Total Positions</h5>
                            <p>{{ $totalPositions }}</p>
                        </div>
                    </div>
                </div>
                <!-- Total Grades -->
                <div class="col-md-4 mb-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5>Total Grades</h5>
                            <p>{{ $totalGrades }}</p>
                        </div>
                    </div>
                </div>
                <!-- Total Departments -->
                <div class="col-md-4 mb-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5>Total Departments</h5>
                            <p>{{ $departments->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Department Overview -->
            <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-secondary text-white">
                <h5>Department Overview</h5>
            </div>
            <div class="card-body">
                @if ($departments->isNotEmpty())
                    <table class="table table-bordered table-striped">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>#</th>
                                <th>Department Name</th>
                                <th>Number of Employees</th>
                                <th>Supervisor</th> <!-- New Supervisor Column -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departments as $department)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $department->DepartmentName }}</td>
                                    <td>{{ $department->employees_count }}</td>
                                    <td>{{ $department->supervisor ? $department->supervisor->FirstName . ' ' . $department->supervisor->LastName : 'N/A' }}</td> <!-- Supervisor Name -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-info text-center">No departments found.</div>
                @endif
            </div>
        </div>
    </div>
</div>

            <!-- Recent Leave Requests -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            <h5>Recent Leave Requests</h5>
                        </div>
                        <div class="card-body">
                            @if ($recentLeaveRequests->isNotEmpty())
                                <table class="table table-bordered table-striped">
                                    <thead class="table-primary text-center">
                                        <tr>
                                            <th>#</th>
                                            <th>Employee Name</th>
                                            <th>Leave Type</th>
                                            <th>Status</th>
                                            <th>Requested On</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recentLeaveRequests as $request)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $request->employee->FirstName }} {{ $request->employee->LastName }}</td>
                                                <td>{{ $request->leaveType->LeaveTypeName }}</td>
                                                <td>{{ ucfirst($request->Status) }}</td>
                                                <td>{{ $request->created_at->format('d-m-Y') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-info text-center">No recent leave requests found.</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
