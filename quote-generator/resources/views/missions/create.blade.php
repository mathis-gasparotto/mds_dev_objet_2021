@extends('layout')

@section('content')


    <container class="card card-form w-30">

        <h1 class="card-header text-center">Create a new mission</h1>
        <h3 class="text-center mt-2">Client: {{ $client->name }}</h3>

        <div class="card-body">
            <form action="{{ route('missions.store', $client) }}" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <input placeholder="Title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}" type="text" name="title">
                    <label for="title" class="form-label form-required">Title</label>
                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-floating mb-3">
                    <input placeholder="Reference" class="form-control @error('ref') is-invalid @enderror" id="ref" value="{{ old('ref') }}" type="text" name="ref">
                    <label for="ref" class="form-label form-required">Reference</label>
                    @error('ref')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-floating mb-3">
                    <input placeholder="Down payment percentage" class="form-control @error('down_payment') is-invalid @enderror" id="down_payment" value="{{ old('down_payment') }}" type="number" step="0.01" name="down_payment">
                    <label for="down_payment" class="form-label form-required">Down payment percentage (in %)</label>
                    @error('down_payment')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>

    </container>

    <div class="alert alert-warning w-40 m-auto mt-3">Don't forget to register the mission lines for that mission, after that</div>


@endsection
