@extends('layouts.auth.master')

@section('title', 'Login Page')

@section('css')
@endsection

@section('main_content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-5"><img class="bg-img-cover bg-center" src="{{ asset('assets/images/login/2.jpg') }}"
                alt="looginpage"></div>
        <div class="col-xl-7 p-0">
            <div class="login-card login-dark">
                {{-- Untuk pesan sukses --}}
                @if (session('pesan'))
                    <div class="login" data-login="{{ session('pesan') }}"></div>
                @endif
                {{-- Untuk pesan error --}}
                @if (session('alert'))
                    <div class="error" data-error="{{ session('alert') }}"></div>
                @endif
                <div>
                    {{-- <div>
                        <a class="logo text-start" href=""><img class="img-fluid for-light"
                                src="{{ asset('assets/images/logo/logo.png') }}" alt="looginpage"><img
                                class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo_dark.png') }}"
                                alt="looginpage">
                        </a>
                    </div> --}}
                    <div class="login-main">
                        <form class="theme-form" action="{{ route('login') }}" method="POST">
                            @csrf
                            <h4>Sign in to account</h4>
                            <p>Enter your username & password to login</p>
                            <div class="form-group">
                                <label class="col-form-label">Username</label>
                                <input class="form-control" type="text" required="" id="username" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Password</label>
                                <div class="form-input position-relative">
                                    <input class="form-control" type="password" name="password" id="password" required="" placeholder="*********">
                                    <div class="show-hide"><span class="show"> </span></div>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                {{-- <div class="form-check">
                                    <input class="checkbox-primary form-check-input" id="checkbox1" type="checkbox">
                                    <label class="text-muted form-check-label" for="checkbox1">Remember password</label>
                                </div> --}}
                                <button class="btn btn-primary btn-block w-100 mt-3" type="submit">Sign in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
