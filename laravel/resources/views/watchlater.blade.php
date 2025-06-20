@extends('layouts.app')

@section('content')
  <div class="watchlater-container my-5 container-fluid position-relative p-0 m-0 d-flex justify-content-center align-items-center h-100 flex-column">
    {{!-- If no movies found --}}
    <div class="d-none container-fluid movies-container py-5 d-flex h-100">

      <div class="row justify-content-center gap-3">

        @if($movies->isNotEmpty())
          @foreach($movies as $movie)
            @include('components.MovieCard', ['movie' => $movie])
          @endforeach
        @endif

      </div>
    </div>
  </div>
@endsection
