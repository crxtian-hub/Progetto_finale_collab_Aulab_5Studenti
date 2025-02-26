<x-layout>
    @if (session('messaged'))
    <div class="alert alert-success fw-bolder">
        {{ session('messaged') }}
    </div>
    <script>
        const errorMessage = document.querySelector('.alert-success');

        if (errorMessage) {
            setTimeout(() => {
                errorMessage.style.transition = 'opacity 0.5s';
                errorMessage.style.opacity = '0';

                setTimeout(() => {
                    errorMessage.remove();
                }, 500);
            }, 3000);
        }
    </script>
@endif
    <div class="container py-5 category">
        <div class="search-container">
            <div class="search-wrapper">
                <div class="category-filters d-flex justify-content-center align-content-center ">
                    <a href="{{ route('byCategory', ['category' => 'all']) }}" class="filter-chip active ">
                        {{-- <i class="fas fa-globe"></i> Tutto abbiamo disattivato il globale --}}
                    </a>

                    @foreach ($categories as $category)
                        <a class="btn category2 d-flex flex-wrap justify-content-center"
                            href="{{ route('byCategory', ['category' => $category->id]) }}" class="filter-chip">
                            <i class="fas {{ $category->icon }}"></i> {{ __('ui.' . $category->name) }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- INIZIO MESSAGGIO DI ERRORE QUANDO CLICCANO IL TASTO CERCA SENZA AVER INSERITO NULLA --}}
    @if (session('error'))
        <div class="alert alert-danger fw-bolder">
            {{ session('error') }}
        </div>
        <script>
            const errorMessage = document.querySelector('.alert-danger');

            if (errorMessage) {
                setTimeout(() => {
                    errorMessage.style.transition = 'opacity 0.5s';
                    errorMessage.style.opacity = '0';

                    setTimeout(() => {
                        errorMessage.remove();
                    }, 500);
                }, 3000);
            }
        </script>
    @endif
    {{--  FINE MESSAGGIO DI ERRORE QUANDO CLICCANO IL TASTO CERCA SENZA AVER INSERITO NULLA --}}


    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <form role="search" action="{{ route('article.search') }}" method="GET">
                    <div class="search-header position-relative">
                        <input class="form-control search-input" type="search" placeholder="{{ __('ui.Search') }}"
                            aria-label="Search" name="query">
                        <button class="btn-search fas fa-search search-icon" type="submit">
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="container my-5 d-flex justify-content-center mt-5 pt-5">
        <div class="row">
            <div class="col-12 text-blue">
                <h1 class="fw-bold">{{ __('ui.allArticles') }}</h1>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        @forelse ($articles as $article)
            <div class="col-12 col-md-3 d-flex justify-content-center align-items-center">
                <x-card :article="$article" />
            </div>
        @empty
            <div class="col-12">
                <h2 class="text-center vh-100">
                    Non sono ancora presenti Articoli.
                </h2>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center">
        <div>
            {{ $articles->links() }}
        </div>
    </div>

</x-layout>
