

<nav data-aos="fade-down" class="navbar navbar-expand-lg" id="navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('welcome') }}"><img id="MDB-logo" src="/img/Logo_Adesso.png" alt="MDB Logo"
            draggable="false" height="30" />
        </a>
        {{-- <button class="navbar-toggler" type="button" data-mdb-collapse-init data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    </button> --}}
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item">
            <a data-aos="fade-down" data-aos-delay="400" class="nav_style nav-text nav-text1 text-center p-2"
            href="{{ route('article.index') }}">{{ __('ui.Advertisements') }}</a>
        </li>
        @auth
        <li class="nav-item">
            <a data-aos="fade-down" data-aos-delay="450" class="nav_style nav-text nav-text1 text-center p-2"
            href="{{ route('article.create') }}">{{ __('ui.Public') }}</a>
        </li>
        
        @if (Auth::user()->is_revisor)
        <li class="nav-item">
            <a data-aos="fade-down" data-aos-delay="500"
            class="nav_style nav-text nav-text1 text-center position-relative p-2"
            href="{{ route('revisor.index') }}">{{ __('ui.Revisions') }}</a>
            <span>
                <div data-aos="fade-up" data-aos-delay="1500"
                class="positiona-absolute notificaRevisor top-0 start-100 translate-middle badge rounded-pill">
                {{ \App\Models\Article::toBeRevisedCount() }}
            </div>
        </span>
    </li>
    @endif
    @endauth
    <li class="nav-item dropdown">
        <a data-aos="fade-down" data-aos-delay="500" class="nav_style nav-text dropdown-toggle"
        href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{ __('ui.Categories') }}
    </a>
    <ul class="dropdown-menu">
        @foreach ($categories as $category)
        <li class="d-flex justify-content-center">
            <a class="dropdown-item" href="{{ route('byCategory', ['category' => $category]) }}">
                <i class="fas {{ $category->icon }}"> &nbsp;</i>{{__('ui.'.$category->name)}}
            </a>
        </li>
        @if (!$loop->last)
        <hr class="dropdown-divider">
        @endif
        @endforeach
    </ul>
</li>
<li class="nav-item bandiere ms-3">
    <!-- Dropdown per PC -->
    <div class="dropdown d-none d-md-block mx-1">
        <button class="btn_lang dropdown-toggle" type="button" id="dropdownLang" data-bs-toggle="dropdown" aria-expanded="false">
            🌍 {{ __('ui.Language') }}
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownLang">
            <li><a class="dropdown-item" href="{{ route('setLocale', 'it') }}">
                <x-_locale lang="it" /> Italiano</a>
            </li>
            <li><a class="dropdown-item" href="{{ route('setLocale', 'en') }}">
                <x-_locale lang="en" /> English</a>
            </li>
            <li><a class="dropdown-item" href="{{ route('setLocale', 'es') }}">
                <x-_locale lang="es" /> Español</a>
            </li>
        </ul>
    </div>
    <div class="d-flex justify-content-center gap-3 d-md-none">
        <a href="{{ route('setLocale', 'it') }}" class="d-flex align-items-center lang_text">
            <x-_locale lang="it" /> <span class="ms-1">IT</span>
        </a>
        <a href="{{ route('setLocale', 'en') }}" class="d-flex align-items-center lang_text">
            <x-_locale lang="en" /> <span class="ms-1">EN</span>
        </a>
        <a href="{{ route('setLocale', 'es') }}" class="d-flex align-items-center lang_text">
            <x-_locale lang="es" /> <span class="ms-1">ES</span>
        </a>
    </div>
</li>

@guest
<div class="login-register-container">
    <li class="nav-item">
        <a data-aos="fade-down" data-aos-delay="300" class="buttonacc text-center p-2 mx-3"
        href="{{ route('login') }}">{{ __('ui.Login') }}</a>
    </li>
    <li class="nav-item">
        <a data-aos="fade-down" data-aos-delay="350" class="buttonreg text-center p-2"
        href="{{ route('register') }}">{{ __('ui.Register') }}</a>
    </li>
</div>
@endguest
@auth
<li class="nav-item">
    <a data-aos="fade-down" data-aos-delay="1100" class="buttonreg text-center p-2 mx-2"
    href=""
    onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('ui.Logout') }}</a>
</li>
<form action="{{ route('logout') }}" method="POST" id="logout-form" class="d-none">
    @csrf
</form>
@endauth
</ul>
</div>
</nav>
<!-- Navbar End -->
