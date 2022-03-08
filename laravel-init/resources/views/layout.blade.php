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
            <li class="nav-item">
                <a href="http://127.0.0.1:8000/users" class="nav-link">User List</a>
            </li>
            <li class="nav-item">
                <a href="http://127.0.0.1:8000/users/create" class="nav-link">Create new user</a>
            </li>
        </ul>
    </nav>
</header>
<main>
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
    form {
        width: 50%;
        margin: auto;
    }
    footer {
        margin-top: 50px;
    }
</style>
</html>
