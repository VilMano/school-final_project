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

    .text-white {
        color: white;
    }
</style>
@endsection

@section('content')
<div class="whole_body">
    <div class="overlay">
        <div class="container">
            <div class="row justify-content-center" style="margin-top: 200px; margin-bottom: 50px;">
                <div class="col-12">
                    <div class="text-white" style="text-align:center; font-size:6.5rem;">
                        {{ __('Register') }}
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right text-white">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror transbox" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right text-white">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror transbox" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right text-white">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror transbox" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right text-white">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control transbox" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary round_btn" style="border-color: green;!important">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection