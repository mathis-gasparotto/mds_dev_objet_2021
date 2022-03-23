@extends('layout')

@section('content')

<div class="user-container card mx-auto">
    <div class="user-content">
        <img src="{{ $user->avatar_url }}" alt="user's avatar" class="user-img card-img-top">
        <div class="user-text card-body">
            <h5 class="user-name card-title"><span class="user-label">Name:</span> {{ $user->name }}</h5>
            <p class="user-email card-text"><span class="user-label">Email:</span> {{ $user->email }}</p>
            <p class="user-status card-text"><span class="user-label">Status:</span> {{ $user->role }}</p>
            <a href="{{route('user.edit')}}" class="btn btn-primary actions">Edit</a>
            @if ($user->role !== App\Enums\RoleEnum::Admin->value)
                <form action="{{ route('user.destroy') }}" class="inline-block" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger actions">Delete</button>
                </form>
            @endif
        </div>

    </div>

</div>

@endsection
