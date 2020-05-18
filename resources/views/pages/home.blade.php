@extends('layouts.default')

@section('title') 
Interact 7.11
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
<link rel="stylesheet" type="text/css" href="{{ asset('/css/content.css') }}">
@endsection

@section('content')
<div class="limit-home">
		<div class="container-home">
		<div class="container-home100">
			
			<div class="content-left">
			<div class="home100-more">
	
			</div>
			</div>
		

			<div class="content-right">
			<div class="wrap-home100">
			<form class="home100-form validate-form" name="register" method="POST" action="{{ route('register') }}">
					<span class="home100-form-title p-b-34">
						Register Account
					</span>

					@if ($errors->has('name'))
					<span class='alert-error'>{{ $errors->first('name') }}</span>
					@endif

					<div class="wrap-input-home100 validate-input" data-validate="Enter Name">
						<span class="label-home-input100">Full Name</span>
						<input class="home-input100" type="text" name="name" placeholder="Enter name">
						<span class="focus-input100"></span>
					</div>

					@if ($errors->has('email'))
					<span class='alert-error'>{{ $errors->first('email') }}</span>
					@endif

					<div class="wrap-input-home100 validate-input" data-validate = "Enter Email">
						<span class="label-home-input100">Email Address</span>
						<input class="home-input100" type="text" name="email" placeholder="Email address">
						<span class="focus-input100"></span>
					</div>

					@if ($errors->has('password'))
					<span class='alert-error'>{{ $errors->first('password') }}</span>
					@endif

					<div class="wrap-input-home100 validate-input" data-validate = "Enter Password">
						<span class="label-home-input100">Password</span>
						<input class="home-input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					@if ($errors->has('password_confirmation'))
					<span class='alert-error'>{{ $errors->first('password_confirmation') }}</span>
					@endif

					<div class="wrap-input-home100 validate-input" data-validate = "Confirm Password">
						<span class="label-home-input100">Confirm Password</span>
						<input class="home-input100" type="password" name="password_confirmation" placeholder="Confirm password">
						<span class="focus-input100"></span>
					</div>

					@csrf

					<div class="flex-m w-full p-b-27">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="agree">
							<label class="label-checkbox100" for="ckb1">
								<span class="term1">
									I agree to the
									<a href="/about" class="term2 hov1">
										Terms of User
									</a>
								</span>
							</label>
						</div>

						
					</div>

					<div class="container-home100-form-btn">
						<div class="wrap-home100-form-btn">
							<div class="home100-form-bgbtn"></div>
							<button class="home100-form-btn" id="signup">
								Sign Up
							</button>
							
						</div>
						
						<a href="/login" class="dis-block txt3 hov1 p-r-20 p-t-10 p-b-10 p-l-20">
							Have an account? Sign In
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
	<script src="{{ asset('/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('/vendor/animsition/js/animsition.min.js') }}"></script>
	<script src="{{ asset('/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/vendor/select2/select2.min.js') }}"></script>
	<script src="{{ asset('/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('/js/main.js') }}"></script>		
	<script type="text/javascript" src="{{ asset('/js/confirm.js') }}"></script>	
@endsection