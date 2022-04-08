@extends('layout')

@section('content')


    <container class="card card-form w-30">

        <h1 class="card-header text-center">Create a new mission line</h1>
        <h3 class="text-center mt-2">Client: {{ $mission->client->name }}</h3>
        <h3 class="text-center mt-2">Mission: {{ $mission->title }}</h3>

        <div class="card-body">
            <form action="{{ route('missionLines.store', $mission) }}" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <input placeholder="Title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}" type="text" name="title">
                    <label for="title" class="form-label form-required">Title</label>
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-floating mb-3">
                    <input placeholder="Quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantity" value="{{ old('quantity') }}" type="number" name="quantity" min="0">
                    <label for="quantity" class="form-label form-required">Quantity</label>
                    @error('quantity')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-floating mb-3">
                    <input placeholder="Unit price" class="form-control @error('unit_price') is-invalid @enderror" id="unit_price" value="{{ old('unit_price') }}" type="number" name="unit_price" step="0.01" min="0">
                    <label for="unit_price" class="form-label form-required">Unit price (in €)</label>
                    @error('unit_price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-floating mb-3">
                    <input placeholder="Unit (ex: h)" class="form-control @error('unit') is-invalid @enderror" id="unit" value="{{ old('unit') }}" type="text" name="unit">
                    <label for="unit" class="form-label">Unit (ex: h)</label>
                    @error('unit')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <button type="submit" class="btn btn-primary actions">Create</button>
                @if(!$mission->missionLines->isEmpty())
                    <a href="{{ route('missions.index', $mission->client) }}#{{ $mission->id }}" class="btn btn-warning actions">Back to the missions list</a>
                @endif
            </form>
        </div>

    </container>



@endsection
