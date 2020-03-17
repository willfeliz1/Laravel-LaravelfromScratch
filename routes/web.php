<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/posts/{post}', function ($post){
    
    $posts = [
        'my-first-post' => 'hellow, this is my first post',
        'my-second-post' => 'second post'
    ];

    if(!array_key_exists($post, $posts)){
        abort(404, 'sorry, but the post was not found');
    }
    
    return view ('post', [
        'post' => $posts[$post]
    ]);

});

Route::get('/contact', function(){
    return view('contact');  
  });

Route::get('/about', function(){
    $article = App\Article::latest()->get();
    return view('about', [
        'articles' => App\Article::latest()->get()
    ]);
});

Route::get('/articles', 'ArticlesController@index');
Route::post('/articles', 'ArticlesController@store');
Route::get('/articles/create', 'ArticlesController@create');
Route::get('/articles/{article}', 'ArticlesController@show');
Route::get('/articles/{article}/edit','ArticlesController@edit');
Route::put('/articles/{article}', 'ArticlesController@update');



Route::get('/posts/{post}', 'PostsController@show');

Route::view('/', 'welcome');



