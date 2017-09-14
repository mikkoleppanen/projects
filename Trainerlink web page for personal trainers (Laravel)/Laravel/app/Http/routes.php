<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

//Route::get('/', 'HomeController@landing');
Route::post('subscribe', 'Homecontroller@subscribe');
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('trainers', 'HomeController@trainers');
Route::get('blogs', 'HomeController@blogs');
Route::get('forum', 'HomeController@forum');
Route::get('info', 'HomeController@info');

Route::get('search', 'HomeController@search');
Route::get('search/{query}', 'HomeController@search');
Route::post('search', 'HomeController@search');

Route::get('user/profile', 'UserController@show');
Route::get('user/edit', 'UserController@edit');
Route::get('user/{id}', 'HomeController@user');
Route::post('user/edit', 'UserController@update');
Route::post('user/review', 'UserController@review');
Route::post('user/sendMail', 'UserController@sendMail');

Route::resource('home', 'HomeController');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::get('lang/{locale}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLanguage']);