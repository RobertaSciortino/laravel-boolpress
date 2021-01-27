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

Route::get('/', 'HomeController@index')->name('index');
Route::get('/contatti', 'HomeController@contatti')->name('contatti');
Route::get('/posts', 'PostController@index')->name('posts');
Route::get('/posts/{slug}', 'PostController@show')->name('post');


Auth::routes(['register' => false]);

//gruppo di rotte admin
Route::middleware('auth')->name('admin.')->namespace('Admin')->prefix('admin')->group(function(){
  Route::get('/', 'HomeController@index')->name('index');
  Route::resource('/posts', 'PostController');
});
