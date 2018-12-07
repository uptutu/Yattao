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

Route::get('/', function () {
    return view('pages.home');
})->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);


Route::resource('msgs', 'MsgBoardController', ['only' => ['index', 'store', 'destroy']]);

//Route::get('/board', 'MsgBoardController@index')->name('msgs.index');
//Route::post('/board', 'MsgBoardController@store')->name('msgs.store');
//Route::delete('/board', 'MsgBoardController@destroy')->name('msgs.destroy');

Route::resource('topics', 'TopicsController', ['only' => ['index', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::post('upload_image', 'TopicsController@uploadImage')->name('topics.upload_image');
Route::get('topics/{topic}/{slug?}', 'TopicsController@show')->name('topics.show');
Route::resource('replies', 'RepliesController', ['only' => ['store', 'destroy']]);
Route::resource('notifications', 'NotificationsController', ['only' => ['index']]);