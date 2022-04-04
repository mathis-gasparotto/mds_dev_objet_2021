<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Quote generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<header>
    <nav>
        <ul class="nav nav-tabs">

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
    .actions {
        margin: 2px 0px;
    }
    .inline-block {
        display: inline-block;
    }
</style>
</html>
