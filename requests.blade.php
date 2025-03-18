@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Leave Request Form</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('leaves.store') }}">
        @csrf

        <div class="form-group">
        <input type="hidden" name="EmployeeNumber" value="{{ auth()->user()->EmployeeNumber }}">
            <input id="employee_number" type="text" name="EmployeeNumber" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="leave_type_id">Leave Type</label>
            <select id="leave_type_id" name="LeaveTypeID" class="form-control" required>
                <option value="">Select Leave Type</option>
                @foreach ($leaveTypes as $leaveType)
                    <option value="{{ $leaveType->LeaveTypeID }}">{{ $leaveType->LeaveTypeName }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input id="start_date" type="date" name="StartDate" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="end_date">End Date</label>
            <input id="end_date" type="date" name="EndDate" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="reason">Reason</label>
            <textarea id="reason" name="reason" class="form-control" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Request</button>
    </form>
</div>
@endsection
