<x-layout>

    <div class="container my-5 d-flex justify-content-center pt-5">
        <div class="row">
            <div class="col-12 text-blue">
                <h1>{{__('ui.Enter your article')}}</h1>
            </div>
        </div>
    </div>
    
    <div class="container_create_article">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-8">
                <livewire:create-article-form />
            </div>
        </div>
    </div>
</x-layout>