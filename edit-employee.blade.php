<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            padding: 20px;
        }
        form {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"], input[type="date"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .back-btn {
            display: inline-block;
            padding: 8px 12px;
            background: #6c757d;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-btn:hover {
            background: #5a6268;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Edit Employee</h1>

    <form method="POST" action="{{ route('employees.update', $employee->EmployeeNumber) }}">
        @csrf
        @method('PUT')

        <!-- Employee Number Field -->
        <label for="EmployeeNumber">Employee Number:</label>
        <input type="text" id="EmployeeNumber" name="EmployeeNumber" value="{{ $employee->EmployeeNumber }}" readonly>

        <label for="FirstName">First Name:</label>
        <input type="text" id="FirstName" name="FirstName" value="{{ $employee->FirstName }}" required>

        <label for="LastName">Last Name:</label>
        <input type="text" id="LastName" name="LastName" value="{{ $employee->LastName }}" required>

        <label for="Gender">Gender:</label>
        <select id="Gender" name="Gender" required>
            <option value="Male" {{ $employee->Gender == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ $employee->Gender == 'Female' ? 'selected' : '' }}>Female</option>
        </select>

        <label for="DateOfBirth">Date of Birth:</label>
        <input type="date" id="DateOfBirth" name="DateOfBirth" value="{{ $employee->DateOfBirth }}" required>

        <label for="DepartmentID">Department:</label>
        <select id="DepartmentID" name="DepartmentID" required>
            @foreach($departments as $department)
                <option value="{{ $department->DepartmentID }}" {{ $employee->DepartmentID == $department->DepartmentID ? 'selected' : '' }}>
                    {{ $department->DepartmentName }}
                </option>
            @endforeach
        </select>

        <label for="GradeID">Grade:</label>
        <select id="GradeID" name="GradeID" required>
            @foreach($grades as $grade)
                <option value="{{ $grade->GradeID }}" {{ $employee->GradeID == $grade->GradeID ? 'selected' : '' }}>
                    {{ $grade->GradeName }}
                </option>
            @endforeach
        </select>

        <label for="PositionID">Position:</label>
        <select id="PositionID" name="PositionID" required>
            @foreach($positions as $position)
                <option value="{{ $position->PositionID }}" {{ $employee->PositionID == $position->PositionID ? 'selected' : '' }}>
                    {{ $position->PositionName }}
                </option>
            @endforeach
        </select>

        <button type="submit">Update Employee</button>
    </form>

    <div style="text-align: center; margin-top: 20px;">
        <a href="{{ route('employees.index') }}" class="back-btn">Back to Employees</a>
    </div>
</body>
</html>