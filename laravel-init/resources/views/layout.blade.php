<!DOCTYPE html>
<html>
<head>
    <title>Introduction to laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<header>
    <nav>
        <ul class="nav nav-tabs">
            @auth
                <li class="nav-item">
                    <a href="{{ route('user.dashboard') }}" class="nav-link">Dashboard</a>
                </li>
                @if (\Illuminate\Support\Facades\Auth::user()->role == App\Enums\RoleEnum::Admin->value)
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">User List</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.create') }}" class="nav-link">Create new user</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('auth.logout') }}" class="nav-link">Logout</a>
                </li>
            @else
                <li class="nav-item">
                    <a href="{{ route('auth.login') }}" class="nav-link">Log in</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('auth.register') }}" class="nav-link">Register</a>
                </li>
            @endif
        </ul>
    </nav>
    @auth
        Hello {{ \Illuminate\Support\Facades\Auth::user()->name }}!
    @endauth
</header>
<main>
    @if (session('error-perm'))
        <div class="alert alert-danger status">{{ session('error-perm') }}</div>
    @endif

    @yield('content')
</main>
<footer>
</footer>
</body>
<style>
    body {

    }
    .user-label {
        font-weight: bold;
    }
    .user-container {
        margin-bottom: 50px;
        width: 20rem;
    }
    .user-container .user-img {
        height: 15rem;
        object-fit: cover;
    }
    header {
        margin-bottom: 70px;
    }
    #users-container {
        width: 80%;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-evenly;
        margin: auto;
    }
    .card-form {
        width: 30%;
        margin: auto;
    }
    footer {
        margin-top: 50px;
    }
    .form-required::after {
        content: "*";
        color: red;
        margin-left: 3px;
    }
    .status {
        width: 30%;
        margin: auto;
        margin-bottom: 50px;
        text-align: center;
    }
</style>
</html>
