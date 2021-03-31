@extends('layouts.master')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                @isset($url)
                <h3>Sign In (Employee) <img src="/../ekshop.PNG" alt="ekShop" class="logoimg"></h3>
                @else
                <h3>Sign In <img src="ekshop.PNG" alt="ekShop" class="logoimg"></h3>
                @endisset
            </div>
            <div class="card-body">
                @isset($url)
                <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                @else
                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                @endisset
                    @csrf
                    @if(isset($url) && $url == 'driver')
                        <div class="input-group form-group">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    @else
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @endif
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                        <div class="row align-items-center remember">
                            <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                        </div>
                    <div class="form-group">
                        <button type="submit" class="btn float-right login_btn">
                            {{ __('Login') }}
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    Don't have an account?<a href="{{ route('register') }}">Sign Up</a>
                </div>
                <div class="d-flex justify-content-center">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    @isset($url)
                    <a class="btn admin" href="{{ route('login') }}">{{ __('Admin Login') }}</a>
                    @else
                    <a class="btn admin" href="{{ url('login/employee') }}">{{ __('Employee Login') }}</a>
                    @endisset 
                </div>
            </div>
                @isset($url)
                <img src="/../footer-logo.PNG" alt="Ekshop | a2i" class="footerimg">
                @else
                <img src="footer-logo.PNG" alt="Ekshop | a2i" class="footerimg">
                @endisset
        </div>
    </div>
</div>
@endsection
