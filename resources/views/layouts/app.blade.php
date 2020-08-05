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
</head>
<body >
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow" style="position:fixed; z-index:1; width:100%">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" id="appName">
                    {{ config('app.name', 'News') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="d-flex mt-3 flex-wrap">
                        <?php foreach ($themes as  $key => $theme): ?>
                            <div class="mr-4 ">
                                <a href="/{{$theme->id }}" class=" btn btn-sm">{{ ucfirst($theme->theme) }}</a>

                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4" >
            @yield('content')
        </main>

    </div>
    <footer class="bg-white fixed-bottom  box-shadow" >
        <div class="container">
            <div class="d-flex  justify-content-around ">
                <a href="#" class="btn">Contacts</a>
                <a href="#" class="btn">Staff</a>
            </div>
        </div>
    </footer>
</body>
</html>
