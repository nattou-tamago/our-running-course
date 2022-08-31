<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if (Request::routeIs('courses.index') || Request::routeIs('courses.show'))
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.10.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.10.0/mapbox-gl.css' rel='stylesheet' />
    @endif

    @if (Request::routeIs('courses.show'))
    <link rel="stylesheet" href="{{ asset('css/stars.css') }}">
    @endif

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.js"></script>
    <script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
    <title>みんなのランニングコース - @yield('title')</title>
</head>
<body @if (Request::routeIs('home.index')) id="home-body" class="text-center" @endif>
    @include('layouts.partials.navbar')
    <main class="container mt-5" @if (Request::routeIs('home.index')) id="home-main" @endif>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @yield('content')
    </main>

    @yield('scripts')

</body>
</html>
