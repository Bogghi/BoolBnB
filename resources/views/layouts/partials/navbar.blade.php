<nav class="navbar @if (Route::currentRouteName()  != 'homepage') nav-blue @endif navbar-expand-lg">
  <div class="@if (Route::currentRouteName()  == 'search') container-fluid
             @else container 
            @endif">
      {{-- logo --}}
      <div class="logo logo col-lg-1 col-md-8 col-sm-4 col-4">
          <a href="{{ route('homepage') }}">
            <img id="logo" src="{{ asset('img/boolbnb-logo-light.svg') }}" alt="BoolBnB">
          </a>
      </div>

       

      {{-- hamburger --}}
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
          <span class="fas fa-bars navbar-toggler-icon hambu"></span>
      </button>

      <div class="collapse navbar-collapse mt-1" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav">

              <!-- Authentication Links  only admin is log-->
              @if (Route::currentRouteName() == 'admin.apartment.index')
                  <li class="nav-item zindex pl-2">
                      <a class="nav-link" href="{{ route('admin.apartment.create') }}">Create a new apartment</a>
                  </li>
              @endif
              <!-- Authentication Links  only admin is log-->
              @if (Route::currentRouteName() != 'homepage')
                  <li class="nav-item zindex pl-2">
                      <a class="nav-link" href="{{ route('homepage') }}">Home</a>
                  </li>
              @endif

              @guest
                  {{-- Rgister & Log --}}
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
              @else
                {{-- User --}}
                <li class="nav-item zindex">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex justify-content-end" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    {{-- dropdown menu --}}
                    <div class="dropdown-menu drop-right mx-5" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('admin.apartment.index') }}">Your apartments</a>
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

      {{-- Search Bar --}}
      @if (Route::currentRouteName()  == 'search')
      <div class="searchbar searchbar-nav py-2 my-2">
          <form class="form-inline d-flex md-form form-sm form-color mt-2 " action="{{route('search')}}" method="POST" autocomplete="off">
              @csrf
              @method("POST")
              <div id="search-input"></div>
              <button class="search-btn" type="submit">
                  <i class="fas fa-search"></i>
              </button>
          </form>
      </div>
      @endif

  </div>
</nav>