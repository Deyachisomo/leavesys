<!DOCTYPE html>
<html>
<head>
    <title>Manage Positions</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background: #f9f9f9; }
        form, ul { max-width: 600px; margin: auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        label { font-weight: bold; display: block; margin-bottom: 8px; }
        input[type="text"], select {
            width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px;
        }
        button {
            padding: 10px; background: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer;
        }
        button:hover { background: #0056b3; }
        .success-message { text-align: center; color: green; font-weight: bold; margin-bottom: 20px; }
        ul { list-style-type: none; padding: 0; }
        ul li { padding: 5px 0; border-bottom: 1px solid #ddd; }
    </style>
</head>
<body>
    <h1>Manage Positions</h1>

    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('positions.store') }}">
        @csrf
        <label for="PositionName">Position Name:</label>
        <input type="text" id="PositionName" name="PositionName" placeholder="Enter position name" required>

        <label for="GradeID">Grade:</label>
        <select id="GradeID" name="GradeID" required>
            <option value="" disabled selected>Select Grade</option>
            @foreach($grades as $grade)
                <option value="{{ $grade->GradeID }}">{{ $grade->GradeName }}</option>
            @endforeach
        </select>

        <button type="submit">Add Position</button>
    </form>

    <h2>Position List</h2>
    <ul>
        @foreach($positions as $position)
            <li>{{ $position->PositionName }} (Grade: {{ $position->grade->GradeName ?? 'N/A' }})</li>
        @endforeach
    </ul>
</body>
</html>
