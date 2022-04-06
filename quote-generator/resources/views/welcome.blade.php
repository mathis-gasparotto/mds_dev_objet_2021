@extends('../layout')

@section('content')
    @auth
        <h3>Hi {{ \Illuminate\Support\Facades\Auth::user()->name }}!</h3>
    @endauth
@endsection
