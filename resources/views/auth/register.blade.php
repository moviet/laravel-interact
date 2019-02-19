{{-- EXTENDS YOUR DEFAULT LAYOUTS --}}
@extends('layouts.default')

{{-- LOAD TITLE --}}
@section('title') 
Register
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
		<div class="container-signup100">
			<div class="wrap-signup100">
				<form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
					<span class="login100-form-title p-b-28">
						Sign Up
					</span>

					<span class='alert-error'>{{ $errors->has('name') ? $errors->first('name') : '' }}</span>

					<div class="wrap-input100 validate-input" data-validate="Enter Name">
						<input class="input100" type="text" name="name" value="">
						<span class="focus-input100" data-placeholder="Your name"></span>
					</div>

					<span class='alert-error'>{{ $errors->has('email') ? $errors->first('email') : '' }}</span>

					<div class="wrap-input100 validate-input" data-validate="Enter Email">
							<input class="input100" type="text" name="email" value="">
							<span class="focus-input100" data-placeholder="Email"></span>
						</div>


					<span class='alert-error'>{{ $errors->has('password') ? $errors->first('password') : '' }}</span>

					<div class="wrap-input100 validate-input" data-validate="Enter Password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password" value="">
						<span class="focus-input100" data-placeholder="New Password"></span>
					</div>

					<span class='alert-error'>{{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : '' }}</span>
					
					<div class="wrap-input100 validate-input" data-validate="Enter Password">
							<span class="btn-show-pass">
								<i class="zmdi zmdi-eye"></i>
							</span>
							<input class="input100" type="password" name="password_confirmation" value="">
							<span class="focus-input100" data-placeholder="Confirm Password"></span>
						</div>
					@csrf

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Submit
							</button>
						</div>
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