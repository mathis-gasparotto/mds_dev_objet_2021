@extends('layout')

@section('content')

<h1 class="text-center mb-5">My Account</h1>

<div class="dual-card mb-4">
    <container class="card card-form m-0">

        <h3 class="card-header text-center">Personal informations</h3>

        <div class="card-body">

            <p class="card-text"><span class="card-label">Name:</span> {{ $user->name }}</p>
            <p class="card-text"><span class="card-label">Email:</span> {{ $user->email }}</p>
            <p class="card-text"><span class="card-label">Contact Email:</span> {{ $user->contact_email }}</p>
            <p class="card-text"><span class="card-label">Phone:</span> {{ $user->phone }}</p>
            <p class="card-text"><span class="card-label">Address:</span> {{ $user->address }}</p>

        </div>
    </container>
    <container class="card card-form m-0">

        <h3 class="card-header text-center">Bank informations</h3>

        <div class="card-body">

            <p class="card-text"><span class="card-label">Bank Account Owner:</span> {{ $user->bank_account_owner }}</p>
            <p class="card-text"><span class="card-label">Bank Domiciliation:</span> {{ $user->bank_domiciliation }}</p>
            <p class="card-text"><span class="card-label">RIB:</span> {{ $user->bank_rib }}</p>
            <p class="card-text"><span class="card-label">IBAN:</span> {{ $user->bank_iban }}</p>
            <p class="card-text"><span class="card-label">BIC:</span> {{ $user->bank_bic }}</p>

        </div>
    </container>
</div>
<div>
    <container class="card card-form">

        <h3 class="card-header text-center">Company informations</h3>

        <div class="card-body">

            <p class="card-text"><span class="card-label">Company Name:</span> {{ $user->company_name }}</p>
            <p class="card-text"><span class="card-label">SIRET:</span> {{ $user->company_siret }}</p>
            <p class="card-text"><span class="card-label">APE:</span> {{ $user->company_ape }}</p>

        </div>
    </container>
</div>
<div class="cards-btn mt-4">
    <a href="{{route('user.edit')}}" class="btn btn-primary actions">Edit Account</a>
    <a href="{{route('user.delete')}}" class="btn btn-danger actions">Delete Account</a>
</div>
@endsection
