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

Route::post('/comment/{article}', 'CommentController@store');

Route::get('/', 'ArticleController@index');
Route::get('/article/create', 'ArticleController@create');
Route::get('/article/{article}', 'ArticleController@show');
Route::post('/article', 'ArticleController@store');

Route::get('/about', 'HomeController@about');
Route::get('/donate', 'HomeController@donate');

Route::get('/profile/{username}', 'ProfileController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.patch');

