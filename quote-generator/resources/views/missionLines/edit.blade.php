@extends('layout')

@section('content')

<container class="card card-form w-30">

    <h1 class="card-header text-center">Edit Mission Line</h1>
    <h3 class="text-center mt-2">Client: {{ $missionLine->mission->client->name }}</h3>
    <h3 class="text-center mt-2">Mission: {{ $missionLine->mission->title }}</h3>
    <h3 class="text-center mt-2">Mission Line: {{ $missionLine->title }}</h3>

    <div class="card-body">
        <form action="{{route('missionLines.update', $missionLine->id)}}" method="post">
            @method('PUT')
            @csrf
            <div class="form-floating mb-3">
                <input placeholder="Title" class="form-control @error('title') is-invalid @enderror" id="title" type="text" name="title" value="{{ old('title', $missionLine->title) }}">
                <label for="title" class="form-label form-required">Title</label>
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input placeholder="Quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantity" type="number" min="0" name="quantity" value="{{ old('quantity', $missionLine->quantity) }}">
                <label for="quantity" class="form-label">Quantity</label>
                @error('quantity')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input placeholder="Unit Price" class="form-control @error('unit_price') is-invalid @enderror" id="unit_price" type="number" min="0" step="0.01" name="unit_price" value="{{ old('unit_price', $missionLine->unit_price) }}">
                <label for="unit_price" class="form-label">Unit Price (in €)</label>
                @error('unit_price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input placeholder="Unit" class="form-control @error('unit') is-invalid @enderror" id="unit" type="text" name="unit" value="{{ old('unit', $missionLine->unit) }}">
                <label for="unit" class="form-label">Unit</label>
                @error('unit')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>

        </form>
    </div>

</container>

@endsection
