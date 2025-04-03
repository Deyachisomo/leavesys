@extends('layouts.app')

@section('title', 'Manage Employees')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Manage Employees</h2>

    <!-- Add New Employee Button -->
    <div class="d-flex justify-content-end mb-4">
        <a href="{{ route('employees.create') }}" class="btn btn-success">Add New Employee</a>
    </div>

    <!-- Employees Table -->
    @if ($employees->isNotEmpty())
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Employee Number</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Department</th>
                        <th>Grade</th>
                        <th>Position</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $employee->EmployeeNumber }}</td>
                            <td>{{ $employee->FirstName }}</td>
                            <td>{{ $employee->LastName }}</td>
                            <td>{{ $employee->Gender }}</td>
                            <td>{{ $employee->department->DepartmentName ?? 'N/A' }}</td>
                            <td>{{ $employee->grade->GradeName ?? 'N/A' }}</td>
                            <td>{{ $employee->position->PositionName ?? 'N/A' }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <!-- Edit Button -->
                                    <a href="{{ route('employees.edit', $employee->EmployeeNumber) }}" class="btn btn-warning btn-sm">Edit</a>

                                    <!-- Delete Form -->
                                    <form action="{{ route('employees.destroy', $employee->EmployeeNumber) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this employee?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info text-center">
            No employees found. Click the "Add New Employee" button above to add one.
        </div>
    @endif
</div>
@endsection
