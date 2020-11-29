<?php

use Illuminate\Support\Facades\Route;

/**
 * @var
 */

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

Route::get('/', 'App\Http\Controllers\AppController@home');

Route::get('/product/{id}', 'App\Http\Controllers\ProductController@one');

Route::get('/search', 'App\Http\Controllers\ProductController@search');

Route::get('/category/{id}', 'App\Http\Controllers\CategoryController@one');

Route::get('/categories', 'App\Http\Controllers\CategoryController@first');

Route::get('/news/{id}', 'App\Http\Controllers\NewsController@one');
Route::get('/news', 'App\Http\Controllers\NewsController@all');

Route::get('/login', 'App\Http\Controllers\AccessController@login');
Route::post('/login', 'App\Http\Controllers\AccessController@loginHandle');
Route::get('/logout', 'App\Http\Controllers\AccessController@logout');
Route::get('/register', 'App\Http\Controllers\AccessController@register');
Route::post('/register', 'App\Http\Controllers\AccessController@registerHandle');

Route::post('/comment', 'App\Http\Controllers\NewsController@comment');

Route::post('/review', 'App\Http\Controllers\ProductController@review');

Route::get('/create', 'App\Http\Controllers\ProductController@create');
Route::post('/create', 'App\Http\Controllers\ProductController@createHandle');

Route::get('/profile', 'App\Http\Controllers\ProfileController@home');
Route::get('/profile/products', 'App\Http\Controllers\ProfileController@products');
Route::get('/profile/product/{id}', 'App\Http\Controllers\ProfileController@product');
Route::post('/profile/product/{id}/update', 'App\Http\Controllers\ProfileController@update');
Route::get('profile/product/{id}/delete', 'App\Http\Controllers\ProfileController@delete');

Route::get('/about', 'App\Http\Controllers\AppController@about');