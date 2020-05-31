@extends('layouts.default')

@section('title') 
Verification
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/content.css') }}">
@endsection

@section('content')
@if (session('resent'))
<div class="limits">
	<div class="head-notify">
		<div class="notify-wrapper">
			<div class="text-center">
				Verification email has been sent
			</div>
		</div>
	</div>
</div>
@endif

<div class="limits">
	<div class="container-verify">
		<div class="verify-wrapper">
			<div class="home-title text-center vergreen">Thanks For The Register</div>

			<div class="ribbon-text text-center">
			Before proceeding your new account, please check your email address
			if you don't receive the email you can click here to request another 
			<span class="link-biru"><a href="{{ route('verification.resend') }}">Resend email</a></span>

			</div>
		</div>
	</div>
</div>
@endsection