<form action="{{route('users.show', $user->id)}}" method="post">
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input class="form-control" id="name" type="text" name="name" value="{{ $user->name }}" required>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Email:</label>
        <input class="form-control" id="email" type="email" name="email" value="{{ $user->email }}" required>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Avatar URL:</label>
        <input class="form-control" id="avatar_url" type="text" name="avatar_url" value="{{ $user->avatar_url }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>

</form>
