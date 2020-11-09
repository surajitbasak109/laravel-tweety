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

Route::get(
    '/',
    function () {
        return view('_welcome');
    }
);

Route::middleware('auth')->group(
    function () {
        Route::get('/tweets', 'TweetController@index')->name('home');
        Route::post('/tweets', 'TweetController@store');

        Route::post('/tweets/{tweet}/like', 'TweetLikesController@store');
        Route::delete('/tweets/{tweet}/like', 'TweetLikesController@destroy');

        Route::post('/profile/{user:username}/follow', 'FollowsController@store')->name('follow');
        Route::get('/profile/{user:username}/edit', 'ProfileController@edit')->middleware('can:edit,user');
        Route::patch('/profile/{user:username}', 'ProfileController@update')->middleware('can:edit,user');
        Route::get('/explore', 'ExploreController');
    }
);

Route::get('/profile/{user:username}', 'ProfileController@show')->name('profile');


Auth::routes();
