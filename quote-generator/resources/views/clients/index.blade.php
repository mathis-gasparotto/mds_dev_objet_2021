@extends('layout')

@section('content')

    <h1 class="mb-70">Clients List</h1>
    @if(!$clients->isEmpty())
        <a href="{{ route('clients.create') }}" class="btn btn-primary actions mb-5">Add a new client</a>
        <div id="cards-container">
            @foreach($clients as $client)
                <div class="card-container card" id="{{ $client->id }}">
                    <div class="card-content">
                        <div class="card-body">
                            <h3 class="card-title mb-3">{{ $client->name }}</h3>
                            <p class="card-text"><span class="card-label">Reference:</span> {{ $client->ref }}</p>
                        @if($client->email)
                            <p class="card-text"><span class="card-label">Email:</span> {{ $client->email }}</p>
                            @endif
                            @if($client->phone)
                            <p class="card-text"><span class="card-label">Phone:</span> {{ $client->phone }}</p>
                            @endif
                            <p class="card-text"><span class="card-label">Address:</span> {{ $client->address }}</p>
                            <p class="card-text"><span class="card-label">SIRET:</span> {{ $client->siret }}</p>
                            <a href="{{route('clients.edit', $client)}}" class="btn btn-primary actions">Edit</a>
                            <a href="{{ route('missions.create', $client) }}" class="btn btn-success actions">Create mission from</a>
                            <a href="{{ route('missions.index', $client) }}" class="btn btn-warning actions">View all his missions</a>
                            <form action="{{route('clients.destroy', $client)}}" class="inline-block" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger actions">Delete</button>
                            </form>
                        </div>

                    </div>

                </div>
            @endforeach
        </div>
        <a href="{{ route('clients.create') }}" class="btn btn-primary actions mt-5">Add a new client</a>
    @else
        <div class="alert alert-secondary w-30 m-auto">You don't have any clients registered</div>
        <a href="{{ route('clients.create') }}" class="btn btn-primary actions mt-5">Add a new client</a>
        <a href="{{ route('index') }}" class="btn btn-warning actions mt-5">Go to the home page</a>
    @endif

@endsection
