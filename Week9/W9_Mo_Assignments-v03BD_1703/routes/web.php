<?php

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

Auth::routes();

// For the profile dropdown menu
Route::get('/profile', 'UserController@profile');
Route::get('/', 'PostsController@index');
Route::post('/profile', 'UserController@update_avatar');

Route::get('/create_post', 'PostsController@create_post');

Route::resource('posts', 'PostsController');
Route::resource('like', 'LikeController');


Route::get('/home', 'HomeController@index')->name('home');



Auth::routes();

