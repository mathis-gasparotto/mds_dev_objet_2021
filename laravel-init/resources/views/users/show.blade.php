@extends('layout')

@section('content')

<div class="user-container card">
    <div class="user-content">
        <img src="{{ $user->avatar_url }}" alt="user's avatar" class="user-img card-img-top">
        <div class="user-text card-body">
            <h5 class="user-name card-title"><span class="user-label">Name:</span> {{ $user->name }}</h5>
            <p class="user-email card-text"><span class="user-label">Email:</span> {{ $user->email }}</p>
            <a href="{{route('users.show', $user)}}/edit" class="btn btn-primary">Edit</a>

            <form action="{{route('users.destroy', $user)}}" class="btn" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>

    </div>

</div>

@endsection
