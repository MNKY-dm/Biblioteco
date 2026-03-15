<div class="container-fluid tm-container-content tm-mt-60">
    <div class="row mb-4">
        <h2 class="col-6 tm-text-primary">Recherche pour : "{{ $q }}"</h2>
    </div>
    <div class="row">
        {{ $books->links() }}
    </div>
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
                    <span class="text-primary">{{ $book->name }}</span>
                </div>
            </div>
        @endforeach
        <div class="row">
            {{ $books->links() }}
        </div>
    </div>
</div>
