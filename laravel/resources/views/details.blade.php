@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center h-100  my-5 details">
    <div class="custom-dark container-fluid m-0 shadow-lg p-5 h-100">
        <div class="row g-0 h-100">
            {{-- Poster --}}
            <div class="col-md-4 d-flex align-items-center h-100">
                <img 
                  src="https://image.tmdb.org/t/p/w500{{ $details['poster_path'] }}" 
                  class="img-fluid rounded"
                  alt="{{ $details['title'] }}"
                >
            </div>

            {{-- Info --}}
            <div class="col-md-8 d-flex flex-column p-4 h-100" style="overflow-y: auto;">
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
                <div>
                    @if(!empty($details['homepage']))
                        <a href="{{ $details['homepage'] }}" target="_blank" rel="noopener" class="btn btn-outline-light me-2">
                            Official Website
                        </a>
                    @endif
                    <a href="{{ url()->previous() }}" class="btn btn-outline-light">Back to movies</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
