@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Edit Profile</h1>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Profile Edit Form -->
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input id="name" type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
@endsection
