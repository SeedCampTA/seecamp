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

Route::get('/', function () {
    return redirect('/posts');
});

Route::auth();

Route::get('home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {

    Route::get('profile/edit', 'ProfileController@edit');
    Route::put('profile', 'ProfileController@update');
    Route::resource('posts', 'PostController');
    Route::put('posts/{id}/like', 'PostController@like');
    Route::put('posts/{id}/unlike', 'PostController@unlike');

    Route::resource('posts.comments', 'CommentController', [
        'parameters' => 'singular'
    ]);
});

