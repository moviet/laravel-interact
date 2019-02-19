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
			 Interact is a simple example <span class="hijau bold">social media website</span> builds with laravel v5.7 packages, this site just purposes for inspire and learning project with php laravel development, the features will be updated continously so you can download the full sources via this link : <span class="sans-16 biru"><a href="https://github.com/moviet/laravel-interact">https://github.com/moviet/laravel-interact</a></span>

			 Interact adalah contoh paket script website sederhana berbasis social media layaknya <span class="sans-16 biru"><i>facebook, twitter dll.</i></span> yang dibuat sebagai sarana belajar menggunakan php framework laravel versi 5.7, interact mungkin akan membantu memberi inspirasi contoh alur kodebase buat kawan kawan yang baru belajar atau kesulitan menemukan tutorial lengkap, fitur interact mungkin akan terus diperbarui jadi kawan kawan bebas belajar atau berkreasi membangun project dengan melihat contoh alur kerja kodebase ini <i>"Thanks"</i>.	
			 <span class="ungu">&#10047; Enjoy learning</span>
			</div>
		</div>
	</div>
</div>
@endsection