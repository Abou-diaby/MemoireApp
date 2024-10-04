<style>
    img {
        max-width: 30%;
        height: auto;
    }

    .navbar-light.bg-light {
        background-color: #F5E050 !important;
    }

    .navbar-light .navbar-brand,
    .navbar-light .nav-link,
    .navbar-light .btn {
        color: #000000;
    }

    .navbar-light .nav-link.active {
        font-weight: bold;
        color: #FFFFFF;
    }

    .navbar-light .btn-light.dropdown-toggle {
        background-color: #F5E050;
        border-color: #F5E050;
    }

    .navbar-light .dropdown-menu {
        background-color: #F5E050;
    }

    .navbar-light .dropdown-menu .dropdown-item {
        color: #000000;
    }

    .navbar-light .dropdown-menu .dropdown-item:hover {
        background-color: #E5C750;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
    <a class="navbar-brand" href="/"><img src="{{ asset('images/logomonme.png') }}" alt="Logo"></a>
      <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link @if(Request::route()->getName() == 'app_home') active @endif" aria-current="page" href="{{ route('app_home') }}">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @if(Request::route()->getName() == 'app_about') active @endif" aria-current="page" href="{{ route('app_about') }}">A propos</a>
          </li>
        </ul>
      </div>
      <div class="btn-group">
        @guest
            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i>
                Mon compte
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('login') }}">Se connecter</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.login') }}">Connexion Admin</a></li>
                <li><a class="dropdown-item" href="{{ route('register') }}">S'inscrire</a></li>

            </ul>
        @endguest

        @auth('web')
            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-user" aria-hidden="true"></i>
                {{ Auth::user()->name}}
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('app_dashboard') }}">Tableau de bord</a></li>
                <li><a class="dropdown-item" href="{{ route('app_logout') }}">Se déconnecter</a></li>
            </ul>
        @endauth

        @auth('admin')
            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-user" aria-hidden="true"></i>
                {{ Auth::guard('admin')->user()->name}}
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Tableau de bord</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.logout') }}">Se déconnecter</a></li>
            </ul>
        @endauth
      </div>
    </div>
  </nav>
