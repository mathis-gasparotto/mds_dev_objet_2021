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
                    <a href="{{route('users.show', $user)}}" class="btn btn-info actions">Read more</a>
                    @if (\Illuminate\Support\Facades\Auth::user()->role == App\Enums\RoleEnum::Admin->value || \Illuminate\Support\Facades\Auth::user() == $user)
                        <a href="{{route('users.edit', $user)}}" class="btn btn-primary actions">Edit</a>
                        @if (\Illuminate\Support\Facades\Auth::user()->role == App\Enums\RoleEnum::Admin->value && \Illuminate\Support\Facades\Auth::user() != $user)
                            <a href="{{route('users.changeRole', $user)}}" class="btn btn-secondary actions">Change role</a>
                        @endif
                        @if (\Illuminate\Support\Facades\Auth::user()->role !== App\Enums\RoleEnum::Admin->value || \Illuminate\Support\Facades\Auth::user() != $user)
                            <form action="{{route('users.destroy', $user)}}" class="inline-block" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger actions">Delete</button>
                            </form>
                        @endif
                    @endif
                </div>

            </div>

        </div>
    @endforeach
</div>

@endsection
