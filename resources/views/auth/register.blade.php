
@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');
</style>

<div class="body2">
<div class="container2" id="container2">
	<div class="form-container2 sign-in-container2">
		<form class="form1" method="POST" action="{{ route('register') }}">
                        @csrf
			<h1>Register</h1>
			<div class="social-container2">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>

			</div>
			<span class="span1">or use your email for registration</span>
            <input id="input1" style="margin:5px" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Enter your name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
			<input id="input1" style="margin:5px" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="input1" style="margin:5px" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Create password" required autocomplete="new-password">

@error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
<input id="input1" style="margin:5px" type="password" class="form-control" name="password_confirmation" placeholder="Confirm your password" required autocomplete="new-password">
			
            <button class="button1" type="submit">
                                    {{ __('Register') }}
                                </button>
		</form>

	<div class="overlay-container2">
		<div class="overlay">
			
			<div class="overlay-panel overlay-right">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="button1 ghost" id="signUp">Sign In</button>
			</div>
		</div>
	</div>
</div>
</div></div>
</div>
@endsection