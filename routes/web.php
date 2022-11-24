<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BMIController;
use App\Http\Controllers\CategoryController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::middleware(['auth', 'Admin'])->group(function () {
    // Route Pengguna
    Route::resource('user', UserController::class);
    Route::get('user/{user}', [UserController::class, 'destroy']);
});

Route::middleware(['auth'])->group(function () {
    
    // Route Category
    Route::resource('category', CategoryController::class);
    Route::get('category/{category}', [CategoryController::class, 'destroy']);
    
    // Route Artikel
    Route::resource('article', ArticleController::class);
    Route::get('article/{article}', [ArticleController::class, 'destroy']);
    
    // Route BMI
    Route::resource('bmi', BMIController::class);
});

Route::resource('/', BerandaController::class);

