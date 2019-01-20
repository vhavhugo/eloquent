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

Route::get('/post/{posts}', 'Site\PostController@show')->name('posts.show');
Route::get('/', 'Site\PostController@index');

Route::get('/contato', function() {
    return view('contact.index');
});

// Route::get('/{lang?}', function ($lang='pt-BR') {
//     App::setLocale($lang);
// });

