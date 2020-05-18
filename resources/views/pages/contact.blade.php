@extends('layouts.default')

@section('title') 
Kontak
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
<link rel="stylesheet" type="text/css" href="{{ asset('/css/contact.css') }}">
@endsection


@section('content')
@if (session('sendcontact'))
<div class="limit-contact">
		<div class="head-notify">
			<div class="notify-wrapper">
				<div class="text-center">
				 Your message has been sent
				</div>
			</div>
		</div>
	</div>
@endif

<div class="limit-contact">
<div class="container-contact100">
	<div class="wrap-contact100">
	<form class="contact100-form validate-form" method="POST" action="{{ route('index.contact') }}">
				<span class="contact100-form-title">
					Contact Us
				</span>

				<span class='alert-error'>{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
				<div class="wrap-input100 validate-input" data-validate="Enter Your Name">
					<span class="contact-label-input100">Your Name</span>
					<input class="input100" type="text" name="name" placeholder="Enter your name">
					<span class="focus-input100"></span>
				</div>

				<span class='alert-error'>{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
				<div class="wrap-input100 validate-input" data-validate = "Enter Your Email">
					<span class="contact-label-input100">Email</span>
					<input class="input100" type="text" name="email" placeholder="Enter your email addess">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 input100-select">
					<span class="contact-label-input100">Division</span>
					<div>
						<select class="selection-2" name="division">
							<option>Customer Service</option>
							<option>Partnership</option>
							<option>Other</option>
						</select>
					</div>
					<span class="focus-input100"></span>
				</div>

				<span class='alert-error'>{{ $errors->has('message') ? $errors->first('message') : '' }}</span>
				<div class="wrap-input100 validate-input" data-validate = "Enter Your Message">
					<span class="contact-label-input100">Message</span>
					<textarea class="input100" name="message" placeholder="Enter your message..."></textarea>
					<span class="focus-input100"></span>
				</div>

				@csrf

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="contact100-form-btn">
							<span>
								Submit
								<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
							</span>
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
	<script>
			$(".selection-2").select2({
				minimumResultsForSearch: 20,
				dropdownParent: $('#dropDownSelect1')
			});
	</script>
	<script src="{{ asset('/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('/vendor/daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ asset('/vendor/countdowntime/countdowntime.js') }}"></script>
	<script src="{{ asset('/js/contact.js') }}"></script>		
	@endsection