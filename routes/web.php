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

Auth::routes(['register' => false, 'reset' => false]);
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('language/{locale}', 'HomeController@language')->name('language');


Route::middleware(['auth','csrf'])->group(function () {
    
    Route::namespace('Dashboard\Admin')->prefix('admins')->name('admins.')->group(function()
    {
        Route::resource('vet-requests','VetRequestController');
        Route::resource('vet-offers','VetOfferController');
        Route::resource('driver-requests','DriverRequestController');
        Route::resource('driver-offers','DriverOfferController');
        Route::resource('home','HomeController');
    });

});