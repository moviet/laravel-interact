@extends('layouts.default')

@section('title') 
About
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/content.css') }}">
@endsection

@section('content')
<div class="limit-about">
	<div class="container-main">
		<div class="content-wrapper">
			<div class="home-title">&#10063; Welcome</div>
			<div class="ribbon-text">
			 Interact is a simple example <span class="hijau bold">social media website</span> created with laravel v7.11 packages, the purposes is just for learning project with only php laravel framework, the features are just simple and may be updated next time, feel free to download the source codes via this link : <span class="sans-16 biru"><a href="https://github.com/moviet/laravel-interact">https://github.com/moviet/laravel-interact</a></span>

			 Interact adalah contoh paket script website sederhana berbasis social media layaknya <span class="sans-16 biru"><i>facebook, twitter dll.</i></span> yang dibuat sebagai sarana belajar menggunakan php framework laravel versi 7.11, interact mungkin akan membantu memberi contoh alur kodebase buat kawan kawan yang baru belajar atau kesulitan menemukan tutorial lengkap, fitur interact mungkin hanya sederhana jadi kalian bebas belajar atau berkreasi membangun project dengan melihat contoh alur kerja kodebase ini <i>"Thanks"</i>.	
			 <span class="ungu">&#10047; Enjoy learning</span>
			</div>
		</div>
	</div>
</div>
@endsection