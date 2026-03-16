<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="/home">
            <svg class="lh-32 navicon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#3399CC"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M4 19V6.2C4 5.0799 4 4.51984 4.21799 4.09202C4.40973 3.71569 4.71569 3.40973 5.09202 3.21799C5.51984 3 6.0799 3 7.2 3H16.8C17.9201 3 18.4802 3 18.908 3.21799C19.2843 3.40973 19.5903 3.71569 19.782 4.09202C20 4.51984 20 5.0799 20 6.2V17H6C4.89543 17 4 17.8954 4 19ZM4 19C4 20.1046 4.89543 21 6 21H20M9 7H15M9 11H15M19 17V21" stroke="#3399CC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
            Biblioteco
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link nav-link-1 @if(request()->routeIs("home") || request()->routeIs("home")) active @endif " aria-current="page" href="/home">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-2 @if(request()->routeIs("catalog")) active @endif" href="/catalog">Catalogue de livres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-3 @if(request()->routeIs("about")) active @endif" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-4 @if(request()->routeIs("contact")) active @endif" href="/contact">Contact</a>
                </li>
                <li class="nav-item">
                    @auth
                    <div class="dropdown">
                            <button class="nav-link nav-link-5" data-bs-toggle="dropdown">{{ auth()->user()->surname }}</button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item text-primary tm-dropdown-item" href="/my-profile">Mon profil</a>
                                <a class="dropdown-item text-primary tm-dropdown-item" href="/cart">Mon panier</a>
                                <a class="dropdown-item text-primary tm-dropdown-item" href="/my-borrowings">Mes emprunts</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-primary tm-dropdown-item">
                                        Se déconnecter
                                    </button>
                                </form>
                            </div>

                    </div>
                    @endauth
                    @guest
                        <a href="/login" class="nav-link nav-link-5">Se connecter</a>
                    @endguest
                </li>
            </ul>
        </div>
    </div>
</nav>
