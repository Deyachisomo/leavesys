@extends('layouts.app') <!-- Or layouts.dashboard if that’s your layout -->

@section('title', 'My Profile')

@section('content')
<div class="container mt-4">
    <h1>My Profile</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Name: {{ $user->name }}</h5>
            <p class="card-text">Email: {{ $user->email }}</p>
            <p class="card-text">Employee Number: {{ $user->EmployeeNumber }}</p>
            <!-- Add other user details here -->
        </div>
    </div>
</div>
@endsection
