@extends('layouts.dashboard')

@section('title', 'Employees in ' . $department->DepartmentName)

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2">Employees in {{ $department->DepartmentName }}</h1>
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
    </div>

    <!-- Employees Table -->
    <div class="card">
        <div class="card-header bg-primary text-white">
            Employees
        </div>
        <div class="card-body">
            @if($employees->isEmpty())
                <p class="text-center">No employees found in this department.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Employee Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{ $employee->EmployeeID }}</td>
                                <td>{{ $employee->EmployeeName }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
