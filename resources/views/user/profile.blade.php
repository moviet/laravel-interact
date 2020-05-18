@extends('layouts.default')
@section('title') 
Profile
@endsection

@section('media')
<script type="text/javascript" src="{{ asset('/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/search.js') }}"></script>
	<script type="text/javascript" src="{{ asset('/js/flag-profile.js') }}" async></script>
	<script type="text/javascript" src="{{ asset('/js/profiler.js') }}" async></script>
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/css/content.css') }}">
@endsection

@section('content')
<div class="container-head">
	<div class="content-profile">
		@inject ('likes','App\Scopes\Likeable')

		@inject ('parse','App\Bubble\Core\NameParser')

		<div class="col-xs-8 margin-profile" id="alert">
				<div class="card h-80">		
					<div class="card-body text-center" id="new-alert">	
						<label></label>			
					</div>
				</div>
		</div>

		@if ($errors->has('profile'))
		<div class="col-xs-8 margin-profile" id="alert">
				<div class="card h-80">		
					<div class="card-body text-center" id="new-alert">	
						Image extension has been invalid
					</div>
				</div>
		</div>
		@endif

		<div class="col-xs-8 margin-profile">
			<div class="card h-110">		
				<div class="card-body">

					@if ($id === $admin)
					<div class="edit-profile">
						<label class="label-upload-profile" for="profile">
							<img src="{{ asset('/img/edit.png') }}" class="edit-thumb">
							<input class="profile-upload" type="file" name="profile" id="profile" value="">
						</label>
					</div>
					@endif

					@foreach ($profile as $data)
						@if ($data->id === $id)
							@if (!empty($data->avatar))
					<div class="card-img-profile">
						<img src="{{ $data->avatar }}" class="img-thumb" id="photo-profile">
					</div>		
											
							@else
					<div class="card-img-profile">
							<img src="{{ asset('/img/profile.png') }}" class="img-thumb">
					</div>
							@endif	
					<div class="title-profile text-center">{{ $parse->fully($data->name) }}</div>
						@endif
					@endforeach

					@if ($id === $admin)
					<div class="friend-profile-link text-center">
						<img src="{{ asset('/img/heart.png') }}" class="img-friend-link">{{ $parse->cutSmall($data->name) }}</div>
					@endif
	
					@if (!empty(count($gates)))
						@foreach ($gates as $family)	
							@if ($id !== $admin && $family->id === $admin && $family->bridge === $id)		
								<div class="friend-wait-link text-center">{{ 'Wait Approved' }}</div>
							@endif
						@endforeach
					@endif

					@if (!empty(count($links)))
						@foreach ($links as $family)	
							@if ($id !== $admin && $family->bridge === $admin && $family->id === $id)		
								<form method='POST' action='{{ route('attract.store') }}'>
								<input type='hidden' name="name" value='{{ $family->name }}'>
								<input type='hidden' name="id" value='{{ $id }}'>
								@csrf
								<input type="submit" value="Approved" class="btn contact-link text-center">
								</form>
							@endif
						@endforeach
					@endif

					@if (!empty(count($group)) )
						@foreach ($group as $fans)
							@if ($id !== $admin && $fans->id === $admin && $fans->bridge === $id)
								<div class="friend-profile-link tx-center"><img src="{{ asset('/img/heart.png') }}" class="img-friend-link">{{ $parse->cutSmall($data->name) }}</div>
							@endif
						@endforeach
					@endif

					@if (!empty(count($friend)) )
						@foreach ($friend as $fans)
							@if ($id !== $admin && $fans->bridge === $admin && $fans->id === $id)
								<div class="friend-profile-link tx-center"><img src="{{ asset('/img/heart.png') }}" class="img-friend-link">{{ $parse->cutSmall($data->name) }}</div>
							@endif
						@endforeach
					@endif
				
					@if ($id !== $admin && empty(count($links)) && empty(count($gates)) && empty(count($group)) && empty(count($friend)))
					<form method='POST' action='{{ route('friend.store') }}'>
					<input type='hidden' name="name" value='{{ $data->name }}'>
					<input type='hidden' name="id" value='{{ $id }}'>
					@csrf
					<input type="submit" value="Add as friend" class="btn contact-link text-center">
					</form>
					@endif
								
				</div>
			</div>
	
				@if ($admin === $id)
				<div class="margin-item">
					<div class="card h-100">
						<div class="card-body">
							<a href="#" class="label-top-profile">Edit Profile</a>
						</div>
					</div>
				</div>

				<div class="margin-item">
					<div class="card h-100">
						<div class="card-body">
							<a href="#" class="label-top-profile">Edit Description</a>
						</div>
					</div>
				</div>
				@endif
				
				@if ($admin === $id && !empty(count($pull)))		
				<div class="margin-item">
						<div class="card h-100">
							<div class="card-body">
								<div class="label-top">Need Approved {{ count($pull) }}</div>
									<div class="row-friend-scroll" id="new-friend">
										@foreach ($pull as $fiend)			
										<div class="col-friend-profile small-box">
											<a href="{{  route('user.show', ['user' => $fiend->id]) }}">
												<img src="{{ asset('/img/friend.png') }}" class="img-thumbs">
												<label class="label-as-friend"><span class="icon-heart">&#10084;</span> {{ $parse->cutSmall($fiend->name) }}</label>
											</a>
										</div>
										@endforeach																				
									</div>
									<div class="auto-scroll">
											<button id="approve-new-friend" class="btn-scroll">▶</button>
									</div>
								</div>
							</div>
					</div>	
					@endif	

					@if ($admin === $id && !empty(count($push)))			
					<div class="margin-item">
							<div class="card h-100">
								<div class="card-body">
									<div class="label-top">Wait Approved {{ count($push) }}</div>
										<div class="row-friend-scroll" id="wait-friend">
											@foreach ($push as $fiend)	
											<div class="col-friend-profile small-box">
												<a href="{{ route('user.show', ['user' => $fiend->bridge]) }}">
													<img src="{{ asset('/img/friend.png') }}" class="img-thumbs">
													<label class="label-as-friend"><span class="icon-heart">&#10084;</span> {{ $parse->cutSmall($fiend->adds) }}</label>
												</a>
											</div>
											@endforeach	
										</div>																		
									<div class="auto-scroll">
											<button id="wait-new-friend" class="btn-scroll">▶</button>
									</div>
							</div>
						</div>
					</div>
						@endif

					@inject ('grups','App\Scopes\Groups')
					@php
					$groupId = $grups->findFriendByGroupId($id);
					@endphp
					@php
					$groupBridge = $grups->findFriendByGroupBridge($id);
					@endphp
							
					<div class="margin-item">
							<div class="card h-100">
								<div class="card-body">
									<div class="label-top">My Friends  {{ count($groupId) + count($groupBridge) }}</div>
										<div class="row-friend-scroll" id="my-friend">
												
											@if (!empty($groupId))	
											
											@foreach ($groupId as $fans)	
											@foreach ($finder as $photo)	

											@if ($fans->id === $id && $fans->bridge !== $id)		
											@if ($photo->id === $fans->bridge)			
											@if (empty($photo->avatar))
											@php
													$avatar = asset('/img/friend.png');
											@endphp
											@elseif (!empty($photo->avatar))
											@php
													$avatar = $photo->avatar;
											@endphp
											@endif							
											<div class="col-friend-profile small-box">
												<a href="{{  route('user.show', ['user' => $fans->bridge]) }}">
													<img src="{{ $avatar }}" class="img-thumbs">
													<div class="label-friend text-center"><span class="icon-heart">&#10084;</span> {{ $parse->cutSmall($fans->adds) }}</div>
												</a>
											</div>	
											@endif
											@endif
											@endforeach	
											@endforeach	
											@endif

											@if (!empty($groupBridge))
		
											@foreach ($groupBridge as $fans)
											@foreach ($finder as $photo)			
																
											@if ($fans->bridge === $id && $fans->id !== $id)	
											@if ($photo->id === $fans->id)	
											@if (empty($photo->avatar))
											@php
													$avatar = asset('/img/friend.png');
											@endphp
											@elseif (!empty($photo->avatar))
											@php
													$avatar = $photo->avatar;
											@endphp
											@endif
													
											<div class="col-friend-profile small-box">
													<a href="{{ route('user.show', ['user' => $fans->id]) }}">
														<img src="{{ $avatar }}" class="img-thumbs">
														<div class="label-friend text-center"><span class="icon-heart">&#10084;</span> {{ $parse->cutSmall($fans->name) }}</div>
													</a>
											</div>
											@endif
											@endif
											@endforeach
											@endforeach
											@endif
											

											@if (empty(count($groupId)) && empty(count($groupBridge)))				
											<div class="col-xs-4 left">
													<div class="label-new">Hello, Already Add A Friend</div>
											</div>
											@endif

									</div>
									<div class="auto-scroll">
											<button id="friend" class="btn-scroll">▶</button>
										</div>
								</div>
								
							</div>
						</div>	
						

						<div class="margin-item">
								<div class="card h-100">
									<div class="card-body">
										<div class="label-top"><a href="/search" class="label-top-link">Find A Friend</a></div>
											<div class="row-friend-scroll" id="find-friend">
												@foreach ($finder as $fiend)					
												<div class="col-friend-profile">
														<a href="{{  route('user.show', ['user' => $fiend->id]) }}">
															<img src="{{ $fiend->avatar ? $fiend->avatar : asset('/img/friend.png') }}" class="img-thumbs">
															<div class="label-friend text-center"><span class="icon-heart">&#10084;</span> {{ $parse->cutSmall($fiend->name) }}</div>
														</a>
												</div>										
												@endforeach																									
										</div>
										<div class="auto-scroll">
												<button id="find-more-friend" class="btn-scroll">▶</button>
											</div>
									</div>
									</div>
								</div>

					@if ($id !== $admin && empty(count($posts)) && (!empty(count($friend)) || !empty(count($group))))
					<div class="margin-item box-width left">
							<div class="card h-90 bg-none">
								<div class="card-body">
									<div class="post-status">There is no post yet!</div>
								</div>
							</div>
					</div>
					@endif
					
					@if (count($postAll) > 0 && (!empty(count($group)) || !empty(count($friend))) || $id === $admin)
					<div class="margin-active-card">
						<div class="h-100">
								Last Interactime:
						</div>
					</div>	

					@if ($id === $admin)
					<div class="margin-item box-width left">
							<div class="card h-80">
								<div class="card-body">
										<form method='POST' action='{{ route('holiday.store') }}' enctype="multipart/form-data">
												<div class="form-group-status purple-border">				
														@if ($errors->has('capture'))	
														<span class='alert-error-profile'>{{ $errors->first('capture') }}</span>
														@endif

														@if ($errors->has('status')) 
														<span class='alert-error-profile'>{{ $errors->first('status') }}</span>
														@endif

														<input type='hidden' name='capture' value='{{ $token }}'>
														@csrf
														<textarea class="form-control-status" name='status' rows="3" placeholder="Hey {{ $parse->cutSmall(Auth::user()->name) }}, how are you today?"></textarea>
												</div>
												<div class="media-upload">
														<label class="label-upload" for="upload">										
																<span class="span-upload"> Image
																	</span>
																<img src="{{ asset('img/upload-i.png') }}" class="media-photo">		
																<span class="span-upload-filename"> No image selected
																	</span>										
													</label>
												<input class="btn-upload" type="file" name="photos" id="upload" value="">
												</div>
												<input class="btn-post btn-primary-status" type="submit" value="Share A Friend">
											</form>
								</div>
							</div>
					</div>
					@endif
			
					@foreach ($postAll as $stats)	

					@php
					$adminLiked = $likes->findUserLikes($admin, 1, $stats->token)
					@endphp
					@php
					$adminDisliked = $likes->findUserLikes($admin, 2, $stats->token)
					@endphp

					@if ($stats->id === $admin)		
					<div class="margin-item box-width left">
							<div class="card h-100">
								<div class="card-body">
									<div class="label-remove">
											<a href="{{ route('holiday.remove', ['id' => $stats->id, 'data' => $stats->token, 'token' => csrf_token(),]) }}
											" class="url-remove"><label class="btn btn-outline-info">&#9903;</label></a>
									</div>

									@foreach ($profile as $photo)							
									@if ($photo->id === $id)							
									@if (empty($photo->avatar))
									@php
											$avatar = asset('/img/friend.png');
									@endphp
									@elseif (!empty($photo->avatar))
									@php
											$avatar = $photo->avatar;
									@endphp
									@endif

									<div class='label-group'>
									<div class='label-photo'><a href="{{ route('user.show', ['user' => $stats->id]) }}">
										<img src="{{ $avatar }}" class="img-photo">
									</a></div></div>						
									@endif
									@endforeach

									<a href="{{ route('user.show', ['user' => $stats->id]) }}">
										<div class='label-post'>{{$stats->name }}</div>
									</a>

									<div class='label-post-date'>{{date('d M Y H:i', strtotime($stats->created_at))}}</div>
									<div class='post-text'>{{ $stats->status }}</div>
									<div class='post-image-profile'><img src="{{ $stats->image }}" class="post-image-size-profile"></div>

									@if ($stats->likes > 1 && !empty(count($adminLiked)))
									<div class="like-count" id="thumbs{{ $stats->token }}">
									{{Auth::user()->name}} and {{ $stats->likes }} others
									</div>
									@endif 
									@if ($stats->likes > 1 && empty(count($adminLiked)))
									<div class="like-count" id="thumbs{{ $stats->token }}">
										{{ $stats->likes }}
									</div>
									@endif 
									@if ($stats->likes === 1)
									<div class="like-count" id="thumbs{{ $stats->token }}">
										{{Auth::user()->name}}
									</div>
									@endif 
									@if ($stats->likes <= 0)
									<div class="like-count tohide" id="thumbs{{ $stats->token }}">
									{{Auth::user()->name}}
									</div>
									@endif 

									<div class="post-media-group">
									@if (!empty(count($adminLiked)))						
									<div class="post-profile-like">
											<button class="post-profile-like-btn profilled" data-status="liked" data-role="1" data-token="{{ $stats->token }}" data-id="{{ $stats->id }}" data-lk="{{ $stats->likes }}" name="lk{{ $stats->token }}" id="thumbup"></button>
									</div>
									@endif
									@if (empty(count($adminLiked)))			
									<div class="post-profile-like">
											<button class="post-profile-like-btn" data-status="likes" data-role="1" data-token="{{ $stats->token }}" data-id="{{ $stats->id }}" data-lk="{{ $stats->likes + 1 }}" name="lk{{ $stats->token }}" id="thumbup"></button>
									</div>
									@endif
									<div class="post-profile-comment">
											<button class="post-profile-comment-btn"></button>
									</div>	
									<div class="post-profile-share">
											
											<button class="post-profile-share-btn">
													Share
											</button>
									</div>	
									</div>
	
								</div>
							</div>
					</div>
					@endif

					@if ($id !== $admin && count($posts) > 0 && !empty(count($group)))	
					@foreach ($group as $fans)
					@if ($fans->bridge === $id)
					<div class="margin-item box-width left">
							<div class="card h-100">
								<div class="card-body">
										<div class="label-remove"><label class="btn btn-outline-info">&#9903;</label></div>

										@foreach ($profile as $photo)							
										@if ($photo->id === $fans->bridge)							
										@if (empty($photo->avatar))
										@php
												$avatar = asset('/img/friend.png');
										@endphp
										@elseif (!empty($photo->avatar))
										@php
												$avatar = $photo->avatar;
										@endphp
										@endif

										<div class='label-group'>
										<div class='label-photo'><a href="{{ route('user.show', ['user' => $stats->id]) }}"><img src="{{ $avatar }}" class="img-photo">
										</a></div></div>
										@endif
										@endforeach

										<a href="{{ route('user.show', ['user' => $stats->id]) }}"><div class='label-post'>{{ $stats->name }}</div></a>

										<div class='label-post-date'>{{date('d M Y H:i', strtotime($stats->created_at))}}</div>
										<div class='post-text'>{{ $stats->status }}</div>
										<div class='post-image-profile'><img src="{{ $stats->image }}" class="post-image-size-profile"></div>

										@if ($stats->likes > 1 && !empty(count($adminLiked)))
										<div class="like-count" id="thumbs{{ $stats->token }}">
										{{Auth::user()->name}} and {{ $stats->likes }} others
										</div>
										@endif 
										@if ($stats->likes > 1 && empty(count($adminLiked)))
										<div class="like-count" id="thumbs{{ $stats->token }}">
											{{ $stats->likes }}
										</div>
										@endif 
										@if ($stats->likes === 1)
										<div class="like-count" id="thumbs{{ $stats->token }}">
											{{Auth::user()->name}}
										</div>
										@endif 
										@if ($stats->likes <= 0)
										<div class="like-count tohide" id="thumbs{{ $stats->token }}">
										{{Auth::user()->name}}
										</div>
										@endif 

										<div class="post-media-group">
										@if (!empty(count($adminLiked)))						
										<div class="post-profile-like">
												<button class="post-profile-like-btn profilled" data-status="liked" data-role="1" data-token="{{ $stats->token }}" data-id="{{ $stats->id }}" data-lk="{{ $stats->likes }}" name="lk{{ $stats->token }}" id="thumbup"></button>
										</div>
										@endif
										@if (empty(count($adminLiked)))			
										<div class="post-profile-like">
												<button class="post-profile-like-btn" data-status="likes" data-role="1" data-token="{{ $stats->token }}" data-id="{{ $stats->id }}" data-lk="{{ $stats->likes + 1 }}" name="lk{{ $stats->token }}" id="thumbup"></button>
										</div>
										@endif
										<div class="post-profile-comment">
												<button class="post-profile-comment-btn"></button>
										</div>	
										<div class="post-profile-share">
												
												<button class="post-profile-share-btn">
														Share
												</button>
										</div>	
										</div>


										{{--
										<div class="group-media-icon" style="display: none">>
										<table class="table-media-icon">
										<tbody>
										<tr>
	
										@if (!empty(count($adminLiked)) && !empty($stats->likes))
										<td class="icon-media-box-profile-like">

												<button class="link-icon-media filled" data-status="likes" data-role="1" data-token="{{ $stats->token }}" data-id="{{ $stats->id }}" data-lk="{{ $stats->likes }}" data-dk="{{ $stats->dislikes }}" name="lk{{ $stats->token }}">
												<div class="icon-media-like">
														<label>{{ $stats->likes }}</label>			
												</div></button>
			
										</td>
										@endif
	
										@if (empty(count($adminLiked)) && !empty($stats->likes))
										<td class="icon-media-box-profile-like">

												<button class="link-icon-media" data-status="likes" data-token="{{ $stats->token }}" data-id="{{ $stats->id }}" data-lk="{{ $stats->likes }}" data-dk="{{ $stats->dislikes }}" name="lk{{ $stats->token }}">
														<div class="icon-media-like">
																<label>{{ $stats->likes }}</label>
														</div></button>
		
										</td>
										@endif
	
										@if (empty(count($adminLiked)) && empty($stats->likes))
										<td class="icon-media-box-profile-like">
												<button class="link-icon-media" data-status="likes" data-token="{{ $stats->token }}" data-id="{{ $stats->id }}" name="lk{{ $stats->token }}"><div class="icon-media-like">like</div></button>
										</td>
										@endif
	
										@if (!empty(count($adminDisliked)) && !empty($stats->dislikes))
										<td class="icon-media-box-profile-dislike">

												<button class="link-icon-media filled" data-status="dislikes" data-role="2" data-token="{{ $stats->token }}" data-id="{{ $stats->id }}" data-lk="{{ $stats->likes }}" data-dk="{{ $stats->dislikes }}" name="dk{{ $stats->token }}">
														<div class="icon-media-dislike">
																<label>{{ $stats->dislikes }}</label>
														</div></button>
		
										</td>	
										@endif
										
										@if (empty(count($adminDisliked)) && !empty($stats->dislikes))
										<td class="icon-media-box-profile-dislike">

												<button class="link-icon-media" data-status="dislikes" data-token="{{ $stats->token }}" data-id="{{ $stats->id }}" data-lk="{{ $stats->likes }}" data-dk="{{ $stats->dislikes }}" name="dk{{ $stats->token }}">
														<div class="icon-media-dislike">
																<label>{{ $stats->dislikes }}</label>			
														</div></button>
		
										</td>
										@endif
					
										@if (empty(count($adminDisliked)) && empty($stats->dislikes))
										<td class="icon-media-box-profile-dislike">
												<button class="link-icon-media" data-status="dislikes" data-token="{{ $stats->token }}" data-id="{{ $stats->id }}" name="dk{{ $stats->token }}"><div class="icon-media-dislike">not</div></button>
										</td>
										@endif
	
										<td class="icon-media-box-shares">
												<a class="link-icon-media-profile" id="share" href="#"><div class="icon-media-shares">share</div></a>
										</td>
		
										<td class="icon-media-box-comment-profile">
												<a class="link-icon-media-comment" href="#"><div class="icon-media-comment"></div></a>
										</td>

										</tr>
										<tbody>
										</table>
										</div>
										--}}




								</div>
							</div>
					</div>
					@endif
					@endforeach		

					@elseif ($id !== $admin && count($posts) > 0 && !empty(count($friend)))	
					@foreach ($friend as $fans)
					@if ($fans->id === $id)
					<div class="margin-item box-width left">
							<div class="card h-100">
								<div class="card-body">
										<div class="label-remove"><label class="btn btn-outline-info">&#9903;</label></div>

										@foreach ($profile as $photo)							
										@if ($photo->id === $fans->id)							
										@if (empty($photo->avatar))
										@php
												$avatar = asset('/img/friend.png');
										@endphp
										@elseif (!empty($photo->avatar))
										@php
												$avatar = $photo->avatar;
										@endphp
										@endif

										<div class='label-group'>
										<div class='label-photo'><a href="{{ route('user.show', ['user' => $stats->id]) }}"><img src="{{ $avatar }}" class="img-photo">
										</a></div></div>
										@endif
										@endforeach

										<a href="{{ route('user.show', ['user' => $stats->id]) }}"><div class='label-post'>{{$stats->name }}</div></a>

										<div class='label-post-date'>{{date('d M Y H:i', strtotime($stats->created_at))}}</div>
										<div class='post-text'>{{$stats->status}}</div>
										<div class='post-image-profile'><img src="{{ $stats->image }}" class="post-image-size-profile"></div>

										@if ($stats->likes > 1 && !empty(count($adminLiked)))
										<div class="like-count" id="thumbs{{ $stats->token }}">
										{{Auth::user()->name}} and {{ $stats->likes }} others
										</div>
										@endif 
										@if ($stats->likes > 1 && empty(count($adminLiked)))
										<div class="like-count" id="thumbs{{ $stats->token }}">
											{{ $stats->likes }}
										</div>
										@endif 
										@if ($stats->likes === 1)
										<div class="like-count" id="thumbs{{ $stats->token }}">
											{{Auth::user()->name}}
										</div>
										@endif 
										@if ($stats->likes <= 0)
										<div class="like-count tohide" id="thumbs{{ $stats->token }}">
										{{Auth::user()->name}}
										</div>
										@endif 

										<div class="post-media-group">
										@if (!empty(count($adminLiked)))						
										<div class="post-profile-like">
												<button class="post-profile-like-btn profilled" data-status="liked" data-role="1" data-token="{{ $stats->token }}" data-id="{{ $stats->id }}" data-lk="{{ $stats->likes }}" name="lk{{ $stats->token }}" id="thumbup"></button>
										</div>
										@endif
										@if (empty(count($adminLiked)))			
										<div class="post-profile-like">
												<button class="post-profile-like-btn" data-status="likes" data-role="1" data-token="{{ $stats->token }}" data-id="{{ $stats->id }}" data-lk="{{ $stats->likes + 1 }}" name="lk{{ $stats->token }}" id="thumbup"></button>
										</div>
										@endif
										<div class="post-profile-comment">
												<button class="post-profile-comment-btn"></button>
										</div>	
										<div class="post-profile-share">
												
												<button class="post-profile-share-btn">
														Share
												</button>
										</div>	
										</div>



										{{--
										<div class="group-media-icon" style="display: none">>
										<table class="table-media-icon">
										<tbody>
										<tr>

										@if (!empty(count($adminLiked)) && !empty($stats->likes))
										<td class="icon-media-box-profile-like">

												<button class="link-icon-media filled" data-status="likes" data-role="1" data-token="{{ $stats->token }}" data-id="{{ $stats->id }}" data-lk="{{ $stats->likes }}" data-dk="{{ $stats->dislikes }}" name="lk{{ $stats->token }}">
												<div class="icon-media-like">
														<label>{{ $stats->likes }}</label>			
												</div></button>
			
										</td>
										@endif
	
										@if (empty(count($adminLiked)) && !empty($stats->likes))
										<td class="icon-media-box-profile-like">

												<button class="link-icon-media" data-status="likes" data-token="{{ $stats->token }}" data-id="{{ $stats->id }}" data-lk="{{ $stats->likes }}" data-dk="{{ $stats->dislikes }}" name="lk{{ $stats->token }}">
														<div class="icon-media-like">
																<label>{{ $stats->likes }}</label>
														</div></button>
		
										</td>	
										@endif
	
										@if (empty(count($adminLiked)) && empty($stats->likes))
										<td class="icon-media-box-profile-like">
												<button class="link-icon-media" data-status="likes" data-token="{{ $stats->token }}" data-id="{{ $stats->id }}" name="lk{{ $stats->token }}"><div class="icon-media-like">like</div></button>
										</td>
										@endif

										@if (!empty(count($adminDisliked)) && !empty($stats->dislikes))
										<td class="icon-media-box-profile-dislike">

												<button class="link-icon-media filled" data-status="dislikes" data-role="2" data-token="{{ $stats->token }}" data-id="{{ $stats->id }}" data-lk="{{ $stats->likes }}" data-dk="{{ $stats->dislikes }}" name="dk{{ $stats->token }}">
														<div class="icon-media-dislike">
																<label>{{ $stats->dislikes }}</label>
														</div></button>
		
										</td>	
										@endif
										
										@if (empty(count($adminDisliked)) && !empty($stats->dislikes))
										<td class="icon-media-box-profile-dislike">

												<button class="link-icon-media" data-status="dislikes" data-token="{{ $stats->token }}" data-id="{{ $stats->id }}" data-lk="{{ $stats->likes }}" data-dk="{{ $stats->dislikes }}" name="dk{{ $stats->token }}">
														<div class="icon-media-dislike">
																<label>{{ $stats->dislikes }}</label>			
														</div></button>
		
										</td>
										@endif
					
										@if (empty(count($adminDisliked)) && empty($stats->dislikes))
										<td class="icon-media-box-profile-dislike">
												<button class="link-icon-media" data-status="dislikes" data-token="{{ $stats->token }}" data-id="{{ $stats->id }}" name="dk{{ $stats->token }}"><div class="icon-media-dislike">not</div></button>
										</td>
										@endif
	
										<td class="icon-media-box-shares">
												<a class="link-icon-media-profile" id="share" href="#"><div class="icon-media-shares">share</div></a>
										</td>
		
										<td class="icon-media-box-comment-profile">
												<a class="link-icon-media-comment" href="#"><div class="icon-media-comment"></div></a>
										</td>

										</tr>
										</tbody>
										</table>
										</div>
										--}}



								
									</div>
							</div>
						</div>
					@endif
					@endforeach
					@endif

					@endforeach		
					@endif			
		</div>
</div>
</div>
@endsection