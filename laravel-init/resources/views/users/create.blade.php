@extends('layout')

@section('content')

<form action="{{route(users.store)}}" method="post">
    @csrf
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="text" name="avatar_url" placeholder="Avatar URL" required>
    <input type="submit" value="Create">
</form>

@endsection
