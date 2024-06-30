
{{-- <nav class="navbar navbar-expand-sm bg-light navbar-light">
  <div class="container-fluid">
    <ul class="navbar-nav">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li>
            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
            </a>
        </li>
    @endforeach

    </ul>
  </div>
</nav> --}}
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <ul class=" navbar-nav ms-auto">
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <li class="nav-item">
                <a class="nav-link"  href="{{ route('lang',['lang'=>$localeCode])}}">
                    {{ $properties['native'] }}
                </a>
            </li>
        @endforeach
        <li class="nav-item">
            <a class="nav-link"  href="#">
                {{__('messages.username')  }}
            </a>
        </li>

        </ul>
        </div>
    </div>
</nav>



