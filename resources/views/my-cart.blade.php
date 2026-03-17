@extends('template.template')
@section('title', 'Biblioteco - Mon panier')

@section('content')

    @if(!$cart || $cart->books->isEmpty())
        <div class="tm-cart-empty">
            <i class="fa-solid fa-basket-shopping"></i>
            <h2>Votre panier est vide</h2>
            <a href="{{ route('home') }}" class="btn btn-primary mt-3">Parcourir le catalogue</a>
        </div>
    @else
        <ul class="tm-cart-list">
            @foreach($cart->books as $book)
                <li class="tm-cart-item">
                    <img
                        src="{{ Storage::url($book->image_path) }}"
                        alt="{{ $book->name }}"
                        class="tm-cart-item-img"
                    >
                    <div class="tm-cart-item-info">
                        <span class="tm-cart-item-title">{{ $book->name }}</span>
                        <span class="tm-cart-item-author">{{ $book->author }}</span>
                    </div>
                    <form action="{{ route('cart.delete-book', $book) }}" method="POST" class="tm-cart-item-delete">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="tm-cart-delete-btn" title="Retirer du panier">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
        <div class="tm-bg-gray tm-video-details">
            <h2 class="text-primary">État du panier</h2>
            @if(!$cart || $cart->books->isEmpty())
                <p class="h-2 tm-text-grey">Panier vide</p>
            @else
                <p class="h-2 tm-text-grey">Nombre de livres dans le panier : {{ $cart->books->count() }}/6</p>
            @endif
            <div class="text-center mb-5">
                <form action="{{ route('cart.confirm') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary tm-btn-big" @if(!$cart || $cart->books->isEmpty()) disabled @endif>Confirmer</button>
                </form>
            </div>
        </div>
    </div>

@endsection
