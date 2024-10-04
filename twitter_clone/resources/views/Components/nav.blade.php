<nav class="navbar navbar-expand-lg bg-dark border-bottom border-bottom-dark ticky-top bg-body-tertiary"
    data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand fw-light" href="/"><span class="fas fa-brain me-1"> </span>Twitter Clone</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.profile',auth()->user()->id)}}">Profile</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{route('auth.session.logout')}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="nav-link">Log out</button>
                    </form>
                </li>
                @endauth

                @guest
                <li class="nav-item">
                    <a class="nav-link {{request()->is('login') ? 'active' : ''}}" aria-current="page"
                        href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{request()->is('register') ? 'active' : ''}}" href="/register">Register</a>
                </li>
                @endguest


            </ul>
        </div>
    </div>
</nav>