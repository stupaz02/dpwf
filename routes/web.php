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

Route::get('/search',[
    'uses' => 'PostController@search',
    'as'   => 'search'
]);

Route::get('/post/{pid}',[
   'uses' => 'PostController@show',
    'as'  => 'front.show'
]);


Route::get('/download',[
    'uses' => 'PostController@showDownload',
    'as'   => 'front.showdownload'
]);

Route::get('/issuances',[
    'uses' => 'PostController@issuances',
    'as'   => 'front.issuances'
]);

Route::get('/history',[
    'uses' => 'PostController@history',
    'as'   => 'front.history'
]);

// Route::post('/backend/post/upload',[
//     'uses' => 'Backend\FileUploaderController@uploadFile',
//     'as'   => 'post.fileupload'
// ]);

Route::resource('/backend/events', 'Backend\EventsController');
Route::resource('/backend/slides', 'Backend\SlideController');

Auth::routes();

Route::get('/home', 'Backend\HomeController@index')->name('home');
Route::get('/edit-account', 'Backend\HomeController@edit');
Route::put('/edit-account', 'Backend\HomeController@update');

Route::get('/files/{file}',[
    'uses'  => 'Backend\DownloadController@downloadFile',
    'as'    => 'downloadFile'
]);

Route::get('/backend/post/attachment/{id}',[
    'uses' => 'Backend\DownloadController@destroyAtt',
    'as'   => 'attachment.destroy'
]);


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


