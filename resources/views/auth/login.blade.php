<x-layout>
    
    <div class="container my-5 d-flex justify-content-center">
        <div class="row">
            <div class="col-12">
                <div class="form-container">
                    <p class="title text-blue">{{__('ui.Login')}}</p>
                    <form class="form" action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="input-group text-blue fw-bolder">
                            <label for="exampleInputEmail1">{{__('ui.Email')}}
                                
                            </label>
                            <input class="rounded-3" type="email" name="email" id="exampleInputEmail1">
                            @error('email')
                            <p class="text-danger fst-italic">{{$message}}</p>
                            @enderror
                        </div>
                        
                        <div class="input-group text-blue fw-bolder">
                            <label for="exampleInputPassword1">{{__('ui.Password')}}</label>
                            <input class="rounded-3" type="password" name="password" id="exampleInputPassword1">
                            {{-- @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                            @endif --}}
                            @error('password')
                            <p class="text-danger fst-italic">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="input-group p-2"></div>
                        <button type="submit" class="sign">{{__('ui.Access')}}</button>
                    </form>
                    <p class="signup ">{{__('ui.Not registered yet')}}
                        <a rel="noopener noreferrer" href="{{ route('register') }}" class=" text-blue fw-bold">{{__('ui.Register')}}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
</x-layout>