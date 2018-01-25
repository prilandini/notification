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
use App\Post;
use App\Events\NewPost;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::post('/posts', function() {
    $post = Post::create(request()->all());

    event (new NewPost($post));

    return back(); 
});

Route::get('/home', function() {
    return view('post', [
        'posts' => Post::latest()->get(),
    ]); 
});