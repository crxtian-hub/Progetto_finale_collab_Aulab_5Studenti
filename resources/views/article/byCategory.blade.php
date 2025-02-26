<x-layout>
    <div class="container">
        <div class="row py-5 justify-content-center align-item-center text-center">
            <div class="col-12 pt-5 ">
                <h1 class="display-4">
                    {{__('ui.Articles in the category:')}}
                </h1>
                <span class="fst-italic fw-bold display-2 text-blue">{{__('ui.'.$category->name)}}</span>
            </div>
        </div>
        <div class="row height-custom justify-content-center align-item-center py-5 vh-100">

            @forelse ($articles as $article)

            <div class="col-12 col-md-3">
                <x-card :article="$article"/>
            </div>
                
            @empty
                
            <div class="col-12 text-center">
                <h3 class="text-blue fw-bold">
                    {{__('ui.There are no articles in the selected category.')}}
                </h3>
            </div>
            @endforelse
            
        </div>
    </div>
    
    
    
</x-layout>