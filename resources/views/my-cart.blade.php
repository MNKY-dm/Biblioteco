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

@endsection
