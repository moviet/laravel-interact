@extends('layouts.default')
@section('title') 
Dashboard
@endsection

@section('media')
<script type="text/javascript" src="{{ asset('/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/search.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/flag.js') }}" async></script>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/content.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/home.css') }}">
@endsection

@section('content')
<div class="container-head">
	<div class="content-top">
			@inject ('likes','App\Scopes\Likeable')
			@inject ('photos','App\Scopes\Profile')

			@inject ('parse','App\Bubble\Core\NameParser')
			<div class="col-sm-5 margin-profile box-profile left">
				<div class="card">		
					<div class="card-body">

							@foreach ($profile as $data)
							@if (!empty($data->avatar))
							<div class="card-img-profile">
								<img src="{{ $data->avatar }}" class="img-thumb">
							</div>							
							@elseif (empty($data->avatar))
							<div class="card-img-profile">
									<img src="{{ asset('/img/profile.png') }}" class="img-thumb">
							</div>
							@endif	
							@endforeach

						<div class="title-profile-home text-center">{{ $parse->fully(Auth::user()->name) }}</div>
						<div class="user-link text-center">
						<a href="{{ route('user.show', Auth::user()->uid) }}"><div class="btn friend-link text-center"><img src="{{ asset('/img/heart.png') }}" class="img-friend-link">{{ $parse->cutSmall(Auth::user()->name) }}</div></a>
						</div>
				</div>
				</div>

				@if (empty($groupId) && empty($groupBridge))
				<div class="margin-item box-profile left">
						<div class="card h-100">
							<div class="card-body">
								<div class="label-top"><a href="/search" class="label-top">My Friends</a></div>
								<div class="row">
										<div class="col-xs-3 small-box">
											<div class="label-new">Hello, Already Add A Friend</div>
										</div>
								</div>
							</div>
						</div>
				</div>
				@endif

				@if (!empty($groupId) && !empty($groupBridge))
				<div class="margin-item box-profile left">
					<div class="card h-100">
						<div class="card-body">
							<div class="label-top"><a href="/search" class="label-top">My Friends {{ count($groupId) + count($groupBridge) }}</a></div>

							@foreach ($finder as $photo)
							@if (empty($photo->avatar) && $photo->id)
							@php
									$avatar = asset('/img/friend.png');
							@endphp
							@else
							@php
									$avatar = $photo->avatar;
							@endphp
							@endif
							@endforeach
							
								@if (!empty($groupId))
								<div class="row-friend">										
								@foreach ($groupId as $fiend)		
								@foreach ($finder as $photo)
								@if (empty($photo->avatar) && $photo->id === $fiend->bridge)
								@php
										$avatar = asset('/img/friend.png');
								@endphp
								@elseif (!empty($photo->avatar) && $photo->id === $fiend->bridge)
								@php
										$avatar = $photo->avatar;
								@endphp
								@endif	
								@endforeach
								<div class="col-friend small-box">
									<a href="{{ url('user', $fiend->bridge) }}">
										<img src="{{ $avatar }}" class="img-thumbs">
										<div class="label-friend text-center"><span class="icon-heart">&#10084;</span> {{ $parse->cutSmall($fiend->adds) }}</div>
									</a>
								</div>							
								@endforeach
								@endif

								@if (!empty($groupBridge))
								@foreach ($groupBridge as $fans)
								@foreach ($finder as $photo)
								@if (empty($photo->avatar) && $photo->id === $fans->id)
								@php
										$avatar = asset('/img/friend.png');
								@endphp
								@elseif (!empty($photo->avatar) && $photo->id === $fans->id)
								@php
										$avatar = $photo->avatar;
								@endphp
								@endif	
								@endforeach						
								<div class="col-friend small-box">
									<a href="{{ url('user', $fans->id) }}">
										<img src="{{ $avatar }}" class="img-thumbs">
										<div class="label-friend text-center"><span class="icon-heart">&#10084;</span> {{ $parse->cutSmall($fans->name) }}</div>
									</a>
								</div>			
								@endforeach
								@endif
							</div>

							@if (empty(count($groupId)) && empty(count($groupBridge)))
							<div class="row">
									<div class="col-xs-3 small-box">
										<div class="label-new">Hello, Already Add A Friend</div>
									</div>
							</div>
							@endif

						</div>
					</div>
				</div>
				@endif
		
				<div class="margin-item box-profile left">
						<div class="card h-100">
							<div class="card-body">
								<div class="label-top"><a href="/search" class="label-top">Find A Friend</a></div>
								<div class="row-friend">			
										@foreach ($finderLimit as $friend)							
										@if ($friend->id !== $id)							
										@if (empty($friend->avatar))
										@php
												$avatar = asset('/img/friend.png');
										@endphp
										@else
										@php
												$avatar = $friend->avatar;
										@endphp
										@endif
										<div class="col-friend small-box">
											<a href="{{  url('user', $friend->id) }}">
												<img src="{{ $avatar }}" class="img-thumbs">
												<div class="label-friend text-center"><span class="icon-heart">&#10084;</span> {{ $parse->cutSmall($friend->name) }}</div>
											</a>
										</div>											
										@endif
										@endforeach
								</div>
							</div>
						</div>
				</div>
		</div>

		<div class="col-lg-7 left">
				<div class="card h-90">
					<div class="card-body">
							<form method="POST" action="{{ route('holiday.store') }}" enctype="multipart/form-data">
							<div class="form-group-status purple-border">
									@if ($errors->has('capture'))	
									<span class='alert-error'>{{ $errors->first('capture') }}</span>
									@endif

									@if ($errors->has('status')) 
									<span class='alert-error'>{{ $errors->first('status') }}</span>
									@endif
									<div class="lab-title"></div>
									<input type='hidden' name='capture' value='{{ $token }}'>
									@csrf
									<textarea class="form-control-status" name='status' rows="2" placeholder="Hey {{ $parse->cutSmall(Auth::user()->name) }}, how are you today ?"></textarea>
								</div>
								<div class="media-upload">
										<label class="label-upload" for="upload">										
												<span class="span-upload"> Image
													</span>
												<img src="{{ asset('img/upload-i.png') }}" class="media-photo">		
												<span class="span-upload-filename"> no image selected</span>										
									</label>
								<input class="btn-upload" type="file" name="photos" id="upload" value="">
								</div>
								<input class="btn btn-primary" type="submit" value="Share">
							</form>
					</div>
				</div>

				@if (count($postAll) > 0)			
				@foreach ($postAll as $staff)	
				
				@php
				$liked = $likes->findUserLikes($id, 1, $staff->token)
				@endphp		
				@php
				$disliked = $likes->findUserLikes($id, 2, $staff->token)
				@endphp

				@if (!empty(count($groupId)))
				@foreach ($groupId as $family)
			
				@if ($staff->id === $family->bridge)
				@foreach ($finder as $photo)
				@if (empty($photo->avatar) && $photo->id === $family->bridge)
				@php
						$avatar = asset('/img/friend.png');
				@endphp
				@endif
				@if (!empty($photo->avatar) && $photo->id === $family->bridge)
				@php
						$avatar = $photo->avatar;
				@endphp
				@endif	
				@endforeach
				<div class='margin-item box-width left'>
						<div class='card h-100'>
							<div class='card-body'>
								<div class="label-remove"><button type="button" class="btn btn-outline-info">&#9903;</button></div>

								<div class='label-group'>
								<div class='label-photo'><a href="{{ route('user.show', ['user' => $staff->id]) }}"><img src="{{ $avatar }}" class="img-photo">
								</a></div></div>
								<a href="{{ route('user.show', ['user' => $staff->id]) }}"><div class='label-post'>{{ $staff->name }}</div></a>
								<div class='label-post-date'>{{ date('d M Y H:i', strtotime($staff->created_at)) }}</div>
								<div class='post-text'>{{ $staff->status }}</div>	
								<div class='post-image'><img src="{{ $staff->image }}" class="post-image-size"></div>

								@foreach ($liked as $likers)
									@if ($likers->id === $id && $likers->token === $staff->token)
									@php
									$name = Auth::user()->name;
									@endphp
									@else
									@php
									$name = $staff->likes;
									@endphp
									@endif
								@endforeach

								@if ($staff->likes > 1 && !empty(count($liked)))
								<div class="like-count" id="thumbs{{ $staff->token }}">
									{{ $name }} and {{ $staff->likes - 1 }} others
								</div>
								@endif 
								
								@if ($staff->likes > 1 && empty(count($liked)))
								<div class="like-count" id="thumbs{{ $staff->token }}">
									{{ $staff->likes }}
								</div>
								@endif 

								@if ($staff->likes == 1)
								<div class="like-count" id="thumbs{{ $staff->token }}">
									{{ $name }}
								</div>
								@endif 

								@if ($staff->likes <= 0)
								<div class="like-count tohide" id="thumbs{{ $staff->token }}">
									{{ $staff->likes }}
								</div>
								@endif  

								<div class="post-media-group">
								@if (!empty(count($liked)))						
								<div class="post-like">
										<button class="post-like-btn filled" data-status="liked" data-role="1" data-token="{{ $staff->token }}" data-id="{{ $staff->id }}" data-lk="{{ $staff->likes }}" name="lk{{ $staff->token }}" id="thumbup"></button>
								</div>
								@endif

								@if (empty(count($liked)))			
								<div class="post-like">
										<button class="post-like-btn" data-status="likes" data-role="1" data-token="{{ $staff->token }}" data-id="{{ $staff->id }}" data-lk="{{ $staff->likes + 1 }}" name="lk{{ $staff->token }}" id="thumbup"></button>
								</div>
								@endif

								<div class="post-comment">
										<button class="post-comment-btn"></button>
								</div>	
								</div>
								<div class="post-share-show">Share a friend</div>
				
							</div>
						</div>
					</div>		
					@endif
					@endforeach
					@endif
					
				@if (!empty(count($groupBridge)))
					@foreach ($groupBridge as $family)		

					@if ($staff->id === $family->id)
					@foreach ($finder as $photo)
					@if (empty($photo->avatar) && $photo->id === $family->id)
					@php
							$avatar = asset('/img/friend.png');
					@endphp
					@endif
					@if (!empty($photo->avatar) && $photo->id === $family->id)
					@php
							$avatar = $photo->avatar;
					@endphp
					@endif	
				@endforeach
				<div class='margin-item box-width left'>
						<div class='card h-100'>
							<div class='card-body'>
								<div class="label-remove"><button type="button" class="btn btn-outline-info">&#9903;</button></div>

								<div class='label-group'>
								<div class='label-photo'><a href="{{ route('user.show', ['user' => $staff->id]) }}"><img src="{{ $avatar }}" class="img-photo">
								</a></div></div>
								<a href="{{ route('user.show', ['user' => $staff->id]) }}"><div class='label-post'>{{ $staff->name }}</div></a>
								<div class='label-post-date'>{{ date('d M Y H:i', strtotime($staff->created_at)) }}</div>
								<div class='post-text'>{{ $staff->status }}</div>	
								<div class='post-image'><img src="{{ $staff->image }}" class="post-image-size"></div>		

								@foreach ($liked as $likers)
								@if ($likers->id === $id)
								@php
								$name = Auth::user()->name;
								@endphp
								@else
								@php
								$name = $staff->likes;
								@endphp
								@endif
								@endforeach

								@if ($staff->likes > 1 && !empty(count($liked)))
								<div class="like-count" id="thumbs{{ $staff->token }}">
									{{ $name }} and {{ $staff->likes - 1 }} others
								</div>
								@endif 
								@if ($staff->likes > 1 && empty(count($liked)))
								<div class="like-count" id="thumbs{{ $staff->token }}">
									{{ $staff->likes }}
								</div>
								@endif 
								@if ($staff->likes === 1)
								<div class="like-count" id="thumbs{{ $staff->token }}">
									{{ $name }}
								</div>
								@endif 
								@if ($staff->likes <= 0)
								<div class="like-count tohide" id="thumbs{{ $staff->token }}">
									{{ $staff->likes }}
								</div>
								@endif 
								<div class="post-media-group">
								@if (!empty(count($liked)))						
								<div class="post-like">
										<button class="post-like-btn filled" data-status="liked" data-role="1" data-token="{{ $staff->token }}" data-id="{{ $staff->id }}" data-lk="{{ $staff->likes }}" name="lk{{ $staff->token }}" id="thumbup"></button>
								</div>
								@endif
								@if (empty(count($liked)))			
								<div class="post-like">
										<button class="post-like-btn" data-status="likes" data-role="1" data-token="{{ $staff->token }}" data-id="{{ $staff->id }}" data-lk="{{ $staff->likes + 1 }}" name="lk{{ $staff->token }}" id="thumbup"></button>
								</div>
								@endif
								<div class="post-comment">
										<button class="post-comment-btn"></button>
								</div>	
								</div>
								<div class="post-share-show">Share a friend</div>
	
							</div>
						</div>
					</div>		
					@endif
					@endforeach
					@endif

				@if ($staff->id === $id)

				@foreach ($finder as $photo)
				@if (empty($photo->avatar) && $photo->id === $id)
				@php
						$avatar = asset('/img/friend.png');
				@endphp
				@endif
				@if (!empty($photo->avatar) && $photo->id === $id)
				@php
						$avatar = $photo->avatar;
				@endphp
				@endif	
				@endforeach
				<div class='margin-item box-width left'>
					<div class='card h-100'>
						<div class='card-body'>
							<div class="label-remove"><a href="{{ route('holiday.remove', ['id' => $staff->id, 'data' => $staff->token, 'token' => csrf_token(),]) }}" class="url-remove"><label class="btn btn-outline-info">&#9903;</label></a></div>

							<div class='label-group'>
							<div class='label-photo'><a href="{{ route('user.show', ['user' => $staff->id]) }}" class="url-user-link"><img src="{{ $avatar }}" class="img-photo"></a></div></div>

							<a href="{{ route('user.show', ['user' => $staff->id]) }}"><div class='label-post'>{{ $staff->name }}</div></a>
							<div class='label-post-date'>{{date('d M Y H:i', strtotime($staff->created_at))}}</div>
							<div class='post-text'>{{$staff->status}}</div>
							<div class='post-image'><img src="{{ $staff->image }}" class="post-image-size"></div>

							@foreach ($liked as $likers)
							@if ($likers->id === $id && $staff->id === $id)
							@php
							$name = $staff->name;
							@endphp
							@endif
							@endforeach

							@if ($staff->likes > 1 && !empty(count($liked)) && !empty($name))
							<div class="like-count" id="thumbs{{ $staff->token }}">
								{{$name}} and {{ $staff->likes - 1 }} others
							</div>
							@endif 
							@if ($staff->likes > 1 && empty(count($liked)) && empty($name))
							<div class="like-count" id="thumbs{{ $staff->token }}">
								{{ $staff->likes }}
							</div>
							@endif 
							@if ($staff->likes === 1)
							<div class="like-count" id="thumbs{{ $staff->token }}">
								{{ $staff->likes }}
							</div>
							@endif 
							@if ($staff->likes <= 0)
							<div class="like-count tohide" id="thumbs{{ $staff->token }}">
								{{ $staff->likes }}
							</div>
							@endif 
							<div class="post-media-group">
							@if (!empty(count($liked)))						
							<div class="post-like">
									<button class="post-like-btn filled" data-status="liked" data-role="1" data-token="{{ $staff->token }}" data-id="{{ $staff->id }}" data-lk="{{ $staff->likes }}" name="lk{{ $staff->token }}" id="thumbup"></button>
							</div>
							@endif
							@if (empty(count($liked)))			
							<div class="post-like">
									<button class="post-like-btn" data-status="likes" data-role="1" data-token="{{ $staff->token }}" data-id="{{ $staff->id }}" data-lk="{{ $staff->likes + 1 }}" name="lk{{ $staff->token }}" id="thumbup"></button>
							</div>
							@endif
							<div class="post-comment">
									<button class="post-comment-btn"></button>
							</div>	
							</div>
							<div class="post-share-show">Share a friend</div>

						</div>
					</div>
				</div>		
				@endif

				@endforeach	
				@endif	
		
				@if (empty(count($posts)))
				<div class="margin-item box-width left">
						<div class="card h-100">
							<div class="card-body marker">
								<div class="margin-post">
								Hey {{ $parse->cutSmall(Auth::user()->name) }}, how are you today?
								</div>
							</div>
						</div>
				</div>
				@endif	
								
		</div>
</div>
</div>
@endsection