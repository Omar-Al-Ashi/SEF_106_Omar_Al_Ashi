<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('experiences', 'API\ExperienceDetailController');
Route::resource('admins', 'API\AdminProfileController');
Route::resource('companies', 'API\CompanyProfileController');
Route::resource('educations', 'API\EducationDetailController');
Route::resource('graduates', 'API\GraduateProfileController');
Route::resource('skills', 'API\SkillSetController');
Route::resource('social_medias', 'API\SocialMediaController');
Route::get('allGraduatesWithInfo', 'API\GraduateProfileController@returnAllGraduatesWithAllInfo');
Route::post('graduate/store', 'API\GraduateInfoController@store');

