<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="/">Horse Tracker</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <!--doesn't look like we are going to need these extra pages so the links have been commented
          out
        <li class="nav-item active">
          <a class="nav-link" href="/" tabindex="-1" aria-disabled="true">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about" tabindex="-1" aria-disabled="true">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/services" tabindex="-1" aria-disabled="true">Services</a>
        </li>
      -->
       
      
  
  <!-- Right Side Of Navbar -->
  <!--<ul class="navbar-nav ml-auto">-->
    <!-- Authentication Links -->
    @guest
    @if (Route::has('register'))
  
    <li class="nav-item">
    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
    </li>
    </ul>
    @endguest
  
    @else
  
    <li class="nav-item">
      <a class="nav-link" href="/posts" tabindex="-1" aria-disabled="true">Ride Log</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/posts/create" tabindex="-1" aria-disabled="true">Create Post</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/horses" tabindex="-1" aria-disabled="true">Horses</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/horses/create" tabindex="-1" aria-disabled="true">Create Horse</a>
    </li>
  
                <div class="dropdown">
  
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
  
                            {{ Auth::user()->name }} <span class="caret"></span>
                  </button>
                  <div class="dropdown-menu">
  
                        <a class="dropdown-item" href="/home">Dashboard</a>
  
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                  </div>
                </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            @endif
  </ul>
    </div>
  </nav>