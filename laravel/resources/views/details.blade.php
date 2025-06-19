@extends('layouts.app')

@section('content')
<div class="details custom-dark d-flex justify-content-center align-items-center py-5">
    <div class="big-card container-fluid w-75 shadow-lg h-100">
        <div class="row h-100">
            {{-- Poster --}}
            <div class="col-12 col-lg-4 d-flex justify-content-center justify-content-lg-start align-items-center mb-4 mb-lg-0">
                <img 
                  src="https://image.tmdb.org/t/p/w500{{ $details['poster_path'] }}" 
                  class="img-fluid rounded poster-img"
                  alt="{{ $details['title'] }}"
                >
            </div>

            {{-- Info --}}
            <div class="col-12 col-lg-8 d-flex flex-column p-4 p-lg-5 h-100" style="overflow-y: auto;">
                {{-- Title and Tagline --}}
                <h2 class="mb-1">{{ $details['title'] }}</h2>
                @if(!empty($details['tagline']))
                    <h5 class="fst-italic mb-3">{{ $details['tagline'] }}</h5>
                @endif
                
                {{-- Basic info row --}}
                <div class="mb-3 d-flex flex-wrap gap-3">
                    <div><strong>Release Date:</strong> {{ $details['release_date'] ?? 'N/A' }}</div>
                    <div><strong>Runtime:</strong> {{ $details['runtime'] ?? 'N/A' }} min</div>
                    <div><strong>Rating:</strong> {{ $details['vote_average'] ?? 'N/A' }} / 10</div>
                    <div><strong>Votes:</strong> {{ $details['vote_count'] ?? 'N/A' }}</div>
                    <div><strong>Status:</strong> {{ $details['status'] ?? 'N/A' }}</div>
                </div>

                {{-- Genres --}}
                @if(!empty($details['genres']))
                    <div class="mb-3">
                        @foreach($details['genres'] as $genre)
                            <span class="badge bg-secondary me-1">{{ $genre['name'] }}</span>
                        @endforeach
                    </div>
                @endif

                {{-- Overview --}}
                <p class="mb-4 flex-grow-1">{{ $details['overview'] }}</p>

                {{-- Production companies --}}
                @if(!empty($details['production_companies']))
                    <div class="mb-3">
                        <h6>Production Companies:</h6>
                        <div class="d-flex flex-wrap align-items-center gap-3">
                            @foreach($details['production_companies'] as $company)
                                <div class="d-flex align-items-center gap-2">
                                    <span>{{ $company['name'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Homepage button --}}
                <div class="d-flex w-100 flex-wrap">
                    <form action="{{ route('movie.towatchlist', $details['id']) }}" method="POST" class="flex-fill me-2">
                    @csrf
                    <button type="submit" class="messageTrigger btn btn-outline-light w-100">To watchlist</button>
                </form>
                
                <a href="{{ url()->previous() }}" class="btn flex-fill btn-outline-light me-2 mb-2">
                    Back to movies
                </a>

                @if(!empty($details['homepage']))
                    <a href="{{ $details['homepage'] }}" target="_blank" rel="noopener" class="btn flex-fill btn-outline-light me-2 mb-2">
                        Official Website
                    </a>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
