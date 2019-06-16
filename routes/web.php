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

Auth::routes();

Route::get('/', 'BlogController@index')->name('blog.index');
Route::get('/create', 'BlogController@create')->name('blog.create')->middleware('auth');
Route::get('/edit/{blogPost}', 'BlogController@edit')->name('blog.edit')->middleware('can:update,blogPost');
Route::get('/view/{blogPost}', 'BlogController@view')->name('blog.view');

Route::post('/blog-post', 'BlogController@store')->name('blog.post');
Route::put('/blog-post/{blogPost}', 'BlogController@update')->name('blog.put');
Route::delete('/blog-post/{blogPost}', 'BlogController@delete')->name('blog.delete')->middleware('can:delete,blogPost');
