@extends('layouts.master')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>{{ __('Register') }} <img src="ekshop.PNG" alt="ekShop" class="logoimg"></h3>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Your Password" required autocomplete="new-password">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn float-right login_btn">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
<!--             <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    Already have an account?<a href="{{ route('login') }}">{{ __('User Login') }}</a>
                </div>
            </div> -->
            <img src="footer-logo.PNG" alt="Ekshop | a2i" class="footerimg">
        </div>
    </div>
</div>
@endsection
