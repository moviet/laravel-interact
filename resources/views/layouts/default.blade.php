<!DOCTYPE html>
<html lang='en'>
<head>
<title>@yield('title')</title>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="Tutorial laravel framework"/>
<meta name="description" content="Tutorial new php laravel framework"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="shortcut icon" href="{{ asset('/img/it-logo-blue.png') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/navbar.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
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
