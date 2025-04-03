@extends('layout')

@section('title', 'Create Leave Type')

@section('content')
    <h1>Create Leave Type</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('leave-types.store') }}">
    @csrf

        @csrf

        <div>
            <label for="LeaveTypeName">Leave Type Name:</label>
            <input type="text" id="LeaveTypeName" name="LeaveTypeName" required>
        </div>

        <div>
            <label for="IsPaidLeave">Is Paid Leave:</label>
            <select id="IsPaidLeave" name="IsPaidLeave" required>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <div>
            <label for="GenderApplicable">Gender Applicable:</label>
            <select id="GenderApplicable" name="GenderApplicable" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Both">Both</option>
            </select>
        </div>

        <button type="submit">Create Leave Type</button>
    </form>
@endsection