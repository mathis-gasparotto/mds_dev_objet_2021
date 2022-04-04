@extends('../layout')

@section('content')

    <a href="{{ route('auth.redirect') }}" class="btn btn-primary">Login with GitHub</a>

@endsection
