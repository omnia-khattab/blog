<?php

use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('Post');
});
Route::get('/posts','PostController@list');
Route::get('/posts/details/{id}','PostController@show');
//Admin Links
Route::middleware('isAdmin','preventBackHistory')->group(function(){
//create post
Route::get('/posts/create','PostController@create');
Route::post('/posts/store','PostController@store');
//edit post
Route::get('/posts/edit/{id}','PostController@edit');
Route::post('/posts/update/{id}','PostController@update');
//delete post
Route::get('/posts/delete/{id}','PostController@delete');
//admins list 
Route::get('/admin','UserController@list');
//add admin 
Route::get('/admin/create','UserController@create');
Route::post('/admin/save','UserController@save');
//admins edit
Route::get('/admin/edit/{id}','UserController@edit');
Route::post('/admin/update/{id}','UserController@update');
//admins delete
Route::get('/admin/delete/{id}','UserController@delete');
//messages list
Route::get('/messages','MessageController@list');
//delete message
Route::get('/messages/delete/{id}','MessageController@delete');
});

//admin login
Route::middleware('preventBackHistory')->group(function(){
Route::get('/login','UserController@login');
});
Route::post('/admin/handleLogin','UserController@handleLogin');
Route::get('/admin/logout','UserController@logout');
//Messages
Route::get('/messages/create','MessageController@create');
Route::post('/messages/send','MessageController@send');

//not Auth
Route::get('/notAuth',function(){
    return "you don't have permission to access this link";
});



