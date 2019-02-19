<!DOCTYPE html>
<html lang='en'>
<head>
	<title>@yield('title')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="keywords" content="Simple laravel 5.7 interaction"/>
	<meta name="description" content="Simple laravel interaction without database"/>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="shortcut icon" href="{!! asset('assets/webicon/favicon.ico')  !!} ">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/navbar.css') }}">
	@yield('css')
	@yield('media')

</head>
<body>


@guest
@include('partials.navbar')
@endguest

@if (Auth::user())
@include('partials.navbarlogin')
@endif

@yield('content')

@yield('scripts')

</body>
</html>
