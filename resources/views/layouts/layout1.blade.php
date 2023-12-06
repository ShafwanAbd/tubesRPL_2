<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('./css/css.css') }}">
    <link rel="stylesheet" href="{{ asset('./css/bootstrap.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-1KFh9HylpQAOGMVc"></script>
    <script type="text/javascript" src="{{ asset('js/javascript.js') }}"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>brys.co</title>

    @yield('head')
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('home') }}">
                brys.co
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item first">
                            <a class="nav-link" href="{{ url('sepatu') }}">Belanja</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('about') }}">Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('home') }}">Beranda</a>
                        </li>
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item first">
                            <a class="nav-link" href="{{ url('sepatu') }}">Belanja</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('about') }}">Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('home') }}">Beranda</a>
                        </li>
                        @if(Auth::user()->name == "ADMIN")
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('sepatu/create') }}">Buat Sepatu</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('konfirmasi') }}">Konfirmasi</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('profile') }}">
                                    Akun
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="containerRPL">
        @yield('content')
    </div>
</body>
</html>