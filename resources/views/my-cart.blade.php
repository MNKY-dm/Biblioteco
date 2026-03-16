@extends('template.template')
@section('title', 'Biblioteco - Mon panier')

@section('content')

    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-12 tm-text-primary">Mon panier</h2>
        </div>
        <div class="row tm-mb-90">
            <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
                @if(!$cart)
                    <h2>Votre panier est vide...</h2>
                @else
                    <ul>
                        @if($cart->books->isNotEmpty())
                            @foreach($cart->books() as $book)
                                <li>
                                    <img src="{{ Storage::url($book->image_path) }}" alt="Image" class="img-fluid">
                                    <div>
                                        <p>{{ $book->name }}</p>
                                        <p>{{ $book->author }}</p>
                                    </div>
                                    <form action="{{ route('cart.delete-book', $book) }}">
                                        @csrf
                                        <button type="submit">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </li>
                            @endforeach
                        @else
                            <h2>Votre panier est vide...</h2>
                        @endif
                    </ul>
                @endif
            </div>
{{--            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">--}}
{{--                <div class="tm-bg-gray tm-video-details">--}}
{{--                    <p class="mb-4">--}}
{{--                        {{ $book->summary }}--}}
{{--                    </p>--}}
{{--                    @foreach($book->categories as $category)--}}
{{--                        <p class="h-2 text-primary">{{ $category->name }}</p>--}}
{{--                    @endforeach--}}
{{--                    <div class="text-center mb-5">--}}
{{--                        <a href="/borrow-{{ $book->id }}" class="btn btn-primary tm-btn-big @if($book->status !== "AVAILABLE") disabled @endif">Emprunter</a>--}}
{{--                    </div>--}}
{{--                    <div class="mb-4 d-flex flex-wrap">--}}
{{--                        <div class="mr-4 mb-2">--}}
{{--                            <span class="tm-text-gray-dark">Disponibilité : </span><span class="tm-text-primary"> @if($book->status === "AVAILABLE") Disponible à l'emprunt @else Déjà emprunté @endif</span>--}}
{{--                        </div>--}}
{{--                        @if($book->status === "BORROWED")--}}
{{--                            <div class="mr-4 mb-2">--}}
{{--                                <span class="tm-text-gray-dark">Retour : </span><span class="tm-text-primary">Retour prévu avant le {{ $book->borrowings()->first()?->deadline->addDays(1)->format('d/m/Y') }}</span>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        <div class="mr-4 mb-2">--}}
{{--                            <span class="tm-text-gray-dark">Langue: </span><span class="tm-text-primary">{{ $book->language }}</span>--}}
{{--                        </div>--}}
{{--                        <div class="mr-4 mb-2">--}}
{{--                            <span class="tm-text-gray-dark">Publié le : </span><span class="tm-text-primary">{{ $book->published_at->format('d/m/Y') }}</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="mb-4">--}}
{{--                        <h3 class="tm-text-gray-dark mb-3">L'auteur.ice</h3>--}}
{{--                        <p>{{ $book->author }}</p>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <h3 class="tm-text-gray-dark mb-3">Tags</h3>--}}
{{--                        @foreach($book->tags as $tag)--}}
{{--                            <a href="#" class="tm-text-primary mr-4 mb-2 d-inline-block">{{ $tag->name }}</a>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

@endsection
