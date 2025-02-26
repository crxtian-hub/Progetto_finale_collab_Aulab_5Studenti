<x-layout>
    
    <div class="container my-5 d-flex justify-content-center">
        <div class="row">
            <div class="col-12">
                <div class="form-container">
                    <p class="title text-blue fw-bolder">{{__('ui.Register')}}</p>
                    <form class="form text-blue fw-bolder" action="{{route('register')}}" method="POST">
                        @csrf
                        <div class="input-group">
                            <label for="name">{{__('ui.Name')}}</label>
                            <input class="rounded-3" type="text" name="name" id="name" >
                        </div>
                        <div class="input-group">
                            <label for="exampleInputEmail1">{{__('ui.Email')}}</label>
                            <input class="rounded-3" type="email" name="email" id="exampleInputEmail1">
                        </div>
                        <div class="input-group">
                            <label for="exampleInputPassword1">{{__('ui.Password')}}</label>
                            <input class="rounded-3" type="password" name="password" id="exampleInputPassword1">
                        </div>
                        <div class="input-group">
                            <label for="password_confirmation">{{__('ui.Confirm Password')}}</label>
                            <input class="rounded-3" type="password" name="password_confirmation" id="password_confirmation">
                        </div>
                        <div class="input-group p-2"></div>
                        <button class="sign">{{__('ui.Register')}}</button>
                    </form>
                    <p class="signup">{{__('ui.Already registered')}}
                        <a rel="noopener noreferrer" href="{{ route('login') }}" class="">{{__('ui.Access')}}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
</x-layout>
