@extends('layout')

@section('content')

    <h1>Mission Lines List</h1>
    <h3>Client: {{ $mission->client->name }}</h3>
    <h3 class="mb-70">Mission: {{ $mission->title }}</h3>

    @if(!$mission->missionLines->isEmpty())
        <div>
            <a href="{{ route('missions.index', $mission->client) }}" class="btn btn-warning actions mb-5">Go to the missions list</a>
        </div>
        <a href="{{ route('missionLines.create', $mission) }}" class="btn btn-primary actions mb-5">Create a new mission</a>

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
                    <td>{{ $missionLine->unit_price }} €</td>
                    <td>{{ number_format($missionLine->quantity * $missionLine->unit_price,2) }} €</td>
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
        <a href="{{ route('missionLines.create', $mission) }}" class="btn btn-primary actions mt-5">Create a new mission</a>

    @else
        <div class="alert alert-danger w-30 m-auto">You don't have any mission lines registered for this mission</div>
        <a href="{{ route('missionLines.create', $mission) }}" class="btn btn-primary actions mt-5">Create a new mission</a>
        <a href="{{ route('missions.index', $mission->client) }}" class="btn btn-warning actions mt-5">Go to the missions list</a>
    @endif

@endsection
