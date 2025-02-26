<x-layout>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <form role="search" action="{{ route('article.search') }}" method="GET">
                    <div class="search-header position-relative">
                        <input class="form-control search-input" type="search" placeholder="{{__('ui.Search')}}" aria-label="Search"
                        name="query">
                        <button class="btn-search fas fa-search search-icon" type="submit">
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
    <div class="container-fluid pt-5">
        <div class="row py=5 justify-content-center align-items-center text-center">
            <div class="col-12">
                <h3 class="display-1 text-blue fw-bolder mb-5">{{__('ui.Search results:')}}
                    <span>{{$query}}</span>
                </h3>
            </div>
        </div>

        <div class="row height-custom justify-content-center align-items-center text-center">
            @forelse($articles as $article)
            <div class="col-12 col-md-3">
                <x-card :article="$article"/>
            </div>
            @empty
            <div class="col-12">
                <h3 class="text-center text-blue">
                    {{__('ui.No articles found for your search')}}
                </h3>
            </div>
            @endforelse
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <div class="">
            {{$articles->links()}}
        </div>
    </div>
    
    
    
    
    
    
</x-layout>