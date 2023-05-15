@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');
</style>
<div class="body2">
<div class="container2" id="container2">
	<div class="form-container2 sign-in-container2">
		<form class="form1" method="POST" action="{{ route('login') }}">
                        @csrf
			<h1>Sign in</h1>
			<div class="social-container2">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
			<!--	<a href="{{ route('social.login', ['provider' => 'google']) }}"><i class="fab fa-google-plus-g"></a> -->
			</div>
			<span class="span1">or use your account</span>
			<input class="input1" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="span1 invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

    @error('password')
        <span class="span1 invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror


                                @if (Route::has('password.request'))
                                    <a class="a1"  href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
			
            <button class="button1" type="submit">
                                    {{ __('Login') }}
                                </button>
		</form>
        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
	</div>
	<div class="overlay-container2">
		<div class="overlay">
			
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="button1 ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
</div></div>
</div>


@endsection
