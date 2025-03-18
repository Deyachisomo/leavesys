@extends('layout')

@section('title', 'Manage Departments')

@section('content')
<head>
<head>
    <title>@yield('title')</title>
    
    @yield('head')
</head>
<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>    
<div class="page-header">
        <h2>Manage Departments</h2>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <!-- Department List -->
    <div class="table-container">
        <h3>Department List</h3>
        <table>
            <thead>
                <tr>
                    <th>Department ID</th>
                    <th>Department Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($departments as $dept)
                    <tr>
                        <td>{{ $dept->DepartmentID }}</td>
                        <td>{{ $dept->DepartmentName }}</td>
                        <td>
                            <a href="{{ route('departments.edit', $dept->DepartmentID) }}" class="button">Edit</a>
                            <form action="{{ route('departments.destroy', $dept->DepartmentID) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button delete" onclick="return confirm('Are you sure you want to delete this department?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add Department Form -->
    <div class="form-container">
        <h3>Add a New Department</h3>
        <form method="POST" action="{{ route('departments.store') }}">
            @csrf

            <div class="form-group">
                <label for="DepartmentName">Department Name:</label>
                <input type="text" id="DepartmentName" name="DepartmentName" placeholder="Enter department name" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="button">Add Department</button>
            </div>
        </form>
    </div>
@endsection

@section('head')
    <!-- Link to the Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endsection
