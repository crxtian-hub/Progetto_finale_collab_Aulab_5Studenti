<x-layout>
    <div class="container mt-5 pt-5">
        <div class="p-4 shadow-lg Article_Details">
            <div class="row d-flex align-items-center">
                <!-- Sezione Immagine (Carosello) a Sinistra -->
                <div class="col-lg-7 col-md-6 col-12 d-flex justify-content-center">
                    @if ($article->images->count() > 0)
                        <div id="carouselExample" class="carousel slide">
                            <div class="carousel-inner">
                                @foreach ($article->images as $key => $image)
                                    <div class="carousel-item @if ($loop->first) active @endif">
                                        <img src="{{ asset('storage/' . $image->path) }}"
                                            class="img-fluid rounded shadow-lg carousel_img"
                                            alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
                                    </div>
                                @endforeach
                            </div>
                            @if ($article->images->count() > 1)
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            @endif
                        </div>
                    @else
                        <img src="https://picsum.photos/600/600" class="img-fluid w-100 rounded shadow-lg carousel_img"
                            alt="Nessuna foto inserita">
                    @endif
                </div>

                <!-- Sezione Dettagli a Destra -->
                <div class="col-lg-5 col-md-6 col-12 d-flex flex-column align-items-center text-center">
                    <h1 class="articleTitle">{{ $article->title }}</h1>
                    <p><strong>{{ __('ui.Price') }}:</strong> €{{ $article->price }}</p>
                    <p><strong>{{ __('ui.Description') }}:</strong> {{ $article->description }}</p>
                    <p><strong>{{ __('ui.Category') }}:</strong> {{ __('ui.' . $article->category->name) }}</p>
                    <p><strong>{{ __('ui.Seller') }}:</strong> {{ $article->user->name }}</p>

                    <!-- Bottoni affiancati -->
                    <div class="d-flex justify-content-center gap-3 mt-3 flex-wrap">
                        @if (Auth::check() && Auth::user()->is_revisor)
                            <form action="{{ route('revisor.article.review', $article->id) }}" method="POST">
                                @csrf
                                <button class="btnArticle Review">{{ __('ui.Send to Review') }}</button>
                            </form>
                        @endif
                        <a href="{{ route('article.index') }}" class="btnArticle Back">{{ __('ui.Back to top') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
