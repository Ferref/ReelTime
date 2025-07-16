<div class="message container-fluid w-100 position-relative d-flex justify-content-center align-items-center py-4">
    <div class="text-center text-light custom-dark p-4 rounded shadow">
        @if(Route::currentRouteName() === 'watchlater')
            <h1 class="mb-2">No movies found on your watchlist...</h1>
            <p>Did you see these movies yet?</p>
        @elseif(Route::currentRouteName() === 'home')
            <h1 class="mb-2">No movies found by given keywords...</h1>
            <a class="btn btn-dark mt-3" href="{{ route('home') }}">Return to movies</a>
        @endif
    </div>
</div>
