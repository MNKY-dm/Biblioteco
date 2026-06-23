@extends('template.template')
@section('title', 'Biblioteco - Mes emprunts')

@section('content')

    @php
        $totalBooks = $borrowings->sum(fn($borrowing) => $borrowing->books->count());
    @endphp

    @if($borrowings->isEmpty() || $totalBooks === 0)
        <div class="tm-cart-empty">
            <i class="fa-solid fa-book"></i>
            <h2>Vous n'avez aucun emprunt en cours</h2>
            <a href="{{ route('catalog') }}" class="btn btn-primary mt-3">Parcourir le catalogue</a>
        </div>
    @else
        <ul class="tm-cart-list">
            @foreach($borrowings as $borrowing)
                @foreach($borrowing->books as $book)
                    <li class="tm-cart-item">
                        <img
                            src="{{ Storage::url($book->image_path) }}"
                            alt="{{ $book->name }}"
                            class="tm-cart-item-img"
                        >

                        <div class="tm-cart-item-info">
                            <span class="tm-cart-item-title">{{ $book->name }}</span>
                            <span class="tm-cart-item-author">{{ $book->author }}</span>
                            <span class="tm-cart-item-author">
                                Statut : {{ $borrowing->status }}
                            </span>
                            <span class="tm-cart-item-author">
                                Emprunté le : {{ \Carbon\Carbon::parse($borrowing->start_date)->format('d/m/Y') }}
                            </span>
                            <span class="tm-cart-item-author">
                                À rendre avant le : {{ \Carbon\Carbon::parse($borrowing->deadline)->format('d/m/Y') }}
                            </span>
                        </div>

                        <div class="tm-cart-item-delete">
                            <a href="{{ route('book-detail', ['id' => $book->id]) }}" class="btn btn-outline-primary">
                                Voir
                            </a>
                        </div>
                    </li>
                @endforeach
                @if($borrowing->status === 'ACTIVE')
                    <div class="text-center mb-4">
                        <form action="{{ route('my-borrowings.return', ['borrowing' => $borrowing->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary tm-btn-big">
                                Rendre cet emprunt
                            </button>
                        </form>
                    </div>
                @endif
            @endforeach
        </ul>
    @endif

    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
        <div class="tm-bg-gray tm-video-details">
            <h2 class="text-primary">État des emprunts</h2>

            @if($borrowings->isEmpty() || $totalBooks === 0)
                <p class="h-2 tm-text-grey">Aucun emprunt en cours</p>
            @else
                <p class="h-2 tm-text-grey">Nombre total de livres empruntés : {{ $totalBooks }}</p>
                <p class="h-2 tm-text-grey">Nombre de dossiers d'emprunt : {{ $borrowings->count() }}</p>
            @endif

            <div class="text-center mb-5">
                <a href="{{ route('catalog') }}" class="btn btn-primary tm-btn-big">
                    Emprunter d'autres livres
                </a>
            </div>
        </div>
    </div>

@endsection
