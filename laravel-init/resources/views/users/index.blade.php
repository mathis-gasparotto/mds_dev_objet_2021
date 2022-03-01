@extends('layout')

@section('content')

<div id="users-container">
    @foreach($users as $user)
        <div class="user-container card">
            <div class="user-content">
                <img src="{{ $user->avatar_url }}" alt="user's avatar" class="user-img card-img-top">
                <div class="user-text card-body">
                    <h5 class="user-name card-title"><span class="user-label">Name:</span> {{ $user->name }}</h5>
                    <p class="user-email card-text"><span class="user-label">Email:</span> {{ $user->email }}</p>
                    <a href="{{route('users.show', $user)}}" class="btn btn-primary">Read more</a>
                </div>

            </div>

        </div>
    @endforeach
</div>

@endsection
