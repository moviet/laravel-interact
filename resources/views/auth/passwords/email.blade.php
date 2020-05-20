@extends('layouts.default')

@section('title') 
Forgot Password
@endsection

@section('css')
		<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/fonts/iconic/css/material-design-iconic-font.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/animate/animate.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/css-hamburgers/hamburgers.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/animsition/css/animsition.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/css/util.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('/css/main.css') }}">
@endsection

@section('content')
<div class="limiter">
		<div class="container-reset100">

				@if (session('status'))
						<div class="limits">
								<div class="head-notify">
										<div class="notify-wrapper">
												<div class="text-center">
														Your password link has been sent
												</div>
										</div>
								</div>
						</div>
				@endif

				<div class="wrap-reset100">
						<form class="login100-form validate-form" method="POST" action="{{ route('password.email') }}">
								<span class="login100-form-reset-title p-b-46">
										Reset Password
								</span>

								<span class='alert-error'>{{ $errors->has('email') ? $errors->first('email') : '' }}</span>

								<div class="wrap-input100 validate-input" data-validate = "Enter Email">
										<input class="input100" type="text" name="email">
										<span class="focus-input100" data-placeholder="Email Address"></span>
								</div>

								@csrf

								<div class="container-login100-form-btn">
										<div class="wrap-login100-form-btn">
												<div class="login100-form-bgbtn"></div>
												<button class="login100-form-btn">
														Send Link
												</button>
										</div>
								</div>

								<div class="text-center p-t-30">
									
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
		<script src="{{ asset('/js/main.js') }}"></script>		
@endsection