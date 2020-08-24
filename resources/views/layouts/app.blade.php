<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'News') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="/favicon.png" type="image/x-icon">
</head>
<body >
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow" style="position:fixed; z-index:1; width:100%">
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">

                    <div class="d-flex flex-wrap">
                        <?php foreach ($themes as  $key => $theme): ?>
                            <div style="background:rgba(255,255,255,0.8);">
                                <a href="/themes/{{ $theme->id }}" class=" btn btn-sm">{{ ucfirst($theme->theme) }}</a>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </nav>

        <main>
            <div class="container" style="padding-top: 70px;">
                <a class="" href="{{ url('/') }}" id="appName">
                    <h1>
                        {{ config('app.name', 'Some Online News Site') }} - Some Long Name
                    </h1>
                </a>
                <hr>
            </div>

            @yield('content')
        </main>

    </div>
    <footer class="bg-white fixed-bottom">
        <div class="container">
            <div class="d-flex  justify-content-around article">
                <a href="/about" class="btn">About</a>
                <a href="/staff" class="btn">Staff</a>
            </div>
        </div>
    </footer>
</body>
</html>
