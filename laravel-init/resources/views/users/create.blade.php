@extends('layout')

@section('content')

<form action="{{route('users.store')}}" method="post">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input class="form-control" id="name" type="text" name="name" required>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Email:</label>
        <input class="form-control" id="email" type="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Password:</label>
        <input class="form-control" id="password" type="text" name="password"" required>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Avatar URL:</label>
        <input class="form-control" id="avatar_url" type="text" name="avatar_url" required>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>

@endsection
