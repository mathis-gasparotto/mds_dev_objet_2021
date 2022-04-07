@extends('layout')

@section('content')

<h1 class="text-center mb-5">Delete my Account</h1>
<p class="text-center mb-3">
    You are about to delete your account with your clients permanently.<br/>
    Are you sure to do that?
</p>
<form action="{{route('user.destroy')}}" class="inline-block" method="post">
    @method('DELETE')
    @csrf
    <a href="{{ route('user.show') }}" class="btn btn-primary actions">No, return to my account</a>
    <button type="submit" class="btn btn-danger actions">Yes, delete my account with my clients</button>
</form>
@endsection
