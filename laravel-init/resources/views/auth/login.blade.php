@extends('../layout')

@section('content')

    <container class="card card-form">

        <h1 class="card-header text-center">Login</h1>

        <div class="card-body">
            <form action="{{ route('auth.authenticate') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label form-required">Email:</label>
                    <input class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" type="email" name="email" required>
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
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="{{ route('password.forgotten') }}" class="mx-3">Forgot your password?</a>
            </form>
        </div>



    </container>



@endsection
