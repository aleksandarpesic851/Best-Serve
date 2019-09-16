<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
  <div class="container">

    <div class="navbar-wrapper">

      <div class="logo">
        <a href="/home" class="navbar-brand">
          <img src="{{ asset('material') }}/img/logo.png" width="100px" height="100px">
        </a>
      </div>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="/contact" class="nav-link">
            <i class="material-icons">contacts</i> {{ __('Contact Us') }}
          </a>
        </li>
        @guest()
        <li class="nav-item{{ $activePage == 'login' ? ' active' : '' }}">
          <a href="{{ route('login') }}" class="nav-link">
            <i class="material-icons">fingerprint</i> {{ __('Login') }}
          </a>
        </li>
        @endguest
        @auth()
        <li class="nav-item{{ $activePage == 'logout' ? ' active' : '' }}">
          <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="material-icons">fingerprint</i> {{ __('Logout') }}
          </a>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->