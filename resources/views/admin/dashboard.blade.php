@extends('template.template')
@section('title', 'Biblioteco - Dashboard admin')

@section('content')
    <div class="col-12 mb-5">
        <div class="tm-bg-gray tm-video-details">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="tm-text-primary mb-0">Utilisateurs</h3>
                <span>{{ $users->total() }} utilisateur(s)</span>
            </div>

            @if($users->isEmpty())
                <p>Aucun utilisateur trouvé.</p>
            @else
                <ul class="list-group">
                    @foreach($users as $user)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $user->surname }} {{ $user->name }}</strong><br>
                                <small>{{ $user->email }}</small><br>
                                <small>Rôle : {{ $user->role?->role ?? 'Aucun rôle' }}</small>
                            </div>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-outline-primary btn-sm">
                                Modifier
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div class="mt-4">
                    {{ $users->appends([
                        'books_page' => $books->currentPage(),
                        'borrowings_page' => $borrowings->currentPage(),
                    ])->links() }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-12 mb-5">
        <div class="tm-bg-gray tm-video-details">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="tm-text-primary mb-0">Utilisateurs supprimés</h3>
                <span>{{ $deletedUsers->total() }} utilisateur(s)</span>
            </div>

            @if($deletedUsers->isEmpty())
                <p>Aucun utilisateur supprimé.</p>
            @else
                <ul class="list-group">
                    @foreach($deletedUsers as $user)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $user->surname }} {{ $user->name }}</strong><br>
                                <small>{{ $user->email }}</small><br>
                                <small>Rôle : {{ $user->role?->role ?? 'Aucun rôle' }}</small>
                            </div>

                            <form action="{{ route('admin.users.restore', $user->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">
                                    Restaurer
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>

                <div class="mt-4">
                    {{ $deletedUsers->appends([
                        'books_page' => $books->currentPage(),
                        'borrowings_page' => $borrowings->currentPage(),
                        'users_page' => $users->currentPage(),
                    ])->links() }}
                </div>
            @endif
        </div>
    </div>

@endsection
