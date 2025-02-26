<x-layout>
    @if (session()->has('message'))
    <div class="col-12 alert alert-success">
        <h6>{{ session('message') }}</h6>
    </div>
    @endif

    <div class="container mt-5 pt-5 text-blue ">
        <div class="row ">
            <div class="col-12 d-flex justify-content-center">
                <h1 class="display-4">{{__('ui.Reviewer dashboard')}}: <h1 class="fw-bold display-4">{{ Auth()->user()->name }}</h1></h1>
            </div>
        </div>
    </div>

    @if ($article_to_check)
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                @if ($article_to_check->images->count())
                @foreach ($article_to_check->images as $key => $image)
                <div class="my-3 d-flex">
                    <img src="{{ $image->getUrl(300, 300) }}" class="img-fluid rounded shadow" alt="Immagine {{ $key + 1 }} dell'articolo {{ $article_to_check->title }}">

                    <div class="label my-2 ms-5 d-flex flex-column">
                        <h5 class="mb-2">{{__('ui.Labels')}}</h5>
                        @if ($image->labels)
                            @foreach ($image->labels as $label)
                            <span class="badge bg-secondary my-1 p-2">#{{ $label }}</span>
                            @endforeach
                        @else
                        <p>No labels</p>
                        @endif
                    </div>

                    <div class="my-2 ms-5 d-flex flex-column">
                        <h5>{{__('ui.Ratings')}}</h5>

                        <div class="d-flex flex-column">
                            <div class="d-flex align-items-center mb-2">
                                <p class="mb-0 me-2">{{__('ui.Adult')}}</p>
                                <div class="rating-indicator {{ $image->adult }}"></div>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <p class="mb-0 me-2">{{__('ui.Violence')}}</p>
                                <div class="rating-indicator {{ $image->violence }}"></div>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <p class="mb-0 me-2">{{__('ui.Spoof')}}</p>
                                <div class="rating-indicator {{ $image->spoof }}"></div>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <p class="mb-0 me-2">{{__('ui.Razy')}}</p>
                                <div class="rating-indicator {{ $image->racy }}"></div>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <p class="mb-0 me-2">{{__('ui.Medical')}}</p>
                                <div class="rating-indicator {{ $image->medical }}"></div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                @for ($i = 0; $i < 6; $i++)
                <div class="col-6 col-md-4 mb-4 text-center">
                    <img src="" class="img-fluid rounded shadow" alt="immagine segnaposto">
                </div>
                @endfor
                @endif

                <div class="col-md-6 my-3">
                    <div class="d-flex flex-column">
                        <h1>{{__('ui.Article')}}: {{$article_to_check->title}}</h1>
                        <h3 class="text-blue">{{__('ui.Author')}}: {{ $article_to_check->user->name }}</h3>
                        <h5>{{__('ui.Price')}}: {{ $article_to_check->price }}€</h5>
                        <h5>
                            {{__('ui.Categories')}}: <span class="text-capitalize">{{__('ui.'.$article_to_check->category->name)}}</span>
                        </h5>
                        <p class="mt-3">{{__('ui.Description')}}: {{ $article_to_check->description }}</p>
                    </div>

                    <div class="d-flex my-3 gap-4">
                        <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn_revisor fw-bold">{{__('ui.Refuse')}}</button>
                        </form>
                        <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn_revisor2 fw-bold">{{__('ui.Accept')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center flex-column mt-5">
                <h4 class="text-blue fw-medium">{{__('ui.No items to review')}}.</h4>
                <a href="{{ route('welcome') }}" class="btn btn_back mt-3">{{__('ui.Return to home')}}</a>
            </div>
        </div>
    </div>
    @endif
</x-layout>
