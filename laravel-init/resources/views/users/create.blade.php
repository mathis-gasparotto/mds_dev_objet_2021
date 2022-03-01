@extends('layout')

@section('content')
    <h1>Create a user</h1>

<form action="{{route('users.store')}}" method="post">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" required>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" required>
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" required>
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    </div>
    <div class="mb-3">
        <label for="avatar_url" class="form-label">Avatar URL:</label>
        <input class="form-control @error('avatar_url') is-invalid @enderror" id="avatar_url" type="text" name="avatar_url" required>
        @error('avatar_url')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>

@endsection
