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

Route::get('/', 'ArticleController@index')->name('article.index');
Route::get('/article/create', 'ArticleController@create')->name('article.create');
Route::post('/article/preview', 'ArticleController@preview')->name('article.preview');
Route::get('/article/{article}', 'ArticleController@show')->name('article.show');
Route::get('/article/{article}/edit', 'ArticleController@edit')->name('article.edit');
Route::post('/article', 'ArticleController@store')->name('article.store');

Route::get('/about', function() {
    return view('about');
});

Route::post('/comment/{article}', 'CommentController@store')->name('comment.store');
Route::resource('tags', 'TagController', ['except' => ['create']]);

Route::get('/donate', 'DonateController@index')->name('donate.show');
Route::get('/donate/thankyou', 'DonateController@thankyou')->name('donate.thankyou');
Route::get('/donate/cancel', 'DonateController@cancel')->name('donate.cancel');

Route::get('/profile/{username}', 'ProfileController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.patch');

