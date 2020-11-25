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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->name('admin.')->namespace('Admin')->middleware('auth')->group(function () {
    Route::resource('apartment', 'ApartmentController');
<<<<<<< HEAD
    Route::resource('sponsorization', 'SponsorizationController');
});
=======

});

// Routes for guests' apartments' controller.
Route::get('/', 'ApartmentController@index')->name('homepage');
Route::get('/show/{id}', 'ApartmentController@show')->name('apartment.show');

//Route for store the message.
Route::post('/message', 'MessageController@store')->name('message.store');
>>>>>>> 1cf5d288981156be7b05fadd9fcc1035b5588a6e
