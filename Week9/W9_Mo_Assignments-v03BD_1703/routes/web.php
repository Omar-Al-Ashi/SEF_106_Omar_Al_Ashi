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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// For the profile dropdown menu
Route::get('/profile', 'UserController@profile');
Route::post('/profile', 'UserController@update_avatar');

Route::get('/create_post', 'PostsController@create_post');

//Route::get('posts', 'PostsController@returnView');
Route::resource('posts', 'PostsController');


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

