<?php

use App\Http\Controllers\NewController;
use App\Http\Controllers\Offers\OffersController;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
 use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

//use Mcamara\LaravelLocalization\LaravelLocalization;
// use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

 Auth::routes(['verify'=>true]);
//Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'home'])->name('welcome');
 
 
 //Route::get('lang/{lang}', [  App\Http\Controllers\LanguagesController::class,"switchLang"])->name('lang');



 
// Auth::routes();
//Route::resource('news',NewController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 // Route::get('redirectToFB/{service}', [App\Http\Controllers\FacebookSocialiteController::class, 'redirectToFB'])->name('redirectToFB');
// Route::get('/callback/{service}', [App\Http\Controllers\FacebookSocialiteController::class, 'callback']);
Route::get('/redirect/{service}', [App\Http\Controllers\Auth\FacebookSocialiteController::class, 'redirect']);
Route::get('/callback/{service}', [App\Http\Controllers\Auth\FacebookSocialiteController::class, 'callbackc']);
// Route::get('/create',[App\Http\Controllers\OffersController::class,'create']);
// Route::get('/store',[App\Http\Controllers\OffersController::class,'store']);
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware("verified");
// Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => '\App\Http\Controllers\LanguagesController@switchLang']);
 //Route::get('/lang/{lang}', [  App\Http\Controllers\LanguagesController::class,"switchLang"])->name('lang');
Route::group(['prefix'=>LaravelLocalization::setlocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],function(){
   // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware("verified");
   // Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => '\App\Http\Controllers\LanguagesController@switchLang']);
   // Route::get('lang/{lang}', [  App\Http\Controllers\LanguagesController::class,"switchLang"])->name('lang');
    Route::get('/create',[App\Http\Controllers\OffersController::class,'create'])->name('create');
    Route::get('/store',[App\Http\Controllers\OffersController::class,'store'])->name('store');
    Route::get('/all',[App\Http\Controllers\OffersController::class,'getAll'])->name('all');
    Route::get('/edit/{id}',[App\Http\Controllers\OffersController::class,'editOffer'])->name('edit');
    Route::get('/update/{id}',[App\Http\Controllers\OffersController::class,'updateOffer'])->name('update');
   // Route::post('store',[App\Http\Controllers\OffersController::class,'store']);
Route::get('/lang/{lang}', [  App\Http\Controllers\LanguagesController::class,"switchLang"])->name('lang');
});
// Route::get('/create',[App\Http\Controllers\Offers\OffersController::class,'create'])->name('create');
//  Route::get('/store',[App\Http\Controllers\Offers\OffersController::class,'store'])->name('store');
 //Route::post('/store',[App\Http\Controllers\Offers\OffersController::class,'store']);
