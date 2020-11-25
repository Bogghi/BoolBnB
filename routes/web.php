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

});

// Routes for guests' apartments' controller.
Route::get('/', 'ApartmentController@index')->name('homepage');
Route::get('/show/{id}', 'ApartmentController@show')->name('apartment.show');

//Route for store the message.
Route::post('/message/{$apartment_id}', 'MessageController@store')->name('message.store');
