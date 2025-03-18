@extends('layout')

@section('title', 'Employee List')

@section('content')
    <div class="page-header">
        <h2>Employee List</h2>
    </div>

    <!-- Navigation Buttons -->
    <div class="action-buttons">
        <a href="{{ route('dashboard') }}" class="button">Dashboard</a>
        <a href="{{ route('employees.create') }}" class="button">Add New Employee</a>
        <a href="{{ route('leave-types.index') }}" class="button">Manage Leave Types</a>
        <a href="{{ route('departments.index') }}" class="button">Manage Departments</a>
    </div>

    <!-- Employee Table -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Employee Number</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Department</th>
                    <th>Grade</th>
                    <th>Position</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->EmployeeNumber }}</td>
                        <td>{{ $employee->FirstName }}</td>
                        <td>{{ $employee->LastName }}</td>
                        <td>{{ $employee->Gender }}</td>
                        <td>{{ $employee->DateOfBirth }}</td>
                        <td>{{ $employee->department->DepartmentName }}</td>
                        <td>{{ $employee->grade->GradeName }}</td>
                        <td>{{ $employee->position->PositionName }}</td>
                        <td>
                            <a href="{{ route('employees.edit', $employee->EmployeeNumber) }}" class="button">Edit</a>
                            <form action="{{ route('employees.destroy', $employee->EmployeeNumber) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
