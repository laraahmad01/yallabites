@extends('layouts.app')

@section('content')
<style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
	box-sizing: border-box;
}

.body2 {
	background: #f6f5f7;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	font-family: 'Montserrat', sans-serif;
	height: 100vh;
	margin: -20px 0 50px;
}

h1 {
	font-weight: bold;
	margin: 0;
}

h2 {
	text-align: center;
}

p {
	font-size: 14px;
	font-weight: 100;
	line-height: 20px;
	letter-spacing: 0.5px;
	margin: 20px 0 30px;
}

.span1 {
	font-size: 12px;
}

.a1 {
	color: #333;
	font-size: 14px;
	text-decoration: none;
	margin: 15px 0;
}

.button1 {
	border-radius: 20px;
	border: 1px solid green;
	background-color: green;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}

.button1:active {
	transform: scale(0.95);
}

.button1:focus {
	outline: none;
}

.button1.ghost {
	background-color: transparent;
	border-color: #FFFFFF;
}

.form1 {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	height: 100%;
	text-align: center;
}

.input1 {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
}

.container2 {
	background-color: #fff;
	border-radius: 10px;
  	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 768px;
	max-width: 100%;
	min-height: 480px;
}

.form-container2 {
	position: absolute;
	top: 0;
	height: 100%;
	transition: all 0.6s ease-in-out;
}

.sign-in-container2 {
	left: 0;
	width: 50%;
	z-index: 2;
}

.container2.right-panel-active .sign-in-container2 {
	transform: translateX(100%);
}

.sign-up-container2 {
	left: 50%;
   opacity: 0;
   z-index: 1;
}

.container2.right-panel-active .sign-up-container2 {
	transform: translateX(100%);
	opacity: 1;
	z-index: 5;
	animation: show 0.6s;
}

@keyframes show {
	0%, 49.99% {
		opacity: 0;
		z-index: 1;
	}
	
	50%, 100% {
		opacity: 1;
		z-index: 5;
	}
}

.overlay-container2 {
	position: absolute;
	top: 0;
	left: 50%;
	width: 50%;
	height: 100%;
	overflow: hidden;
	transition: transform 0.6s ease-in-out;
	z-index: 100;
}

.container2.right-panel-active .overlay-container2{
	transform: translateX(-100%);
}

.overlay {
	background: green;
	background: -webkit-linear-gradient(to right, #FF4B2B, #FF416C);
	background: linear-gradient(to right, green, lightgreen);
	background-repeat: no-repeat;
	background-size: cover;
	background-position: 0 0;
	color: #FFFFFF;
	position: relative;
	left: -100%;
	height: 100%;
	width: 200%;
  	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.container2.right-panel-active .overlay {
  	transform: translateX(50%);
}

.overlay-panel {
	position: absolute;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 40px;
	text-align: center;
	top: 0;
	height: 100%;
	width: 50%;
	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.overlay-left {
	transform: translateX(-20%);
}

.container2.right-panel-active .overlay-left {
	transform: translateX(20%);
}

.overlay-right {
	right: 0;
	transform: translateX(0);
}

.container2.right-panel-active .overlay-right {
	transform: translateX(-100%);
}

.social-container2 {
	margin: 20px 0;
}

.social-container2 a {
	border: 1px solid #DDDDDD;
	border-radius: 50%;
	display: inline-flex;
	justify-content: center;
	align-items: center;
	margin: 0 5px;
	height: 40px;
	width: 40px;
}
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
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
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
