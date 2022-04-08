@extends('layout')

@section('content')

<container class="card card-form w-30">

    <h1 class="card-header text-center">Edit Mission</h1>
    <h3 class="text-center mt-2">Client: {{ $mission->client->name }}</h3>
    <h3 class="text-center mt-2">Mission: {{ $mission->title }}</h3>

    <div class="card-body">
        <form action="{{route('missions.update', $mission->id)}}" method="post">
            @method('PUT')
            @csrf
            <div class="form-floating mb-3">
                <input placeholder="Title" class="form-control @error('title') is-invalid @enderror" id="title" type="text" name="title" value="{{ old('title', $mission->title) }}">
                <label for="title" class="form-label form-required">Title</label>
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input placeholder="Reference" class="form-control @error('ref') is-invalid @enderror" id="ref" type="text" name="ref" value="{{ old('ref', $mission->ref) }}">
                <label for="ref" class="form-label">Reference</label>
                @error('ref')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input placeholder="Down Payment" class="form-control @error('down_payment') is-invalid @enderror" id="down_payment" type="number" step="0.01" name="down_payment" value="{{ old('down_payment', $mission->down_payment) }}">
                <label for="down_payment" class="form-label">Down Payment percentage (in %)</label>
                @error('down_payment')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>

        </form>
    </div>

</container>

<a href="{{ route('missionLines.index', $mission) }}" class="btn btn-warning actions">Edit mission lines</a>

@endsection
