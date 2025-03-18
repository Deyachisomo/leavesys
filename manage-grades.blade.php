<!DOCTYPE html>
<html>
<head>
    <title>Manage Grades</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background: #f9f9f9;
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
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        .success-message {
            text-align: center;
            color: green;
            font-weight: bold;
            margin-bottom: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            padding: 5px 0;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h1>Manage Grades</h1>

    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('grades.store') }}">
        @csrf
        <label for="GradeName">Grade Name:</label>
        <input type="text" id="GradeName" name="GradeName" placeholder="Enter grade name" required>

        <label for="AnnualLeaveDays">Annual Leave Days:</label>
        <input type="number" id="AnnualLeaveDays" name="AnnualLeaveDays" placeholder="Enter annual leave days" required>

        <button type="submit">Add Grade</button>
    </form>

    <h2>Existing Grades</h2>
    <ul>
        @foreach($grades as $grade)
            <li>{{ $grade->GradeName }} - {{ $grade->AnnualLeaveDays }} days</li>
        @endforeach
    </ul>
</body>
</html>
