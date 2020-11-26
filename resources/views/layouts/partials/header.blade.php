{{-- Header top --}}
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light zindex">
        <div class="container">
            {{-- logo --}}
            <div class="logo">
                <a href="{{ route('homepage') }}">
                    <img id="logo" src="{{ asset('img/boolbnb-logo-dark.svg') }}" alt="BoolBnB">
                </a>
            </div>

            {{-- hamburger --}}
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav">

                    <!-- Authentication Links  only admin is log-->
                    @if (Route::currentRouteName() == 'admin.apartment.index')
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary" href="{{ route('admin.apartment.create') }}">Create a new apartment</a>
                        </li>
                    @endif
                    <!-- Authentication Links  only admin is log-->
                    @if (Route::currentRouteName() != 'homepage')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('homepage') }}">Home</a>
                        </li>
                    @endif

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            {{-- dropdown menu --}}
                            <div class="dropdown-menu dropdown-menu-right mb-5" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.apartment.index') }}">I tuoi appartamenti</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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
</header>