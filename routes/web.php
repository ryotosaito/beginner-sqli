<?php

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

Route::middleware('auth')->group(function (){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/challenge/{id}', 'ChallengeController@show')->name('challenge');
    Route::post('/challenge/{id}', 'ChallengeController@submit')->name('submit');
});
