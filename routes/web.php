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

Route::get('/', 'HomeController@index');

Route::get('/locale', "HomeController@language");

Route::get('/profile', "ProfileController@index");
Route::post('/profile/password', "ProfileController@ResetPassword");

Auth::routes();

Route::get('/profile/twitter', ['as' => 'twitter.login', "uses" => "TwitterController@signinTwitter"]);

Route::get('/twitter/callback', ['as' => 'twitter.callback', "uses" => "TwitterController@callbackTwitter"]);

Route::post('/twitter/tweet', "TwitterController@PostTweet");

Route::get('/data/get', "DataController@GetData");

