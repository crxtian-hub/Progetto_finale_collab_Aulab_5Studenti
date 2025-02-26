<form class="d-inline" action="{{route('setLocale', $lang)}}" method="GET">
@csrf
<button type="submit" class="btn">
    <img data-aos="fade-down"  data-aos-delay="1000" src="{{asset('vendor/blade-flags/language-' . $lang . '.svg')}}" width="25" height="25">
</button>
</form>