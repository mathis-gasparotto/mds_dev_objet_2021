@extends('layout')

@section('content')

    <h1>Missions List</h1>
    <h3 class="mb-70">Client: {{ $client->name }}</h3>

    @if(!$client->missions->isEmpty())
        <div>
            <a href="{{ route('clients.index') }}" class="btn btn-warning actions mb-5">Go to the clients list</a>
        </div>
        <a href="{{ route('missions.create', $client) }}" class="btn btn-primary actions mb-5">Create a new mission</a>
        <div id="cards-container">
            @foreach($client->missions as $mission)
                <div class="card-container card mission-card" id="{{ $mission->id }}">
                    <div class="card-content">
                        <div class="card-body">
                            <h3 class="card-title mb-3">{{ $mission->title }}</h3>
                            <p class="card-text"><span class="card-label">Reference:</span> {{ $mission->ref }}</p>
                            @if(!$mission->missionLines->isEmpty())
                                @php
                                    $totalPrice = 0 ;
                                @endphp
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Unit Price</th>
                                        <th scope="col">Total Price</th>
                                        <th scope="col">Manage</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($mission->missionLines as $missionLine)
                                        <tr>
                                            <th scope="row">{{ $missionLine->title }}</th>
                                            <td>{{ $missionLine->quantity }} {{ $missionLine->unit }}</td>
                                            <td>{{ number_format($missionLine->unit_price,2) }} €</td>
                                            <td>{{ number_format($missionLine->quantity * $missionLine->unit_price,2) }} €</td>
                                            @php
                                                $totalPrice += $missionLine->quantity * $missionLine->unit_price;
                                            @endphp
                                            <td>
                                                <a href="{{route('missionLines.edit', $missionLine)}}" class="btn btn-primary actions">Edit</a>
                                                <form action="{{route('missionLines.destroy', $missionLine)}}" class="inline-block" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger actions">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <p class="card-text"><span class="card-label">Total price:</span> {{ number_format($totalPrice,2) }} €</p>
                                <p class="card-text"><span class="card-label">Down Payment percentage:</span> {{ $mission->down_payment }}% ({{ number_format(($mission->down_payment/100)*$totalPrice,2) }} €)</p>
                                @php
                                    $totalPrice = 0 ;
                                @endphp
                            @endif
                            @if(!$mission->missionLines->isEmpty())
                                <a href="{{route('quote.show', $mission)}}" class="btn btn-success actions">Generate Quote</a>
                            @endif
                            <a href="{{route('missions.edit', $mission)}}" class="btn btn-primary actions">Edit</a>
                            <a href="{{ route('missionLines.create', $mission) }}" class="btn btn-warning actions">Create a new mission lines</a>
                            <form action="{{route('missions.destroy', $mission)}}" class="inline-block" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger actions">Delete</button>
                            </form>
                        </div>

                    </div>

                </div>
            @endforeach
        </div>
        <a href="{{ route('missions.create', $client) }}" class="btn btn-primary actions mt-5">Create a new mission</a>
    @else
        <div class="alert alert-secondary w-30 m-auto">You don't have any missions registered for this client</div>
        <a href="{{ route('missions.create', $client) }}" class="btn btn-primary actions mt-5">Create a new mission</a>
        <a href="{{ route('clients.index') }}" class="btn btn-warning actions mt-5">Go to the clients list</a>
    @endif

@endsection
