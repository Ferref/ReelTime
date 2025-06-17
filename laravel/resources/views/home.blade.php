@extends('layouts.app')

@section('content')
    <div class="home-container container-fluid position-relative p-0 m-0 d-flex justify-content-center align-items-center h-100 flex-column">
    @if(isset($movies))
        @php
            print_r($movies);
        @endphp
    @endif
    </div>
@endsection


