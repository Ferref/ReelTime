@extends('layouts.app')

@section('content')
    <div class="home-container container-fluid position-relative p-0 m-0 d-flex justify-content-center align-items-center h-100 bg-light flex-column">
        <div class="auth-container col-12 col-md-9 col-lg-6 position-relative bg-light">
            @include('components.auth.registration')
            @include('components.auth.login')
            <button id="switch-btn" class="btn btn-dark w-100 my-1">Switch log/reg</button>
        </div>

        <section class="waves position-absolute h-100 top-0 start-0">
            <div class="wave">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="content text-center text-white">
                <h2>Wavy Animation</h2>
            </div>
        </section>

    </div>
@endsection

@push('scripts')
    @vite('resources/js/auth/switchform.js')
@endpush


