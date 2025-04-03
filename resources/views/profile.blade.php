@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">My Profile</h1>
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">User Details</h5>
        </div>
        <div class="card-body bg-light">
            <h5 class="card-title">Name: {{ $user->name }}</h5>
            <p class="card-text">Email: {{ $user->email }}</p>
            <p class="card-text">Employee Number: {{ $user->EmployeeNumber }}</p>
            <!-- Add other user details here -->
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('profile.edit') }}" class="btn btn-warning">Edit Profile</a>
        </div>
    </div>
</div>
@endsection
