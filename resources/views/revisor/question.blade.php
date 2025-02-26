<x-layout>
    <div class="container question">
        <div class="row">
            <div class="col-12 ">
                    <form action="{{ route('become.revisor') }}" method="POST"  class="d-flex flex-column justify-content-center align-items-center">
                        @csrf
                        <label for="description" class="form-label"> <h1 class="text-center h1question">{{__('ui.Describe why you want to become an auditor')}}</h1></label>
                        <textarea name="description" id="description" class="form-control textarea_question" placeholder="{{__('ui.Type Here')}}" required></textarea>
                        @error('description')
                            <p class="fst-italic text-danger">{{$message}}</p>
                        @enderror
                        <button type="submit" class="lavorabutton fw-bold">{{__('ui.Become a Reviewer')}}</button>
                    </form>       
                </div>
                <div class="col-12"> <img src="/img/lavoraconnoi.png" class="img_lavora" alt="foto lavora con noi"></div>  
        </div>
    </div>
</x-layout>