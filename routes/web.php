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
//Route::resource('post', App\Http\Controllers\PostController::class);
Route::get('blog', [ App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::get('/blog/{id}/{slug}', [App\Http\Controllers\PostController::class, 'show'])->name('display');
Route::get('meta', [ App\Http\Controllers\PostController::class, 'meta_index']);


Route::middleware(['auth'])->group(function () {
    Route::get('/post/{id}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
    Route::get('/test', [App\Http\Controllers\PostController::class, 'test'])->name('test');
    Route::get('create','App\Http\Controllers\PostController@create');
    Route::post('/post/store','App\Http\Controllers\PostController@store');
    
});
// Allow Access to view post by all - post.index and post.show

Route::post('/comment/store', 'App\Http\Controllers\CommentController@store')->name('comment.add');
Route::resource('roles', App\Http\Controllers\RoleController::class);
Route::resource('perm', App\Http\Controllers\PermissionController::class);
Route::get('list','App\Http\Controllers\CategoryController@list');
Route::get('add','App\Http\Controllers\CategoryController@manageCategory');
Route::post('ajax', [App\Http\Controllers\PostController::class, 'ajax']);
Route::post('add-category',['as'=>'add.category','uses'=>'App\Http\Controllers\CategoryController@addCategory']);
Route::get('tags/{tag}', [App\Http\Controllers\PostController::class, 'tags']);
Route::get('ca/{cat}', [App\Http\Controllers\PostController::class, 'cat']);
//Route::get('cat', [App\Http\Controllers\PostController::class, 'cat']);
Route::get('admin', [App\Http\Controllers\PostController::class, 'admin']);

// User routes
Route::resource('user', App\Http\Controllers\UserController::class);


