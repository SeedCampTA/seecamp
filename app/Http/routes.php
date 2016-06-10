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
    return redirect('posts');
});

Route::resource('/profile', 'UserController');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::post('/editprofile', [
	'middleware' => 'auth',
    'uses' => 'ProfileController@editprofile']
);

Route::put('posts/{id}/like', 'PostController@like');
Route::put('posts/{id}/unlike', 'PostController@unlike');

Route::resource('posts', 'PostController');

Route::resource('posts.comments', 'CommentController', [
    'parameters' => 'singular'
]);

