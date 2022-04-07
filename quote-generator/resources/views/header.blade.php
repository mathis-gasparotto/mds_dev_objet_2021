<header>
    <nav class="navbar navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('index') }}">Quote Generator</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Quote Generator</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        @auth
                            <li class="nav-item">
                                <a href="{{ route('user.show') }}" class="nav-link">Account</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    My Clients
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                                    <li><a href="{{ route('clients.index') }}" class="nav-link">My Clients List</a></li>
                                    <li><a href="{{ route('clients.create') }}" class="nav-link">Add a Client</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('auth.logout') }}" class="nav-link">Logout</a>
                            </li>                        @else
                            <li class="nav-item">
                                <a href="{{ route('auth.login') }}" class="nav-link">Login/Register</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
