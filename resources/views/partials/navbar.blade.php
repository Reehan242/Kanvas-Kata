{{-- Navbar Start --}}
{{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
    <div class="container">
        <a class="navbar-brand" href="/">KanvasKata</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'posts' ? 'active' : '' }}" href="/posts"><i
                            class="bi bi-house-door"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $active === 'categories' ? 'active' : '' }}" href="/categories"><i
                            class="bi bi-tags"></i> Post Categories</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Welcome back, {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link {{ $active === 'login' ? 'active' : '' }}"><i
                                class="bi bi-box-arrow-in-right"></i> Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav> --}}
{{-- Navbar End --}}

<nav class="navbar navbar-expand-lg transparent-navbar py-3" id="navbarMain">
    <div class="container">
        <a class="navbar-brand text-gradient" href="/">KanvasKata</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link"
                        href="{{ Route::currentRouteName() === 'index' ? '#banner' : route('index') . '#banner' }}"><i
                            class="bi bi-house-door"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="{{ Route::currentRouteName() === 'index' ? '#all-posts' : route('index') . '#all-posts' }}"><i
                            class="bi bi-eye"></i></i></i> See Posts</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard/posts/create"><i class="bi bi-pen"></i></i> Write Posts</a>
                    </li>
                @endauth
                <li class="nav-item">
                    <a class="nav-link"
                        href="{{ Route::currentRouteName() === 'index' ? '#categories' : route('index') . '#categories' }}"><i
                            class="bi bi-tags"></i> Post Categories</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Welcome back, <br> {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i>
                                    Dashboard</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                        Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link {{ $active === 'login' ? 'active' : '' }}"><i
                                class="bi bi-box-arrow-in-right"></i> Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
