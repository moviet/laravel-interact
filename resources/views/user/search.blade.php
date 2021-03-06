@extends('layouts.default')

@section('title') 
Search More Friends
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/css/content.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/home.css') }}">
@endsection

@section('media')
<script type="text/javascript" src="{{ asset('/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/search.js') }}"></script>
@endsection

@section('content')
<div class="find-wrapper">
	<div class="find-top">
		<div class="map-url-search">
				<a href="{{ url('home', Auth::user()->uid) }}" class="map-url-dashboard">Dashboard &#9829;</a> <span class="map-url-link">Search</span>
		</div>

		<div class="col-xs-3">
				<div class="find-top-content">	
						<div class="find-title">Find the peoples near of you</div>

						<div class="find-box-search">
								<form method="POST" action="{{ route('search.store') }}">
										<div class="sub-find-box-search">
												<input type='text' name="name" class="input-search" placeholder="type a name.." value="">
												@csrf
										</div>

										@if ($errors->has('name'))
												<div class="error-input-bottom">
														Please type a name (eg. John)
												</div>
										@endif
									
										<div class="sub-btn-find">
												<input type='submit' value="Search" class="btn-find">
										</div>
								</form>
						</div>
				</div>
			
				<div class="find-result left">	
						<div class="find-box fsb">Total results 
								<span class="find-count">{{ (!empty($name)) ? count($name) : '' }}</span>
						</div>
				</div>

				@if (empty($name))
						<div class="find-not-found bg-color center">	
								<div class="find-box-not-found fb">Already find your friend</div>
						</div>
				@elseif (empty(count($name)))
						<div class="find-not-found bg-color center">	
								<div class="find-box-not-found fb">We can't find your friend</div>
						</div>
				@endif

				@if (!empty($name))
						@foreach ($name as $friend)						
								@if (file_exists(substr($friend->avatar, 1)))
										@php
												$avatar = asset($friend->avatar);
										@endphp
								@else
										@php
												$avatar = asset('/img/friend.png');
										@endphp
								@endif

								<div class="find-box-filled left">			
										<div class="find">
												<img src="{{ $avatar }}" alt="{{ $friend->name }}">
										</div>

										<div class="find-user-name">
												<a href="{{ url('user', $friend->id) }}">{{ $friend->name }}</a>
										</div>

										<div class="find-user-button">
												<input type="submit" onClick="window.location.href='{{ url('user', $friend->id) }}';" class="find-add-friend" value="Add as friend">
										</div>
								</div>
						@endforeach
				@endif

		</div>
	</div>
</div>
@endsection