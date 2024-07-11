<!doctype html>
<html >
@include('layouts.header')
<body>
    <div id="app">
        @include('layouts.navbar')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
          Pusher.logToConsole = true;
        var pusher = new Pusher('4fc7315c9098c2eeb4e7', {
      cluster: 'ap2'
    });
    </script>
    @yield('scripts')
</body>
</html>
