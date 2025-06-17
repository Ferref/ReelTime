@extends('layouts.app')

@section('content')
    <div class="outer-auth-container h-100 bg-dark container-fluid position-relative p-0 m-0 d-flex justify-content-center align-items-center h-100 flex-column">
        <div class="auth-container col-12 col-md-9 col-lg-6 position-relative bg-light">

            <div id="errorBox" class="d-none alert alert-danger d-flex align-items-center">
                <ul id="errorList" class="m-0 w-100"></ul>
            </div>

            @include('components.auth.registration')
            @include('components.auth.login')
            <button id="switch-btn" class="btn btn-dark w-100 my-1">Switch log/reg</button>
        </div>

        @include('layouts.bg-animated')
    </div>
@endsection

@push('scripts')
    @vite(['resources/js/auth/switchform.js', 'resources/js/auth/auth.js'])
@endpush


