<div class=""> 
    <div class="container d-flex justify-content-center align-items-center ">
        @if (session('status'))
            <div class="alert alert-success success-message">
                {{ session('status') }}
            </div>
        @endif
        
        {{-- @auth
            <div class="alert alert-success success-message">
                Benvenuto {{ Auth::user()->name }}! Hai effettuato l'accesso con successo.
            </div>
        @endauth --}}
    </div>

    <form class="container w-50 form_article text-blue" wire:submit="save">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label fw-bolder">{{__('ui.Article')}}</label>
            <input type="text" class="form-control" id="title" wire:model.live="title">
            @error('title')
            <p class="fst-italic text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label fw-bolder">{{__('ui.Description')}}</label>
            <textarea name="description" id="description" wire:model.live="description" class="form-control"></textarea>
            @error('description')
            <p class="fst-italic text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label fw-bolder">{{__('ui.Price')}}</label>
            <input type="number" class="form-control" id="price" wire:model.live="price">
            @error('price')
            <p class="fst-italic text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label fw-bolder">{{__('ui.Categories')}}</label>
            <select for="category" class="form-control text-capitalize" wire:model="category" @error('category') is-invalid @enderror>
                <option label>{{__('ui.Categories')}}</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}"> {{__('ui.'.$category->name)}}</option>
                @endforeach
                
            </select>
            
            @error('category')
            <p class="fst-italic text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="file-upload" class="form-label fw-bolder ">{{ __('ui.Upload_Photo') }}</label>
    
            <div class="custom-file">
                <input type="file" id="file-upload" wire:model="temporary_images" multiple class="d-none">
                <button type="button" class="btn_upload" onclick="document.getElementById('file-upload').click();">
                    {{ __('ui.Choose_Files') }}
                </button>
                <span class="ms-2">
                    @if ($fileCount > 0)
                        {{ $fileCount }} {{ __('ui.Files_Selected') }}
                    @else
                        {{ __('ui.No_File_Selected') }}
                    @endif
                </span>
            </div>    
            @error('temporary_images.*')
                <p class="fst-italic text-danger">{{ $message }}</p>
            @enderror
            @error('temporary_images')
                <p class="fst-italic text-danger">{{ $message }}</p>
            @enderror
        </div>


        @if (!empty($images))
            <div class="row">
                <div class="col-12 mb-3">
                    <p>{{ __('ui.Photo') }}:</p>
                    <div class="row border border-4 border-success rounded shadow py-4">
                        @foreach ($images as $key => $image)
                            <div class="col d-flex flex-column align-items-center my-3">
                                <div class="img-preview mx-auto shadow rounded" style="background-image:url({{ $image->temporaryUrl() }}); width: 150px; height: 150px; background-size: cover; background-position: center;">                                    
                                </div>
                                <button type="button" class="btn mt-1 btn-danger" wire:click="removeImage({{ $key }})">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        <div class="btn-container d-flex justify-content-center align-items-center">
            <button class=" createButton">{{__('ui.Create')}}</button>
        </div>
    </form>
</div>
