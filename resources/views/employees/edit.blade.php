@extends('layouts.app')

@section('title', 'Edit Employee')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Edit Employee</h2>

    <form method="POST" action="{{ route('employees.update', $employee->EmployeeNumber) }}">
        @csrf
        @method('PUT')

        <!-- Employee Number (Read-Only) -->
        <div class="mb-3">
            <label for="EmployeeNumber" class="form-label">Employee Number</label>
            <input type="text" name="EmployeeNumber" id="EmployeeNumber" class="form-control" value="{{ $employee->EmployeeNumber }}"Read-Only >
        </div>

        <!-- First Name -->
        <div class="mb-3">
            <label for="FirstName" class="form-label">First Name</label>
            <input type="text" name="FirstName" id="FirstName" class="form-control @error('FirstName') is-invalid @enderror" value="{{ old('FirstName', $employee->FirstName) }}" required>
            @error('FirstName')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Last Name -->
        <div class="mb-3">
            <label for="LastName" class="form-label">Last Name</label>
            <input type="text" name="LastName" id="LastName" class="form-control @error('LastName') is-invalid @enderror" value="{{ old('LastName', $employee->LastName) }}" required>
            @error('LastName')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Date of Birth -->
        <div class="mb-3">
            <label for="DateOfBirth" class="form-label">Date of Birth</label>
            <input type="date" name="DateOfBirth" id="DateOfBirth" class="form-control @error('DateOfBirth') is-invalid @enderror" value="{{ old('DateOfBirth', $employee->DateOfBirth) }}" required>
            @error('DateOfBirth')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Department -->
        <div class="mb-3">
            <label for="DepartmentID" class="form-label">Department</label>
            <select name="DepartmentID" id="DepartmentID" class="form-select @error('DepartmentID') is-invalid @enderror" required>
                <option value="" disabled>Select Department</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->DepartmentID }}" {{ old('DepartmentID', $employee->DepartmentID) == $department->DepartmentID ? 'selected' : '' }}>
                        {{ $department->DepartmentName }}
                    </option>
                @endforeach
            </select>
            @error('DepartmentID')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Grade -->
        <div class="mb-3">
            <label for="GradeID" class="form-label">Grade</label>
            <select name="GradeID" id="GradeID" class="form-select @error('GradeID') is-invalid @enderror" required>
                <option value="" disabled>Select Grade</option>
                @foreach ($grades as $grade)
                    <option value="{{ $grade->GradeID }}" {{ old('GradeID', $employee->GradeID) == $grade->GradeID ? 'selected' : '' }}>
                        {{ $grade->GradeName }}
                    </option>
                @endforeach
            </select>
            @error('GradeID')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Position -->
        <div class="mb-3">
            <label for="PositionID" class="form-label">Position</label>
            <select name="PositionID" id="PositionID" class="form-select @error('PositionID') is-invalid @enderror" required>
                <option value="" disabled>Select Position</option>
                @foreach ($positions as $position)
                    <option value="{{ $position->PositionID }}" {{ old('PositionID', $employee->PositionID) == $position->PositionID ? 'selected' : '' }}>
                        {{ $position->PositionName }}
                    </option>
                @endforeach
            </select>
            @error('PositionID')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Gender -->
        <div class="mb-3">
            <label for="Gender" class="form-label">Gender</label>
            <select name="Gender" id="Gender" class="form-select @error('Gender') is-invalid @enderror" required>
                <option value="" disabled>Select Gender</option>
                <option value="Female" {{ old('Gender', $employee->Gender) === 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Male" {{ old('Gender', $employee->Gender) === 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Other" {{ old('Gender', $employee->Gender) === 'Other' ? 'selected' : '' }}>Other</option>

            </select>
            @error('Gender')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
