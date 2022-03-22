@extends('../layout')

@section('content')

    <container class="card card-form">

        <h2 class="card-header text-center">Edit User Role</h2>
        <h5 class="card-header text-center">{{ $user->name }}</h5>

        <div class="card-body">
            <form action="{{ route('users.updateRole', $user->id) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="role" class="form-label form-required">Role:</label>
                    <select class="form-select @error('role') is-invalid @enderror" aria-label="Default select example" id="role" name="role">
                        @foreach(\App\Enums\RoleEnum::cases() as $case )
                            <option value="{{ $case->value }}" @if ($user->role == $case->value ) selected @endif>{{ $case->name }}</option>
                        @endforeach
                    </select>
                    @error('role')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>



    </container>



@endsection
