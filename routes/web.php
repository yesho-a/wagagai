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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('post', App\Http\Controllers\PostController::class);
Route::post('/comment/store', 'App\Http\Controllers\CommentController@store')->name('comment.add');
Route::resource('roles', App\Http\Controllers\RoleController::class);
Route::resource('perm', App\Http\Controllers\PermissionController::class);
Route::get('list','App\Http\Controllers\CategoryController@list');
Route::get('add','App\Http\Controllers\CategoryController@manageCategory');
Route::get('/test', [App\Http\Controllers\PostController::class, 'test'])->name('test');
Route::post('ajax', [App\Http\Controllers\PostController::class, 'ajax']);
Route::post('add-category',['as'=>'add.category','uses'=>'App\Http\Controllers\CategoryController@addCategory']);
Route::get('tags/{tag}', [App\Http\Controllers\PostController::class, 'tags']);
Route::get('cat', [App\Http\Controllers\PostController::class, 'cat']);
