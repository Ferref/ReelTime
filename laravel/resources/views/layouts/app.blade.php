<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyMovies</title>
    <link rel="icon" type="image/x-icon" href="../popcorn.ico">
    @vite(['resources/js/app.js', 'resources/js/showmodal.js', 'resources/sass/app.scss', 'resources/css/style.css'])
    @stack('scripts')
</head>
<body>
    @if(Auth::check())
        @include('layouts.navbar')
        @isset($message)
            @include('components.modal')
        @endisset
    @endif
    <div class="main-container container-fluid h-100 w-100 p-0 m-0">
        @yield('content')
    </div>

    @if(Auth::check())
        @include('layouts.footer')
    @endif
</body>
</html>