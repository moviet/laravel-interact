<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home
Route::get('', 'Home\HomeController@index')->name('index.home');
Route::get('about', 'Home\HomeController@about')->name('index.about');
Route::get('contact', 'Home\ContactController@index')->name('index.contact');
Route::post('contact', 'Home\ContactController@store')->name('index.contact.posts');

// Auth
Auth::routes(['verify' => true]);
Route::get('/logout', 'Auth\LogoutController@gone');
