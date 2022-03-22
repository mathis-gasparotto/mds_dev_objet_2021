@extends('layout')

@section('content')

    @if (session('status'))
        <div class="alert alert-success status">{{ session('status') }}</div>
    @endif

<div class="user-container card mx-auto">
    <div class="user-content">
        <img src="{{ $user->avatar_url }}" alt="user's avatar" class="user-img card-img-top">
        <div class="user-text card-body">
            <h5 class="user-name card-title"><span class="user-label">Name:</span> {{ $user->name }}</h5>
            <p class="user-email card-text"><span class="user-label">Email:</span> {{ $user->email }}</p>
            <p class="user-status card-text"><span class="user-label">Status:</span> {{ $user->role }}</p>
            @if (\Illuminate\Support\Facades\Auth::user()->role == App\Enums\RoleEnum::Admin->value || \Illuminate\Support\Facades\Auth::user() == $user)
                <a href="{{route('users.edit', $user)}}" class="btn btn-primary">Edit</a>
                    @if (\Illuminate\Support\Facades\Auth::user()->role == App\Enums\RoleEnum::Admin->value && \Illuminate\Support\Facades\Auth::user() != $user)
                        <a href="{{route('users.changeRole', $user)}}" class="btn btn-secondary">Change role</a>
                    @endif
                @if (\Illuminate\Support\Facades\Auth::user()->role !== App\Enums\RoleEnum::Admin->value || \Illuminate\Support\Facades\Auth::user() != $user)
                    <form action="{{route('users.destroy', $user)}}" class="btn" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                @endif
            @endif
</div>

</div>

</div>

@endsection
