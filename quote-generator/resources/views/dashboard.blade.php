@extends('../layout')

@section('content')
    <h3>Hi {{ \Illuminate\Support\Facades\Auth::user()->name }}!</h3>
    <a href="{{ route('clients.index') }}" class="btn btn-primary actions">Go to my Clients List</a>
    <a href="{{ route('clients.create') }}" class="btn btn-success actions">Add a new Client</a>
@endsection
