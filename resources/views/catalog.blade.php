@extends("template.template")
@section('title', "Biblioteco - Catalogue de livres")
@section('content')

    <div class="tm-hero d-flex justify-content-center align-items-center" id="tm-video-container">
        <video autoplay muted loop id="tm-video">
            <source src="{{ asset("css/templatemo/video/hero.mp4") }}" type="video/mp4">
        </video>
        <i id="tm-video-control-button" class="fas fa-pause"></i>
        <div class="tm-search-wrapper">
            <form class="d-flex tm-search-form">
                <input class="form-control tm-search-input" type="search"
                       placeholder="Search" aria-label="Search" id="search-bar">
                <button class="btn btn-outline-success tm-search-btn" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <div id="search-results"></div>
        </div>
    </div>

    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">Catalogue de nos livres</h2>
            <div class="row">
                {{ $books->links() }}
            </div>
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
            @endforeach <!-- row -->
            <div class="row">
                {{ $books->links() }}
            </div>
        </div>
    </div>

    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });

        $(function(){
            /************** Video background *********/

            function setVideoSize() {
                const vidWidth = 1280;
                const vidHeight = 720;
                const maxVidHeight = 400;
                let windowWidth = window.innerWidth;
                let newVidWidth = windowWidth;
                let newVidHeight = windowWidth * vidHeight / vidWidth;
                let marginLeft = 0;
                let marginTop = 0;

                if (newVidHeight < maxVidHeight) {
                    newVidHeight = maxVidHeight;
                    newVidWidth = newVidHeight * vidWidth / vidHeight;
                }

                if(newVidWidth > windowWidth) {
                    marginLeft = -((newVidWidth - windowWidth) / 2);
                }

                if(newVidHeight > maxVidHeight) {
                    marginTop = -((newVidHeight - $('#tm-video-container').height()) / 2);
                }

                const tmVideo = $('#tm-video');

                tmVideo.css('width', newVidWidth);
                tmVideo.css('height', newVidHeight);
                tmVideo.css('margin-left', marginLeft);
                tmVideo.css('margin-top', marginTop);
            }

            setVideoSize();

            // Set video background size based on window size
            let timeout;
            window.onresize = function () {
                clearTimeout(timeout);
                timeout = setTimeout(setVideoSize, 100);
            };

            // Play/Pause button for video background
            const btn = $("#tm-video-control-button");

            btn.on("click", function (e) {
                const video = document.getElementById("tm-video");
                $(this).removeClass();

                if (video.paused) {
                    video.play();
                    $(this).addClass("fas fa-pause");
                } else {
                    video.pause();
                    $(this).addClass("fas fa-play");
                }
            });
        });
    </script>
@endsection
