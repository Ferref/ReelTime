<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReelTime</title>
    <link rel="icon" type="image/x-icon" href="../popcorn.ico">
    @vite(['resources/js/app.js', 'resources/js/showmodal.js', 'resources/sass/app.scss', 'resources/css/style.css'])
    @stack('scripts')
</head>
<body class="h-100">
    @if(Auth::check())
        @include('layouts.navbar')
        @include('components.modal')
        @include('components.message')
    @endif
    <div class="main-container h-100 container-fluid p-0 pb-3">
        @yield('content')
    </div>

    @if(Auth::check())
        @include('layouts.footer')
    @endif
</body>
</html>