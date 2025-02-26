<x-layout>

    <div class="container my-5 d-flex justify-content-center pt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-blue">Modifica il tuo articolo!</h1>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-8">
                <livewire:article-edit :article="$article">
            </div>
        </div>
    </div>

</x-layout>