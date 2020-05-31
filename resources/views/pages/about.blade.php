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
			Interact is a simple <span class="hijau bold">social media web app</span> like facebook created using laravel framework v7.11, the purpose is just for free tutorial web development project using pure patterns by laravel framework, the features included are just simply and give you more flexibility to design codes, you can develop some dynamic web apps or API using this powerful framework, full <strong>open source</strong> can be download on this link: <span class="sans-16 biru"><a href="https://github.com/moviet/laravel-interact" target="_blank">Moviet Interact v.7.11</a></span>
			
			Currently this site does not open new register account due to <strong>spam</strong> but it's not limited by the features. you can create new project in local environment include 'mail server' independently, this site just provide data builtin for <strong>demo</strong> so just to ensure the script its work you can login with all account or mix on the list below:

			<strong>Account email</strong> 
			<i>thor@int.com</i>
			<i>bill@int.com</i>
			<i>bilbo@int.com</i>
			<i>mark@int.com</i>
			<i>wonder@int.com</i>
			<i>larry@int.com</i>
			<i>hulk@int.com</i>
			<i>superman@int.com</i>
			<i>loki@int.com</i>
			<i>tony@int.com</i>
			<i>gal@int.com</i>
			<i>thanos@int.com</i>

			<strong>Password</strong> 
			<i>interact</i>

			Interact adalah tutorial paket script website sederhana berbasis social media layaknya <span class="sans-16 biru"><i>facebook, twitter dll.</i></span> yang dibuat sebagai sarana belajar menggunakan framework laravel versi 7.11, interact mungkin akan membantu memberi contoh alur kodebase buat kawan kawan yang baru belajar atau kesulitan menemukan tutorial lengkap, fitur interact mungkin hanya untuk pemula jadi kalian bebas belajar atau berkreasi membangun project dengan melihat contoh alur kerja kodebase bawaan laravel ini <i>"Big Thanks"</i>.	
			<span class="ungu">&#10047; Enjoy learning</span>
			</div>
		</div>
	</div>
</div>
@endsection