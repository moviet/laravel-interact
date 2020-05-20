@extends('layouts.default')

@section('title') 
Create Password
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
<div class="limit-reset">
		<div class="container-resetform100">

				<div class="wrap-resetform100">
						<form class="login100-form validate-form" method="POST" action="{{ route('password.update') }}">
								<span class="login100-form-reset-title p-b-30">
										Create Password
								</span>

								<span class='alert-error'>{{ $errors->has('email') ? $errors->first('email') : '' }}</span>

								<div class="wrap-input100 validate-input" data-validate="Enter Email">
										<input class="input100" type="text" name="email">
										<span class="focus-input100" data-placeholder="Email Address"></span>
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

								<input type="hidden" name="token" value="{{ $token }}">
								@csrf

								<div class="container-reset100-form-btn">
										<div class="wrap-login100-form-btn">
												<div class="login100-form-bgbtn"></div>
												<button class="login100-form-btn">
														Submit
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
	<script src="{{ asset('/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/vendor/select2/select2.min.js') }}"></script>
	<script src="{{ asset('/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('/js/main.js') }}"></script>		
	@endsection