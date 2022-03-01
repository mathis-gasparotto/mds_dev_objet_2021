@extends('layout')

@section('content')

<ul>
    @foreach($users as $user)
        <li>
            <img src="{{ $user->avatar_url }}" width="100" alt="user's avatar">
            <a href="{{route('users.show', $user->id)}}">{{ $user->name }} ({{ $user->email }})</a>
            <a href="{{route('users.show', $user->id)}}/edit">Edit</a>
            <a href="{{route('users.show', $user->id)}}/del">Delete</a>
        </li>
    @endforeach
</ul>

@endsection
