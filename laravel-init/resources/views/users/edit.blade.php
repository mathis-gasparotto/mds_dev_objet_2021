<container class="card card-form">

    <h1 class="card-header text-center">Edit</h1>

    <div class="card-body">
        <form action="{{route('users.update', $user->id)}}" method="post">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label form-required">Name:</label>
                <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ $user->name }}" required>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label form-required">Email:</label>
                <input class="form-control @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ $user->email }}" required>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="avatar_url" class="form-label form-required">Avatar URL:</label>
                <input class="form-control @error('avatar_url') is-invalid @enderror" id="avatar_url" type="text" name="avatar_url" value="{{ $user->avatar_url }}" required>
                @error('avatar_url')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>

        </form>
    </div>



</container>

