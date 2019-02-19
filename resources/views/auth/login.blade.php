@extends('layouts.default')

@section('title') 
Sign In
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/fonts/iconic/css/material-design-iconic-font.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/animate/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/css-hamburgers/hamburgers.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/animsition/css/animsition.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/select2/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/util.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/main.css') }}">
@endsection

@section('content')
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
					<span class="login100-form-title p-b-32">
						Sign In
					</span>

					<span class='alert-error'>{{ $errors->has('email') ? $errors->first('email') : '' }}</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter Email">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<span class='alert-error'>{{ $errors->has('password') ? $errors->first('password') : '' }}</span>

					<div class="wrap-input100 validate-input" data-validate="Enter Password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					@csrf

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Sign In
							</button>
						</div>
					</div>

					<!--
					<div class="forgot">
							<span class="txt1">
								Forgot Password? &#10141;
							</span>
	
							<a class="txt2" href="/signup">
								Reset
							</a>
						</div>
					-->

					<div class="text-center p-t-60">
						<span class="txt1">
							Forgot <a href="/password/reset">Password</a>? or
						</span>

						<a class="txt2" href="/register">
							Sign Up
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>
@endsection

	@section('scripts')
	<script src="{{ asset('/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('/vendor/animsition/js/animsition.min.js') }}"></script>
	<script src="{{ asset('/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/vendor/select2/select2.min.js') }}"></script>
	<script src="{{ asset('/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('/vendor/daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ asset('/vendor/countdowntime/countdowntime.js') }}"></script>
	<script src="{{ asset('/js/main.js') }}"></script>		
	@endsection