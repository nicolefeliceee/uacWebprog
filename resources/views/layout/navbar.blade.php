<nav class="navbar navbar-expand-lg bg-body-tertiary px-2">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/wishlist">Wishlist</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/friend">Friend</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/store">Store</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li> --}}
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown link
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li> --}}
            </ul>
            {{-- <ul class="navbar-nav ms-auto"> --}}
            @auth
                <ul class="navbar-nav ms-auto me-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/logout">Logout</a>
                    </li>
                </ul>
                <a href="/profile" class="img" style="background-image: url({{ asset('storage/' . auth()->user()->image) }}); width:50px; height:50px; background-size:cover; background-repeat:no-repeat; background-position:center; border-radius:50%"></a>
                {{-- <div class="img-fluid">
                    <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="">
                </div> --}}
            @else
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/register">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/login">Login</a>
                    </li>
                </ul>
            @endauth
            {{-- </ul> --}}
        </div>
    </div>
</nav>
