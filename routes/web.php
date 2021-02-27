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

//Route::get('/', function () {
//    $title = 'Главная страница';
//    //$excel = "<h1>H1 tag</h1>";
//
//    return view('welcome', compact('title', /*'excel'*/));
//});

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('/');


Route::get('/page/about', [\App\Http\Controllers\PageController::class, 'show'])->name('page.about');
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/blog', [\App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/blog/create', [\App\Http\Controllers\BlogController::class, 'create'])->name('posts.create');
Route::post('/blog', [\App\Http\Controllers\BlogController::class, 'store'])->name('posts.store');


//Route::get('/send', [\App\Http\Controllers\ContactController::class, 'send']);
Route::match(['get', 'post'], '/send', [\App\Http\Controllers\ContactController::class, 'send']);



Route::group(['middleware' => 'guest',/* 'prefix' => 'admin' */], function() {
    Route::get('/register', [\App\Http\Controllers\UserController::class, 'create'])->name('user.create');
    Route::post('/register', [\App\Http\Controllers\UserController::class, 'store'])->name('register.store');
    Route::get('/login', [\App\Http\Controllers\UserController::class, 'loginForm'])->name('login.create');
    Route::post('/login', [\App\Http\Controllers\UserController::class, 'login'])->name('login');
});
Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout')->middleware('auth');

// Admin panel
Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::get('/', [\App\Http\Controllers\Admin\MainController::class, 'index'])->middleware('admin');
});

