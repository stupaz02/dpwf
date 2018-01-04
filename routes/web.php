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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[
   'uses' => 'FrontController@index',
   'as'  =>'front.index'
]);

Auth::routes();

Route::get('/home', 'Backend\HomeController@index')->name('home');

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


