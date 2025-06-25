@extends('layouts.app')

@section('content')
  <div class="watchlater-container my-5 container-fluid d-flex justify-content-center align-items-center flex-column m-0">

    @if($emptyList)
      @include('components.message')
    @endif

    <div class="container-fluid movies-container py-5 d-flex h-100">
      <div class="row justify-content-center gap-3">
        @if($movies)
          @foreach($movies as $movie)
            @include('components.MovieCard', ['movie' => $movie])
          @endforeach
        @endif
      </div>
    </div>
  </div>
@endsection
