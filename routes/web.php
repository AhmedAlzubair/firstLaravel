<?php

use App\Http\Controllers\NewController;
use App\Http\Controllers\Offers\OffersController;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
 use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
 use App\Http\Controllers\Auth\CustomAuthController;
//use Mcamara\LaravelLocalization\LaravelLocalization;
// use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
define('PAGINATION_COUNT',3);
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
    Route::get('/getAllInactive',[App\Http\Controllers\OffersController::class,'getAllInactive'])->name('getAllInactive');
    Route::get('/edit/{id}',[App\Http\Controllers\OffersController::class,'editOffer'])->name('edit');
    Route::get('/update/{id}',[App\Http\Controllers\OffersController::class,'updateOffer'])->name('update');
    Route::get('/video',[App\Http\Controllers\OffersController::class,'getViewer'])->name('video');
   // Route::put('store',[App\Http\Controllers\OffersController::class,'store'])->name('store');
Route::get('/lang/{lang}', [  App\Http\Controllers\LanguagesController::class,"switchLang"])->name('lang');
Route::get('/ajxFgetAll',[App\Http\Controllers\OffersController::class,'getAllAjxF'])->name('ajxFgetAll');
Route::get('/ajxFcreate',[App\Http\Controllers\OffersController::class,'createAjxF'])->name('ajxFcreate');
Route::post('/ajxFstore',[App\Http\Controllers\OffersController::class,'storeAjxF'])->name('ajxFstore');
Route::post('/ajxFdelete',[App\Http\Controllers\OffersController::class,'deleteAjxF'])->name('ajxFdelete');
Route::post('/ajxFupdate',[App\Http\Controllers\OffersController::class,'updateOfferAjxF'])->name('ajxFupdate');
Route::get('/adult',[App\Http\Controllers\OffersController::class,'indexv'])->name('adult');
});
// Route::get('/create',[App\Http\Controllers\Offers\OffersController::class,'create'])->name('create');
//  Route::get('/store',[App\Http\Controllers\Offers\OffersController::class,'store'])->name('store');
 //Route::post('/store',[App\Http\Controllers\Offers\OffersController::class,'store']);
 Route::group(['middleware'=> ['checkAge']],function (){
   Route::get('/authcheckAge',[App\Http\Controllers\Auth\CustomAuthController::class,'index'])->name('authcheckAge')->middleware("auth:web");
   // Route::get('/admin',[App\Http\Controllers\Auth\CustomAuthController::class,'admin'])->name('admin')->middleware("auth:admin");
   // Route::get('/adminlogin',[App\Http\Controllers\Auth\CustomAuthController::class,'adminlogin'])->name('adminlogin');
   // Route::get('/admincheckAge',[App\Http\Controllers\Auth\CustomAuthController::class,'admincheckAge'])->name('admincheckAge')->middleware("auth:admin");
 });
//  Route::group(['middleware'=> ['checkadmin']],function (){
//   Route::get('/admin',[App\Http\Controllers\Auth\CustomAuthController::class,'admin'])->name('admin')->middleware("auth:admin");
// });
//  Route::get('/authcheckAge',[App\Http\Controllers\Auth\CustomAuthController::class,'index'])->name('authcheckAge')->middleware("checkAge");
Route::get('/admin',[App\Http\Controllers\Auth\CustomAuthController::class,'admin'])->name('admin')->middleware("auth:admin");
Route::get('/adminlogin',[App\Http\Controllers\Auth\CustomAuthController::class,'adminlogin'])->name('adminlogin');
Route::get('/admincheckAge',[App\Http\Controllers\Auth\CustomAuthController::class,'admincheckAge'])->name('admincheckAge');
/**** Begin Relation One to One *********/
Route::get('/getusersphone',[App\Http\Controllers\Relation\RelationController::class,'getusersphone'])->name('getusersphone');
Route::get('/getphoneusers',[App\Http\Controllers\Relation\RelationController::class,'getphoneusers'])->name('getphoneusers');
/**** End Relation One to One *********/
/**** Begin Relation One to Many *********/
Route::get('/getHospitalDoctor',[App\Http\Controllers\Relation\RelationController::class,'getHospitalDoctor'])->name('getHospitalDoctor');
Route::get('/getCountryHospital',[App\Http\Controllers\Relation\RelationController::class,'getCountryHospital'])->name('getCountryHospital');
Route::get('/getallDoctors',[App\Http\Controllers\Relation\RelationController::class,'getallDoctors'])->name('getallDoctors');
Route::get('/getDoctorHospital/{id}',[App\Http\Controllers\Relation\RelationController::class,'getDoctorHospital'])->name('getDoctorHospital');
Route::post('/deleteHospital',[App\Http\Controllers\Relation\RelationController::class,'deleteHospital'])->name('deleteHospital');
/**** End Relation One to Many *********/
   /** Start  Many to Many     */
   Route::get('/getDoctorServices/{id}',[App\Http\Controllers\Relation\RelationController::class,'getDoctorServices'])->name('getDoctorServices');
   Route::post('/saveDoctorServices',[App\Http\Controllers\Relation\RelationController::class,'saveDoctorServices'])->name('saveDoctorServices');
    /** End Many to Many     */
/****  Relation HasOneThrough*********/
Route::get('/getDoctorPatient',[App\Http\Controllers\Relation\RelationController::class,'getDoctorPatient'])->name('getDoctorPatient');
Route::get('/getCountryDoctor',[App\Http\Controllers\Relation\RelationController::class,'getCountryDoctor'])->name('getCountryDoctor');
/****  Relation HasOneThrough*********/