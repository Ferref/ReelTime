@extends('layouts.app')

@section('content')
  <div class="watchlater-container my-5 container-fluid position-relative p-0 m-0 d-flex justify-content-center align-items-center h-100 flex-column">
    <div class="container-fluid movies-container py-5 d-flex h-100">
      <div class="row justify-content-center gap-3">

        @if($movies->isNotEmpty())
          @foreach($movies as $movie)
            @include('components.MovieCard', ['movie' => $movie])
          @endforeach
        @else
        <div class="messagetext container-fluid h-100 w-100 position-absolute top-100 start-0 d-flex justify-content-center align-items-center">
          <p class="text-light text-center m-0">
            You don’t have any movies in your Watch Later list yet.
          </p>
        </div>
        @endif

      </div>
    </div>
  </div>
@endsection
