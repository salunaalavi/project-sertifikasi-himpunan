<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('img/bike-icon.png') }}" alt="" width="45" height="45"
                class="d-inline-block align-center">
            <a style="color:#0C68D8;">City</a> <a style="color:#B58411;">Ride</a>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Categories' ? 'active' : '' }}" href="/categories">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Bikes' ? 'active' : '' }}" href="/bikes">Bikes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Rental' ? 'active' : '' }}" href="/rents">My</a>
                </li>
            </ul>
            @auth
                <form class="d-flex" action="{{ url('/logout') }}" method="post">
                    @csrf
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#Ubah">
                            {{ auth()->user()->username }}
                        </button>
                        <button type="submit" class="btn btn-outline-danger">
                            <a>Keluar</a>
                        </button>
                    </div>
                </form>
            @endauth
        </div>
    </div>
</nav>
</div>
