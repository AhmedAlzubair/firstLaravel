
{{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
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
</nav> --}}

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-start" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li class="nav-item ">
                    <a class="nav-link"  href="{{ route('lang',['lang'=>$localeCode])}}">
                        {{ $properties['native'] }}
                    </a>
                </li>
            @endforeach
          
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto ">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown" >
                        <a  class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" >
                            {{ Auth::user()->name }}
                        </a>

                       <div class="dropdown dropdown-menu "  >
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>


