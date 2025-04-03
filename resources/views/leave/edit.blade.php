@extends('layouts.app')

@section('title', 'Edit Leave Type')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4" style="background-color: #d9f3ff; padding: 15px; border-radius: 5px;">
        <h1 class="h2">Edit Leave Type</h1>
        <a href="{{ route('leave-types.index') }}" class="btn btn-primary">Back to Leave Types List</a>
    </div>

    <!-- Form Card -->
    <div class="card" style="border: 1px solid #87CEEB; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <div class="card-header text-white" style="background-color: #007bff;">
            <h5 class="mb-0">Edit Leave Type</h5>
        </div>
        <div class="card-body" style="background-color: #f8f9fa;">
            <form method="POST" action="{{ route('leave-types.update', $leaveType->LeaveTypeID) }}">
                @csrf
                @method('PUT')

                <!-- Leave Type Name -->
                <div class="form-group mb-3">
                    <label for="LeaveTypeName" class="form-label">Leave Type Name</label>
                    <input type="text" id="LeaveTypeName" name="LeaveTypeName" class="form-control @error('LeaveTypeName') is-invalid @enderror" value="{{ old('LeaveTypeName', $leaveType->LeaveTypeName) }}" required>
                    @error('LeaveTypeName')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Is Paid Leave -->
                <div class="form-group mb-3">
                    <label for="IsPaidLeave" class="form-label">Is Paid Leave</label>
                    <select id="IsPaidLeave" name="IsPaidLeave" class="form-select @error('IsPaidLeave') is-invalid @enderror" required>
                        <option value="1" {{ old('IsPaidLeave', $leaveType->IsPaidLeave) == '1' ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ old('IsPaidLeave', $leaveType->IsPaidLeave) == '0' ? 'selected' : '' }}>No</option>
                    </select>
                    @error('IsPaidLeave')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Gender Applicable -->
                <div class="form-group mb-3">
                    <label for="GenderApplicable" class="form-label">Gender Applicable</label>
                    <select id="GenderApplicable" name="GenderApplicable" class="form-select @error('GenderApplicable') is-invalid @enderror" required>
                        <option value="Male" {{ old('GenderApplicable', $leaveType->GenderApplicable) == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('GenderApplicable', $leaveType->GenderApplicable) == 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Both" {{ old('GenderApplicable', $leaveType->GenderApplicable) == 'Both' ? 'selected' : '' }}>Both</option>
                    </select>
                    @error('GenderApplicable')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Maximum Leave Days -->
                <div class="form-group mb-3">
                    <label for="MaxLeaveDays" class="form-label">Maximum Leave Days</label>
                    <input type="number" id="MaxLeaveDays" name="MaxLeaveDays" class="form-control @error('MaxLeaveDays') is-invalid @enderror" value="{{ old('MaxLeaveDays', $leaveType->MaxLeaveDays) }}" required>
                    @error('MaxLeaveDays')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Minimum Service Years -->
                <div class="form-group mb-3">
                    <label for="MinServiceYears" class="form-label">Minimum Service Years</label>
                    <input type="number" id="MinServiceYears" name="MinServiceYears" class="form-control @error('MinServiceYears') is-invalid @enderror" value="{{ old('MinServiceYears', $leaveType->MinServiceYears) }}" required>
                    @error('MinServiceYears')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Notes -->
                <div class="form-group mb-3">
                    <label for="Notes" class="form-label">Notes</label>
                    <textarea id="Notes" name="Notes" class="form-control @error('Notes') is-invalid @enderror" rows="3">{{ old('Notes', $leaveType->Notes) }}</textarea>
                    @error('Notes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-success w-100">Update Leave Type</button>
            </form>
        </div>
    </div>
</div>
@endsection
