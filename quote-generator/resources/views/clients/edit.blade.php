@extends('layout')

@section('content')

<container class="card card-form w-30">

    <h1 class="card-header text-center">Edit Client</h1>
    <p class="text-center mt-3">{{ $client->name }}</p>

    <div class="card-body">
        <form action="{{route('clients.update', $client->id)}}" method="post">
            @method('PUT')
            @csrf
            <div class="form-floating mb-3">
                <input placeholder="Name" class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name', $client->name) }}">
                <label for="name" class="form-label form-required">Name</label>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input placeholder="Reference" class="form-control @error('ref') is-invalid @enderror" id="ref" type="text" name="ref" value="{{ old('ref', $client->ref) }}">
                <label for="ref" class="form-label form-required">Reference</label>
                @error('ref')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input placeholder="Email" class="form-control @error('email') is-invalid @enderror" id="email" type="text" name="email" value="{{ old('email', $client->email) }}">
                <label for="name" class="form-label">Email</label>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input placeholder="Phone" class="form-control @error('phone') is-invalid @enderror" id="phone" type="text" name="phone" value="{{ old('phone', $client->phone) }}">
                <label for="phone" class="form-label">Phone</label>
                @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <textarea placeholder="Address" class="form-control h-100 @error('address') is-invalid @enderror" id="address" name="address">{{ old('address', $client->address) }}</textarea>
                <label for="phone" class="form-label form-required">Address</label>
                @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input placeholder="SIRET" class="form-control @error('siret') is-invalid @enderror" id="siret" type="text" name="siret" value="{{ old('siret', $client->siret) }}">
                <label for="siret" class="form-label form-required">SIRET</label>
                @error('siret')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>

        </form>
    </div>



</container>

@endsection
