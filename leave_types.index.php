@extends('layout')

@section('title', 'Leave Types')

@section('content')
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        a {
            text-decoration: none;
            color: #28a745; /* Green for add button */
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff; /* Blue header */
            color: #fff;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Button Styles */
        button {
            background-color: #dc3545; /* Red for delete button */
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        button:hover {
            background-color: #c82333; /* Darker red on hover */
        }

        .edit-link {
            color: #007bff; /* Blue for edit link */
            margin-right: 10px;
        }

        .edit-link:hover {
            text-decoration: underline;
        }

        /* Add New Button */
        .add-new {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background-color: #28a745; /* Green for add button */
            color: #fff;
            border-radius: 4px;
            text-align: center;
        }

        .add-new:hover {
            background-color: #218838; /* Darker green on hover */
            text-decoration: none;
        }
    </style>

    <h2>Leave Types</h2>
    <a href="{{ route('leave-types.create') }}" class="btn btn-success">Add New Leave Type</a>

    <table>
        <thead>
            <tr>
                <th>Leave Type ID</th>
                <th>Name</th>
                <th>Is Paid Leave</th>
                <th>Gender Applicable</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leaveTypes as $leaveType)
                <tr>
                    <td>{{ $leaveType->LeaveTypeID }}</td>
                    <td>{{ $leaveType->LeaveTypeName }}</td>
                    <td>{{ $leaveType->IsPaidLeave ? 'Yes' : 'No' }}</td>
                    <td>{{ $leaveType->GenderApplicable }}</td>
                    <td>
                        <a href="{{ route('leave-types.edit', $leaveType->LeaveTypeID) }}" class="edit-link">Edit</a>
                        <form action="{{ route('leave-types.destroy', $leaveType->LeaveTypeID) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection