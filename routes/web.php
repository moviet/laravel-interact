<?php

// Home
Route::get('', 'Home\HomeController@index')->name('index.home');
Route::get('about', 'Home\HomeController@about')->name('index.about');
Route::get('contact', 'Home\ContactController@index')->name('index.contact');
Route::post('contact', 'Home\ContactController@store')->name('index.contact.posts');

// Auth
Auth::routes(['verify' => true]);
Route::get('logout', 'Auth\LogoutController@gone')->name('logout');



