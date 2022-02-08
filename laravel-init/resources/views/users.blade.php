<ul>
    @foreach($users as $user)
        <li><img src="{{ $user->avatar_url }}" width="100" alt="user's avatar"> <a href="{{route('users.show', $user->id)}}">{{ $user->name }} ({{ $user->email }})</a></li>
    @endforeach
</ul>
