@extends('layout')

@section('content')

<form method="post">
    {{ csrf_field() }}
    <input type="text" name="name" placeholder="Name" value="{{ $user->name }}" required>
    <input type="email" name="email" placeholder="Email" value="{{ $user->email }}" required>
    <input type="text" name="avatar_url" placeholder="Avatar URL" value="{{ $user->avatar_url }}" required>
    <input type="submit" value="Edit">
</form>

@endsection
