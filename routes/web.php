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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');


Route::get('/posts', 'App\Http\Controllers\Post\IndexController@index')->name('post.index');

Route::get('/posts/create', 'App\Http\Controllers\Post\CreateController@create')->name('post.create');
Route::post('/posts/store', 'App\Http\Controllers\Post\StoreController@store')->name('post.store');
Route::get('/posts/{post}', 'App\Http\Controllers\Post\ShowController@show')->name('post.show');
Route::get('/posts/{post}/edit', 'App\Http\Controllers\Post\EditController@edit')->name('post.edit');
Route::patch('/posts/{post}/', 'App\Http\Controllers\Post\UpdateController@update')->name('post.update');
Route::delete('/posts/{post}/', 'App\Http\Controllers\Post\DestroyController@destroy')->name('post.delete');

Route::group(['namespace' => 'App\Http\Controllers\Admin','prefix'=>'admin','middleware'=>'admin'], function () {

    Route::group(['namespace' => 'Post'], function () {
        Route::get('/post', 'IndexController@index')->name('admin.post.index');

    });
});


Route::get('/posts/update', 'App\Http\Controllers\PostController@update');
Route::get('/posts/delete', 'App\Http\Controllers\PostController@delete');
Route::get('/posts/first_or_create', 'App\Http\Controllers\PostController@firstOrCreate');
Route::get('/posts/update_or_create', 'App\Http\Controllers\PostController@updateOrCreate');

Route::get('/main', 'App\Http\Controllers\MainController@index')->name('main.index');
Route::get('/contacts', 'App\Http\Controllers\ContactController@index')->name('contacts.index');
Route::get('/about', 'App\Http\Controllers\AboutController@index')->name('about.index');




Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
