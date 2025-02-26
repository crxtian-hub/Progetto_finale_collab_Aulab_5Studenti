<footer class="py-3 my-4">
  <ul class="nav justify-content-center border-bottom">
    <li class="nav-item nav-text nav-text1"><a href="{{route('welcome')}}" class="nav-link px-2 text-body-secondary">{{__('ui.Home')}}</a></li>
    <li class="nav-item nav-text nav-text1"><a href="{{route('article.index')}}" class="nav-link px-2 text-body-secondary">{{__('ui.Advertisements')}}</a></li>

    @if (Auth::check() && !Auth::user()->is_revisor)

    <li class="nav-item nav-text nav-text1"><a href="{{route('question.revisor')}}" class="nav-link px-2 text-body-secondary">{{__('ui.Apply as a reviewer!')}}</a></li>
@endif

    <li class="nav-item nav-text nav-text1"><a href="{{ route('about') }}" class="nav-link px-2 text-body-secondary">{{__('ui.Who we are')}}</a></li>
    <li class="nav-item nav-text nav-text1"><a href="#" class="nav-link px-2 text-body-secondary">{{__('ui.Newsletter')}}</a></li>
  </ul>
  <p class="text-center text-body-secondary">© 2025 Spina Company Spa</p>
</footer>