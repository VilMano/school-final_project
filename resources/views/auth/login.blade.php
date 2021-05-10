@extends('layouts.app')

@section('head')
<style>
    .whole_body {
        background-repeat: no-repeat !important;
        background-image: url("https://www.desu.edu/sites/flagship/files/styles/region_background_2280/public/fpp/2216/region-background/image/online-admissions-423324070-back.jpg?itok=22M4YqBB") !important;
        height: 100vh !important;
        /*vh viewport height*/
        background-size: cover !important;
    }

    .overlay {
        background: rgba(0, 0, 0, 0.6) !important;
        height: 100vh !important;
        position: absolute !important;
        width: 100% !important;
    }

    .round_btn {
        display: inline-block !important;
        padding: 7px 20px !important;
        border-radius: 25px !important;
        text-decoration: none !important;
        color: white !important;
        background-color: green !important;
    }

    .transbox {
        border-radius: 0px !important;
        background-color: rgba(0, 0, 0, 0.0) !important;
        color: white !important;
    }
</style>
@endsection

@section('content')
<div class="whole_body">
    <div class="overlay">
        <div class="container" style="margin-top: 200px;">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div style="font-size: 6.5rem; text-align: center; color: white; margin-bottom: 50px;">{{ __('Login') }}</div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" style="color: white;" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror transbox" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" style="color: white;" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror transbox" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" style="color:white;" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary round_btn" style="border-color: green;!important">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" style="color: white;" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection