@extends('layouts.app')

@section('content')
    <div class="home-container container-fluid position-relative p-0 m-0 d-flex justify-content-center align-items-center h-100 flex-column">
        <div class="container-fluid movies-container bg-dark py-4">
            @if(isset($movies['results']))
                @foreach($movies['results'] as $movie)
                    @include('components.movieCard', ['movie' => $movie])
                @endforeach
            @endif
        </div>
    </div>
@endsection


