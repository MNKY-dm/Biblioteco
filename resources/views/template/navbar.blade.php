<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <i class="fas fa-film mr-2"></i>
            Catalog-Z
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link nav-link-1 @if(request()->routeIs("home.index") || request()->routeIs("home.detail")) active @endif " aria-current="page" href="/home">Photos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-2 @if(request()->routeIs("videos.index") || request()->routeIs("videos.detail")) active @endif" href="/videos">Videos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-3 @if(request()->routeIs("about")) active @endif" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-4 @if(request()->routeIs("contact")) active @endif" href="/contact">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
