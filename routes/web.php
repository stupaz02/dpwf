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


Route::get('/',[
   'uses' => 'PostController@index',
   'as'  =>'front.index'
]);

Route::get('/post/{post}',[
   'uses' => 'PostController@show',
    'as'  => 'front.show'
]);

Route::resource('/backend/events', 'Backend\EventsController');
Route::resource('/backend/slides', 'Backend\SlideController');

Auth::routes();

Route::get('/home', 'Backend\HomeController@index')->name('home');
Route::get('/edit-account', 'Backend\HomeController@edit');
Route::put('/edit-account', 'Backend\HomeController@update');

Route::put('/backend/post/restore/{post}', [
    'uses' => 'Backend\PostController@restore',
    'as'   => 'post.restore'
]);
Route::delete('/backend/post/force-destroy/{post}', [
    'uses' => 'Backend\PostController@forceDestroy',
    'as'   => 'post.force-destroy'
]);

Route::resource('/backend/post', 'Backend\PostController');
Route::resource('/backend/categories', 'Backend\CategoriesController');
Route::get('/backend/users/confirm/{user}', [
    'uses' => 'Backend\UsersController@confirm',
    'as'   => 'users.confirm'
]);
Route::resource('/backend/users', 'Backend\UsersController');


