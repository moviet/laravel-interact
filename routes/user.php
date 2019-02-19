<?php

// Api Login
Route::namespace('Auth')->group(function () {	
		Route::get('home','UserController@index')->name('home.index');
		Route::get('user', 'UserController@show')->name('user.index')->middleware('auth:api');
});

// Api Dashboard
Route::namespace('Pages')->group(function () {	     
		Route::apiResource('home', 'DashboardController')->only(['show']);
		Route::apiResource('home.posts', 'DashboardController')->only(['store']);
		Route::apiResource('user', 'ProfileController')->only(['show']);  
		Route::apiResource('search', 'SearchProfileController')->only(['index','show','store']);
});


