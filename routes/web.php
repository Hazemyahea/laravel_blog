<?php

use App\Http\Middleware\Admin;
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



Auth::routes();


// Admin Routes..

Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('/notmember', function () {
    return view('notmember');
})->name('notmember');;
Route::group(['middleware'=>'Admin'],function()
{
    Route::get('/admin', function () {
        return view('admin.index');
    });
    Route::resource('admin/users','UserController');
    Route::resource('admin/category','CategortiesController');
    Route::resource('admin/posts','PostsController');
    Route::resource('admin/comments','CommentController');

    });

Route::get('/post','CommentsController@store');
Route::post('/post','CommentsController@store');
Route::post('/post','LikesController@store')->middleware('auth');
Route::post('/make','LikesController@make')->middleware('auth');

////// Home Routes

Route::get('/', 'HomeController@index')->name('home');
Route::get('/post/{id}', 'HomeController@show')->name('post');
Route::get('/category/{id}', 'CateController@show')->name('category');




