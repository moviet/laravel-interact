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

				<div class="map-url">
						<a href="/home/{{Auth::user()->uid}}" class="map-url-dashboard">Dashboard &#9829;</a> <span class="map-url-link">Profile</span>
				</div>

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
												Invalid image extension
										</div>
								</div>
						</div>
				@endif

				<div class="col-xs-8 margin-profile">
						<div class="card h-110">		
								<div class="card-body">

										@if ($id === $admin)
												<div class="edit-profile" title="Change Photo Profile">
														<label class="label-upload-profile" for="profile">
																<img src="{{ asset('/img/edit.png') }}" class="edit-thumb">
																<input class="profile-upload" type="file" name="profile" id="profile" accept="image/*;capture=camera">
														</label>
												</div>
										@endif

										@foreach ($profile as $data)
												@if ($data->id === $id)
														@if (!empty($data->avatar))
																<div class="card-img-profile">
																	<img src="{{ asset($data->avatar) }}" class="img-thumb" id="photo-profile">
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
														<img src="{{ asset('/img/heart.png') }}" class="img-friend-link">{{ $parse->cutSmall($data->name) }}
												</div>
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
																<div class="friend-profile-link tx-center">
																		<img src="{{ asset('/img/heart.png') }}" class="img-friend-link">{{ $parse->cutSmall($data->name) }}
																</div>
														@endif
												@endforeach
										@endif

										@if (!empty(count($friend)) )
												@foreach ($friend as $fans)
														@if ($id !== $admin && $fans->bridge === $admin && $fans->id === $id)
																<div class="friend-profile-link tx-center">
																		<img src="{{ asset('/img/heart.png') }}" class="img-friend-link">{{ $parse->cutSmall($data->name) }}
																</div>
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
														<div class="label-top">Need Approved ({{ count($pull) }})</div>
																<div class="row-friend-scroll" id="new-friend">
																		@foreach ($pull as $fiend)			
																				<div class="col-friend-profile small-box">
																							<a href="{{  route('user.show', ['user' => $fiend->id]) }}">
																									<img src="{{ asset('/img/friend.png') }}" class="img-thumbs">
																									<label class="label-as-friend"><span class="icon-heart">&#10084;</span> {{ $parse->cutSmall($fiend->name) }}
																									</label>
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
															<div class="label-top">Wait Approved ({{ count($push) }})</div>

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
							@php
									$total = count($groupId) + count($groupBridge);
									$countFriend = ($total === 0) ? '' : '('.$total.')';
							@endphp
									
							<div class="margin-item">
										<div class="card h-100">
												<div class="card-body">
														<div class="label-top">Friends  {{ $countFriend }}</div>

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
																														$avatar = asset($photo->avatar);
																												@endphp
																										@endif	

																										<div class="col-friend-profile small-box">
																												<a href="{{  route('user.show', ['user' => $fans->bridge]) }}">
																														<img src="{{ $avatar }}" class="img-thumbs">
																														<div class="label-friend text-center">
																																<span class="icon-heart">&#10084;</span> {{ $parse->cutSmall($fans->adds) }}
																														</div>
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
																														$avatar = asset($photo->avatar);
																												@endphp
																										@endif
																												
																										<div class="col-friend-profile small-box">
																												<a href="{{ route('user.show', ['user' => $fans->id]) }}">
																														<img src="{{ $avatar }}" class="img-thumbs">
																														<div class="label-friend text-center">
																																<span class="icon-heart">&#10084;</span> {{ $parse->cutSmall($fans->name) }}
																														</div>
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
																			<img src="{{ $fiend->avatar ? asset($fiend->avatar) : asset('/img/friend.png') }}" class="img-thumbs">
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

																			@elseif ($errors->has('photos')) 
																			<span class='alert-error-profile'>{{ $errors->first('photos') }}</span>
																			@endif

																			<input type='hidden' name='capture' value='{{ $token }}'>
																			@csrf
																			<textarea class="form-control-status" name='status' rows="3" placeholder="Hey {{ $parse->cutSmall(Auth::user()->name) }}, how are you today?"></textarea>
																	</div>
																	<div class="media-upload">
																			<label class="label-upload" for="upload">										
																					<span class="span-upload"> Image</span>
																					<img src="{{ asset('img/upload-i.png') }}" class="media-photo">		
																					<span class="span-upload-filename"> No image selected</span>										
																		</label>
																	<input class="btn-upload" type="file" name="photos" id="upload" accept="image/*;capture=camera">
																	</div>
																	{{-- btn-post btn-primary-status --}}
																	<input class="btn btn-primary" type="submit" value="Share A Friend">
																</form>
													</div>
												</div>
										</div>
								@endif
					
					{{-- POSTING STATUS --}}
					@foreach ($postAll as $staff)	
							@php
									$adminLiked = $likes->findUserLikes($admin, $staff->token)
							@endphp

							@if (!empty(count($adminLiked)))
									@foreach ($adminLiked as $likers)
											@if ($staff->likes === 1 && $likers->id === $admin && $likers->token === $staff->token)
													@php
															$countLike = Auth::user()->name;
															$statusLike = 'liked';
															$styleLike = 'profilled';
													@endphp

											@elseif ($staff->likes >= 1 && $likers->id === $admin && $likers->token === $staff->token)
													@php
															$countLike = Auth::user()->name.' and '.($staff->likes - 1).' others';
															$statusLike = 'liked';
															$styleLike = 'profilled';
													@endphp

											@else
													@php
															$countLike = null;
															$statusLike = 'likes';
															$styleLike = '';
													@endphp
											@endif
									@endforeach

							@else
									@if ($staff->likes > 0)
											@php
													$countLike = $staff->likes;
													$statusLike = 'likes';
													$styleLike = '';
											@endphp
									@else
											@php
													$countLike = null;
													$statusLike = 'likes';
													$styleLike = '';
											@endphp
									@endif
							@endif

					@if ($staff->id === $admin)		
							<div class="margin-item box-width left">
									<div class="card h-100">
											<div class="card-body">
													<div class="label-remove" title="Delete Status">
															<a href="{{ route('holiday.remove', ['id' => $staff->id, 'data' => $staff->token, 'token' => csrf_token(),]) }}" class="url-remove">
																	<label class="btn btn-outline-info">&#9903;</label>
															</a>
													</div>

													@foreach ($profile as $photo)							
															@if ($photo->id === $id)							
																	@if (empty($photo->avatar))
																	@php
																			$avatar = asset('/img/friend.png');
																	@endphp
																	@elseif (!empty($photo->avatar))
																	@php
																			$avatar = asset($photo->avatar);
																	@endphp
																	@endif

																	<div class='label-group'>
																			<div class='label-photo'>
																					<a href="{{ route('user.show', ['user' => $staff->id]) }}">
																							<img src="{{ $avatar }}" class="img-photo">
																					</a>
																			</div>
																	</div>						
															@endif
													@endforeach

													<a href="{{ route('user.show', ['user' => $staff->id]) }}">
															<div class='label-post'>{{$staff->name }}</div>
													</a>

													<div class='label-post-date'>{{date('d M Y H:i', strtotime($staff->created_at))}}</div>
													<div class='post-text'>{{ $staff->status }}</div>
													<div class='post-image-profile'>
															@if (!is_null($staff->image))
																	<img src="{{ asset($staff->image) }}" class="post-image-size-profile">
															@endif
													</div>
													

													@if ($staff->likes > 0)
															<div class="like-count" id="thumbs{{ $staff->token }}">
																	{{ $countLike }}
															</div>

													@else
															<div class="like-count tohide" id="thumbs{{ $staff->token }}">
																	{{ $countLike }}
															</div>
													@endif  

													<div class="post-media-group">
															<div class="post-profile-like">
																	<button class="post-profile-like-btn {{ $styleLike }}" data-status="{{ $statusLike }}" data-role="1" data-token="{{ $staff->token }}" data-id="{{ $staff->id }}" data-lk="{{ (int)$staff->likes }}" name="lk{{ $staff->token }}" data-admin="{{Auth::user()->name}}" id="thumbup">
																	</button>
															</div>
														
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
																<div class="label-remove">
																		<label class="btn btn-outline-info">&#9903;</label>
																</div>

																@foreach ($profile as $photo)							
																		@if ($photo->id === $fans->bridge)							
																				@if (empty($photo->avatar))
																				@php
																						$avatar = asset('/img/friend.png');
																				@endphp
																				@elseif (!empty($photo->avatar))
																				@php
																						$avatar = asset($photo->avatar);
																				@endphp
																				@endif

																				<div class='label-group'>
																						<div class='label-photo'>
																								<a href="{{ route('user.show', ['user' => $staff->id]) }}">
																										<img src="{{ $avatar }}" class="img-photo">
																								</a>
																						/div>
																				</div>
																		@endif
																@endforeach

																<a href="{{ route('user.show', ['user' => $staff->id]) }}">
																		<div class='label-post'>{{ $staff->name }}</div>
																</a>

																<div class='label-post-date'>{{date('d M Y H:i', strtotime($staff->created_at))}}</div>

																<div class='post-text'>{{ $staff->status }}</div>
																<div class='post-image-profile'>
																		@if (!is_null($staff->image))
																				<img src="{{ asset($staff->image) }}" class="post-image-size-profile">
																		@endif
																</div>

																@if ($staff->likes > 0)
																		<div class="like-count" id="thumbs{{ $staff->token }}">
																				{{ $countLike }}
																		</div>

																@else
																		<div class="like-count tohide" id="thumbs{{ $staff->token }}">
																				{{ $countLike }}
																		</div>
																@endif  

																<div class="post-media-group">
																		<div class="post-profile-like">
																				<button class="post-profile-like-btn {{ $styleLike }}" data-status="{{ $statusLike }}" data-role="1" data-token="{{ $staff->token }}" data-id="{{ $staff->id }}" data-lk="{{ (int)$staff->likes }}" name="lk{{ $staff->token }}" data-admin="{{Auth::user()->name}}" id="thumbup">
																				</button>
																		</div>

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
							@endforeach		

					@elseif ($id !== $admin && count($posts) > 0 && !empty(count($friend)))	
							@foreach ($friend as $fans)
									@if ($fans->id === $id)
											<div class="margin-item box-width left">
													<div class="card h-100">
															<div class="card-body">
																	<div class="label-remove">
																			<label class="btn btn-outline-info">&#9903;</label>
																	</div>

																	@foreach ($profile as $photo)							
																			@if ($photo->id === $fans->id)							
																					@if (empty($photo->avatar))
																					@php
																							$avatar = asset('/img/friend.png');
																					@endphp
																					@elseif (!empty($photo->avatar))
																					@php
																							$avatar = asset($photo->avatar);
																					@endphp
																					@endif

																					<div class='label-group'>
																							<div class='label-photo'>
																									<a href="{{ route('user.show', ['user' => $staff->id]) }}">
																											<img src="{{ $avatar }}" class="img-photo">
																									</a>
																							</div>
																					</div>
																			@endif
																	@endforeach

																	<a href="{{ route('user.show', ['user' => $staff->id]) }}">
																			<div class='label-post'>{{$staff->name }}</div>
																	</a>

																	<div class='label-post-date'>{{date('d M Y H:i', strtotime($staff->created_at))}}</div>
																	<div class='post-text'>{{$staff->status}}</div>
																	<div class='post-image-profile'>
																			@if (!is_null($staff->image))
																					<img src="{{ asset($staff->image) }}" class="post-image-size-profile">
																			@endif
																	</div>

																	@if ($staff->likes > 0)
																			<div class="like-count" id="thumbs{{ $staff->token }}">
																					{{ $countLike }}
																			</div>

																	@else
																			<div class="like-count tohide" id="thumbs{{ $staff->token }}">
																					{{ $countLike }}
																			</div>
																	@endif  

																	<div class="post-media-group">
																			<div class="post-profile-like">
																					<button class="post-profile-like-btn {{ $styleLike }}" data-status="{{ $statusLike }}" data-role="1" data-token="{{ $staff->token }}" data-id="{{ $staff->id }}" data-lk="{{ (int)$staff->likes }}" name="lk{{ $staff->token }}" data-admin="{{Auth::user()->name}}" id="thumbup">
																					</button>
																			</div>

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
								@endforeach
						@endif

						@endforeach		
						@endif			
				</div>
		</div>
</div>
@endsection