@extends('layout')

@section('content')


    <container class="card card-form">

        <h1 class="card-header text-center">Add a new client</h1>

        <div class="card-body">
            <form action="{{ route('clients.store') }}" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <input placeholder="Name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{old('name')}}" type="text" name="name">
                    <label for="name" class="form-label form-required">Name</label>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-floating mb-3">
                    <input placeholder="Email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{old('email')}}" type="text" name="email">
                    <label for="email" class="form-label">Email</label>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-floating mb-3">
                    <input placeholder="Phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{old('phone')}}" type="text" name="phone">
                    <label for="phone" class="form-label">Phone</label>
                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-floating mb-3">
                    <textarea placeholder="Address" class="form-control @error('address') is-invalid @enderror" id="address" name="address">{{ old('address') }}</textarea>
                    <label for="address" class="form-label form-required">Address</label>
                    @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <div class="form-floating mb-3">
                    <input placeholder="Siret" class="form-control @error('siret') is-invalid @enderror" id="siret" value="{{old('siret')}}" type="text" name="siret">
                    <label for="siret" class="form-label form-required">Siret</label>
                    @error('siret')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>

    </container>


@endsection
