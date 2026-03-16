@if($books->isEmpty())
    <div class="tm-search-empty">
        <i class="fas fa-search"></i>
        <span>Aucun résultat pour "<strong>{{ $q }}</strong>"</span>
    </div>
@else
    @foreach($books->take(7) as $book)
        <a href="/detail-{{ $book->id }}" class="tm-search-item">
            <img
                src="{{ Storage::url($book->image_path) }}"
                alt="{{ $book->name }}"
                class="tm-search-item-img"
            >
            <div class="tm-search-item-info">
                <span class="tm-search-item-title">{{ $book->name }}</span>
                <span class="tm-search-item-date">{{ $book->published_at->format('d/m/Y') }}</span>
            </div>
        </a>
    @endforeach

    @if($books->count() > 7)
        <a href="/catalog?q={{ urlencode($q) }}" class="tm-search-see-all">
            Voir tous les résultats ({{ $books->count() }})
            <i class="fas fa-arrow-right"></i>
        </a>
    @endif
@endif
