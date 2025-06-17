@extends('layouts.app')

@section('content')
    <div class="home-container container-fluid position-relative p-0 m-0 d-flex justify-content-center align-items-center h-100 flex-column">
        <div class="container-fluid movies-container my-5 py-5 d-flex bg-dark">
            <div class="row justify-content-center g-4">
                @if(isset($movies['results']))
                    @foreach($movies['results'] as $movie)
                        @include('components.movieCard', ['movie' => $movie])
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection


