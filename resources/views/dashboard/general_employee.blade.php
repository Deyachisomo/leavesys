@extends('layouts.app')

@section('title', 'General Employee Dashboard')

@section('content')
<div class="container-fluid mt-5">
    <!-- Dashboard Header -->
    <h1 class="text-center mb-4">Hello, {{ $employee->FirstName }} {{ $employee->LastName }}!</h1>

    <!-- Profile Summary -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-info text-white">Your Profile</div>
                <div class="card-body">
                    <p><strong>Position:</strong> {{ $employee->position->PositionName ?? 'N/A' }}</p>
                    <p><strong>Department:</strong> {{ $employee->department->DepartmentName ?? 'N/A' }}</p>
                    <p><strong>Supervisor:</strong> {{ $supervisor->FirstName ?? 'N/A' }} {{ $supervisor->LastName ?? '' }}</p>
                </div>
            </div>
        </div>

        <!-- Company Announcements -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-warning text-white">Company Announcements</div>
                <div class="card-body">
                    @if($companyAnnouncements->isEmpty())
                        <p>No announcements at the moment.</p>
                    @else
                        <ul class="list-group">
                            @foreach ($companyAnnouncements as $announcement)
                                <li class="list-group-item">
                                    <strong>{{ $announcement->title }}</strong><br>
                                    <small class="text-muted">{{ $announcement->created_at->format('Y-m-d') }}</small>
                                    <p>{{ $announcement->description }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Tasks and Training -->
    <div class="row">
        <!-- Tasks -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white">Your Tasks</div>
                <div class="card-body">
                    @if($tasks->isEmpty())
                        <p>No tasks assigned to you.</p>
                    @else
                        <ul>
                            @foreach ($tasks as $task)
                                <li>{{ $task->title }} - Due: {{ $task->due_date->format('Y-m-d') }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>

        <!-- Training -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">Training Sessions</div>
                <div class="card-body">
                    @if($trainingSessions->isEmpty())
                        <p>No training sessions available right now.</p>
                    @else
                        <ul>
                            @foreach ($trainingSessions as $training)
                                <li>{{ $training->name }} - {{ $training->date->format('Y-m-d') }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
