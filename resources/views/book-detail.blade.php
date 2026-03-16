@extends("template.template")
@section('title', 'Biblioteco - Détails photo')

@section('content')
    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="{{ asset("css/templatemo/img/hero.jpg") }}">
        @include('component.search-bar')
    </div>

    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary">{{ $book->name }}</h2>
        </div>
        <div class="row tm-mb-90">
            <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
                <img src="{{ Storage::url($book->image_path) }}" alt="Image" class="img-fluid">
            </div>
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                <div class="tm-bg-gray tm-video-details">
                    <p class="mb-4">
                        {{ $book->summary }}
                    </p>
                    @foreach($book->categories as $category)
                        <p class="h-2 text-primary">{{ $category->name }}</p>
                    @endforeach
                    <div class="text-center mb-5">
                        <a href="/borrow-{{ $book->id }}" class="btn btn-primary tm-btn-big @if($book->status !== "AVAILABLE") disabled @endif">Emprunter</a>
                    </div>
                    <div class="mb-4 d-flex flex-wrap">
                        <div class="mr-4 mb-2">
                            <span class="tm-text-gray-dark">Disponibilité : </span><span class="tm-text-primary"> @if($book->status === "AVAILABLE") Disponible à l'emprunt @else Déjà emprunté @endif</span>
                        </div>
                        @if($book->status === "BORROWED")
                            <div class="mr-4 mb-2">
                                <span class="tm-text-gray-dark">Retour : </span><span class="tm-text-primary">Retour prévu avant le {{ $book->borrowings()->first()?->deadline->addDays(1)->format('d/m/Y') }}</span>
                            </div>
                        @endif
                        <div class="mr-4 mb-2">
                            <span class="tm-text-gray-dark">Langue: </span><span class="tm-text-primary">{{ $book->language }}</span>
                        </div>
                        <div class="mr-4 mb-2">
                            <span class="tm-text-gray-dark">Publié le : </span><span class="tm-text-primary">{{ $book->published_at->format('d/m/Y') }}</span>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h3 class="tm-text-gray-dark mb-3">L'auteur.ice</h3>
                        <p>{{ $book->author }}</p>
                    </div>
                    <div>
                        <h3 class="tm-text-gray-dark mb-3">Tags</h3>
                        @foreach($book->tags as $tag)
                            <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary">
                Livres sur des thèmes similaires
            </h2>
        </div>
        <div class="row mb-3 tm-gallery">
            @foreach($booksWithSameTags as $relatedBook)
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                <figure class="effect-ming tm-video-item">
                    <img src="{{ Storage::url($relatedBook->image_path) }}" alt="Image" class="img-fluid">
                    <figcaption class="d-flex align-items-center justify-content-center">
                        <h2>{{ $relatedBook->name }}</h2>
                        <a href="/detail-{{ $relatedBook->id }}">View more</a>
                    </figcaption>
                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <div class="tm-text-gray-light tm-card-tags">
                        @foreach($relatedBook->tags as $tag)
                            <span class="tm-text-gray-light fs-6">{{ $tag->name }}</span><br>
                        @endforeach
                    </div>
                    <span class="">{{ $relatedBook->author }}</span>
                </div>
            </div>
            @endforeach
        </div> <!-- row -->
    </div>
@endsection
