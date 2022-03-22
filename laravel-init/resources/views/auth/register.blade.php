@extends('../layout')

@section('content')

    <container class="card card-form">

    <h1 class="card-header text-center">Register</h1>

        <div class="card-body">
            <form action="{{route('auth.registration')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label form-required">Name:</label>
                    <input class="form-control @error('name') is-invalid @enderror" id="name" value="{{old('name')}}" type="text" name="name" required>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="email" class="form-label form-required">Email:</label>
                    <input class="form-control @error('email') is-invalid @enderror" id="email" value="{{old('email')}}" type="email" name="email" required>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="password" class="form-label form-required">Password:</label>
                    <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" required>
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label form-required">Password Confirmation:</label>
                    <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" required>

                </div>
                <div class="mb-3">
                    <label for="avatar_url" class="form-label form-required">Avatar URL:</label>
                    <input class="form-control @error('avatar_url') is-invalid @enderror" id="avatar_url" value="{{old('avatar_url')}}" type="text" name="avatar_url" required>
                    @error('avatar_url')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </container>

@endsection
