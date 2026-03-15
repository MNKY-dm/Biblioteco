@extends('template.template')

@section('title', "Biblioteco - Accueil")

@section('content')

    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="{{ asset("css/templatemo/img/hero.jpg") }}">
        <div class="tm-search-wrapper">
            <form class="d-flex tm-search-form" action="/catalog">
                <input class="form-control tm-search-input" type="search"
                       placeholder="Search" aria-label="Search" id="search-bar" name="q">
                <button class="btn btn-outline-success tm-search-btn" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <div id="search-results"></div>
        </div>
    </div>

    <div class="container-fluid tm-container-content tm-mt-60">
        <h2 class="col-6 tm-text-primary">
            Certains de nos livres :
        </h2>
        <div class="row tm-mb-90 tm-gallery">
            @foreach($books as $book)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="{{ Storage::url($book->image_path) }}" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>{{ $book->name }}</h2>
                            <a href="/detail-{{ $book->id }}">View more</a>
                        </figcaption>
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-light">{{ $book->published_at->format("d/m/Y") }}</span>
                        <span>{{ $book->name }}</span>
                    </div>
                </div>
            @endforeach
            <!-- row -->
        </div>
    </div> <!-- container-fluid, tm-container-content -->
@endsection
