@extends('layout')

@section('content')

    <h1 class="mb-70">Users List</h1>
    <a href="{{ route('clients.create') }}" class="btn btn-primary mb-5">Create a new client</a>
    <div id="clients-container">
        @foreach($clients as $client)
            <div class="client-container card">
                <div class="client-content">
                    <div class="client-text card-body">
                        <h3 class="client-name card-title mb-3">{{ $client->name }}</h3>
                        @if($client->email)
                        <p class="client-email card-text"><span class="client-label">Email:</span> {{ $client->email }}</p>
                        @endif
                        @if($client->phone)
                        <p class="client-phone card-text"><span class="client-label">Phone:</span> {{ $client->phone }}</p>
                        @endif
                        <p class="client-address card-text"><span class="client-label">Address:</span> {{ $client->address }}</p>
                        <p class="client-siret card-text"><span class="client-label">SIRET:</span> {{ $client->siret }}</p>
                        <a href="{{route('clients.edit', $client)}}" class="btn btn-primary actions">Edit</a>
                        <a href="#" class="btn btn-warning actions">Create quote from</a>
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
    <a href="{{ route('clients.create') }}" class="btn btn-primary mt-5">Create a new client</a>

@endsection
