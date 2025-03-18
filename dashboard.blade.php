@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar -->
        <div class="col-md-3">
            <div class="card shadow mb-4">
                <div class="card-header bg-dark text-white">
                    Navigation
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="{{ route('employees.index') }}">Manage Employees</a></li>
                    <li class="list-group-item"><a href="{{ route('departments.index') }}">Manage Departments</a></li>
                    <li class="list-group-item"><a href="{{ route('leave-types.index') }}">Manage Leave Types</a></li>
                    <li class="list-group-item"><a href="{{ route('leave.requests.index') }}">Manage Leave Requests</a></li>
                    <li class="list-group-item"><a href="{{ route('leave.requests.index') }}">Recent Leave Requests</a></li>
                </ul>
            </div>
        </div>

        <!-- Main Dashboard Content -->
        <div class="col-md-9">
            <div class="row">
                <!-- Total Employees -->
                <div class="col-md-4">
                    <div class="card bg-primary text-white text-center shadow mb-4">
                        <div class="card-body">
                            <h5>Total Employees</h5>
                            <p class="h3">{{ $totalEmployees }}</p>
                        </div>
                    </div>
                </div>

                <!-- Employees by Gender -->
                <div class="col-md-8">
                    <div class="card bg-info text-white shadow mb-4">
                        <div class="card-body">
                            <h5 class="text-center">Employees by Gender</h5>
                            <ul class="list-unstyled mb-0">
                                <li class="mb-1">
                                    <strong>Male Employees:</strong> {{ $maleEmployees }}
                                </li>
                                <li class="mb-1">
                                    <strong>Female Employees:</strong> {{ $femaleEmployees }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Employees by Department -->
                <div class="col-md-8">
                    <div class="card bg-info text-white shadow mb-4">
                        <div class="card-body">
                            <h5 class="text-center">Employees by Department</h5>
                            <ul class="list-unstyled mb-0">
                                @foreach($departments as $department)
                                    <li class="mb-1">
                                        <strong>{{ $department->DepartmentName ?? 'Unknown Department' }}:</strong> 
                                        {{ $department->employees_count }} employees
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Total Leave Requests -->
                <div class="col-md-12">
                    <div class="card bg-success text-white text-center shadow mb-4">
                        <div class="card-body">
                            <h5>Total Leave Requests</h5>
                            <p class="h3">{{ $totalLeaveRequests }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
