<?php

use App\Http\Controllers\NewController;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



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
//     Debugbar::info('info');
//     return view('welcome');
// });

 Auth::routes();
//Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'home'])->name('welcome');
 //Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware("verified");

// Auth::routes();
//Route::resource('news',NewController::class);
 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//  Route::get('/redirectToFB/{service}', [App\Http\Controllers\FacebookSocialiteController::class, 'redirectToFB']);
// Route::get('/callback/{service}', [App\Http\Controllers\FacebookSocialiteController::class, 'callback']);
Route::get('/redirect/{service}', [App\Http\Controllers\Auth\FacebookSocialiteController::class, 'redirect']);
Route::get('/callback/{service}', [App\Http\Controllers\Auth\FacebookSocialiteController::class, 'callback']);