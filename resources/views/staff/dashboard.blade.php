@extends('template.template')
@section('title', 'Biblioteco - Dashboard staff')

@section('content')
    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="tm-text-primary">Dashboard staff</h2>
                <p>Gestion des livres et suivi des emprunts.</p>
            </div>
        </div>

        <div class="row">
            {{-- Colonne livres --}}
            <div class="col-lg-6 col-md-12 mb-5">
                <div class="tm-bg-gray tm-video-details h-100">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="tm-text-primary mb-0">Livres</h3>
                        <span>{{ $books->total() }} livre(s)</span>
                    </div>

                    @if($books->isEmpty())
                        <p>Aucun livre trouvé.</p>
                    @else
                        <ul class="list-group">
                            @foreach($books as $book)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <a href="{{ route('book-detail', ['id' => $book->id]) }}" class="tm-text-primary">
                                            {{ $book->name }}
                                        </a>
                                        <br>
                                        <small>{{ $book->author }}</small>
                                        <br>
                                        <small>Statut : {{ $book->status }}</small>
                                    </div>

                                    {{-- plus tard : route staff.books.edit --}}
                                    <a href="{{ route('staff.books.edit', $book->id) }}" class="btn btn-outline-primary btn-sm">
                                        Éditer
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <div class="mt-4">
                            {{ $books->links() }}
                        </div>
                    @endif
                </div>
            </div>

            {{-- Colonne emprunts --}}
            <div class="col-lg-6 col-md-12 mb-5">
                <div class="tm-bg-gray tm-video-details h-100">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="tm-text-primary mb-0">Emprunts</h3>
                        <span>{{ $borrowings->total() }} emprunt(s)</span>
                    </div>

                    @if($borrowings->isEmpty())
                        <p>Aucun emprunt trouvé.</p>
                    @else
                        <ul class="list-group">
                            @foreach($borrowings as $borrowing)
                                <li class="list-group-item">
                                    <div class="mb-2">
                                        <strong>Client :</strong>
                                        {{ $borrowing->user->name ?? 'Utilisateur inconnu' }}
                                        {{ $borrowing->user->surname ?? '' }}
                                    </div>

                                    <div class="mb-2">
                                        <strong>Statut :</strong>
                                        {{ $borrowing->status }}
                                    </div>

                                    <div class="mb-2">
                                        <strong>Date limite :</strong>
                                        {{ \Carbon\Carbon::parse($borrowing->deadline)->format('d/m/Y') }}
                                    </div>

                                    <div>
                                        <strong>Livres :</strong>
                                        <ul class="mb-0 mt-2">
                                            @foreach($borrowing->books as $book)
                                                <li>{{ $book->name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <div class="mt-4">
                            {{ $borrowings->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
