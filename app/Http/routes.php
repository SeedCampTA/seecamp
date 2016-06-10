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
    dd('home');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/profile/edit', [
    'middleware' => 'auth',
    'uses' => 'ProfileController@edit',
    ]
);

Route::post('/profile/edit', [
    'middleware' => 'auth',
    'uses' => 'ProfileController@update',
    ]
);

Route::resource('posts', 'PostController');

Route::resource('posts.comments', 'CommentController', [
    'parameters' => 'singular'
]);